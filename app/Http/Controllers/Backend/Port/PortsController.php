<?php

namespace App\Http\Controllers\Backend\Port;

use App\Models\Port\Port;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Port\PortRepository;
use App\Http\Requests\Backend\Port\ManagePortRequest;
use App\Http\Requests\Backend\Port\CreatePortRequest;
use App\Http\Requests\Backend\Port\StorePortRequest;
use App\Http\Requests\Backend\Port\EditPortRequest;
use App\Http\Requests\Backend\Port\UpdatePortRequest;
use App\Http\Requests\Backend\Port\DeletePortRequest;

/**
 * PortsController
 */
class PortsController extends Controller
{
    /**
     * variable to store the repository object
     * @var PortRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PortRepository $repository;
     */
    public function __construct(PortRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Port\ManagePortRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManagePortRequest $request)
    {
        return view('backend.ports.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePortRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreatePortRequest $request)
    {
        return view('backend.ports.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePortRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.ports.index')->withFlashSuccess(trans('alerts.backend.ports.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Port\Port  $port
     * @param  EditPortRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Port $port, EditPortRequest $request)
    {
        return view('backend.ports.edit', compact('port'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePortRequestNamespace  $request
     * @param  App\Models\Port\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortRequest $request, Port $port)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $port, $input );
        //return with successfull message
        return redirect()->route('admin.ports.index')->withFlashSuccess(trans('alerts.backend.ports.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePortRequestNamespace  $request
     * @param  App\Models\Port\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function destroy(Port $port, DeletePortRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($port);
        //returning with successfull message
        return redirect()->route('admin.ports.index')->withFlashSuccess(trans('alerts.backend.ports.deleted'));
    }
    
}
