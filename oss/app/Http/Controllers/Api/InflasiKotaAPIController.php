<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInflasiKotaAPIRequest;
use App\Http\Requests\API\UpdateInflasiKotaAPIRequest;
use App\Models\InflasiKota;
use App\Repositories\InflasiKotaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class InflasiKotaAPIController
 */
class InflasiKotaAPIController extends AppBaseController
{
    private InflasiKotaRepository $inflasiKotaRepository;

    public function __construct(InflasiKotaRepository $inflasiKotaRepo)
    {
        $this->inflasiKotaRepository = $inflasiKotaRepo;
    }

    /**
     * Display a listing of the InflasiKotas.
     * GET|HEAD /inflasi-kotas
     */
    public function index(Request $request): JsonResponse
    {
        $inflasiKotas = $this->inflasiKotaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($inflasiKotas->toArray(), 'Inflasi Kotas retrieved successfully');
    }

    /**
     * Store a newly created InflasiKota in storage.
     * POST /inflasi-kotas
     */
    public function store(CreateInflasiKotaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $inflasiKota = $this->inflasiKotaRepository->create($input);

        return $this->sendResponse($inflasiKota->toArray(), 'Inflasi Kota saved successfully');
    }

    /**
     * Display the specified InflasiKota.
     * GET|HEAD /inflasi-kotas/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var InflasiKota $inflasiKota */
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            return $this->sendError('Inflasi Kota not found');
        }

        return $this->sendResponse($inflasiKota->toArray(), 'Inflasi Kota retrieved successfully');
    }

    /**
     * Update the specified InflasiKota in storage.
     * PUT/PATCH /inflasi-kotas/{id}
     */
    public function update($id, UpdateInflasiKotaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var InflasiKota $inflasiKota */
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            return $this->sendError('Inflasi Kota not found');
        }

        $inflasiKota = $this->inflasiKotaRepository->update($input, $id);

        return $this->sendResponse($inflasiKota->toArray(), 'InflasiKota updated successfully');
    }

    /**
     * Remove the specified InflasiKota from storage.
     * DELETE /inflasi-kotas/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var InflasiKota $inflasiKota */
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            return $this->sendError('Inflasi Kota not found');
        }

        $inflasiKota->delete();

        return $this->sendSuccess('Inflasi Kota deleted successfully');
    }
}
