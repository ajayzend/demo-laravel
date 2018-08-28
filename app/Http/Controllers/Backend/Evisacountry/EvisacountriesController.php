<?php

namespace App\Http\Controllers\Backend\Evisacountry;

use App\Models\Evisacountry\Evisacountry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Evisacountry\EvisacountryRepository;
use App\Http\Requests\Backend\Evisacountry\ManageEvisacountryRequest;
use App\Http\Requests\Backend\Evisacountry\CreateEvisacountryRequest;
use App\Http\Requests\Backend\Evisacountry\StoreEvisacountryRequest;
use App\Http\Requests\Backend\Evisacountry\EditEvisacountryRequest;
use App\Http\Requests\Backend\Evisacountry\UpdateEvisacountryRequest;
use App\Http\Requests\Backend\Evisacountry\DeleteEvisacountryRequest;

/**
 * EvisacountriesController
 */
class EvisacountriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var EvisacountryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param EvisacountryRepository $repository;
     */
    public function __construct(EvisacountryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Evisacountry\ManageEvisacountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageEvisacountryRequest $request)
    {
        return view('backend.evisacountries.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateEvisacountryRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateEvisacountryRequest $request)
    {
        return view('backend.evisacountries.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEvisacountryRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvisacountryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.evisacountries.index')->withFlashSuccess(trans('alerts.backend.evisacountries.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Evisacountry\Evisacountry  $evisacountry
     * @param  EditEvisacountryRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Evisacountry $evisacountry, EditEvisacountryRequest $request)
    {
        return view('backend.evisacountries.edit', compact('evisacountry'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEvisacountryRequestNamespace  $request
     * @param  App\Models\Evisacountry\Evisacountry  $evisacountry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvisacountryRequest $request, Evisacountry $evisacountry)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $evisacountry, $input );
        //return with successfull message
        return redirect()->route('admin.evisacountries.index')->withFlashSuccess(trans('alerts.backend.evisacountries.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteEvisacountryRequestNamespace  $request
     * @param  App\Models\Evisacountry\Evisacountry  $evisacountry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evisacountry $evisacountry, DeleteEvisacountryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($evisacountry);
        //returning with successfull message
        return redirect()->route('admin.evisacountries.index')->withFlashSuccess(trans('alerts.backend.evisacountries.deleted'));
    }
    
}
