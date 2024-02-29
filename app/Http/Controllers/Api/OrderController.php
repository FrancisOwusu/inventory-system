<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function ordersToday(): JsonResponse
    {
        $date = date('Y-m-d');
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
//            ->where('order_date', $date)
            ->select('customers.name', 'orders.*')
            ->orderBy('orders.id', 'DESC')
            ->get();
        return response()->json($orders);
    }

    public function orderDetails($id): JsonResponse
    {
        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', 'customers.id')
            ->where('orders.id', $id)
            ->select('customers.name', 'customers.phone', 'customers.address', 'orders.*')
            ->first();
        return response()->json($order);

    }

    public function orderDetailsAll($id): JsonResponse
    {
        $details = DB::table('order_details')
            ->join('products', 'order_details.product_id', 'products.id')
            ->where('order_details.order_id', $id)
            ->select('products.product_name', 'products.product_code', 'products.image',
                'order_details.*')
            ->get();
        return response()->json($details);
    }

    public function dueToday(): JsonResponse
    {
        $formattedDate = Carbon::now()->format('Y-m-d');
        $order = DB::table('orders')
            ->whereDate('orders.order_date', $formattedDate)
            ->sum('due');
        return response()->json($order);
    }

    public function incomeToday(): JsonResponse
    {
        $formattedDate = Carbon::now()->format('Y-m-d');
        $order = DB::table('orders')
            ->whereDate('orders.order_date', $formattedDate)
            ->sum('pay');
        return response()->json($order);
    }

    public function todaySales(): JsonResponse
    {
        $formattedDate = Carbon::now()->format('Y-m-d');

        $order = DB::table('orders')
            ->whereDate('orders.order_date', $formattedDate)
            ->sum('total');
        return response()->json($order);
    }

    public function todayExpenses(): JsonResponse
    {
        $formattedDate = Carbon::now()->format('Y-m-d');

        $expenses = DB::table('expenses')
            ->whereDate('expenses.expense_date', $formattedDate)
            ->sum('amount');
        return response()->json($expenses);
    }


}
