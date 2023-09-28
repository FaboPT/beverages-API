<?php

namespace App\Services;

use App\Http\Resources\BeverageTypeResource;
use App\Repositories\BeverageTypeRepository;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BeverageTypeService
{
    use ResponseAPI;

    private BeverageTypeRepository $beverageTypeRepository;

    /**
     * Construct UserService
     * @param BeverageTypeRepository $beverageTypeRepository
     */
    public function __construct(BeverageTypeRepository $beverageTypeRepository)
    {
        $this->beverageTypeRepository = $beverageTypeRepository;
    }

    /**
     * Service show all beverage types
     * @return BeverageTypeResource
     */
    public function all(): BeverageTypeResource
    {
        return new BeverageTypeResource($this->beverageTypeRepository->all(), 'Beverages Type successfully received', 'beverages_type');
    }

    /**
     * Service create beverage type
     * @param array $data
     * @return JsonResponse
     */
    public function store(array $data): JsonResponse
    {
        try {
            DB::transaction(fn() => $this->beverageTypeRepository->store($data));

            return $this->success('Beverage type successfully created', Response::HTTP_CREATED);

        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode() ?: Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Service show beverage type
     * @param $id
     * @return BeverageTypeResource
     */
    public function show($id): BeverageTypeResource
    {
        return new BeverageTypeResource($this->beverageTypeRepository->show($id), 'Beverage Type successfully received', 'beverage_type');

    }

    /** Service update beverage type
     * @param int $id
     * @param array $data
     * @return JsonResponse
     */
    public function update(int $id, array $data): JsonResponse
    {
        try {
            DB::transaction(fn() => $this->beverageTypeRepository->update($id, $data));

            return $this->success('Beverage type successfully updated');

        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode() ?: Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Service delete beverage type
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {

            DB::transaction(fn() => $this->beverageTypeRepository->destroy($id));

            return $this->success('Beverage type successfully deleted');
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode() ?: Response::HTTP_BAD_REQUEST);
        }
    }


}
