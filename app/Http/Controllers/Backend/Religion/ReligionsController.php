<?php

namespace App\Http\Controllers\Backend\Religion;

use App\Models\Religion\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Religion\ReligionRepository;
use App\Http\Requests\Backend\Religion\ManageReligionRequest;
use App\Http\Requests\Backend\Religion\CreateReligionRequest;
use App\Http\Requests\Backend\Religion\StoreReligionRequest;
use App\Http\Requests\Backend\Religion\EditReligionRequest;
use App\Http\Requests\Backend\Religion\UpdateReligionRequest;
use App\Http\Requests\Backend\Religion\DeleteReligionRequest;

/**
 * ReligionsController
 */
class ReligionsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReligionRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ReligionRepository $repository;
     */
    public function __construct(ReligionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Religion\ManageReligionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageReligionRequest $request)
    {
        return view('backend.religions.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateReligionRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateReligionRequest $request)
    {
        return view('backend.religions.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreReligionRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReligionRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.religions.index')->withFlashSuccess(trans('alerts.backend.religions.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Religion\Religion  $religion
     * @param  EditReligionRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Religion $religion, EditReligionRequest $request)
    {
        return view('backend.religions.edit', compact('religion'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateReligionRequestNamespace  $request
     * @param  App\Models\Religion\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReligionRequest $request, Religion $religion)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $religion, $input );
        //return with successfull message
        return redirect()->route('admin.religions.index')->withFlashSuccess(trans('alerts.backend.religions.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteReligionRequestNamespace  $request
     * @param  App\Models\Religion\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion, DeleteReligionRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($religion);
        //returning with successfull message
        return redirect()->route('admin.religions.index')->withFlashSuccess(trans('alerts.backend.religions.deleted'));
    }
    
}
