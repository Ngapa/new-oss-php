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
 * Class KemiskinanAPIController
 */
class KemiskinanAPIController extends AppBaseController
{
    private KemiskinanRepository $kemiskinanRepository;

    public function __construct(KemiskinanRepository $kemiskinanRepo)
    {
        $this->kemiskinanRepository = $kemiskinanRepo;
    }

    /**
     * Display a listing of the Kemiskinans.
     * GET|HEAD /kemiskinans
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
     * Store a newly created Kemiskinan in storage.
     * POST /kemiskinans
     */
    public function store(CreateKemiskinanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $kemiskinan = $this->kemiskinanRepository->create($input);

        return $this->sendResponse($kemiskinan->toArray(), 'Kemiskinan saved successfully');
    }

    /**
     * Display the specified Kemiskinan.
     * GET|HEAD /kemiskinans/{id}
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
     * Update the specified Kemiskinan in storage.
     * PUT/PATCH /kemiskinans/{id}
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
     * Remove the specified Kemiskinan from storage.
     * DELETE /kemiskinans/{id}
     *
     * @throws \Exception
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
