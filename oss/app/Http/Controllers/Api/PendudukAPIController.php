<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePendudukAPIRequest;
use App\Http\Requests\API\UpdatePendudukAPIRequest;
use App\Models\Penduduk;
use App\Repositories\PendudukRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PendudukController
 */

class PendudukAPIController extends AppBaseController
{
    private PendudukRepository $pendudukRepository;

    public function __construct(PendudukRepository $pendudukRepo)
    {
        $this->pendudukRepository = $pendudukRepo;
    }

    /**
     * @OA\Get(
     *      path="/penduduks",
     *      summary="getPendudukList",
     *      tags={"Penduduk"},
     *      description="Get all Penduduks",
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
     *                  @OA\Items(ref="#/components/schemas/Penduduk")
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
        $penduduks = $this->pendudukRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penduduks->toArray(), 'Penduduks retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/penduduks",
     *      summary="createPenduduk",
     *      tags={"Penduduk"},
     *      description="Create Penduduk",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Penduduk")
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
     *                  ref="#/components/schemas/Penduduk"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePendudukAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $penduduk = $this->pendudukRepository->create($input);

        return $this->sendResponse($penduduk->toArray(), 'Penduduk saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/penduduks/{id}",
     *      summary="getPendudukItem",
     *      tags={"Penduduk"},
     *      description="Get Penduduk",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Penduduk",
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
     *                  ref="#/components/schemas/Penduduk"
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
        /** @var Penduduk $penduduk */
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            return $this->sendError('Penduduk not found');
        }

        return $this->sendResponse($penduduk->toArray(), 'Penduduk retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/penduduks/{id}",
     *      summary="updatePenduduk",
     *      tags={"Penduduk"},
     *      description="Update Penduduk",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Penduduk",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Penduduk")
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
     *                  ref="#/components/schemas/Penduduk"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePendudukAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Penduduk $penduduk */
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            return $this->sendError('Penduduk not found');
        }

        $penduduk = $this->pendudukRepository->update($input, $id);

        return $this->sendResponse($penduduk->toArray(), 'Penduduk updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/penduduks/{id}",
     *      summary="deletePenduduk",
     *      tags={"Penduduk"},
     *      description="Delete Penduduk",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Penduduk",
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
        /** @var Penduduk $penduduk */
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            return $this->sendError('Penduduk not found');
        }

        $penduduk->delete();

        return $this->sendSuccess('Penduduk deleted successfully');
    }
}
