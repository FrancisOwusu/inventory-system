<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($id, Request $request): \Illuminate\Http\JsonResponse
    {
        $product = Product::where("id", $id)
            ->first();
        $data = [];
        $data['product_id'] = $product->id;
        $data['product_name'] = $product->product_name;
        $data['price'] = $product->selling_price;
        $data['quantity'] = 1;
        $data['sub_total'] = $product->selling_price;

        $checkProductExist = Cart::where("product_id", $id)
            ->first();
        if ($checkProductExist) {
            DB::table('pos')->increment('quantity');
            $product = Cart::where("product_id", $id)->first();
            $subtotal = $product->quantity * $product->price;
            $product->sub_total = $subtotal;
            $product->save();
        } else {
            DB::table('pos')->insert($data);
        }


        return response()->json(
            [$data,
            ],
            Response::HTTP_OK
        );
    }

    public function removeCart($id): \Illuminate\Http\JsonResponse
    {
        $product = Cart::where("id", $id)
            ->delete();
        return response()->json(
            [$product,
            ],
            Response::HTTP_OK
        );
    }

    public function cartProducts(): \Illuminate\Http\JsonResponse
    {
        $carts = Cart::get();
        return response()->json($carts
        );
    }

    public function increment($id): \Illuminate\Http\JsonResponse
    {
        DB::table('pos')->where("id", $id)->increment('quantity');
        $product = Cart::where("id", $id)->first();
        $subtotal = $product->quantity * $product->price;
        $product->sub_total = $subtotal;
        $product->save();
        return response()->json(
            [$product,
            ],
            Response::HTTP_OK
        );
    }

    public function decrement($id): \Illuminate\Http\JsonResponse
    {
        DB::table('pos')->where("id", $id)->decrement('quantity');
        $product = Cart::where("id", $id)->first();
        $subtotal = $product->quantity * $product->price;
        $product->sub_total = $subtotal;
        $product->save();
        return response()->json(
            [$product,
            ],
            Response::HTTP_OK
        );
    }
}
