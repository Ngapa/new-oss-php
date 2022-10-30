<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePengangguranAPIRequest;
use App\Http\Requests\API\UpdatePengangguranAPIRequest;
use App\Models\Pengangguran;
use App\Repositories\PengangguranRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PengangguranController
 */

class PengangguranAPIController extends AppBaseController
{
    private PengangguranRepository $pengangguranRepository;

    public function __construct(PengangguranRepository $pengangguranRepo)
    {
        $this->pengangguranRepository = $pengangguranRepo;
    }

    /**
     * @OA\Get(
     *      path="/penganggurans",
     *      summary="getPengangguranList",
     *      tags={"Pengangguran"},
     *      description="Get all Penganggurans",
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
     *                  @OA\Items(ref="#/components/schemas/Pengangguran")
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
        $penganggurans = $this->pengangguranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penganggurans->toArray(), 'Penganggurans retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/penganggurans",
     *      summary="createPengangguran",
     *      tags={"Pengangguran"},
     *      description="Create Pengangguran",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pengangguran")
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
     *                  ref="#/components/schemas/Pengangguran"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePengangguranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pengangguran = $this->pengangguranRepository->create($input);

        return $this->sendResponse($pengangguran->toArray(), 'Pengangguran saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/penganggurans/{id}",
     *      summary="getPengangguranItem",
     *      tags={"Pengangguran"},
     *      description="Get Pengangguran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pengangguran",
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
     *                  ref="#/components/schemas/Pengangguran"
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
        /** @var Pengangguran $pengangguran */
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            return $this->sendError('Pengangguran not found');
        }

        return $this->sendResponse($pengangguran->toArray(), 'Pengangguran retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/penganggurans/{id}",
     *      summary="updatePengangguran",
     *      tags={"Pengangguran"},
     *      description="Update Pengangguran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pengangguran",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pengangguran")
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
     *                  ref="#/components/schemas/Pengangguran"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePengangguranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Pengangguran $pengangguran */
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            return $this->sendError('Pengangguran not found');
        }

        $pengangguran = $this->pengangguranRepository->update($input, $id);

        return $this->sendResponse($pengangguran->toArray(), 'Pengangguran updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/penganggurans/{id}",
     *      summary="deletePengangguran",
     *      tags={"Pengangguran"},
     *      description="Delete Pengangguran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pengangguran",
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
        /** @var Pengangguran $pengangguran */
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            return $this->sendError('Pengangguran not found');
        }

        $pengangguran->delete();

        return $this->sendSuccess('Pengangguran deleted successfully');
    }
}
