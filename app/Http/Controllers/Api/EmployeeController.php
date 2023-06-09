<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class EmployeeController extends
    CoreController{
}

//
////
////    /**
////     * Show the form for creating a new resource.
////     *
////     * @return \Illuminate\Http\Response
////     */
////    public function create()
////    {
////        //
////    }
////
///**
// * Store a newly created resource in storage.
// *
// * @param  \Illuminate\Http\Request $request
// * @return \Illuminate\Http\Response
// */
//public function store(Request $request)
//{
//    $validated = $request->validate([
//        'name' => 'required',
//        'email' => 'required',
////            'salary' => 'required',
//        'phone' => 'required',
//    ]);
//    $data = $request->all();
//    if ($request->photo) {
//        $position = strpos($request->photo, ';');
//        $sub = substr($request->photo, 0, $position);
//        $ext = explode('/', $sub)[1];
//
//        $name = time() . "." . $ext;
//        $img = Image::make($request->photo)->resize(240, 200);
//        $upload_path = 'backend/employee/';
//        $image_url = $upload_path . $name;
//        $img->save($image_url);
//
//
//        $data["photo"] = $image_url;
//        $employee = Employee::create($data);
//    } else {
//        $employee = Employee::create($data);
//    }
//}
////
////    /**
////     * Display the specified resource.
////     *
////     * @param  int  $id
////     * @return \Illuminate\Http\Response
////     */
//public function show($id)
//{
//    $resource = Employee::where("id", $id)->first();
//    return response()->json($resource);
//}
////
////    /**
////     * Show the form for editing the specified resource.
////     *
////     * @param  int  $id
////     * @return \Illuminate\Http\Response
////     */
////    public function edit($id)
////    {
////        //
////    }
////
////    /**
////     * Update the specified resource in storage.
////     *
////     * @param  \Illuminate\Http\Request  $request
////     * @param  int  $id
////     * @return \Illuminate\Http\Response
////     */
//public function update(Request $request, $id)
//{
//    $input = $request->all();
//    $image = $input["newphoto"];
//    if ($request->newphoto) {
//        $position = strpos($image, ';');
//        $sub = substr($image, 0, $position);
//        $ext = explode('/', $sub)[1];
//
//        $name = time() . "." . $ext;
//        $img = Image::make($image)->resize(240, 200);
//        $upload_path = 'backend/employee/';
//        $image_url = $upload_path . $name;
//        $saveNewImage = $img->save($image_url);
//
//        if ($saveNewImage) {
//            $data['photo'] = $image_url;
//            $img = DB::table('employees')->where("id",$id)->first();
//            $image_path = $img->photo;
//            $done =unlink($image_path);
//            if($img){
//                unset($input["newphoto"]);
//                $input["photo"] = $image_url;
//                DB::table('employees')->where("id",$id)->update($input);
//            }
//        }else{
//            $oldPhoto= $request->photo;
//            $data["photo"] =$oldPhoto;
//            unset($input["newphoto"]);
//            $employee = DB::table('employees')->where("id",$id)
//                ->update($input);
//        }
//    }
//    $data["photo"] = $image_url;
//    $employee = Employee::create($data);
//
//}
////
////    /**
////     * Remove the specified resource from storage.
////     *
////     * @param  int  $id
////     * @return \Illuminate\Http\Response
////     */
//public function destroy($id)
//{
//    $resource = Employee::where("id", $id)->first();
//    $photo = $resource->photo;
//    if ($photo) {
//        unlink($photo);
//        DB::table("employees")->where("id", $id)->delete();
//    } else {
//        DB::table("employees")->where("id", $id)->delete();
//    }
//}