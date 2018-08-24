<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Backend\Visa\VisaRepository;
use App\Http\Requests\Backend\Visa\ManageVisaRequest;
use App\Http\Requests\Backend\Visa\CreateVisaRequest;
use App\Http\Requests\Backend\Visa\StoreVisaRequest;
use App\Http\Requests\Backend\Visa\EditVisaRequest;
use App\Http\Requests\Backend\Visa\UpdateVisaRequest;

/**
 * VisasController
 */
class VisasProcessController extends Controller
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


    public function visaProcess1(VisaRepository $visa)
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;
        $result = $visa->findByVisaNoSlug('blank');
        return view('frontend.visaprocess.visaprocess1', compact('visa'))->withvisa($result);
        //return view('frontend.visaprocess.visaprocess1', compact('google_analytics', $google_analytics))->withvisa($result);
    }

    public function visaGetProcess1(VisaRepository $visa)
    {
        die("hhh");
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;
        $result = $visa->findByVisaNoSlug('blank');
        return view('frontend.visaprocess.visaprocess1', compact('visa'))->withvisa($result);
        //return view('frontend.visaprocess.visaprocess1', compact('google_analytics', $google_analytics))->withvisa($result);
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
    public function storeVisaProcess1(StoreVisaRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.visas.index')->withFlashSuccess(trans('alerts.backend.visas.created'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVisaRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVisaProcess2(StoreVisaRequest $request)
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
        print "<pre>";print_r($visa);exit;
        //$result = $visa->findByVisaNoSlug('IGVR201808157OSIT8OW');
        //$result = $visa->findByVisaNoSlug('blank');
       // return view('frontend.visaprocess.visaprocess1', compact('visa'))->withvisa($result);
        return view('frontend.visaprocess.visaprocess1', compact('visa'));
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
        //var_dump($visa);
        //echo "<pre>";print_r($input);die;
        //Update the model using repository update method
        $this->repository->update( $visa, $input );
        //return with successfull message
        //return redirect()->route('admin.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
    }

    /**
     * show page by $page_slug.
     */
    public function showVisa($slug, VisaRepository $visa)
    {
        $result = $visa->findBySlug($slug);
        return view('backend.visas.show')
            ->withvisa($result);
    }

    /**
     * show Visa by evisa process uid.
     */
    public function visaAmendmentProcess(StoreVisaRequest $request, VisaRepository $visa)
    {
        //Input received from the request
        $input = $request->except(['_token']);
       // echo "<pre>"; print_r($input);die;
        $result = $visa->findByVisaNoSlug($input['evpuid']);
        $visa_steps = $result->process_steps;
        if($visa_steps == 1){
            return redirect()->route('frontend.evp.processget1', 29);
           // return redirect()->route('frontend.visaprocess.visaprocess1')->withvisa($result);
           return view('frontend.visaprocess.visaprocess1')
                ->withvisa($result);
        }
    }

}
