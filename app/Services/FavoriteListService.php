<?php

namespace App\Services;

use App\Http\Resources\FavoriteListResource;
use App\Repositories\FavoriteListRepository;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FavoriteListService
{
    use ResponseAPI;

    private FavoriteListRepository $favoriteListRepository;

    /**
     * Construct UserService
     * @param FavoriteListRepository $favoriteListRepository
     */
    public function __construct(FavoriteListRepository $favoriteListRepository)
    {
        $this->favoriteListRepository = $favoriteListRepository;
    }

    /**
     * Service show all favorites list
     * @return FavoriteListResource
     */
    public function all(): FavoriteListResource
    {
        return new FavoriteListResource($this->favoriteListRepository->all(),'Favorites List successfully received','favorites_list');
    }

    /**
     * Service create favorite list
     * @param array $data
     * @return JsonResponse
     */
    public function store(array $data): JsonResponse
    {
        DB::transaction(fn() => $this->favoriteListRepository->store($data) );

        return $this->success('Favorite list successfully created', Response::HTTP_CREATED);
    }

    /**
     * Service show favorite list
     * @param $id
     * @return FavoriteListResource
     */
    public function show($id): FavoriteListResource
    {
        return new FavoriteListResource($this->favoriteListRepository->show($id), 'Favorite List successfully received', 'favorite_list');
    }

    /** Service update favorite list
     * @param int $id
     * @param array $data
     * @return JsonResponse
     */
    public function update(int $id, array $data): JsonResponse
    {
        DB::transaction( fn() => $this->favoriteListRepository->update($id, $data));

        return $this->success('Favorite list successfully updated');
    }

    /**
     * Service delete favorite list
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        DB::transaction(fn() =>$this->favoriteListRepository->destroy($id));

        return $this->success('Favorite list successfully deleted');
    }


}
