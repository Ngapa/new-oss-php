<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInflasiRequest;
use App\Http\Requests\UpdateInflasiRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InflasiRepository;
use Illuminate\Http\Request;
use Flash;

class InflasiController extends AppBaseController
{
    /** @var InflasiRepository $inflasiRepository*/
    private $inflasiRepository;

    public function __construct(InflasiRepository $inflasiRepo)
    {
        $this->inflasiRepository = $inflasiRepo;
    }

    /**
     * Display a listing of the Inflasi.
     */
    public function index(Request $request)
    {
        $inflasis = $this->inflasiRepository->paginate(10);

        return view('inflasis.index')
            ->with('inflasis', $inflasis);
    }

    /**
     * Show the form for creating a new Inflasi.
     */
    public function create()
    {
        return view('inflasis.create');
    }

    /**
     * Store a newly created Inflasi in storage.
     */
    public function store(CreateInflasiRequest $request)
    {
        $input = $request->all();

        $inflasi = $this->inflasiRepository->create($input);

        Flash::success('Inflasi saved successfully.');

        return redirect(route('inflasis.index'));
    }

    /**
     * Display the specified Inflasi.
     */
    public function show($id)
    {
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            Flash::error('Inflasi not found');

            return redirect(route('inflasis.index'));
        }

        return view('inflasis.show')->with('inflasi', $inflasi);
    }

    /**
     * Show the form for editing the specified Inflasi.
     */
    public function edit($id)
    {
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            Flash::error('Inflasi not found');

            return redirect(route('inflasis.index'));
        }

        return view('inflasis.edit')->with('inflasi', $inflasi);
    }

    /**
     * Update the specified Inflasi in storage.
     */
    public function update($id, UpdateInflasiRequest $request)
    {
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            Flash::error('Inflasi not found');

            return redirect(route('inflasis.index'));
        }

        $inflasi = $this->inflasiRepository->update($request->all(), $id);

        Flash::success('Inflasi updated successfully.');

        return redirect(route('inflasis.index'));
    }

    /**
     * Remove the specified Inflasi from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inflasi = $this->inflasiRepository->find($id);

        if (empty($inflasi)) {
            Flash::error('Inflasi not found');

            return redirect(route('inflasis.index'));
        }

        $this->inflasiRepository->delete($id);

        Flash::success('Inflasi deleted successfully.');

        return redirect(route('inflasis.index'));
    }
}
