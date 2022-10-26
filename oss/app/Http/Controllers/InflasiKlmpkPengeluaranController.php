<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInflasiKlmpkPengeluaranRequest;
use App\Http\Requests\UpdateInflasiKlmpkPengeluaranRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InflasiKlmpkPengeluaranRepository;
use Illuminate\Http\Request;
use Flash;

class InflasiKlmpkPengeluaranController extends AppBaseController
{
    /** @var InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepository*/
    private $inflasiKlmpkPengeluaranRepository;

    public function __construct(InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepo)
    {
        $this->inflasiKlmpkPengeluaranRepository = $inflasiKlmpkPengeluaranRepo;
    }

    /**
     * Display a listing of the InflasiKlmpkPengeluaran.
     */
    public function index(Request $request)
    {
        $inflasiKlmpkPengeluarans = $this->inflasiKlmpkPengeluaranRepository->paginate(10);

        return view('inflasi_klmpk_pengeluarans.index')
            ->with('inflasiKlmpkPengeluarans', $inflasiKlmpkPengeluarans);
    }

    /**
     * Show the form for creating a new InflasiKlmpkPengeluaran.
     */
    public function create()
    {
        return view('inflasi_klmpk_pengeluarans.create');
    }

    /**
     * Store a newly created InflasiKlmpkPengeluaran in storage.
     */
    public function store(CreateInflasiKlmpkPengeluaranRequest $request)
    {
        $input = $request->all();

        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->create($input);

        Flash::success('Inflasi Klmpk Pengeluaran saved successfully.');

        return redirect(route('inflasiKlmpkPengeluarans.index'));
    }

    /**
     * Display the specified InflasiKlmpkPengeluaran.
     */
    public function show($id)
    {
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            Flash::error('Inflasi Klmpk Pengeluaran not found');

            return redirect(route('inflasiKlmpkPengeluarans.index'));
        }

        return view('inflasi_klmpk_pengeluarans.show')->with('inflasiKlmpkPengeluaran', $inflasiKlmpkPengeluaran);
    }

    /**
     * Show the form for editing the specified InflasiKlmpkPengeluaran.
     */
    public function edit($id)
    {
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            Flash::error('Inflasi Klmpk Pengeluaran not found');

            return redirect(route('inflasiKlmpkPengeluarans.index'));
        }

        return view('inflasi_klmpk_pengeluarans.edit')->with('inflasiKlmpkPengeluaran', $inflasiKlmpkPengeluaran);
    }

    /**
     * Update the specified InflasiKlmpkPengeluaran in storage.
     */
    public function update($id, UpdateInflasiKlmpkPengeluaranRequest $request)
    {
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            Flash::error('Inflasi Klmpk Pengeluaran not found');

            return redirect(route('inflasiKlmpkPengeluarans.index'));
        }

        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->update($request->all(), $id);

        Flash::success('Inflasi Klmpk Pengeluaran updated successfully.');

        return redirect(route('inflasiKlmpkPengeluarans.index'));
    }

    /**
     * Remove the specified InflasiKlmpkPengeluaran from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepository->find($id);

        if (empty($inflasiKlmpkPengeluaran)) {
            Flash::error('Inflasi Klmpk Pengeluaran not found');

            return redirect(route('inflasiKlmpkPengeluarans.index'));
        }

        $this->inflasiKlmpkPengeluaranRepository->delete($id);

        Flash::success('Inflasi Klmpk Pengeluaran deleted successfully.');

        return redirect(route('inflasiKlmpkPengeluarans.index'));
    }
}
