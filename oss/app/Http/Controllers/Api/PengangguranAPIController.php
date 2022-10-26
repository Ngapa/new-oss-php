<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePengangguranAPIRequest;
use App\Http\Requests\API\UpdatePengangguranAPIRequest;
use App\Models\Pengangguran;
use App\Repositories\PengangguranRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PengangguranAPIController
 */
class PengangguranAPIController extends AppBaseController
{
    private PengangguranRepository $pengangguranRepository;

    public function __construct(PengangguranRepository $pengangguranRepo)
    {
        $this->pengangguranRepository = $pengangguranRepo;
    }

    /**
     * Display a listing of the Penganggurans.
     * GET|HEAD /penganggurans
     */
    public function index(Request $request): JsonResponse
    {
        $penganggurans = $this->pengangguranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penganggurans->toArray(), 'Penganggurans retrieved successfully');
    }

    /**
     * Store a newly created Pengangguran in storage.
     * POST /penganggurans
     */
    public function store(CreatePengangguranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pengangguran = $this->pengangguranRepository->create($input);

        return $this->sendResponse($pengangguran->toArray(), 'Pengangguran saved successfully');
    }

    /**
     * Display the specified Pengangguran.
     * GET|HEAD /penganggurans/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Pengangguran $pengangguran */
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            return $this->sendError('Pengangguran not found');
        }

        return $this->sendResponse($pengangguran->toArray(), 'Pengangguran retrieved successfully');
    }

    /**
     * Update the specified Pengangguran in storage.
     * PUT/PATCH /penganggurans/{id}
     */
    public function update($id, UpdatePengangguranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Pengangguran $pengangguran */
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            return $this->sendError('Pengangguran not found');
        }

        $pengangguran = $this->pengangguranRepository->update($input, $id);

        return $this->sendResponse($pengangguran->toArray(), 'Pengangguran updated successfully');
    }

    /**
     * Remove the specified Pengangguran from storage.
     * DELETE /penganggurans/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Pengangguran $pengangguran */
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            return $this->sendError('Pengangguran not found');
        }

        $pengangguran->delete();

        return $this->sendSuccess('Pengangguran deleted successfully');
    }
}
