<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function getProductByCategory($id): JsonResponse
    {
        $products = Product::where("category_id", $id)
            ->get();
        return response()->json($products);
    }

    public function postOrder(Request $request): JsonResponse
    {
        $request->validate([
            'customer_id' => 'required',
            'pay_by' => 'required'
        ]);

        $data = [];
        $data['customer_id'] = $request->customer_id;
        $data['due'] = $request->due;
        $data['pay_by'] = $request->pay_by;
        $data['pay'] = $request->pay;
        $data['quantity'] = $request->quantity;
        $data['subtotal'] = $request->subtotal;
        $data['total'] = $request->total;
        $data['vat'] = $request->vat;
        $data['order_date'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['order_month'] = date('F');
        $data['order_year'] = date('Y');
        $order = Order::create($data);
        $carts = Cart::get();
        if ($order) {
            $orderDetails = [];
            foreach ($carts as $cart) {
                $orderDetails['order_id'] = $order->id;
                $orderDetails['product_id'] = $cart->product_id;
                $orderDetails['quantity'] = $cart->quantity;
                $orderDetails['price'] = $cart->price;
                $orderDetails['sub_total'] = $cart->sub_total;
                OrderDetail::create($orderDetails);

                Product::where("id", $cart->product_id)
                    ->update([
                        'product_quantity' => DB::raw('product_quantity -' . $cart->quantity)
                    ]);

            }
            DB::table('pos')->delete();
            return response()->json(
                [$order,
                ],
                Response::HTTP_OK
            );

        }
        return response()->json(
            [$order,
            ],
            Response::HTTP_OK);
    }

    public function stockOut(): JsonResponse
    {
        $products =
            DB::table('products')
            ->where('products.product_quantity', '<', '1')
            ->get();
        return response()->json($products);
    }
}
