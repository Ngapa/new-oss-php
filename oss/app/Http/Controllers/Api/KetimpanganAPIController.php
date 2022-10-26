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
 * Class KetimpanganAPIController
 */
class KetimpanganAPIController extends AppBaseController
{
    private KetimpanganRepository $ketimpanganRepository;

    public function __construct(KetimpanganRepository $ketimpanganRepo)
    {
        $this->ketimpanganRepository = $ketimpanganRepo;
    }

    /**
     * Display a listing of the Ketimpangans.
     * GET|HEAD /ketimpangans
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
     * Store a newly created Ketimpangan in storage.
     * POST /ketimpangans
     */
    public function store(CreateKetimpanganAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ketimpangan = $this->ketimpanganRepository->create($input);

        return $this->sendResponse($ketimpangan->toArray(), 'Ketimpangan saved successfully');
    }

    /**
     * Display the specified Ketimpangan.
     * GET|HEAD /ketimpangans/{id}
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
     * Update the specified Ketimpangan in storage.
     * PUT/PATCH /ketimpangans/{id}
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
     * Remove the specified Ketimpangan from storage.
     * DELETE /ketimpangans/{id}
     *
     * @throws \Exception
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
