<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePendudukAPIRequest;
use App\Http\Requests\API\UpdatePendudukAPIRequest;
use App\Models\Penduduk;
use App\Repositories\PendudukRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PendudukAPIController
 */
class PendudukAPIController extends AppBaseController
{
    private PendudukRepository $pendudukRepository;

    public function __construct(PendudukRepository $pendudukRepo)
    {
        $this->pendudukRepository = $pendudukRepo;
    }

    /**
     * Display a listing of the Penduduks.
     * GET|HEAD /penduduks
     */
    public function index(Request $request): JsonResponse
    {
        $penduduks = $this->pendudukRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penduduks->toArray(), 'Penduduks retrieved successfully');
    }

    /**
     * Store a newly created Penduduk in storage.
     * POST /penduduks
     */
    public function store(CreatePendudukAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $penduduk = $this->pendudukRepository->create($input);

        return $this->sendResponse($penduduk->toArray(), 'Penduduk saved successfully');
    }

    /**
     * Display the specified Penduduk.
     * GET|HEAD /penduduks/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Penduduk $penduduk */
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            return $this->sendError('Penduduk not found');
        }

        return $this->sendResponse($penduduk->toArray(), 'Penduduk retrieved successfully');
    }

    /**
     * Update the specified Penduduk in storage.
     * PUT/PATCH /penduduks/{id}
     */
    public function update($id, UpdatePendudukAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Penduduk $penduduk */
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            return $this->sendError('Penduduk not found');
        }

        $penduduk = $this->pendudukRepository->update($input, $id);

        return $this->sendResponse($penduduk->toArray(), 'Penduduk updated successfully');
    }

    /**
     * Remove the specified Penduduk from storage.
     * DELETE /penduduks/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Penduduk $penduduk */
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            return $this->sendError('Penduduk not found');
        }

        $penduduk->delete();

        return $this->sendSuccess('Penduduk deleted successfully');
    }
}
