<?php

namespace App\Repositories;

use App\Models\BeverageType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class BeverageTypeRepository implements BaseRepository
{
    protected BeverageType $beverageType;

    /**
     * Construct User Repository
     * @param BeverageType $beverageType
     */
    public function __construct(BeverageType $beverageType)
    {
        $this->beverageType = $beverageType;
    }

    /**
     * Display a listing of the User.
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return $this->beverageType->paginate();
    }

    /**
     * Store a newly created user in storage.
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->beverageType->create($data);
    }

    /**
     * Display the specified user
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return $this->findOrFail($id);
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
        return $this->beverageType->findOrFail($id);
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
