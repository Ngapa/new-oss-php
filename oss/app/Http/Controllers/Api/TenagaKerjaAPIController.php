<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTenagaKerjaAPIRequest;
use App\Http\Requests\API\UpdateTenagaKerjaAPIRequest;
use App\Models\TenagaKerja;
use App\Repositories\TenagaKerjaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class TenagaKerjaAPIController
 */
class TenagaKerjaAPIController extends AppBaseController
{
    private TenagaKerjaRepository $tenagaKerjaRepository;

    public function __construct(TenagaKerjaRepository $tenagaKerjaRepo)
    {
        $this->tenagaKerjaRepository = $tenagaKerjaRepo;
    }

    /**
     * Display a listing of the TenagaKerjas.
     * GET|HEAD /tenaga-kerjas
     */
    public function index(Request $request): JsonResponse
    {
        $tenagaKerjas = $this->tenagaKerjaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tenagaKerjas->toArray(), 'Tenaga Kerjas retrieved successfully');
    }

    /**
     * Store a newly created TenagaKerja in storage.
     * POST /tenaga-kerjas
     */
    public function store(CreateTenagaKerjaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $tenagaKerja = $this->tenagaKerjaRepository->create($input);

        return $this->sendResponse($tenagaKerja->toArray(), 'Tenaga Kerja saved successfully');
    }

    /**
     * Display the specified TenagaKerja.
     * GET|HEAD /tenaga-kerjas/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var TenagaKerja $tenagaKerja */
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            return $this->sendError('Tenaga Kerja not found');
        }

        return $this->sendResponse($tenagaKerja->toArray(), 'Tenaga Kerja retrieved successfully');
    }

    /**
     * Update the specified TenagaKerja in storage.
     * PUT/PATCH /tenaga-kerjas/{id}
     */
    public function update($id, UpdateTenagaKerjaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var TenagaKerja $tenagaKerja */
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            return $this->sendError('Tenaga Kerja not found');
        }

        $tenagaKerja = $this->tenagaKerjaRepository->update($input, $id);

        return $this->sendResponse($tenagaKerja->toArray(), 'TenagaKerja updated successfully');
    }

    /**
     * Remove the specified TenagaKerja from storage.
     * DELETE /tenaga-kerjas/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var TenagaKerja $tenagaKerja */
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            return $this->sendError('Tenaga Kerja not found');
        }

        $tenagaKerja->delete();

        return $this->sendSuccess('Tenaga Kerja deleted successfully');
    }
}
