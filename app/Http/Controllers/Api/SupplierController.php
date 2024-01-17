<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Image;

class SupplierController extends CoreController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($this->service->model()::storeRules(), $this->service->model()::errorMessages());


        $photo_source = $request->photo;
        if ($request->photo && !is_null($request->photo)) {
            $position = strpos($photo_source, ';');
            $sub = substr($photo_source, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . '.' . $ext;
            $img = Image::make($photo_source)->resize(240, 200);
            $upload_path = 'backend/uploads/suppliers/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $data['photo'] = $image_url;

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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id, Request $request): JsonResponse
    {
        $data = $request->validate($this->service->model()::updateRules($id), $this->service->model()::errorMessages());
        $photo_source = $data['newphoto'];
        if ($photo_source) {
            $position = strpos($photo_source, ';');
            $sub = substr($photo_source, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . '.' . $ext;
            $img = Image::make($photo_source)->resize(240, 200);
            $upload_path = 'backend/uploads/supplier/';
            $image_url = $upload_path . $name;
            $saveNewImage = $img->save($image_url);

            if ($saveNewImage) {
                $data['photo'] = $image_url;
                $img = DB::table('suppliers')->where('id', $id)->first();
                $image_path = $img->photo;
                unlink($image_path);
                if ($img) {
                    unset($photo_source);
                    $input['photo'] = $image_url;

                    $resource = $this->service->update($id, $data);
                }
            } else {
                $oldPhoto = $data['photo'];
                $data['photo'] = $oldPhoto;
                unset($data['newphoto']);
                $resource = $this->service->update($id, $data);

                //                $supplier = DB::table('suppliers')->where("id",$id)
                //                    ->update($input);
            }
        }

        if (!$resource) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($resource);
    }

//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
// {
//    $resource = Supplier::where("id", $id)->first();
//    $photo = $resource->photo;
//    if ($photo) {
//        unlink($photo);
//        DB::table("suppliers")->where("id", $id)->delete();
//    } else {
//        DB::table("suppliers")->where("id", $id)->delete();
//    }
// }

    public function destroy($id): JsonResponse
    {
        $resource = Supplier::where('id', $id)->first();
        $photo = $resource->photo;
        if ($photo) {
            unlink($photo);
        }

        $deleted = $this->service->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
