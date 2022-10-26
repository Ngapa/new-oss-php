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
 * Class PendudukKecamatanAPIController
 */
class PendudukKecamatanAPIController extends AppBaseController
{
    private PendudukKecamatanRepository $pendudukKecamatanRepository;

    public function __construct(PendudukKecamatanRepository $pendudukKecamatanRepo)
    {
        $this->pendudukKecamatanRepository = $pendudukKecamatanRepo;
    }

    /**
     * Display a listing of the PendudukKecamatans.
     * GET|HEAD /penduduk-kecamatans
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
     * Store a newly created PendudukKecamatan in storage.
     * POST /penduduk-kecamatans
     */
    public function store(CreatePendudukKecamatanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pendudukKecamatan = $this->pendudukKecamatanRepository->create($input);

        return $this->sendResponse($pendudukKecamatan->toArray(), 'Penduduk Kecamatan saved successfully');
    }

    /**
     * Display the specified PendudukKecamatan.
     * GET|HEAD /penduduk-kecamatans/{id}
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
     * Update the specified PendudukKecamatan in storage.
     * PUT/PATCH /penduduk-kecamatans/{id}
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
     * Remove the specified PendudukKecamatan from storage.
     * DELETE /penduduk-kecamatans/{id}
     *
     * @throws \Exception
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
