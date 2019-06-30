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
use App\Models\Occupation\Occupation;
use App\Models\Visatype\Visatype;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

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
        $evisacountry = Evisacountry::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;
        return view('frontend.home', compact('google_analytics', $google_analytics))->with([
            'evisa_country'       => $evisacountry
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateVisaRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateVisaRequest $request)
    {
        $title = 'India Visa | Apply for Indian Visa Application';
        $description = 'Official Indian e Visa website for e tourist visa (eTV) for 180+ countries across the World such as UK, USA, Australia, Canada, Japan, UAE, NZ, European Countries & Singapore and so many';
        if(strtolower($request->path()) == 'visas/urgent-visa'){
            $title = 'Urgent E- Visa India | Emergency Visa Application Services - Evisaindia.in';
            $description = 'Apply for urgent e-Visa India online by visiting EvisaIndia.in website. All foreigners across the globe can get medical e-visa, business and e-tourist visa.';
        }
        elseif(strtolower($request->path()) == 'visas/tourist-visa'){
            $title = 'Indian Tourist visa Online | Tourist India E-VISA - Evisaindia.in';
            $description = 'Evisaindia.in offers online applications for an Indian tourist e-visa and online assistance for travelers. Apply Online Today.';
        }
        elseif(strtolower($request->path()) == 'visas/medical-visa'){
            $title = 'Indian E-Medical Visa | Online Medical Visa to India - Evisaindia.in';
            $description = 'Evisaindia.in offers medical e-visa for those seeking medical treatment in India reputed specialized hospitals. Apply Online Today!';
        }

        elseif(strtolower($request->path()) == 'visas/business-visa'){
            $title = ' Indian e-Business Visa Online Services | India Business Visa - Evisaindia.in';
            $description = 'Apply for business e-Visa online by visiting the Evisa India website for those seeking business-related trips to India making sales or within and out of the country.';
        }
        $port = Port::getSelectData();
        $evisacountry = Evisacountry::getSelectData();
        return view('frontend.visas.visaprocess1-create')->with([
            'header_title'       => $title,
            'header_description'       => $description,
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
        $visa = $this->repository->create($input);
        $vid = $visa->id;
        $evpuid = $visa->visa_no;
        session()->put('vid', $vid);
        session()->put('evpuid', $evpuid);
        session()->put('process_steps', 10002);
        return redirect()->route('frontend.visas.edit', $vid);
        //return with successfull message
        // return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.created'));
    }

    public function getvisaamendprocess()
    {
        //$settingData = Setting::first();
       // $google_analytics = $settingData->google_analytics;
        //return view('frontend.visas.amendprocess', compact('google_analytics', $google_analytics));
        $visa_notfound = session()->get('visa_notfound2');
        session()->put('visa_notfound2', null);
        return view('frontend.visas.amendprocess')->with([
            'header_title'       => "Apply e-Visa to India | Indian Visa Application",
            'visa_notfound'       => $visa_notfound
        ]);
    }

    public function dopaymentprocess()
    {
        //$settingData = Setting::first();
        // $google_analytics = $settingData->google_analytics;
        //return view('frontend.visas.amendprocess', compact('google_analytics', $google_analytics));
        $visa_notfound = session()->get('visa_notfound');
        session()->put('visa_notfound', null);
        return view('frontend.visas.dopaymentprocess')->with([
            'header_title'       => "Apply e-Visa to India | Indian Visa Application",
            'visa_notfound'       => $visa_notfound
        ]);
    }

    public function getpaymentresponse(StoreVisaRequest $request, VisaRepository $visa)
    {
        $evpuid = session()->get('evpuid');
        $payment_price = session()->get('payment_price');
        $payment_mail_flag = session()->get('payment_mail_flag');
        $payment_status = session()->get('code'); // success or danger
        session()->put('payment_mail_flag', false);

        //$settingData = Setting::first();
        // $google_analytics = $settingData->google_analytics;
        //return view('frontend.visas.amendprocess', compact('google_analytics', $google_analytics));
        $result = $visa->findByVisaNoSlug($evpuid);

        if(!empty(@$result) && $payment_mail_flag) {
            $visaobj = Visa::find(@$result->id);
            $visaobj->payment_status = ($payment_status) ? 'success' : 'failed';
            $visaobj->payment_price = $payment_price;
            if($payment_status == 'success')
                $this->payment_success_email(@$result->p1_fname, @$result->p1_email, @$result->p1_visa_type);
            else
                $this->payment_success_email(@$result->p1_fname, @$result->p1_email, @$result->p1_visa_type);
            $visaobj->save();
            session()->put('payment_mail_flag', false);
            session()->put('payment_price', 0);
            return view('frontend.visas.payment-response')->with([
                'header_title'       => "Apply e-Visa to India | Indian Visa Application"
            ]);
        }
        return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));

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
            $visa->p1_dob = date('d/m/Y', strtotime($visa->p1_dob));
            $visa->p1_edate = date('d/m/Y', strtotime($visa->p1_edate));
            if(isset($visa->p2_passport_date_issue))
                $visa->p2_passport_date_issue = date('d/m/Y', strtotime($visa->p2_passport_date_issue));
            if(isset($visa->p2_passport_date_expiry))
                $visa->p2_passport_date_expiry = date('d/m/Y', strtotime($visa->p2_passport_date_expiry));
            if(isset($visa->p2_other_passport_date_issue))
                $visa->p2_other_passport_date_issue = date('d/m/Y', strtotime($visa->p2_other_passport_date_issue));
            if(isset($visa->p4_date_issue))
                $visa->p4_date_issue = date('d/m/Y', strtotime($visa->p4_date_issue));
           // print "<pre>";print_r($visa);exit;
            if ($process_steps == 10001 || $process_steps == '') {
                $visa->header_title = "Online Indian Visa Form";
                $port = Port::getSelectData();
                $evisacountry = Evisacountry::getSelectData();

              // echo  config('app.consultufee');echo "<br>";
              // echo  config('app.consultnfee');

                //echo "<pre>";print_r($evisacountry);die;
                return view('frontend.visas.visaprocess1-edit')->with([
                    'visa' => $visa,
                    'port_arrival'       => $port,
                    'evisa_country'       => $evisacountry,
                ]);
            }
            else if ($process_steps == 10002){
                $visa->header_title = "e-Visa Indian Visa Form | $visa->p1_visa_type";
                $evisacountry = Evisacountry::getSelectData();
                $port = Port::getSelectData();
                $country = Country::getSelectData();
                $education = Education::getSelectData();
                $religion = Religion::getSelectData();
                $visa->p1_nationality = $evisacountry[$visa->p1_nationality];
                $visa->p1_port_arrival = $port[$visa->p1_port_arrival];
                return view('frontend.visas.visaprocess2-edit')->with([
                    'visa' => $visa,
                    'evisa_country'       => $evisacountry,
                    'country'       => $country,
                    'education'       => $education,
                    'religion'       => $religion
                ]);
            }else if ($process_steps == 10003){
                $visa->header_title = "e-Visa Indian Visa Form | $visa->p1_visa_type";
                $port = Port::getSelectData();
                $evisacountry = Evisacountry::getSelectData();
                $country = Country::getSelectData();
                $education = Education::getSelectData();
                $religion = Religion::getSelectData();
                $occupation = Occupation::getSelectData();
                $visa->p1_port_arrival = $port[$visa->p1_port_arrival];
                return view('frontend.visas.visaprocess3-edit')->with([
                    'visa' => $visa,
                    'evisa_country'       => $evisacountry,
                    'country'       => $country,
                    'education'       => $education,
                    'religion'       => $religion,
                    'occupation'       => $occupation
                ]);
            }
            else if ($process_steps == 10004){
                $visa->header_title = "e-Visa Indian Visa Form | $visa->p1_visa_type";
                if(isset($visa->p4_medical_dob))
                    $visa->p4_medical_dob = date('d/m/Y', strtotime($visa->p4_medical_dob));
                if($visa->p4_saarc_country_year_visit)
                    $visa->p4_saarc_country_year_visit = \GuzzleHttp\json_decode($visa->p4_saarc_country_year_visit, true);
                $port = Port::getSelectData();
                $visatype = Visatype::getSelectData();
                $evisacountry = Evisacountry::getSelectData();
                $country = Country::getSelectData();
                $education = Education::getSelectData();
                $religion = Religion::getSelectData();
                $occupation = Occupation::getSelectData();
                 $visa->p1_port_arrival = $port[$visa->p1_port_arrival];
                return view('frontend.visas.visaprocess4-edit')->with([
                    'visa' => $visa,
                    'port_arrival'       => $port,
                    'visatype'       => $visatype,
                    'evisa_country'       => $evisacountry,
                    'country'       => $country,
                    'education'       => $education,
                    'religion'       => $religion,
                    'occupation'       => $occupation
                ]);
            }
            else if ($process_steps == 10005){
                $visa->header_title = "Document Upload";
                return view('frontend.visas.visaprocess5-edit')->with([
                    'visa' => $visa
                ]);
            }
            else if ($process_steps == 100051){
                $visa->header_title = "Additional Question Details";
                return view('frontend.visas.visaprocess51-edit')->with([
                    'visa' => $visa
                ]);
            }

            else if ($process_steps == 10006){
                $visa->header_title = "Indian e-Visa Application form";
                $religion = Religion::getSelectData();
                $country = Country::getSelectData();
                $education = Education::getSelectData();
                $occupation = Occupation::getSelectData();
                $visatype = Visatype::getSelectData();
                $port = Port::getSelectData();
                $visa->p2_religion = @$religion[$visa->p2_religion];
                $visa->p2_country_birth = @$country[$visa->p2_country_birth];
                $visa->p2_prev_nationality = @$country[$visa->p2_prev_nationality];
                $visa->p2_education = @$education[$visa->p2_education];
                $visa->p2_other_passport_country = @$country[$visa->p2_other_passport_country];
                $visa->p2_other_nationality_mentioned = @$country[$visa->p2_other_nationality_mentioned];

                $visa->p3_f_nationality = @$country[$visa->p3_f_nationality];
                $visa->p3_f_prev_nationality = @$country[$visa->p3_f_prev_nationality];
                $visa->p3_f_country_birth = @$country[$visa->p3_f_country_birth];
                $visa->p3_m_nationality = @$country[$visa->p3_m_nationality];
                $visa->p3_m_prev_nationality = @$country[$visa->p3_m_prev_nationality];
                $visa->p3_m_country_birth = @$country[$visa->p3_m_country_birth];
                $visa->p3_current_occupation = @$occupation[$visa->p3_current_occupation];
                $visa->p3_past_occupation = @$occupation[$visa->p3_past_occupation];
                $visa->p4_type_visa = @$visatype[$visa->p4_type_visa];
                $visa->p1_port_arrival = @$port[$visa->p1_port_arrival];
                $visa->p4_expected_port_exit = @$port[$visa->p4_expected_port_exit];
                return view('frontend.visas.visaprocess6-edit')->with([
                    'visa' => $visa
                ]);
            }else if ($process_steps == 10007){
                $app_type_val = 'urgent';
                if(stripos($visa->p1_app_type, 'normal') !== false){
                    $app_type_val = 'normal';
                }
                $evisacountryfee = Evisacountry::getSelectCustomDataVisaFee();
                $visafee = $evisacountryfee[$visa->p1_nationality];
                $consult_fee = ($app_type_val == 'normal') ? config('app.consultnfee') : config('app.consultufee');

                $visafee = ($visafee) ? $visafee : 100;
                $consult_fee = ($consult_fee) ? $consult_fee : 50;

                $total_fee = $visafee + $consult_fee;

                $total_fee_usd = ($total_fee >= 50) ? $total_fee : 150;
                session()->put('evisafeedollar', $total_fee_usd);
                $total_fee_inr = number_format($total_fee_usd*73.69, 2) ;

                session()->put('visatype', $visa->p1_visa_type);
                session()->put('evisafee', $total_fee_inr);
               // echo "<pre>";print_r( session()->all());die;
                $visa->header_title = "Online Visa Fee Payment";
                return view('frontend.visas.visaprocess7-edit')->with([
                    'visa' => $visa,
                    'total_fee' => $total_fee_inr,
                    'evisafeedollar' => $total_fee_usd
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
        //print "<pre>";print_r($input);exit;
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
                if($input['submit'] == 'Save and Temporarily Exit') {
                    $this->exit_email($visa->p1_fname, $visa->p1_email, $visa->p1_visa_type);
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
                }
                else
                    return redirect()->route('frontend.visas.edit', $vid);
            }

            else if ($process_steps == 10003) {
                $p3_copy_address = @$input['p3_copy_address'];
                if($p3_copy_address != 'yes')
                    $input['p3_copy_address'] = 'no';
                $this->repository->update($visa, $input);
                session()->put('process_steps', 10004);
               if($input['submit'] == 'Save and Temporarily Exit') {
                   $this->exit_email($visa->p1_fname, $visa->p1_email, $visa->p1_visa_type);
                   return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
               }
                else
                    return redirect()->route('frontend.visas.edit', $vid);
            }
            else if ($process_steps == 10004) {
                $p4_saarc_countries_flag = @$input['p4_saarc_countries_flag'];
                if(@$input['p4_photo_name4'] != '')
                    $input['p4_photo_name'] = @$input['p4_photo_name4'];
                if($p4_saarc_countries_flag == 'Yes') {
                    $data = array();
                    $counter = 0;
                    $saarc_country_saved = @$input['saarc_country_saved'];
                    if($saarc_country_saved != '') {
                        foreach ($saarc_country_saved as $saarc_country) {
                            $data[$counter]['saarc_country'] = $saarc_country;
                            $data[$counter]['saarc_year'] = $input['saarc_year_saved'][$counter];
                            $data[$counter]['saarc_visit'] = $input['saarc_visit_saved'][$counter];;
                            $counter++;
                        }
                    }
                    $saarcContainerCount = $input['saarcContainer_czMore_txtCount'];
                    if ($saarcContainerCount > 0) {
                        for ($i = 1; $i <= $saarcContainerCount; $i++) {
                            $saarc_country = $input["saarc_" . $i . "_country"];
                            $saarc_year = $input["saarc_" . $i . "_year"];
                            $saarc_visit = $input["saarc_" . $i . "_visit"];
                            $data[$counter]['saarc_country'] = $saarc_country;
                            $data[$counter]['saarc_year'] = $saarc_year;
                            $data[$counter]['saarc_visit'] = $saarc_visit;
                            $counter++;
                        }
                        $input['p4_saarc_country_year_visit'] = json_encode($data);
                    }
                }else{
                    $input['p4_saarc_country_year_visit'] = '';
                }
                //print "<pre>";print_r($input);exit;
                $this->repository->update($visa, $input);
                session()->put('process_steps', 10005);
                 if($input['submit'] == 'Save and Temporarily Exit') {
                     $this->exit_email($visa->p1_fname, $visa->p1_email, $visa->p1_visa_type);
                     return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
                 }
                else
                    return redirect()->route('frontend.visas.edit', $vid);
            }

            else if ($process_steps == 10005) {
                if(@$input['p5_passport_photo_name5'] != '')
                    $input['p5_passport_photo_name'] = @$input['p5_passport_photo_name5'];
                $this->repository->update($visa, $input);
                session()->put('process_steps', 100051);
                if($input['submit'] == 'Save and Temporarily Exit') {
                    $this->exit_email($visa->p1_fname, $visa->p1_email, $visa->p1_visa_type);
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
                }
                else
                    return redirect()->route('frontend.visas.edit', $vid);
            }

            else if ($process_steps == 100051) {
                $this->repository->update($visa, $input);
                session()->put('process_steps', 10006);
                if($input['submit'] == 'Save and Temporarily Exit') {
                    $this->exit_email($visa->p1_fname, $visa->p1_email, $visa->p1_visa_type);
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
                }
                else
                    return redirect()->route('frontend.visas.edit', $vid);
            }

            else if ($process_steps == 10006) {
                if($input['submit'] == 'Modify/Edit') {
                    session()->put('process_steps', 10001);
                    return redirect()->route('frontend.visas.edit', $vid);
                }
                else {
                    session()->put('process_steps', 10007);
                    return redirect()->route('frontend.visas.edit', $vid);
                }
            }

            else if ($process_steps == 10007) {
                if($input['submit'] == 'Pay Later') {
                    session()->put('process_steps', 10001);
                    //return redirect()->route('frontend.paypal.ec-checkout');
                    $this->payment_later_email($visa->p1_fname, $visa->p1_email, $visa->p1_visa_typ);
                    //return redirect()->action('PayPalController@getExpressCheckout');
                    return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
                }
                else {
                    session()->put('process_steps', 10007);
                   // return redirect()->route('frontend.paypal.ec-checkout');
                    return redirect()->action('PayPalController@getExpressCheckout');
                }
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
        if (!empty($result)) {
            session()->put('process_steps', 10001);
            session()->put('evpuid', $input['evpuid']);
            session()->put('vid', $result->id);
            return redirect()->route('frontend.visas.edit', $result->id);
        } else {
            session()->put('visa_notfound2', 'Your Temporary Application ID Is Not Found!');
            return redirect()->route('frontend.visaamendprocess');
        }
    }

    public function setpaymentprocess(StoreVisaRequest $request, VisaRepository $visa)
    {
        //Input received from the request
        $input = $request->except(['_token']);

        $result = $visa->findByVisaNoSlug($input['evpuid']);
        if(!empty(@$result)) {
            if (!empty(@$result->p5_passport_photo_name)) {
                session()->put('process_steps', 10007);
            } else {
                session()->put('process_steps', 10001);
            }
            session()->put('evpuid', $input['evpuid']);
            session()->put('vid', $result->id);
            return redirect()->route('frontend.visas.edit', $result->id);
        }else{
            session()->put('visa_notfound', 'Your Temporary Application ID Is Not Found!');
            return redirect()->route('frontend.paymentprocess');
        }
    }

    public function exit_email($name, $email, $visatype)
    {
        $template = "evisa-exit-process";
        $subject = "$visatype Application Request for India";
        $bcc = config('app.mailbcc');
        //$name = 'Ajay';
       // Mail::to($email)->cc('ajay.kumar.iimt@gmail.com')->send(new SendMailable($name, $template));
        $name = ucfirst(strtolower($name));
            Mail::to($email)->bcc($bcc)->send(new SendMailable($name, $template, $subject, $visatype));

        return 'Email was sent';
    }

    public function payment_later_email($name, $email, $visatype)
    {
        $template = "payment-later";
        $subject = "$visatype Application Request for India";
        $bcc = config('app.mailbcc');
        //$name = 'Ajay';
        // Mail::to($email)->cc('ajay.kumar.iimt@gmail.com')->send(new SendMailable($name, $template));
        $name = ucfirst(strtolower($name));
        Mail::to($email)->bcc($bcc)->send(new SendMailable($name, $template, $subject, $visatype));

        return 'Email was sent';
    }

    public function payment_success_email($name, $email, $visatype)
    {
        $template = "payment-success";
        $subject = "$visatype Application Request for India";
        $bcc = config('app.mailbcc');
        //$name = 'Ajay';
        // Mail::to($email)->cc('ajay.kumar.iimt@gmail.com')->send(new SendMailable($name, $template));
        $name = ucfirst(strtolower($name));
        Mail::to($email)->bcc($bcc)->send(new SendMailable($name, $template, $subject, $visatype));

        return 'Email was sent';
    }

    public function payment_failed_email($name, $email, $visatype)
    {
        $template = "payment-fail";
        $subject = "$visatype Application Request for India";
        $bcc = config('app.mailbcc');
        //$name = 'Ajay';
        // Mail::to($email)->cc('ajay.kumar.iimt@gmail.com')->send(new SendMailable($name, $template));
        $name = ucfirst(strtolower($name));
        Mail::to($email)->bcc($bcc)->send(new SendMailable($name, $template, $subject, $visatype));

        return 'Email was sent';
    }
}