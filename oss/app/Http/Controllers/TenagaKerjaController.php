<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenagaKerjaRequest;
use App\Http\Requests\UpdateTenagaKerjaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TenagaKerjaRepository;
use Illuminate\Http\Request;
use Flash;

class TenagaKerjaController extends AppBaseController
{
    /** @var TenagaKerjaRepository $tenagaKerjaRepository*/
    private $tenagaKerjaRepository;

    public function __construct(TenagaKerjaRepository $tenagaKerjaRepo)
    {
        $this->tenagaKerjaRepository = $tenagaKerjaRepo;
    }

    /**
     * Display a listing of the TenagaKerja.
     */
    public function index(Request $request)
    {
        $tenagaKerjas = $this->tenagaKerjaRepository->paginate(10);

        return view('tenaga_kerjas.index')
            ->with('tenagaKerjas', $tenagaKerjas);
    }

    /**
     * Show the form for creating a new TenagaKerja.
     */
    public function create()
    {
        return view('tenaga_kerjas.create');
    }

    /**
     * Store a newly created TenagaKerja in storage.
     */
    public function store(CreateTenagaKerjaRequest $request)
    {
        $input = $request->all();

        $tenagaKerja = $this->tenagaKerjaRepository->create($input);

        Flash::success('Tenaga Kerja saved successfully.');

        return redirect(route('tenagaKerjas.index'));
    }

    /**
     * Display the specified TenagaKerja.
     */
    public function show($id)
    {
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            Flash::error('Tenaga Kerja not found');

            return redirect(route('tenagaKerjas.index'));
        }

        return view('tenaga_kerjas.show')->with('tenagaKerja', $tenagaKerja);
    }

    /**
     * Show the form for editing the specified TenagaKerja.
     */
    public function edit($id)
    {
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            Flash::error('Tenaga Kerja not found');

            return redirect(route('tenagaKerjas.index'));
        }

        return view('tenaga_kerjas.edit')->with('tenagaKerja', $tenagaKerja);
    }

    /**
     * Update the specified TenagaKerja in storage.
     */
    public function update($id, UpdateTenagaKerjaRequest $request)
    {
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            Flash::error('Tenaga Kerja not found');

            return redirect(route('tenagaKerjas.index'));
        }

        $tenagaKerja = $this->tenagaKerjaRepository->update($request->all(), $id);

        Flash::success('Tenaga Kerja updated successfully.');

        return redirect(route('tenagaKerjas.index'));
    }

    /**
     * Remove the specified TenagaKerja from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tenagaKerja = $this->tenagaKerjaRepository->find($id);

        if (empty($tenagaKerja)) {
            Flash::error('Tenaga Kerja not found');

            return redirect(route('tenagaKerjas.index'));
        }

        $this->tenagaKerjaRepository->delete($id);

        Flash::success('Tenaga Kerja deleted successfully.');

        return redirect(route('tenagaKerjas.index'));
    }
}
