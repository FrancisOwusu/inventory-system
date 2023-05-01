<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/23/2023
 * Time: 7:54 PM
 */

namespace App\Http\Controllers\Api;


class ExController

//    Controller
{
//    protected $repo;
//    public function __construct(CategoryRepository $repo)
//    {
//        $this->repo = $repo;
//    }

    public function index()
    {
        //
//        if (!empty($this->model)) {
        $saveModel = $this->repo->findAll();
//            $saveModel = Category::all();
//        }
        return response()->json($saveModel);
    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
//            'email' => 'required',
////            'salary' => 'required',
//            'phone' => 'required',
        ]);

        return Category::create($request->all());

    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function show($id)
    {
        $resource = Category::where("id", $id)->first();
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
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $record = Category::where("id", $id)->first();
        if ($record) {
            $record->update($input);
        }

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
        $resource = Category::where("id", $id)->first();
        if ($resource) {
            Category::where("id", $id)->delete();
        }
    }


}