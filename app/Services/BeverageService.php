<?php

namespace App\Services;

use App\Http\Resources\BeverageResource;
use App\Repositories\BeverageRepository;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BeverageService
{
    use ResponseAPI;

    private BeverageRepository $beverageRepository;

    /**
     * Construct UserService
     * @param BeverageRepository $beverageRepository
     */
    public function __construct(BeverageRepository $beverageRepository)
    {
        $this->beverageRepository = $beverageRepository;
    }

    /**
     * Service show all beverages
     * @return BeverageResource
     */
    public function all(): BeverageResource
    {
        return new BeverageResource($this->beverageRepository->all(), 'Beverage successfully received', 'beverages');
    }

    /**
     * Service create beverage
     * @param array $data
     * @return JsonResponse
     */
    public function store(array $data): JsonResponse
    {
        DB::transaction(fn() => $this->beverageRepository->store($data));
        return $this->success('Beverage successfully created', Response::HTTP_CREATED);

    }

    /**
     * Service show beverage
     * @param $id
     * @return BeverageResource
     */
    public function show($id): BeverageResource
    {
        return new BeverageResource($this->beverageRepository->show($id), 'Beverage successfully received', 'beverage');
    }

    /** Service update beverage
     * @param int $id
     * @param array $data
     * @return JsonResponse
     */
    public function update(int $id, array $data): JsonResponse
    {
        DB::transaction(fn() => $this->beverageRepository->update($id, $data));
        return $this->success('Beverage successfully updated');
    }

    /**
     * Service delete beverage
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        DB::transaction(fn() => $this->beverageRepository->destroy($id));
        return $this->success('Beverage successfully deleted');
    }


}
