<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PendudukRepository;
use Illuminate\Http\Request;
use Flash;

class PendudukController extends AppBaseController
{
    /** @var PendudukRepository $pendudukRepository*/
    private $pendudukRepository;

    public function __construct(PendudukRepository $pendudukRepo)
    {
        $this->pendudukRepository = $pendudukRepo;
    }

    /**
     * Display a listing of the Penduduk.
     */
    public function index(Request $request)
    {
        $penduduks = $this->pendudukRepository->paginate(10);

        return view('penduduks.index')
            ->with('penduduks', $penduduks);
    }

    /**
     * Show the form for creating a new Penduduk.
     */
    public function create()
    {
        return view('penduduks.create');
    }

    /**
     * Store a newly created Penduduk in storage.
     */
    public function store(CreatePendudukRequest $request)
    {
        $input = $request->all();

        $penduduk = $this->pendudukRepository->create($input);

        Flash::success('Penduduk saved successfully.');

        return redirect(route('penduduks.index'));
    }

    /**
     * Display the specified Penduduk.
     */
    public function show($id)
    {
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            Flash::error('Penduduk not found');

            return redirect(route('penduduks.index'));
        }

        return view('penduduks.show')->with('penduduk', $penduduk);
    }

    /**
     * Show the form for editing the specified Penduduk.
     */
    public function edit($id)
    {
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            Flash::error('Penduduk not found');

            return redirect(route('penduduks.index'));
        }

        return view('penduduks.edit')->with('penduduk', $penduduk);
    }

    /**
     * Update the specified Penduduk in storage.
     */
    public function update($id, UpdatePendudukRequest $request)
    {
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            Flash::error('Penduduk not found');

            return redirect(route('penduduks.index'));
        }

        $penduduk = $this->pendudukRepository->update($request->all(), $id);

        Flash::success('Penduduk updated successfully.');

        return redirect(route('penduduks.index'));
    }

    /**
     * Remove the specified Penduduk from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $penduduk = $this->pendudukRepository->find($id);

        if (empty($penduduk)) {
            Flash::error('Penduduk not found');

            return redirect(route('penduduks.index'));
        }

        $this->pendudukRepository->delete($id);

        Flash::success('Penduduk deleted successfully.');

        return redirect(route('penduduks.index'));
    }
}
