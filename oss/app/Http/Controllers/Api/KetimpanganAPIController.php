<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKetimpanganAPIRequest;
use App\Http\Requests\API\UpdateKetimpanganAPIRequest;
use App\Models\Ketimpangan;
use App\Repositories\KetimpanganRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class KetimpanganController
 */

class KetimpanganAPIController extends AppBaseController
{
    private KetimpanganRepository $ketimpanganRepository;

    public function __construct(KetimpanganRepository $ketimpanganRepo)
    {
        $this->ketimpanganRepository = $ketimpanganRepo;
    }

    /**
     * @OA\Get(
     *      path="/ketimpangans",
     *      summary="getKetimpanganList",
     *      tags={"Ketimpangan"},
     *      description="Get all Ketimpangans",
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
     *                  @OA\Items(ref="#/components/schemas/Ketimpangan")
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
        $ketimpangans = $this->ketimpanganRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ketimpangans->toArray(), 'Ketimpangans retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/ketimpangans",
     *      summary="createKetimpangan",
     *      tags={"Ketimpangan"},
     *      description="Create Ketimpangan",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Ketimpangan")
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
     *                  ref="#/components/schemas/Ketimpangan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKetimpanganAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ketimpangan = $this->ketimpanganRepository->create($input);

        return $this->sendResponse($ketimpangan->toArray(), 'Ketimpangan saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/ketimpangans/{id}",
     *      summary="getKetimpanganItem",
     *      tags={"Ketimpangan"},
     *      description="Get Ketimpangan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ketimpangan",
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
     *                  ref="#/components/schemas/Ketimpangan"
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
        /** @var Ketimpangan $ketimpangan */
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            return $this->sendError('Ketimpangan not found');
        }

        return $this->sendResponse($ketimpangan->toArray(), 'Ketimpangan retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/ketimpangans/{id}",
     *      summary="updateKetimpangan",
     *      tags={"Ketimpangan"},
     *      description="Update Ketimpangan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ketimpangan",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Ketimpangan")
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
     *                  ref="#/components/schemas/Ketimpangan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKetimpanganAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Ketimpangan $ketimpangan */
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            return $this->sendError('Ketimpangan not found');
        }

        $ketimpangan = $this->ketimpanganRepository->update($input, $id);

        return $this->sendResponse($ketimpangan->toArray(), 'Ketimpangan updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/ketimpangans/{id}",
     *      summary="deleteKetimpangan",
     *      tags={"Ketimpangan"},
     *      description="Delete Ketimpangan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ketimpangan",
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
        /** @var Ketimpangan $ketimpangan */
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            return $this->sendError('Ketimpangan not found');
        }

        $ketimpangan->delete();

        return $this->sendSuccess('Ketimpangan deleted successfully');
    }
}
