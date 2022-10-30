<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePendudukKecamatanAPIRequest;
use App\Http\Requests\API\UpdatePendudukKecamatanAPIRequest;
use App\Models\PendudukKecamatan;
use App\Repositories\PendudukKecamatanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PendudukKecamatanController
 */

class PendudukKecamatanAPIController extends AppBaseController
{
    private PendudukKecamatanRepository $pendudukKecamatanRepository;

    public function __construct(PendudukKecamatanRepository $pendudukKecamatanRepo)
    {
        $this->pendudukKecamatanRepository = $pendudukKecamatanRepo;
    }

    /**
     * @OA\Get(
     *      path="/penduduk-kecamatans",
     *      summary="getPendudukKecamatanList",
     *      tags={"PendudukKecamatan"},
     *      description="Get all PendudukKecamatans",
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
     *                  @OA\Items(ref="#/components/schemas/PendudukKecamatan")
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
        $pendudukKecamatans = $this->pendudukKecamatanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pendudukKecamatans->toArray(), 'Penduduk Kecamatans retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/penduduk-kecamatans",
     *      summary="createPendudukKecamatan",
     *      tags={"PendudukKecamatan"},
     *      description="Create PendudukKecamatan",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/PendudukKecamatan")
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
     *                  ref="#/components/schemas/PendudukKecamatan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePendudukKecamatanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pendudukKecamatan = $this->pendudukKecamatanRepository->create($input);

        return $this->sendResponse($pendudukKecamatan->toArray(), 'Penduduk Kecamatan saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/penduduk-kecamatans/{id}",
     *      summary="getPendudukKecamatanItem",
     *      tags={"PendudukKecamatan"},
     *      description="Get PendudukKecamatan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PendudukKecamatan",
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
     *                  ref="#/components/schemas/PendudukKecamatan"
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
        /** @var PendudukKecamatan $pendudukKecamatan */
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            return $this->sendError('Penduduk Kecamatan not found');
        }

        return $this->sendResponse($pendudukKecamatan->toArray(), 'Penduduk Kecamatan retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/penduduk-kecamatans/{id}",
     *      summary="updatePendudukKecamatan",
     *      tags={"PendudukKecamatan"},
     *      description="Update PendudukKecamatan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PendudukKecamatan",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/PendudukKecamatan")
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
     *                  ref="#/components/schemas/PendudukKecamatan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePendudukKecamatanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PendudukKecamatan $pendudukKecamatan */
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            return $this->sendError('Penduduk Kecamatan not found');
        }

        $pendudukKecamatan = $this->pendudukKecamatanRepository->update($input, $id);

        return $this->sendResponse($pendudukKecamatan->toArray(), 'PendudukKecamatan updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/penduduk-kecamatans/{id}",
     *      summary="deletePendudukKecamatan",
     *      tags={"PendudukKecamatan"},
     *      description="Delete PendudukKecamatan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PendudukKecamatan",
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
        /** @var PendudukKecamatan $pendudukKecamatan */
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            return $this->sendError('Penduduk Kecamatan not found');
        }

        $pendudukKecamatan->delete();

        return $this->sendSuccess('Penduduk Kecamatan deleted successfully');
    }
}
