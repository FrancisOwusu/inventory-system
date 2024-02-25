<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function getVat():JsonResponse{
        $settings = DB::table('settings')->first();
        return response()->json($settings);
    }
}
