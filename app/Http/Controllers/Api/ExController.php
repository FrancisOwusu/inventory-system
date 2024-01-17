<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/23/2023
 * Time: 7:54 PM.
 */

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ExController
{
    public function index() : Response
    {
        $saveModel = $this->repo->findAll();
        return response()->json($saveModel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Category
    {
        $validated = $request->validate([
            'name' => 'required',
            //            'email' => 'required',
            // //            'salary' => 'required',
            //            'phone' => 'required',
        ]);

        return Category::create($request->all());
    }


    public function show($id): JsonResource
    {
        $resource = Category::where('id', $id)->first();

        return response()->json($resource);
    }

//
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
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function update(Request $request, $id): bool
    {
        $input = $request->all();
        $record = Category::where('id', $id)->first();
        if ($record) {
            $record->update($input);
        }
        return  false;
    }

//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function destroy($id)
    {
        $resource = Category::where('id', $id)->first();
        if ($resource) {
            Category::where('id', $id)->delete();
        }
    }
}
