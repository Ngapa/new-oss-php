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
 * Class InflasiAPIController
 */
class InflasiAPIController extends AppBaseController
{
    private InflasiRepository $inflasiRepository;

    public function __construct(InflasiRepository $inflasiRepo)
    {
        $this->inflasiRepository = $inflasiRepo;
    }

    /**
     * Display a listing of the Inflasis.
     * GET|HEAD /inflasis
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
     * Store a newly created Inflasi in storage.
     * POST /inflasis
     */
    public function store(CreateInflasiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $inflasi = $this->inflasiRepository->create($input);

        return $this->sendResponse($inflasi->toArray(), 'Inflasi saved successfully');
    }

    /**
     * Display the specified Inflasi.
     * GET|HEAD /inflasis/{id}
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
     * Update the specified Inflasi in storage.
     * PUT/PATCH /inflasis/{id}
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
     * Remove the specified Inflasi from storage.
     * DELETE /inflasis/{id}
     *
     * @throws \Exception
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
