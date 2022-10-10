<?php

namespace App\Repositories;

use App\Models\FavoriteList;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class FavoriteListRepository implements BaseRepository
{
    protected FavoriteList $favoriteList;

    /**
     * Construct User Repository
     * @param FavoriteList $favoriteList
     */
    public function __construct(FavoriteList $favoriteList)
    {
        $this->favoriteList = $favoriteList;
    }

    /**
     * Display a listing of the User.
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return $this->favoriteList->with('user', 'beverage.beverageType')->paginate();
    }

    /**
     * Store a newly created user in storage.
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->favoriteList->create($data);
    }

    /**
     * Display the specified user
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return $this->favoriteList->with('user', 'beverage.beverageType')->findOrFail($id);
    }

    /**
     * Update the specified user in storage.
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return $this->findOrFail($id)->update($data);
    }

    /**
     * See if user exists
     * @param int $id
     * @return Model
     */
    public function findOrFail(int $id): Model
    {
        return $this->favoriteList->findOrFail($id);
    }

    /**
     * Remove the specified user from storage.
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->findOrFail($id)->delete();
    }
}
