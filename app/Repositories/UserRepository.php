<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements BaseRepository
{
    protected User $user;

    /**
     * Construct User Repository
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the User.
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return $this->user->with('favoritesList.beverage.beverageType')->paginate();
    }

    /**
     * Store a newly created user in storage.
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->user->create($data);
    }

    /**
     * Display the specified user
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return $this->user->with('favoritesList.beverage.beverageType')->findOrFail($id);
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
        return $this->user->findOrFail($id);
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
