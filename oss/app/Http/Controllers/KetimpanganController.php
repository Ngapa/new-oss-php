<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKetimpanganRequest;
use App\Http\Requests\UpdateKetimpanganRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KetimpanganRepository;
use Illuminate\Http\Request;
use Flash;

class KetimpanganController extends AppBaseController
{
    /** @var KetimpanganRepository $ketimpanganRepository*/
    private $ketimpanganRepository;

    public function __construct(KetimpanganRepository $ketimpanganRepo)
    {
        $this->ketimpanganRepository = $ketimpanganRepo;
    }

    /**
     * Display a listing of the Ketimpangan.
     */
    public function index(Request $request)
    {
        $ketimpangans = $this->ketimpanganRepository->paginate(10);

        return view('ketimpangans.index')
            ->with('ketimpangans', $ketimpangans);
    }

    /**
     * Show the form for creating a new Ketimpangan.
     */
    public function create()
    {
        return view('ketimpangans.create');
    }

    /**
     * Store a newly created Ketimpangan in storage.
     */
    public function store(CreateKetimpanganRequest $request)
    {
        $input = $request->all();

        $ketimpangan = $this->ketimpanganRepository->create($input);

        Flash::success('Ketimpangan saved successfully.');

        return redirect(route('ketimpangans.index'));
    }

    /**
     * Display the specified Ketimpangan.
     */
    public function show($id)
    {
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            Flash::error('Ketimpangan not found');

            return redirect(route('ketimpangans.index'));
        }

        return view('ketimpangans.show')->with('ketimpangan', $ketimpangan);
    }

    /**
     * Show the form for editing the specified Ketimpangan.
     */
    public function edit($id)
    {
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            Flash::error('Ketimpangan not found');

            return redirect(route('ketimpangans.index'));
        }

        return view('ketimpangans.edit')->with('ketimpangan', $ketimpangan);
    }

    /**
     * Update the specified Ketimpangan in storage.
     */
    public function update($id, UpdateKetimpanganRequest $request)
    {
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            Flash::error('Ketimpangan not found');

            return redirect(route('ketimpangans.index'));
        }

        $ketimpangan = $this->ketimpanganRepository->update($request->all(), $id);

        Flash::success('Ketimpangan updated successfully.');

        return redirect(route('ketimpangans.index'));
    }

    /**
     * Remove the specified Ketimpangan from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ketimpangan = $this->ketimpanganRepository->find($id);

        if (empty($ketimpangan)) {
            Flash::error('Ketimpangan not found');

            return redirect(route('ketimpangans.index'));
        }

        $this->ketimpanganRepository->delete($id);

        Flash::success('Ketimpangan deleted successfully.');

        return redirect(route('ketimpangans.index'));
    }
}
