<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIpmAPIRequest;
use App\Http\Requests\API\UpdateIpmAPIRequest;
use App\Models\Ipm;
use App\Repositories\IpmRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class IpmAPIController
 */
class IpmAPIController extends AppBaseController
{
    private IpmRepository $ipmRepository;

    public function __construct(IpmRepository $ipmRepo)
    {
        $this->ipmRepository = $ipmRepo;
    }

    /**
     * Display a listing of the Ipms.
     * GET|HEAD /ipms
     */
    public function index(Request $request): JsonResponse
    {
        $ipms = $this->ipmRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ipms->toArray(), 'Ipms retrieved successfully');
    }

    /**
     * Store a newly created Ipm in storage.
     * POST /ipms
     */
    public function store(CreateIpmAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ipm = $this->ipmRepository->create($input);

        return $this->sendResponse($ipm->toArray(), 'Ipm saved successfully');
    }

    /**
     * Display the specified Ipm.
     * GET|HEAD /ipms/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Ipm $ipm */
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            return $this->sendError('Ipm not found');
        }

        return $this->sendResponse($ipm->toArray(), 'Ipm retrieved successfully');
    }

    /**
     * Update the specified Ipm in storage.
     * PUT/PATCH /ipms/{id}
     */
    public function update($id, UpdateIpmAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Ipm $ipm */
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            return $this->sendError('Ipm not found');
        }

        $ipm = $this->ipmRepository->update($input, $id);

        return $this->sendResponse($ipm->toArray(), 'Ipm updated successfully');
    }

    /**
     * Remove the specified Ipm from storage.
     * DELETE /ipms/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Ipm $ipm */
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            return $this->sendError('Ipm not found');
        }

        $ipm->delete();

        return $this->sendSuccess('Ipm deleted successfully');
    }
}
