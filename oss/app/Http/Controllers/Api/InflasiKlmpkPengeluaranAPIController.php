<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInflasiKlmpkPengeluaranAPIRequest;
use App\Http\Requests\API\UpdateInflasiKlmpkPengeluaranAPIRequest;
use App\Models\InflasiKlmpkPengeluaran;
use App\Repositories\InflasiKlmpkPengeluaranRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class InflasiKlmpkPengeluaranController
 */

class InflasiKlmpkPengeluaranAPIController extends AppBaseController
{
    private InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepository;

    public function __construct(InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepo)
    {
        $this->inflasiKlmpkPengeluaranRepository = $inflasiKlmpkPengeluaranRepo;
    }

    /**
     * @OA\Get(
     *      path="/inflasi-klmpk-pengeluarans",
     *      summary="getInflasiKlmpkPengeluaranList",
     *      tags={"InflasiKlmpkPengeluaran"},
     *      description="Get all InflasiKlmpkPengeluarans",
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
     *                  @OA\Items(ref="#/components/schemas/InflasiKlmpkPengeluaran")
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
        $inflasiKlmpkPengeluarans = $this->inflasiKlmpkPengeluaranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($inflasiKlmpkPengeluarans->toArray(), 'Inflasi Klmpk Pengeluarans retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/inflasi-klmpk-pengeluarans",
     *      summary="createInflasiKlmpkPengeluaran",
     *      tags={"InflasiKlmpkPengeluaran"},
     *      description="Create InflasiKlmpkPengeluaran",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/InflasiKlmpkPengeluaran")
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
     *                  ref="#/components/schemas/InflasiKlmpkPengeluaran"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInflasiKlmpkPengeluaranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->create($input);

        return $this->sendResponse($inflasiKlmpkPengeluaran->toArray(), 'Inflasi Klmpk Pengeluaran saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/inflasi-klmpk-pengeluarans/{id}",
     *      summary="getInflasiKlmpkPengeluaranItem",
     *      tags={"InflasiKlmpkPengeluaran"},
     *      description="Get InflasiKlmpkPengeluaran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of InflasiKlmpkPengeluaran",
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
     *                  ref="#/components/schemas/InflasiKlmpkPengeluaran"
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
        /** @var InflasiKlmpkPengeluaran $inflasiKlmpkPengeluaran */
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            return $this->sendError('Inflasi Klmpk Pengeluaran not found');
        }

        return $this->sendResponse($inflasiKlmpkPengeluaran->toArray(), 'Inflasi Klmpk Pengeluaran retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/inflasi-klmpk-pengeluarans/{id}",
     *      summary="updateInflasiKlmpkPengeluaran",
     *      tags={"InflasiKlmpkPengeluaran"},
     *      description="Update InflasiKlmpkPengeluaran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of InflasiKlmpkPengeluaran",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/InflasiKlmpkPengeluaran")
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
     *                  ref="#/components/schemas/InflasiKlmpkPengeluaran"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInflasiKlmpkPengeluaranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var InflasiKlmpkPengeluaran $inflasiKlmpkPengeluaran */
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            return $this->sendError('Inflasi Klmpk Pengeluaran not found');
        }

        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->update($input, $id);

        return $this->sendResponse($inflasiKlmpkPengeluaran->toArray(), 'InflasiKlmpkPengeluaran updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/inflasi-klmpk-pengeluarans/{id}",
     *      summary="deleteInflasiKlmpkPengeluaran",
     *      tags={"InflasiKlmpkPengeluaran"},
     *      description="Delete InflasiKlmpkPengeluaran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of InflasiKlmpkPengeluaran",
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
        /** @var InflasiKlmpkPengeluaran $inflasiKlmpkPengeluaran */
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            return $this->sendError('Inflasi Klmpk Pengeluaran not found');
        }

        $inflasiKlmpkPengeluaran->delete();

        return $this->sendSuccess('Inflasi Klmpk Pengeluaran deleted successfully');
    }
}
