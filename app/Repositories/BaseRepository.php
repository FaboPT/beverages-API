<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    /**
     * Display a listing of the resource.
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator;

    /**
     * Store a newly created resource in storage.
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * Display the specified resource.
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model;

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

    /**
     * Method to see if model binding exists
     * @param int $id
     * @return Model
     */
    public function findOrFail(int $id): Model;
}
