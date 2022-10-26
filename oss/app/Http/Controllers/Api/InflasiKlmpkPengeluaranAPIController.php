<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInflasiKlmpkPengeluaranAPIRequest;
use App\Http\Requests\API\UpdateInflasiKlmpkPengeluaranAPIRequest;
use App\Models\InflasiKlmpkPengeluaran;
use App\Repositories\InflasiKlmpkPengeluaranRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class InflasiKlmpkPengeluaranAPIController
 */
class InflasiKlmpkPengeluaranAPIController extends AppBaseController
{
    private InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepository;

    public function __construct(InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepo)
    {
        $this->inflasiKlmpkPengeluaranRepository = $inflasiKlmpkPengeluaranRepo;
    }

    /**
     * Display a listing of the InflasiKlmpkPengeluarans.
     * GET|HEAD /inflasi-klmpk-pengeluarans
     */
    public function index(Request $request): JsonResponse
    {
        $inflasiKlmpkPengeluarans = $this->inflasiKlmpkPengeluaranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($inflasiKlmpkPengeluarans->toArray(), 'Inflasi Klmpk Pengeluarans retrieved successfully');
    }

    /**
     * Store a newly created InflasiKlmpkPengeluaran in storage.
     * POST /inflasi-klmpk-pengeluarans
     */
    public function store(CreateInflasiKlmpkPengeluaranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->create($input);

        return $this->sendResponse($inflasiKlmpkPengeluaran->toArray(), 'Inflasi Klmpk Pengeluaran saved successfully');
    }

    /**
     * Display the specified InflasiKlmpkPengeluaran.
     * GET|HEAD /inflasi-klmpk-pengeluarans/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var InflasiKlmpkPengeluaran $inflasiKlmpkPengeluaran */
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            return $this->sendError('Inflasi Klmpk Pengeluaran not found');
        }

        return $this->sendResponse($inflasiKlmpkPengeluaran->toArray(), 'Inflasi Klmpk Pengeluaran retrieved successfully');
    }

    /**
     * Update the specified InflasiKlmpkPengeluaran in storage.
     * PUT/PATCH /inflasi-klmpk-pengeluarans/{id}
     */
    public function update($id, UpdateInflasiKlmpkPengeluaranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var InflasiKlmpkPengeluaran $inflasiKlmpkPengeluaran */
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            return $this->sendError('Inflasi Klmpk Pengeluaran not found');
        }

        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->update($input, $id);

        return $this->sendResponse($inflasiKlmpkPengeluaran->toArray(), 'InflasiKlmpkPengeluaran updated successfully');
    }

    /**
     * Remove the specified InflasiKlmpkPengeluaran from storage.
     * DELETE /inflasi-klmpk-pengeluarans/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var InflasiKlmpkPengeluaran $inflasiKlmpkPengeluaran */
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            return $this->sendError('Inflasi Klmpk Pengeluaran not found');
        }

        $inflasiKlmpkPengeluaran->delete();

        return $this->sendSuccess('Inflasi Klmpk Pengeluaran deleted successfully');
    }
}
