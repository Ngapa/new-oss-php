<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInflasiKotaRequest;
use App\Http\Requests\UpdateInflasiKotaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InflasiKotaRepository;
use Illuminate\Http\Request;
use Flash;

class InflasiKotaController extends AppBaseController
{
    /** @var InflasiKotaRepository $inflasiKotaRepository*/
    private $inflasiKotaRepository;

    public function __construct(InflasiKotaRepository $inflasiKotaRepo)
    {
        $this->inflasiKotaRepository = $inflasiKotaRepo;
    }

    /**
     * Display a listing of the InflasiKota.
     */
    public function index(Request $request)
    {
        $inflasiKotas = $this->inflasiKotaRepository->paginate(10);

        return view('inflasi_kotas.index')
            ->with('inflasiKotas', $inflasiKotas);
    }

    /**
     * Show the form for creating a new InflasiKota.
     */
    public function create()
    {
        return view('inflasi_kotas.create');
    }

    /**
     * Store a newly created InflasiKota in storage.
     */
    public function store(CreateInflasiKotaRequest $request)
    {
        $input = $request->all();

        $inflasiKota = $this->inflasiKotaRepository->create($input);

        Flash::success('Inflasi Kota saved successfully.');

        return redirect(route('inflasiKotas.index'));
    }

    /**
     * Display the specified InflasiKota.
     */
    public function show($id)
    {
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            Flash::error('Inflasi Kota not found');

            return redirect(route('inflasiKotas.index'));
        }

        return view('inflasi_kotas.show')->with('inflasiKota', $inflasiKota);
    }

    /**
     * Show the form for editing the specified InflasiKota.
     */
    public function edit($id)
    {
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            Flash::error('Inflasi Kota not found');

            return redirect(route('inflasiKotas.index'));
        }

        return view('inflasi_kotas.edit')->with('inflasiKota', $inflasiKota);
    }

    /**
     * Update the specified InflasiKota in storage.
     */
    public function update($id, UpdateInflasiKotaRequest $request)
    {
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            Flash::error('Inflasi Kota not found');

            return redirect(route('inflasiKotas.index'));
        }

        $inflasiKota = $this->inflasiKotaRepository->update($request->all(), $id);

        Flash::success('Inflasi Kota updated successfully.');

        return redirect(route('inflasiKotas.index'));
    }

    /**
     * Remove the specified InflasiKota from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inflasiKota = $this->inflasiKotaRepository->find($id);

        if (empty($inflasiKota)) {
            Flash::error('Inflasi Kota not found');

            return redirect(route('inflasiKotas.index'));
        }

        $this->inflasiKotaRepository->delete($id);

        Flash::success('Inflasi Kota deleted successfully.');

        return redirect(route('inflasiKotas.index'));
    }
}
