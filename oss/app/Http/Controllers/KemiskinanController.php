<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKemiskinanRequest;
use App\Http\Requests\UpdateKemiskinanRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KemiskinanRepository;
use Illuminate\Http\Request;
use Flash;

class KemiskinanController extends AppBaseController
{
    /** @var KemiskinanRepository $kemiskinanRepository*/
    private $kemiskinanRepository;

    public function __construct(KemiskinanRepository $kemiskinanRepo)
    {
        $this->kemiskinanRepository = $kemiskinanRepo;
    }

    /**
     * Display a listing of the Kemiskinan.
     */
    public function index(Request $request)
    {
        $kemiskinans = $this->kemiskinanRepository->paginate(10);

        return view('kemiskinans.index')
            ->with('kemiskinans', $kemiskinans);
    }

    /**
     * Show the form for creating a new Kemiskinan.
     */
    public function create()
    {
        return view('kemiskinans.create');
    }

    /**
     * Store a newly created Kemiskinan in storage.
     */
    public function store(CreateKemiskinanRequest $request)
    {
        $input = $request->all();

        $kemiskinan = $this->kemiskinanRepository->create($input);

        Flash::success('Kemiskinan saved successfully.');

        return redirect(route('kemiskinans.index'));
    }

    /**
     * Display the specified Kemiskinan.
     */
    public function show($id)
    {
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            Flash::error('Kemiskinan not found');

            return redirect(route('kemiskinans.index'));
        }

        return view('kemiskinans.show')->with('kemiskinan', $kemiskinan);
    }

    /**
     * Show the form for editing the specified Kemiskinan.
     */
    public function edit($id)
    {
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            Flash::error('Kemiskinan not found');

            return redirect(route('kemiskinans.index'));
        }

        return view('kemiskinans.edit')->with('kemiskinan', $kemiskinan);
    }

    /**
     * Update the specified Kemiskinan in storage.
     */
    public function update($id, UpdateKemiskinanRequest $request)
    {
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            Flash::error('Kemiskinan not found');

            return redirect(route('kemiskinans.index'));
        }

        $kemiskinan = $this->kemiskinanRepository->update($request->all(), $id);

        Flash::success('Kemiskinan updated successfully.');

        return redirect(route('kemiskinans.index'));
    }

    /**
     * Remove the specified Kemiskinan from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $kemiskinan = $this->kemiskinanRepository->find($id);

        if (empty($kemiskinan)) {
            Flash::error('Kemiskinan not found');

            return redirect(route('kemiskinans.index'));
        }

        $this->kemiskinanRepository->delete($id);

        Flash::success('Kemiskinan deleted successfully.');

        return redirect(route('kemiskinans.index'));
    }
}
