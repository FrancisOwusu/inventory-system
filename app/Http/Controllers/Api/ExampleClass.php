<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/23/2023
 * Time: 4:03 PM.
 */

namespace App\Http\Controllers\Api;

class ExampleClass
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->orderRepository->getAllOrders(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $orderDetails = $request->only([
            'client',
            'details',
        ]);

        return response()->json(
            [
                'data' => $this->orderRepository->createOrder($orderDetails),
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->orderRepository->getOrderById($orderId),
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'client',
            'details',
        ]);

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails),
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $this->orderRepository->deleteOrder($orderId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
