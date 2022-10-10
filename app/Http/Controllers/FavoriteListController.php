<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteList\StoreRequest;
use App\Http\Requests\FavoriteList\UpdateRequest;
use App\Http\Resources\FavoriteListResource;
use App\Services\FavoriteListService;
use Illuminate\Http\JsonResponse;

class FavoriteListController extends Controller
{
    protected FavoriteListService $favoriteListService;

    /**
     * @param FavoriteListService $favoriteListService
     */
    public function __construct(FavoriteListService $favoriteListService)
    {
        $this->favoriteListService = $favoriteListService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return FavoriteListResource
     */
    public function index(): FavoriteListResource
    {
        return $this->favoriteListService->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return JsonResponse;
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->favoriteListService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return FavoriteListResource
     */
    public function show(int $id): FavoriteListResource
    {
        return $this->favoriteListService->show($id);
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
        return $this->favoriteListService->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->favoriteListService->destroy($id);
    }

}
