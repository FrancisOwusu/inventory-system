<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:52 PM.
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ICoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class CoreController extends Controller
{
    protected $service;

    public function __construct(ICoreService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json($this->service->findAll());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($this->service->model()::storeRules(), $this->service->model()::errorMessages());
        return response()->json(
            [$this->service->store($data),
            ],
            Response::HTTP_CREATED
        );
    }

    public function edit($id): JsonResponse
    {
        $resource = $this->service->find($id);

        if (!$resource) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($resource, Response::HTTP_OK);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->service->find($id);

        if (!$resource) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($resource, Response::HTTP_OK);
    }

    public function update($id, Request $request): JsonResponse
    {
        //        $data=$request->all();

        $data = $request->validate($this->service->model()::updateRules($id), $this->service->model()::errorMessages());

        $resource = $this->service->update($id, $data);

        if (!$resource) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($resource);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

//    public function destroy(Request $request): JsonResponse
//    {
//        $orderId = $request->route('id');
//        $this->orderRepository->deleteOrder($orderId);
//
//        return response()->json(null, Response::HTTP_NO_CONTENT);
//
//
//        $resource = $this->service->find($id);
//
//        if (!$resource) {
//            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
//        }
//
//        return response()->json($resource, Response::HTTP_OK);
//    }
}
