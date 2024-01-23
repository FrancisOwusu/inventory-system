<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends CoreController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
     $products = DB::table('products')
     ->join('categories','products.category_id','categories.id')
     ->join('suppliers','products.supplier_id','suppliers.id')
     ->select('categories.name as category_name','suppliers.name as supplier_name','products.*')
     ->orderBy('products.id','DESC')
     ->get();
     return response()->json($products);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        return $this->extracted($request);
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request): JsonResponse
    {
$productId= $id;
        $data =
            $request->validate($this->service->model()::updateRules($productId), $this->service->model()::errorMessages());
        $photo_source = $request->newImage;
        if ($request->newImage && !is_null($request->newImage)) {
            $position = strpos($photo_source, ';');
            $sub = substr($photo_source, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . '.' . $ext;
            $img = Image::make($photo_source)->resize(240, 200);
            $upload_path = 'backend/uploads/products/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $data['image'] = $image_url;


            return response()->json(
                [$this->service->update($productId,$data),
                ],
                Response::HTTP_CREATED
            );
        }
        return response()->json(
            [$this->service->update($productId,$data),
            ],
            Response::HTTP_CREATED
        );
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function extracted(Request $request): JsonResponse
    {
        $data = $request->validate($this->service->model()::storeRules(), $this->service->model()::errorMessages());

        $photo_source = $request->image;
        if ($request->image && !is_null($request->image)) {
            $position = strpos($photo_source, ';');
            $sub = substr($photo_source, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . '.' . $ext;
            $img = Image::make($photo_source)->resize(240, 200);
            $upload_path = 'backend/uploads/products/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $data['image'] = $image_url;

            return response()->json(
                [$this->service->store($data),
                ],
                Response::HTTP_CREATED
            );
        }

        return response()->json(
            [$this->service->store($data),
            ],
            Response::HTTP_CREATED
        );
    }
}
