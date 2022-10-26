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
 * Class PdrbAPIController
 */
class PdrbAPIController extends AppBaseController
{
    private PdrbRepository $pdrbRepository;

    public function __construct(PdrbRepository $pdrbRepo)
    {
        $this->pdrbRepository = $pdrbRepo;
    }

    /**
     * Display a listing of the Pdrbs.
     * GET|HEAD /pdrbs
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
     * Store a newly created Pdrb in storage.
     * POST /pdrbs
     */
    public function store(CreatePdrbAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pdrb = $this->pdrbRepository->create($input);

        return $this->sendResponse($pdrb->toArray(), 'Pdrb saved successfully');
    }

    /**
     * Display the specified Pdrb.
     * GET|HEAD /pdrbs/{id}
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
     * Update the specified Pdrb in storage.
     * PUT/PATCH /pdrbs/{id}
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
     * Remove the specified Pdrb from storage.
     * DELETE /pdrbs/{id}
     *
     * @throws \Exception
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
