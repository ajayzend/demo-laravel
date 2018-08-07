<?php

namespace App\Http\Controllers\Backend\Visa;

use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Visa\VisaRepository;
use App\Http\Requests\Backend\Visa\ManageVisaRequest;
use App\Http\Requests\Backend\Visa\CreateVisaRequest;
use App\Http\Requests\Backend\Visa\StoreVisaRequest;
use App\Http\Requests\Backend\Visa\EditVisaRequest;
use App\Http\Requests\Backend\Visa\UpdateVisaRequest;

/**
 * VisasController
 */
class VisasController extends Controller
{
    /**
     * variable to store the repository object
     * @var VisaRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param VisaRepository $repository;
     */
    public function __construct(VisaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Visa\ManageVisaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageVisaRequest $request)
    {
        return view('backend.visas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateVisaRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateVisaRequest $request)
    {
        return view('backend.visas.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVisaRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisaRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.visas.index')->withFlashSuccess(trans('alerts.backend.visas.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Visa\Visa  $visa
     * @param  EditVisaRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Visa $visa, EditVisaRequest $request)
    {
        return view('backend.visas.edit', compact('visa'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateVisaRequestNamespace  $request
     * @param  App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisaRequest $request, Visa $visa)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $visa, $input );
        //return with successfull message
        return redirect()->route('admin.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
    }
    
}
