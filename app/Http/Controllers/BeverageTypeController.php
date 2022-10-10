<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeverageType\StoreRequest;
use App\Http\Requests\BeverageType\UpdateRequest;
use App\Http\Resources\BeverageTypeResource;
use App\Services\BeverageTypeService;
use Illuminate\Http\JsonResponse;

class BeverageTypeController extends Controller
{
    private BeverageTypeService $beverageTypeService;

    public function __construct(BeverageTypeService $beverageTypeService)
    {
        $this->beverageTypeService = $beverageTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return BeverageTypeResource
     */
    public function index(): BeverageTypeResource
    {
        return $this->beverageTypeService->all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->beverageTypeService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BeverageTypeResource
     */
    public function show(int $id): BeverageTypeResource
    {
        return $this->beverageTypeService->show($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        return $this->beverageTypeService->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->beverageTypeService->destroy($id);

    }

}
