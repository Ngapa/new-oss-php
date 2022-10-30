<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInflasiAPIRequest;
use App\Http\Requests\API\UpdateInflasiAPIRequest;
use App\Models\Inflasi;
use App\Repositories\InflasiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class InflasiController
 */

class InflasiAPIController extends AppBaseController
{
    private InflasiRepository $inflasiRepository;

    public function __construct(InflasiRepository $inflasiRepo)
    {
        $this->inflasiRepository = $inflasiRepo;
    }

    /**
     * @OA\Get(
     *      path="/inflasis",
     *      summary="getInflasiList",
     *      tags={"Inflasi"},
     *      description="Get all Inflasis",
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
     *                  @OA\Items(ref="#/components/schemas/Inflasi")
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
        $inflasis = $this->inflasiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($inflasis->toArray(), 'Inflasis retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/inflasis",
     *      summary="createInflasi",
     *      tags={"Inflasi"},
     *      description="Create Inflasi",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Inflasi")
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
     *                  ref="#/components/schemas/Inflasi"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInflasiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $inflasi = $this->inflasiRepository->create($input);

        return $this->sendResponse($inflasi->toArray(), 'Inflasi saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/inflasis/{id}",
     *      summary="getInflasiItem",
     *      tags={"Inflasi"},
     *      description="Get Inflasi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Inflasi",
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
     *                  ref="#/components/schemas/Inflasi"
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
        /** @var Inflasi $inflasi */
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            return $this->sendError('Inflasi not found');
        }

        return $this->sendResponse($inflasi->toArray(), 'Inflasi retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/inflasis/{id}",
     *      summary="updateInflasi",
     *      tags={"Inflasi"},
     *      description="Update Inflasi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Inflasi",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Inflasi")
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
     *                  ref="#/components/schemas/Inflasi"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInflasiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Inflasi $inflasi */
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            return $this->sendError('Inflasi not found');
        }

        $inflasi = $this->inflasiRepository->update($input, $id);

        return $this->sendResponse($inflasi->toArray(), 'Inflasi updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/inflasis/{id}",
     *      summary="deleteInflasi",
     *      tags={"Inflasi"},
     *      description="Delete Inflasi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Inflasi",
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
        /** @var Inflasi $inflasi */
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            return $this->sendError('Inflasi not found');
        }

        $inflasi->delete();

        return $this->sendSuccess('Inflasi deleted successfully');
    }
}
