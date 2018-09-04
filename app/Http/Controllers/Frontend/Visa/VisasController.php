<?php

namespace App\Http\Controllers\Frontend\Visa;

use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Visa\VisaRepository;
use App\Http\Requests\Frontend\Visa\ManageVisaRequest;
use App\Http\Requests\Frontend\Visa\CreateVisaRequest;
use App\Http\Requests\Frontend\Visa\StoreVisaRequest;
use App\Http\Requests\Frontend\Visa\EditVisaRequest;
use App\Http\Requests\Frontend\Visa\UpdateVisaRequest;
use App\Models\Port\Port;
use App\Models\Evisacountry\Evisacountry;
use App\Models\Country\Country;
use App\Models\Religion\Religion;
use App\Models\Education\Education;

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
     * @param VisaRepository $repository ;
     */
    public function __construct(VisaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Visa\ManageVisaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageVisaRequest $request)
    {
        return view('frontend.visas.home');
    }


    public function process1(VisaRepository $visa)
    {
        die("okkk");
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
     * @param  CreateVisaRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateVisaRequest $request)
    {
        $port = Port::getSelectData();
        $evisacountry = Evisacountry::getSelectData();
        return view('frontend.visas.visaprocess1-create')->with([
            'port_arrival'       => $port,
            'evisa_country'       => $evisacountry,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVisaRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisaRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.created'));
    }

    public function getvisaamendprocess()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.visas.amendprocess', compact('google_analytics', $google_analytics));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Visa\Visa $visa
     * @param  EditVisaRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Visa $visa, EditVisaRequest $request)
    {

        //print "<pre>";print_r($blogTags);exit;
        $sess_vid = session()->get('vid');
        $process_steps = session()->get('process_steps');
        if ($sess_vid == $visa->id && session()->get('evpuid') != '') {
            $visa->p1_dob = date('d-m-Y', strtotime($visa->p1_dob));
            $visa->p1_edate = date('d-m-Y', strtotime($visa->p1_edate));
            $visa->p2_passport_date_issue = date('d-m-Y', strtotime($visa->p2_passport_date_issue));
            $visa->p2_passport_date_expiry = date('d-m-Y', strtotime($visa->p2_passport_date_expiry));
            $visa->p2_other_passport_date_issue = date('d-m-Y', strtotime($visa->p2_other_passport_date_issue));
            //print "<pre>";print_r($visa);exit;
            if ($process_steps == 10001 || $process_steps == '') {
                $port = Port::getSelectData();
                $evisacountry = Evisacountry::getSelectData();
                return view('frontend.visas.visaprocess1-edit')->with([
                    'visa' => $visa,
                    'port_arrival'       => $port,
                    'evisa_country'       => $evisacountry,
                ]);
            }
            else if ($process_steps == 10002){
                $evisacountry = Evisacountry::getSelectData();
                $country = Country::getSelectData();
                $education = Education::getSelectData();
                $religion = Religion::getSelectData();
                $visa->p1_nationality = $evisacountry[$visa->p1_nationality];
                return view('frontend.visas.visaprocess2-edit')->with([
                    'visa' => $visa,
                    'evisa_country'       => $evisacountry,
                    'country'       => $country,
                    'education'       => $education,
                    'religion'       => $religion
                ]);
            }else if ($process_steps == 10003){
                $evisacountry = Evisacountry::getSelectData();
                $country = Country::getSelectData();
                $education = Education::getSelectData();
                $religion = Religion::getSelectData();
               // $visa->p1_nationality = $evisacountry[$visa->p1_nationality];
                return view('frontend.visas.visaprocess3-edit')->with([
                    'visa' => $visa,
                    'evisa_country'       => $evisacountry,
                    'country'       => $country,
                    'education'       => $education,
                    'religion'       => $religion,
                    'occupation'       => $religion
                ]);
            }

        } else {
            session()->flash('vid');
            session()->flash('evpuid');
            session()->flash('process_steps');
            return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateVisaRequestNamespace $request
     * @param  App\Models\Visa\Visa $visa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisaRequest $request, Visa $visa)
    {
        //Input received from the request
        $input = $request->except(['_token']);
       // print "<pre>";print_r($input);exit;
        $vid = session()->get('vid');
        $sess_evpuid = session()->get('evpuid');
        $process_steps = session()->get('process_steps');
        if ($sess_evpuid == $input['evpuid']) {
            //Update the model using repository update method
            $input['process_steps'] = $process_steps;
            //return with successfull message
            if ($process_steps == 10001 || $process_steps == '') {
                $this->repository->update($visa, $input);
                session()->put('process_steps', 10002);
                return redirect()->route('frontend.visas.edit', $vid);
            }

            else if ($process_steps == 10002) {
                $p2_changed_your_name = @$input['p2_changed_your_name'];
                if($p2_changed_your_name != 'yes')
                    $input['p2_changed_your_name'] = 'no';
                $this->repository->update($visa, $input);
                session()->put('process_steps', 10003);
                if($input['submit'] == 'Save and Temporarily Exit')
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
                else
                    return redirect()->route('frontend.visas.edit', $vid);
            }

            else if ($process_steps == 10003) {
                $p3_copy_address = @$input['p3_copy_address'];
                if($p3_copy_address != 'yes')
                    $input['p3_copy_address'] = 'no';
                $this->repository->update($visa, $input);
                session()->put('process_steps', 10004);
              //  if($input['submit'] == 'Save and Temporarily Exit')
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
               // else
                   // return redirect()->route('frontend.visas.edit', $vid);
            }
            else{

                $this->repository->update($visa, $input);
                //if($input['submit'] == 'Save and Temporarily Exit')
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
            }

        } else {
            die("Not Valid");
            return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
        }
    }

    /**
     * show page by $page_slug.
     */
    public function showVisa($slug, VisaRepository $visa)
    {
        $result = $visa->findBySlug($slug);
        return view('frontend.visas.home')
            ->withvisa($result);
    }

    /**
     * show Visa by evisa process uid.
     */
    public function setvisaamendprocess(StoreVisaRequest $request, VisaRepository $visa)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        $result = $visa->findByVisaNoSlug($input['evpuid']);
        session()->put('process_steps', 10001);
        session()->put('evpuid', $input['evpuid']);
        session()->put('vid', $result->id);
        return redirect()->route('frontend.visas.edit', $result->id);
    }
}
