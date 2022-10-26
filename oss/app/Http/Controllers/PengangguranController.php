<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePengangguranRequest;
use App\Http\Requests\UpdatePengangguranRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PengangguranRepository;
use Illuminate\Http\Request;
use Flash;

class PengangguranController extends AppBaseController
{
    /** @var PengangguranRepository $pengangguranRepository*/
    private $pengangguranRepository;

    public function __construct(PengangguranRepository $pengangguranRepo)
    {
        $this->pengangguranRepository = $pengangguranRepo;
    }

    /**
     * Display a listing of the Pengangguran.
     */
    public function index(Request $request)
    {
        $penganggurans = $this->pengangguranRepository->paginate(10);

        return view('penganggurans.index')
            ->with('penganggurans', $penganggurans);
    }

    /**
     * Show the form for creating a new Pengangguran.
     */
    public function create()
    {
        return view('penganggurans.create');
    }

    /**
     * Store a newly created Pengangguran in storage.
     */
    public function store(CreatePengangguranRequest $request)
    {
        $input = $request->all();

        $pengangguran = $this->pengangguranRepository->create($input);

        Flash::success('Pengangguran saved successfully.');

        return redirect(route('penganggurans.index'));
    }

    /**
     * Display the specified Pengangguran.
     */
    public function show($id)
    {
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            Flash::error('Pengangguran not found');

            return redirect(route('penganggurans.index'));
        }

        return view('penganggurans.show')->with('pengangguran', $pengangguran);
    }

    /**
     * Show the form for editing the specified Pengangguran.
     */
    public function edit($id)
    {
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            Flash::error('Pengangguran not found');

            return redirect(route('penganggurans.index'));
        }

        return view('penganggurans.edit')->with('pengangguran', $pengangguran);
    }

    /**
     * Update the specified Pengangguran in storage.
     */
    public function update($id, UpdatePengangguranRequest $request)
    {
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            Flash::error('Pengangguran not found');

            return redirect(route('penganggurans.index'));
        }

        $pengangguran = $this->pengangguranRepository->update($request->all(), $id);

        Flash::success('Pengangguran updated successfully.');

        return redirect(route('penganggurans.index'));
    }

    /**
     * Remove the specified Pengangguran from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pengangguran = $this->pengangguranRepository->find($id);

        if (empty($pengangguran)) {
            Flash::error('Pengangguran not found');

            return redirect(route('penganggurans.index'));
        }

        $this->pengangguranRepository->delete($id);

        Flash::success('Pengangguran deleted successfully.');

        return redirect(route('penganggurans.index'));
    }
}
