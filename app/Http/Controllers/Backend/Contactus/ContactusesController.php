<?php

namespace App\Http\Controllers\Backend\Contactus;

use App\Models\Contactus\Contactus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Contactus\ContactusRepository;
use App\Http\Requests\Backend\Contactus\ManageContactusRequest;
use App\Http\Requests\Backend\Contactus\CreateContactusRequest;
use App\Http\Requests\Backend\Contactus\StoreContactusRequest;
use App\Http\Requests\Backend\Contactus\EditContactusRequest;
use App\Http\Requests\Backend\Contactus\UpdateContactusRequest;

/**
 * ContactusesController
 */
class ContactusesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ContactusRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ContactusRepository $repository;
     */
    public function __construct(ContactusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Contactus\ManageContactusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageContactusRequest $request)
    {
        return view('backend.contactuses.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateContactusRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateContactusRequest $request)
    {
        return view('backend.contactuses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContactusRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactusRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.contactuses.index')->withFlashSuccess(trans('alerts.backend.contactuses.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Contactus\Contactus  $contactus
     * @param  EditContactusRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactus $contactus, EditContactusRequest $request)
    {
        return view('backend.contactuses.edit', compact('contactus'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContactusRequestNamespace  $request
     * @param  App\Models\Contactus\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactusRequest $request, Contactus $contactus)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $contactus, $input );
        //return with successfull message
        return redirect()->route('admin.contactuses.index')->withFlashSuccess(trans('alerts.backend.contactuses.updated'));
    }
    
}
