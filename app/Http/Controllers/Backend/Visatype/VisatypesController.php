<?php

namespace App\Http\Controllers\Backend\Visatype;

use App\Models\Visatype\Visatype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Visatype\VisatypeRepository;
use App\Http\Requests\Backend\Visatype\ManageVisatypeRequest;
use App\Http\Requests\Backend\Visatype\CreateVisatypeRequest;
use App\Http\Requests\Backend\Visatype\StoreVisatypeRequest;
use App\Http\Requests\Backend\Visatype\EditVisatypeRequest;
use App\Http\Requests\Backend\Visatype\UpdateVisatypeRequest;
use App\Http\Requests\Backend\Visatype\DeleteVisatypeRequest;

/**
 * VisatypesController
 */
class VisatypesController extends Controller
{
    /**
     * variable to store the repository object
     * @var VisatypeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param VisatypeRepository $repository;
     */
    public function __construct(VisatypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Visatype\ManageVisatypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageVisatypeRequest $request)
    {
        return view('backend.visatypes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateVisatypeRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateVisatypeRequest $request)
    {
        return view('backend.visatypes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVisatypeRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisatypeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.visatypes.index')->withFlashSuccess(trans('alerts.backend.visatypes.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Visatype\Visatype  $visatype
     * @param  EditVisatypeRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Visatype $visatype, EditVisatypeRequest $request)
    {
        return view('backend.visatypes.edit', compact('visatype'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateVisatypeRequestNamespace  $request
     * @param  App\Models\Visatype\Visatype  $visatype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisatypeRequest $request, Visatype $visatype)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $visatype, $input );
        //return with successfull message
        return redirect()->route('admin.visatypes.index')->withFlashSuccess(trans('alerts.backend.visatypes.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteVisatypeRequestNamespace  $request
     * @param  App\Models\Visatype\Visatype  $visatype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visatype $visatype, DeleteVisatypeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($visatype);
        //returning with successfull message
        return redirect()->route('admin.visatypes.index')->withFlashSuccess(trans('alerts.backend.visatypes.deleted'));
    }
    
}
