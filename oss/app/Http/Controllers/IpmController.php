<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIpmRequest;
use App\Http\Requests\UpdateIpmRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\IpmRepository;
use Illuminate\Http\Request;
use Flash;

class IpmController extends AppBaseController
{
    /** @var IpmRepository $ipmRepository*/
    private $ipmRepository;

    public function __construct(IpmRepository $ipmRepo)
    {
        $this->ipmRepository = $ipmRepo;
    }

    /**
     * Display a listing of the Ipm.
     */
    public function index(Request $request)
    {
        $ipms = $this->ipmRepository->paginate(10);

        return view('ipms.index')
            ->with('ipms', $ipms);
    }

    /**
     * Show the form for creating a new Ipm.
     */
    public function create()
    {
        return view('ipms.create');
    }

    /**
     * Store a newly created Ipm in storage.
     */
    public function store(CreateIpmRequest $request)
    {
        $input = $request->all();

        $ipm = $this->ipmRepository->create($input);

        Flash::success('Ipm saved successfully.');

        return redirect(route('ipms.index'));
    }

    /**
     * Display the specified Ipm.
     */
    public function show($id)
    {
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            Flash::error('Ipm not found');

            return redirect(route('ipms.index'));
        }

        return view('ipms.show')->with('ipm', $ipm);
    }

    /**
     * Show the form for editing the specified Ipm.
     */
    public function edit($id)
    {
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            Flash::error('Ipm not found');

            return redirect(route('ipms.index'));
        }

        return view('ipms.edit')->with('ipm', $ipm);
    }

    /**
     * Update the specified Ipm in storage.
     */
    public function update($id, UpdateIpmRequest $request)
    {
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            Flash::error('Ipm not found');

            return redirect(route('ipms.index'));
        }

        $ipm = $this->ipmRepository->update($request->all(), $id);

        Flash::success('Ipm updated successfully.');

        return redirect(route('ipms.index'));
    }

    /**
     * Remove the specified Ipm from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ipm = $this->ipmRepository->find($id);

        if (empty($ipm)) {
            Flash::error('Ipm not found');

            return redirect(route('ipms.index'));
        }

        $this->ipmRepository->delete($id);

        Flash::success('Ipm deleted successfully.');

        return redirect(route('ipms.index'));
    }
}
