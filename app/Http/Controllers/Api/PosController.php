<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function getProductByCategory($id):JsonResponse{
      $products = Product::where("category_id",$id)
          ->get();
      return response()->json($products);
    }
}
