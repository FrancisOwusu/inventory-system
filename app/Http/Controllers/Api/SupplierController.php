<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Services\CoreService;
use App\Services\CrudHelper;
use App\Services\ICoreService;
use Illuminate\Http\Request;

class SupplierController extends Controller
    //CoreController



//public function __construct(CoreService $service)
//{
//    parent::__construct($service);
//}

{
    protected $model;
    protected $repository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Supplier $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        //
        $employee = $this->model::all();
//            Employee::all();
        return response()->json($employee);
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

        $employee = $this->model::create($data);

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
        $resource = $this->model::where("id", $id)->first();
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
        $record = $this->model->where("id", $id)->first();
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
        $resource = $this->model::where("id", $id)->first();
        if ($resource) {
            $this->model::where("id", $id)->delete();
        }
    }
}
