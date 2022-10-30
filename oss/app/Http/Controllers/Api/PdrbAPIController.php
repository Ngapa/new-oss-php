<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePdrbAPIRequest;
use App\Http\Requests\API\UpdatePdrbAPIRequest;
use App\Models\Pdrb;
use App\Repositories\PdrbRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PdrbController
 */

class PdrbAPIController extends AppBaseController
{
    private PdrbRepository $pdrbRepository;

    public function __construct(PdrbRepository $pdrbRepo)
    {
        $this->pdrbRepository = $pdrbRepo;
    }

    /**
     * @OA\Get(
     *      path="/pdrbs",
     *      summary="getPdrbList",
     *      tags={"Pdrb"},
     *      description="Get all Pdrbs",
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
     *                  @OA\Items(ref="#/components/schemas/Pdrb")
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
        $pdrbs = $this->pdrbRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pdrbs->toArray(), 'Pdrbs retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/pdrbs",
     *      summary="createPdrb",
     *      tags={"Pdrb"},
     *      description="Create Pdrb",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pdrb")
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
     *                  ref="#/components/schemas/Pdrb"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePdrbAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pdrb = $this->pdrbRepository->create($input);

        return $this->sendResponse($pdrb->toArray(), 'Pdrb saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/pdrbs/{id}",
     *      summary="getPdrbItem",
     *      tags={"Pdrb"},
     *      description="Get Pdrb",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pdrb",
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
     *                  ref="#/components/schemas/Pdrb"
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
        /** @var Pdrb $pdrb */
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            return $this->sendError('Pdrb not found');
        }

        return $this->sendResponse($pdrb->toArray(), 'Pdrb retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/pdrbs/{id}",
     *      summary="updatePdrb",
     *      tags={"Pdrb"},
     *      description="Update Pdrb",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pdrb",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pdrb")
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
     *                  ref="#/components/schemas/Pdrb"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePdrbAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Pdrb $pdrb */
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            return $this->sendError('Pdrb not found');
        }

        $pdrb = $this->pdrbRepository->update($input, $id);

        return $this->sendResponse($pdrb->toArray(), 'Pdrb updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/pdrbs/{id}",
     *      summary="deletePdrb",
     *      tags={"Pdrb"},
     *      description="Delete Pdrb",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pdrb",
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
        /** @var Pdrb $pdrb */
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            return $this->sendError('Pdrb not found');
        }

        $pdrb->delete();

        return $this->sendSuccess('Pdrb deleted successfully');
    }
}
