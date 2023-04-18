<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:52 PM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\ICoreService;
use App\Utils\Paginate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pipeline\Pipeline;

abstract class CoreController extends Controller
{


    protected $service;

    /**
     * inject service
     *
     * @return void
     */
    public function __construct(ICoreService $service)
    {
        $this->service = $service;
    }

    /**
     * Get all resources
     *
     * @return mixed
     */
    public function index($data = null)
    {
        return Paginate::paginate(
            app(Pipeline::class)
                ->send($data ?: $this->service->findAll())
                ->through($this->filters())
                ->thenReturn()
        );

    }

    /**
     * store resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($request->all());
//        $data = $request->validate($this->service->model()::storeRules(), $this->service->model()::errorMessages());

        return response()->json($this->service->store($data), Response::HTTP_CREATED);
    }

    /**
     * update
     *
     * @param  $id
     * @param  Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request) : JsonResponse
    {
        $data = $request->validate($request->all());
//        $data = $request->validate($this->service->model()::updateRules($id), $this->service->model()::errorMessages());

        $resource = $this->service->update($id, $data);

        if (!$resource) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($resource);
    }

    /**
     * Delete resource
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id) : JsonResponse
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }


    /**
     * find resource
     *
     * @param  $id
     * @return JsonResponse
     */
    public function show($id) : JsonResponse
    {
        $resource = $this->service->find($id);

        if (!$resource) {
            return response()->json(['message' => 'resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($resource, Response::HTTP_OK);
    }



    /**
     * filters for filtering resources
     *
     * @return array
     */
    protected function filters() : array
    {
        return [];
    }
}