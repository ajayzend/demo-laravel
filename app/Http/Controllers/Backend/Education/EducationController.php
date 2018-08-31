<?php

namespace App\Http\Controllers\Backend\Education;

use App\Models\Education\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Education\EducationRepository;
use App\Http\Requests\Backend\Education\ManageEducationRequest;
use App\Http\Requests\Backend\Education\CreateEducationRequest;
use App\Http\Requests\Backend\Education\StoreEducationRequest;
use App\Http\Requests\Backend\Education\EditEducationRequest;
use App\Http\Requests\Backend\Education\UpdateEducationRequest;
use App\Http\Requests\Backend\Education\DeleteEducationRequest;

/**
 * EducationController
 */
class EducationController extends Controller
{
    /**
     * variable to store the repository object
     * @var EducationRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param EducationRepository $repository;
     */
    public function __construct(EducationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Education\ManageEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageEducationRequest $request)
    {
        return view('backend.education.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateEducationRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateEducationRequest $request)
    {
        return view('backend.education.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEducationRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.education.index')->withFlashSuccess(trans('alerts.backend.education.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Education\Education  $education
     * @param  EditEducationRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education, EditEducationRequest $request)
    {
        return view('backend.education.edit', compact('education'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEducationRequestNamespace  $request
     * @param  App\Models\Education\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $education, $input );
        //return with successfull message
        return redirect()->route('admin.education.index')->withFlashSuccess(trans('alerts.backend.education.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteEducationRequestNamespace  $request
     * @param  App\Models\Education\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education, DeleteEducationRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($education);
        //returning with successfull message
        return redirect()->route('admin.education.index')->withFlashSuccess(trans('alerts.backend.education.deleted'));
    }
    
}
