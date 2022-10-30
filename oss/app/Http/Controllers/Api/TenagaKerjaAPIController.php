<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTenagaKerjaAPIRequest;
use App\Http\Requests\API\UpdateTenagaKerjaAPIRequest;
use App\Models\TenagaKerja;
use App\Repositories\TenagaKerjaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class TenagaKerjaController
 */

class TenagaKerjaAPIController extends AppBaseController
{
    private TenagaKerjaRepository $tenagaKerjaRepository;

    public function __construct(TenagaKerjaRepository $tenagaKerjaRepo)
    {
        $this->tenagaKerjaRepository = $tenagaKerjaRepo;
    }

    /**
     * @OA\Get(
     *      path="/tenaga-kerjas",
     *      summary="getTenagaKerjaList",
     *      tags={"TenagaKerja"},
     *      description="Get all TenagaKerjas",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/TenagaKerja")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $tenagaKerjas = $this->tenagaKerjaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tenagaKerjas->toArray(), 'Tenaga Kerjas retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/tenaga-kerjas",
     *      summary="createTenagaKerja",
     *      tags={"TenagaKerja"},
     *      description="Create TenagaKerja",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/TenagaKerja")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/TenagaKerja"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTenagaKerjaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $tenagaKerja = $this->tenagaKerjaRepository->create($input);

        return $this->sendResponse($tenagaKerja->toArray(), 'Tenaga Kerja saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/tenaga-kerjas/{id}",
     *      summary="getTenagaKerjaItem",
     *      tags={"TenagaKerja"},
     *      description="Get TenagaKerja",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TenagaKerja",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/TenagaKerja"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var TenagaKerja $tenagaKerja */
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            return $this->sendError('Tenaga Kerja not found');
        }

        return $this->sendResponse($tenagaKerja->toArray(), 'Tenaga Kerja retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/tenaga-kerjas/{id}",
     *      summary="updateTenagaKerja",
     *      tags={"TenagaKerja"},
     *      description="Update TenagaKerja",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TenagaKerja",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/TenagaKerja")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/TenagaKerja"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTenagaKerjaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var TenagaKerja $tenagaKerja */
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            return $this->sendError('Tenaga Kerja not found');
        }

        $tenagaKerja = $this->tenagaKerjaRepository->update($input, $id);

        return $this->sendResponse($tenagaKerja->toArray(), 'TenagaKerja updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/tenaga-kerjas/{id}",
     *      summary="deleteTenagaKerja",
     *      tags={"TenagaKerja"},
     *      description="Delete TenagaKerja",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TenagaKerja",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var TenagaKerja $tenagaKerja */
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            return $this->sendError('Tenaga Kerja not found');
        }

        $tenagaKerja->delete();

        return $this->sendSuccess('Tenaga Kerja deleted successfully');
    }
}
