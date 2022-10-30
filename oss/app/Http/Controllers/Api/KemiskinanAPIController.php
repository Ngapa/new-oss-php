<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKemiskinanAPIRequest;
use App\Http\Requests\API\UpdateKemiskinanAPIRequest;
use App\Models\Kemiskinan;
use App\Repositories\KemiskinanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class KemiskinanController
 */

class KemiskinanAPIController extends AppBaseController
{
    private KemiskinanRepository $kemiskinanRepository;

    public function __construct(KemiskinanRepository $kemiskinanRepo)
    {
        $this->kemiskinanRepository = $kemiskinanRepo;
    }

    /**
     * @OA\Get(
     *      path="/kemiskinans",
     *      summary="getKemiskinanList",
     *      tags={"Kemiskinan"},
     *      description="Get all Kemiskinans",
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
     *                  @OA\Items(ref="#/components/schemas/Kemiskinan")
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
        $kemiskinans = $this->kemiskinanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kemiskinans->toArray(), 'Kemiskinans retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/kemiskinans",
     *      summary="createKemiskinan",
     *      tags={"Kemiskinan"},
     *      description="Create Kemiskinan",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Kemiskinan")
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
     *                  ref="#/components/schemas/Kemiskinan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKemiskinanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $kemiskinan = $this->kemiskinanRepository->create($input);

        return $this->sendResponse($kemiskinan->toArray(), 'Kemiskinan saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/kemiskinans/{id}",
     *      summary="getKemiskinanItem",
     *      tags={"Kemiskinan"},
     *      description="Get Kemiskinan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Kemiskinan",
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
     *                  ref="#/components/schemas/Kemiskinan"
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
        /** @var Kemiskinan $kemiskinan */
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            return $this->sendError('Kemiskinan not found');
        }

        return $this->sendResponse($kemiskinan->toArray(), 'Kemiskinan retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/kemiskinans/{id}",
     *      summary="updateKemiskinan",
     *      tags={"Kemiskinan"},
     *      description="Update Kemiskinan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Kemiskinan",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Kemiskinan")
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
     *                  ref="#/components/schemas/Kemiskinan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKemiskinanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Kemiskinan $kemiskinan */
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            return $this->sendError('Kemiskinan not found');
        }

        $kemiskinan = $this->kemiskinanRepository->update($input, $id);

        return $this->sendResponse($kemiskinan->toArray(), 'Kemiskinan updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/kemiskinans/{id}",
     *      summary="deleteKemiskinan",
     *      tags={"Kemiskinan"},
     *      description="Delete Kemiskinan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Kemiskinan",
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
        /** @var Kemiskinan $kemiskinan */
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            return $this->sendError('Kemiskinan not found');
        }

        $kemiskinan->delete();

        return $this->sendSuccess('Kemiskinan deleted successfully');
    }
}
