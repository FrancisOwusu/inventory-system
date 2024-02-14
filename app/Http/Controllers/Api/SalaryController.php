<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SalaryController extends CoreController
{
    public function paySalary($id, Request $request): \Illuminate\Http\JsonResponse
    {

         $request->validate([
            'salary_month' => 'required',
            'salary'=>'required',
        ]);

        $checkSalaryPaid = Salary::where("employee_id", $id)
            ->where("salary_month", $request->salary_month)
            ->first();
        if ($checkSalaryPaid) {
            return response()->json([$checkSalaryPaid,
                    "msg"=>"Resource Already exist"]
            );
        }
        $data['employee_id'] = $id;
        $data['salary_date'] = date('d/m/Y');
        $data['salary_month'] = $request->salary_month;
        $data['salary_year'] = date('Y');
        $data['amount']=$request->salary;

        $saveSalary = Salary::create($data);
        return response()->json(
            [$saveSalary,
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = DB::table('salaries')->select('salary_month')
            ->groupBy('salary_month')
            ->get();
        return \response()->json($data);
    }

    public function viewSalary($id): \Illuminate\Http\JsonResponse
    {
        $month = $id;
        $viewData = DB::table('salaries')
            ->join('employees','salaries.employee_id','=','employees.id')
            ->select('employees.name','salaries.*')
            ->where("salaries.salary_month",$month)
            ->get();


        return response()->json($viewData);
    }



}
