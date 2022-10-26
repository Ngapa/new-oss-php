<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePdrbRequest;
use App\Http\Requests\UpdatePdrbRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PdrbRepository;
use Illuminate\Http\Request;
use Flash;

class PdrbController extends AppBaseController
{
    /** @var PdrbRepository $pdrbRepository*/
    private $pdrbRepository;

    public function __construct(PdrbRepository $pdrbRepo)
    {
        $this->pdrbRepository = $pdrbRepo;
    }

    /**
     * Display a listing of the Pdrb.
     */
    public function index(Request $request)
    {
        $pdrbs = $this->pdrbRepository->paginate(10);

        return view('pdrbs.index')
            ->with('pdrbs', $pdrbs);
    }

    /**
     * Show the form for creating a new Pdrb.
     */
    public function create()
    {
        return view('pdrbs.create');
    }

    /**
     * Store a newly created Pdrb in storage.
     */
    public function store(CreatePdrbRequest $request)
    {
        $input = $request->all();

        $pdrb = $this->pdrbRepository->create($input);

        Flash::success('Pdrb saved successfully.');

        return redirect(route('pdrbs.index'));
    }

    /**
     * Display the specified Pdrb.
     */
    public function show($id)
    {
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            Flash::error('Pdrb not found');

            return redirect(route('pdrbs.index'));
        }

        return view('pdrbs.show')->with('pdrb', $pdrb);
    }

    /**
     * Show the form for editing the specified Pdrb.
     */
    public function edit($id)
    {
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            Flash::error('Pdrb not found');

            return redirect(route('pdrbs.index'));
        }

        return view('pdrbs.edit')->with('pdrb', $pdrb);
    }

    /**
     * Update the specified Pdrb in storage.
     */
    public function update($id, UpdatePdrbRequest $request)
    {
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            Flash::error('Pdrb not found');

            return redirect(route('pdrbs.index'));
        }

        $pdrb = $this->pdrbRepository->update($request->all(), $id);

        Flash::success('Pdrb updated successfully.');

        return redirect(route('pdrbs.index'));
    }

    /**
     * Remove the specified Pdrb from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pdrb = $this->pdrbRepository->find($id);

        if (empty($pdrb)) {
            Flash::error('Pdrb not found');

            return redirect(route('pdrbs.index'));
        }

        $this->pdrbRepository->delete($id);

        Flash::success('Pdrb deleted successfully.');

        return redirect(route('pdrbs.index'));
    }
}
