<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInflasiKotaAPIRequest;
use App\Http\Requests\API\UpdateInflasiKotaAPIRequest;
use App\Models\InflasiKota;
use App\Repositories\InflasiKotaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class InflasiKotaController
 */

class InflasiKotaAPIController extends AppBaseController
{
    private InflasiKotaRepository $inflasiKotaRepository;

    public function __construct(InflasiKotaRepository $inflasiKotaRepo)
    {
        $this->inflasiKotaRepository = $inflasiKotaRepo;
    }

    /**
     * @OA\Get(
     *      path="/inflasi-kotas",
     *      summary="getInflasiKotaList",
     *      tags={"InflasiKota"},
     *      description="Get all InflasiKotas",
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
     *                  @OA\Items(ref="#/components/schemas/InflasiKota")
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
        $inflasiKotas = $this->inflasiKotaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($inflasiKotas->toArray(), 'Inflasi Kotas retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/inflasi-kotas",
     *      summary="createInflasiKota",
     *      tags={"InflasiKota"},
     *      description="Create InflasiKota",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/InflasiKota")
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
     *                  ref="#/components/schemas/InflasiKota"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInflasiKotaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $inflasiKota = $this->inflasiKotaRepository->create($input);

        return $this->sendResponse($inflasiKota->toArray(), 'Inflasi Kota saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/inflasi-kotas/{id}",
     *      summary="getInflasiKotaItem",
     *      tags={"InflasiKota"},
     *      description="Get InflasiKota",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of InflasiKota",
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
     *                  ref="#/components/schemas/InflasiKota"
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
        /** @var InflasiKota $inflasiKota */
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            return $this->sendError('Inflasi Kota not found');
        }

        return $this->sendResponse($inflasiKota->toArray(), 'Inflasi Kota retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/inflasi-kotas/{id}",
     *      summary="updateInflasiKota",
     *      tags={"InflasiKota"},
     *      description="Update InflasiKota",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of InflasiKota",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/InflasiKota")
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
     *                  ref="#/components/schemas/InflasiKota"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInflasiKotaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var InflasiKota $inflasiKota */
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            return $this->sendError('Inflasi Kota not found');
        }

        $inflasiKota = $this->inflasiKotaRepository->update($input, $id);

        return $this->sendResponse($inflasiKota->toArray(), 'InflasiKota updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/inflasi-kotas/{id}",
     *      summary="deleteInflasiKota",
     *      tags={"InflasiKota"},
     *      description="Delete InflasiKota",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of InflasiKota",
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
        /** @var InflasiKota $inflasiKota */
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            return $this->sendError('Inflasi Kota not found');
        }

        $inflasiKota->delete();

        return $this->sendSuccess('Inflasi Kota deleted successfully');
    }
}
