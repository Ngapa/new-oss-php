<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePendudukKecamatanRequest;
use App\Http\Requests\UpdatePendudukKecamatanRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PendudukKecamatanRepository;
use Illuminate\Http\Request;
use Flash;

class PendudukKecamatanController extends AppBaseController
{
    /** @var PendudukKecamatanRepository $pendudukKecamatanRepository*/
    private $pendudukKecamatanRepository;

    public function __construct(PendudukKecamatanRepository $pendudukKecamatanRepo)
    {
        $this->pendudukKecamatanRepository = $pendudukKecamatanRepo;
    }

    /**
     * Display a listing of the PendudukKecamatan.
     */
    public function index(Request $request)
    {
        $pendudukKecamatans = $this->pendudukKecamatanRepository->paginate(10);

        return view('penduduk_kecamatans.index')
            ->with('pendudukKecamatans', $pendudukKecamatans);
    }

    /**
     * Show the form for creating a new PendudukKecamatan.
     */
    public function create()
    {
        return view('penduduk_kecamatans.create');
    }

    /**
     * Store a newly created PendudukKecamatan in storage.
     */
    public function store(CreatePendudukKecamatanRequest $request)
    {
        $input = $request->all();

        $pendudukKecamatan = $this->pendudukKecamatanRepository->create($input);

        Flash::success('Penduduk Kecamatan saved successfully.');

        return redirect(route('pendudukKecamatans.index'));
    }

    /**
     * Display the specified PendudukKecamatan.
     */
    public function show($id)
    {
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            Flash::error('Penduduk Kecamatan not found');

            return redirect(route('pendudukKecamatans.index'));
        }

        return view('penduduk_kecamatans.show')->with('pendudukKecamatan', $pendudukKecamatan);
    }

    /**
     * Show the form for editing the specified PendudukKecamatan.
     */
    public function edit($id)
    {
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            Flash::error('Penduduk Kecamatan not found');

            return redirect(route('pendudukKecamatans.index'));
        }

        return view('penduduk_kecamatans.edit')->with('pendudukKecamatan', $pendudukKecamatan);
    }

    /**
     * Update the specified PendudukKecamatan in storage.
     */
    public function update($id, UpdatePendudukKecamatanRequest $request)
    {
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            Flash::error('Penduduk Kecamatan not found');

            return redirect(route('pendudukKecamatans.index'));
        }

        $pendudukKecamatan = $this->pendudukKecamatanRepository->update($request->all(), $id);

        Flash::success('Penduduk Kecamatan updated successfully.');

        return redirect(route('pendudukKecamatans.index'));
    }

    /**
     * Remove the specified PendudukKecamatan from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pendudukKecamatan = $this->pendudukKecamatanRepository->find($id);

        if (empty($pendudukKecamatan)) {
            Flash::error('Penduduk Kecamatan not found');

            return redirect(route('pendudukKecamatans.index'));
        }

        $this->pendudukKecamatanRepository->delete($id);

        Flash::success('Penduduk Kecamatan deleted successfully.');

        return redirect(route('pendudukKecamatans.index'));
    }
}
