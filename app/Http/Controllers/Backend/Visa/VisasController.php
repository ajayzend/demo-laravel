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
use App\Models\Port\Port;
use App\Models\Evisacountry\Evisacountry;
use App\Models\Country\Country;
use App\Models\Religion\Religion;
use App\Models\Education\Education;
use App\Models\Occupation\Occupation;
use App\Models\Visatype\Visatype;
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

    /**
     * show page by $page_slug.
     */
    public function showVisa($slug, VisaRepository $visa)
    {
        $port = Port::getSelectData();
        $evisacountry = Evisacountry::getSelectData();
        $country = Country::getSelectData();
        $education = Education::getSelectData();
        $religion = Religion::getSelectData();
        $occupation = Occupation::getSelectData();
        $visatype = Visatype::getSelectData();
        $result = $visa->findBySlug($slug);
        $result->p1_nationality = @$evisacountry[$result->p1_nationality];
        $result->p1_port_arrival = @$port[$result->p1_port_arrival];
        $result->p2_country_birth = @$country[$result->p2_country_birth];
        $result->p2_education = @$education[$result->p2_education];
        $result->p2_prev_nationality = @$country[$result->p2_prev_nationality];
        $result->p2_other_passport_country = @$country[$result->p2_other_passport_country];
        $result->p2_other_nationality_mentioned = @$country[$result->p2_other_nationality_mentioned];
        $result->p2_religion = @$religion[$result->p2_religion];
        $result->p3_country = @$country[$result->p3_country];
        $result->p3_f_nationality = @$country[$result->p3_f_nationality];
        $result->p3_f_prev_nationality = @$country[$result->p3_f_prev_nationality];
        $result->p3_f_country_birth = @$country[$result->p3_f_country_birth];
        $result->p3_m_nationality = @$country[$result->p3_m_nationality];
        $result->p3_m_prev_nationality = @$country[$result->p3_m_prev_nationality];
        $result->p3_m_country_birth = @$country[$result->p3_m_country_birth];
        $result->p3_current_occupation = @$occupation[$result->p3_current_occupation];
        $result->p3_past_occupation = @$occupation[$result->p3_past_occupation];
        $result->p4_expected_port_exit = @$port[$result->p4_expected_port_exit];
        $result->p4_type_visa = @$visatype[$result->p4_type_visa];

        if($result->p4_saarc_country_year_visit)
            $result->p4_saarc_country_year_visit = \GuzzleHttp\json_decode($result->p4_saarc_country_year_visit, true);
        return view('backend.visas.show')
            ->withvisa($result);
    }
    
}
