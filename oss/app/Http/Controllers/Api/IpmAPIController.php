<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIpmAPIRequest;
use App\Http\Requests\API\UpdateIpmAPIRequest;
use App\Models\Ipm;
use App\Repositories\IpmRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class IpmController
 */

class IpmAPIController extends AppBaseController
{
    private IpmRepository $ipmRepository;

    public function __construct(IpmRepository $ipmRepo)
    {
        $this->ipmRepository = $ipmRepo;
    }

    /**
     * @OA\Get(
     *      path="/ipms",
     *      summary="getIpmList",
     *      tags={"Ipm"},
     *      description="Get all Ipms",
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
     *                  @OA\Items(ref="#/components/schemas/Ipm")
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
        $ipms = $this->ipmRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ipms->toArray(), 'Ipms retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/ipms",
     *      summary="createIpm",
     *      tags={"Ipm"},
     *      description="Create Ipm",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Ipm")
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
     *                  ref="#/components/schemas/Ipm"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIpmAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ipm = $this->ipmRepository->create($input);

        return $this->sendResponse($ipm->toArray(), 'Ipm saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/ipms/{id}",
     *      summary="getIpmItem",
     *      tags={"Ipm"},
     *      description="Get Ipm",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ipm",
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
     *                  ref="#/components/schemas/Ipm"
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
        /** @var Ipm $ipm */
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            return $this->sendError('Ipm not found');
        }

        return $this->sendResponse($ipm->toArray(), 'Ipm retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/ipms/{id}",
     *      summary="updateIpm",
     *      tags={"Ipm"},
     *      description="Update Ipm",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ipm",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Ipm")
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
     *                  ref="#/components/schemas/Ipm"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIpmAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Ipm $ipm */
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            return $this->sendError('Ipm not found');
        }

        $ipm = $this->ipmRepository->update($input, $id);

        return $this->sendResponse($ipm->toArray(), 'Ipm updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/ipms/{id}",
     *      summary="deleteIpm",
     *      tags={"Ipm"},
     *      description="Delete Ipm",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ipm",
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
        /** @var Ipm $ipm */
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            return $this->sendError('Ipm not found');
        }

        $ipm->delete();

        return $this->sendSuccess('Ipm deleted successfully');
    }
}
