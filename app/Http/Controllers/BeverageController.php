<?php

namespace App\Http\Controllers;

use App\Http\Requests\Beverage\StoreRequest;
use App\Http\Requests\Beverage\UpdateRequest;
use App\Http\Resources\BeverageResource;
use App\Services\BeverageService;
use Illuminate\Http\JsonResponse;

class BeverageController extends Controller
{
    private BeverageService $beverageService;

    public function __construct(BeverageService $beverageService)
    {
        $this->beverageService = $beverageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return BeverageResource
     */
    public function index(): BeverageResource
    {
        return $this->beverageService->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->beverageService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BeverageResource
     */
    public function show(int $id): BeverageResource
    {
        return $this->beverageService->show($id);
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
        return $this->beverageService->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->beverageService->destroy($id);
    }


}
