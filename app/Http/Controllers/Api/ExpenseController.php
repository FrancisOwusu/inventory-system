<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseController extends CoreController
{


public function store(Request $request): JsonResponse
{
    $data = $request->validate($this->service->model()::storeRules(), $this->service->model()::errorMessages());
    return response()->json(
        [$this->service->store($data),
        ],
        Response::HTTP_CREATED
    );
}

public function update($id, Request $request): JsonResponse
{
  $data = $request->except('id');
    return response()->json(
        [$this->service->update($id,$data),
        ],
        Response::HTTP_CREATED
    );
}
}
