<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKategoriAPIRequest;
use App\Http\Requests\API\UpdateKategoriAPIRequest;
use App\Models\Kategori;
use App\Repositories\KategoriRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class KategoriAPIController
 */
class KategoriAPIController extends AppBaseController
{
    private KategoriRepository $kategoriRepository;

    public function __construct(KategoriRepository $kategoriRepo)
    {
        $this->kategoriRepository = $kategoriRepo;
    }

    /**
     * Display a listing of the Kategoris.
     * GET|HEAD /kategoris
     */
    public function index(Request $request): JsonResponse
    {
        $kategoris = $this->kategoriRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kategoris->toArray(), 'Kategoris retrieved successfully');
    }

    /**
     * Store a newly created Kategori in storage.
     * POST /kategoris
     */
    public function store(CreateKategoriAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $kategori = $this->kategoriRepository->create($input);

        return $this->sendResponse($kategori->toArray(), 'Kategori saved successfully');
    }

    /**
     * Display the specified Kategori.
     * GET|HEAD /kategoris/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Kategori $kategori */
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            return $this->sendError('Kategori not found');
        }

        return $this->sendResponse($kategori->toArray(), 'Kategori retrieved successfully');
    }

    /**
     * Update the specified Kategori in storage.
     * PUT/PATCH /kategoris/{id}
     */
    public function update($id, UpdateKategoriAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Kategori $kategori */
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            return $this->sendError('Kategori not found');
        }

        $kategori = $this->kategoriRepository->update($input, $id);

        return $this->sendResponse($kategori->toArray(), 'Kategori updated successfully');
    }

    /**
     * Remove the specified Kategori from storage.
     * DELETE /kategoris/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Kategori $kategori */
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            return $this->sendError('Kategori not found');
        }

        $kategori->delete();

        return $this->sendSuccess('Kategori deleted successfully');
    }
}
