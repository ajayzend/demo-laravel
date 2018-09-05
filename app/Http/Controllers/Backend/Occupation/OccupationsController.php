<?php

namespace App\Http\Controllers\Backend\Occupation;

use App\Models\Occupation\Occupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Occupation\OccupationRepository;
use App\Http\Requests\Backend\Occupation\ManageOccupationRequest;
use App\Http\Requests\Backend\Occupation\CreateOccupationRequest;
use App\Http\Requests\Backend\Occupation\StoreOccupationRequest;
use App\Http\Requests\Backend\Occupation\EditOccupationRequest;
use App\Http\Requests\Backend\Occupation\UpdateOccupationRequest;
use App\Http\Requests\Backend\Occupation\DeleteOccupationRequest;

/**
 * OccupationsController
 */
class OccupationsController extends Controller
{
    /**
     * variable to store the repository object
     * @var OccupationRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param OccupationRepository $repository;
     */
    public function __construct(OccupationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Occupation\ManageOccupationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageOccupationRequest $request)
    {
        return view('backend.occupations.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateOccupationRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateOccupationRequest $request)
    {
        return view('backend.occupations.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOccupationRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOccupationRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.occupations.index')->withFlashSuccess(trans('alerts.backend.occupations.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Occupation\Occupation  $occupation
     * @param  EditOccupationRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation, EditOccupationRequest $request)
    {
        return view('backend.occupations.edit', compact('occupation'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOccupationRequestNamespace  $request
     * @param  App\Models\Occupation\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOccupationRequest $request, Occupation $occupation)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $occupation, $input );
        //return with successfull message
        return redirect()->route('admin.occupations.index')->withFlashSuccess(trans('alerts.backend.occupations.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteOccupationRequestNamespace  $request
     * @param  App\Models\Occupation\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation, DeleteOccupationRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($occupation);
        //returning with successfull message
        return redirect()->route('admin.occupations.index')->withFlashSuccess(trans('alerts.backend.occupations.deleted'));
    }
    
}
