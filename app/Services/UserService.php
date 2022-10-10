<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserService
{
    use ResponseAPI;

    private UserRepository $userRepository;

    /**
     * Construct UserService
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Service show all user
     * @return UserResource
     */
    public function all(): UserResource
    {
        return new UserResource($this->userRepository->all(), 'Users successfully received','users');

    }

    /**
     * Service create user
     * @param array $data
     * @return JsonResponse
     */
    public function store(array $data): JsonResponse
    {
        DB::transaction(function () use (&$data){
            $this->userRepository->store($data);
        });

        return $this->success('User successfully created', Response::HTTP_CREATED);

    }

    /**
     * Service show user
     * @param $id
     * @return UserResource
     */
    public function show($id): UserResource
    {
        return new UserResource($this->userRepository->show($id),'User successfully received','user');
    }

    /** Service update user
     * @param int $id
     * @param array $data
     * @return JsonResponse
     */
    public function update(int $id, array $data): JsonResponse
    {
        DB::transaction(function () use(&$id, &$data) {
            $this->userRepository->update($id, $data);
        });

        return $this->success('User successfully updated');
    }

    /**
     * Service delete user
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        DB::transaction( function () use (&$id) {
            $this->userRepository->destroy($id);
        });
        return $this->success('User successfully deleted');
    }


}
