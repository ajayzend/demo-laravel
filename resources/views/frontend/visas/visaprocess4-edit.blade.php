@extends('frontend.layouts.app2')
@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="title"><p class="text-center">{{ $visa->p1_visa_type }} (eTV) Application</p></div>
            <p class="text-center"><strong>Please note down the Temporary Application ID:</strong> <span class="bred">{{ $visa->visa_no }}</span></p>
            <p class="text-center">Your information will be saved if you click save button or continue to next page. If you exit without doing either of that, your information will be lost.</p>
            <p class="text-center"><strong>Application Type :</strong> <span class="bred">{{ substr($visa->p1_app_type, 0, 17) }}</span></p>
            <div class="row">
                <div class="form-outer">
				
				  <div class="title2">
						<div class="col-md-8" >Details of Visa Sought</div>
						<div class="col-md-4">Help</div>
					</div>
				
                   
					

                        {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process4', 'enctype' => 'multipart/form-data']) }}
                        {{ Form::hidden('evpuid', $visa->visa_no ) }}
                        {{ Form::hidden('ps', 10004 ) }}

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of Visa</label>
                            <div class="col-sm-4 col-xs-12">
                                {{$visa->p1_visa_type}}
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                Selected Visa Type You are Applying For
                            </div>
                        </div>

                    @if($visa->p1_visa_type == 'e-Tourist Visa')
                        <?php $p4_number_entries = 'Double';
                        $duration_label = 'Duration of Visa (in Days)';
                        $duration_value = '30 Days';
                        $duration_hint = 'Duration of Visa is 30 days from date of arrival'; ?>
                    @elseif($visa->p1_visa_type == 'e-Medical Visa' || $visa->p1_visa_type == 'e-Attendant Visa')
                        <?php $p4_number_entries = 'Tripple';
                        $duration_label = 'Duration of Visa (in Days)';
                        $duration_value = '60 Days';
                        $duration_hint = 'Duration of Visa is 60 days from date of arrival'; ?>
                    @else
                        <?php $p4_number_entries = 'Multiple'; ?>
                        @if($visa->p1_visa_type == 'e-Tourist Visa 5 years')
                            <?php $duration_label = 'Duration of Visa (in Years)';
                            $duration_value = '5 years';
                            $duration_hint = 'Duration of Visa is 5 years from date of arrival';?>
                            @else
                            <?php $duration_label = 'Duration of Visa (in Days)';
                            $duration_value = '365 Days';
                            $duration_hint = 'Duration of Visa is 365 days from date of arrival'; ?>
                            @endif
                    @endif

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>{{$duration_label}}</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" type="text" name="p4_visa_duration" readonly="readonly" value="{{$duration_value}}" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                {{$duration_hint}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>No. of Entries</label>
                            <div class="col-sm-4 col-xs-12">
                                   <input type="text" class="form-control" value="{{$p4_number_entries}}" name="p4_number_entries" readonly="readonly" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                No. of Entries
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Port of Arrival in India</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_port_arrival }}
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                Port of Arrival in India
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Expected Port of Exit from India</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($port_arrival))
                                    {{ Form::select('p4_expected_port_exit', $port_arrival, $visa->p4_expected_port_exit, ['class' => 'form-control select2 box-size', 'id' => 'p4_expected_port_exit']) }}
                                @else
                                    {{ Form::select('p4_expected_port_exit', $port_arrival, 0, ['class' => 'form-control select2 box-size', 'id' => 'p4_expected_port_exit']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                Expected Port of Exit from India
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Places Likely To Be Visited</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_place_likely_visit}}" placeholder="Places likely to be Visited" id="p4_place_likely_visit" name="p4_place_likely_visit" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                Places to be Visited
                            </div>
                        </div>
                    @if($visa->p1_visa_type == 'e-Tourist Visa' || $visa->p1_visa_type == 'e-Tourist Visa 1 year' || $visa->p1_visa_type == 'e-Tourist Visa 5 years')
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"> <span>Have you booked any room in Hotel/Resort etc. through any Tour Operator?</span></label>
                        <div class="col-sm-4 col-xs-12">
                            <input  type="radio" value="Yes"  id="p4_booked_operator1" name="p4_booked_operator"   {{ $visa->p4_booked_operator == 'Yes' ? 'checked="checked"' : '' }}/><span>Yes</span>
                            <input  type="radio" value="No" id="p4_booked_operator2" name="p4_booked_operator" {{ $visa->p4_booked_operator == 'No' ? 'checked="checked"' : '' }}  /><span>No</span>
                        </div>
                        <div class="col-sm-4 col-xs-12 des">&nbsp;</div>
                    </div>


                    <div id="tour_operator_details">
                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label">Name of the tour operator </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_name_tour_operator}}" placeholder="Name of the tour operator" id="p4_name_tour_operator" name="p4_name_tour_operator"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">&nbsp;
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label">Address of the tour operator</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_address_tour_operator}}" placeholder="Address of the tour operator" id="p4_address_tour_operator" name="p4_address_tour_operator"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">&nbsp;
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label">Name of Hotel/Resort etc</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_name_tour_hotel}}" placeholder="Name of Hotel/Resort etc" id="p4_name_tour_hotel" name="p4_name_tour_hotel"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">&nbsp;
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label">Place/City of Hotel/Resort etc</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_place_hotel}}" placeholder="Place/City of Hotel/Resort etc" id="p4_place_hotel" name="p4_place_hotel"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">&nbsp;
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($visa->p1_visa_type == 'e-Business Visa')
                        <div class="title"><p>Details of Purpose "TO SET UP INDUSTRIAL/BUSINESS VENTURE"</p></div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>
                            <div class="col-sm-8 col-xs-12"><h3 class="heading"><strong>Details of the Applicants Company</strong></h3></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_c_name}}" placeholder="Name" id="p4_business_c_name" name="p4_business_c_name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Address, Phone no</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_c_phone}}" placeholder="Address, Phone no" id="p4_business_c_phone" name="p4_business_c_phone" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Website</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_c_website}}" placeholder="Website" id="p4_business_c_website" name="p4_business_c_website" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>
                            <div class="col-sm-8 col-xs-12"><h3 class="heading"><strong>Details of Indian Firm</strong></h3></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_f_name}}" placeholder="Name" id="p4_business_f_name" name="p4_business_f_name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Address, Phone no</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_f_phone}}" placeholder="Address, Phone no" id="p4_business_f_phone" name="p4_business_f_phone" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Website</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_f_website}}" placeholder="Website" id="p4_business_f_website" name="p4_business_f_website" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Name and contact number of Indian firm :</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_business_f_name_contact}}" placeholder="Name and contact number of Indian firm" id="p4_business_f_name_contact" name="p4_business_f_name_contact" />
                            </div>
                        </div>
                    @endif

                    @if($visa->p1_visa_type == 'e-Attendant Visa')
                        <div class="title"><p>Details of Purpose "TO ACCOMPANY PATIENT TRAVELLING TO INDIA ON EMEDICAL VISA"</p></div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Name of the principal e-Medical Visa holder (i.e. the patient)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{$visa->p4_medical_name}}" placeholder="Name of the principal e-Medical Visa holder" id="p4_medical_name" name="p4_medical_name" />
                            </div>

                            <div class="col-sm-4 col-xs-12 des">
                                Name of the principal e-Medical Visa holder (i.e. the patient)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Visa No. / Application id of principal e-Medical Visa holder</label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="radio" value="Yes"  id="p4_medical_id_flag1" name="p4_medical_id_flag"   {{ $visa->p4_medical_id_flag == 'Yes' ? 'checked="checked"' : '' }}/><span>Visa No</span>
                                <input  type="radio" value="No" id="p4_medical_id_flag2" name="p4_medical_id_flag" {{ $visa->p4_medical_id_flag == 'No' ? 'checked="checked"' : '' }}  /><span>Application id</span>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">Please select Visa No or Application id</div>
                        </div>

                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label" id="label_change"><span class="star">*</span>Application id of principal e-Medical Visa holder </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_medical_id}}" placeholder="Visa number or Application id or of principal e-Medical Visa holde" id="p4_medical_id" name="p4_medical_id"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Visa number or Application id or of principal e-Medical Visa holder
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Passport number of principal e-Medical Visa holder </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="Passport number of principal e-Medical Visa holder" value="{{$visa->p4_medical_passport}}" placeholder="" id="p4_medical_passport" name="p4_medical_passport"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Passport number of principal e-Medical Visa holder
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Date of birth of principal e-Medical Visa holder </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="Date of birth of principal e-Medical Visa holder" value="{{$visa->p4_medical_dob}}" id="p1_dob" name="p4_medical_dob"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                (DD/MM/YYYY)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Nationality of principal e-Medical Visa holder </label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p4_medical_nationality', $country, $visa->p4_medical_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p4_medical_nationality']) }}
                                @else
                                    {{ Form::select('p4_medical_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p4_medical_nationality']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Nationality of principal e-Medical Visa holder
                            </div>
                        </div>
                    @endif

					<div class="title"><p>Previous Visa/Currently valid Visa Details</p></div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span>Have You Ever Visited India Before?</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="radio" value="Yes"  id="p4_visit_india_before1" name="p4_visit_india_before"   {{ $visa->p4_visit_india_before == 'Yes' ? 'checked="checked"' : '' }}/><span>Yes</span>
                                <input  type="radio" value="No" id="p4_visit_india_before2" name="p4_visit_india_before" {{ $visa->p4_visit_india_before == 'No' ? 'checked="checked"' : '' }}  /><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">If Yes Please Give Details</div>
                        </div>

                        <div id="prev_visa_details">
                            <div class="form-group" >
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Address </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Address" value="{{$visa->p4_address1}}" placeholder="Address" id="p4_address1" name="p4_address1"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Enter The Address of Stay During Your Last Visit
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Cities Previously Visited in India  </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" value="{{$visa->p4_city_prev_visit}}" placeholder="Cities Previously Visited in India" class="form-control" id="p4_city_prev_visit" name="p4_city_prev_visit" >
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Cities in India visited (comma separated)
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Indian Visa No/Currently Valid Indian Visa No</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" type="text" value="{{$visa->p4_last_curr_visa_no}}"  placeholder="Last Indian Visa No/Currently Valid Indian Visa No" class="form-control" id="p4_last_curr_visa_no" name="p4_last_curr_visa_no" >
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Last Indian Visa No / Currently valid Visa no
                                </div>
                            </div>
                            <!--	<div class="form-group">
                               <input class="form-control" placeholder="House No./Street"  id="perm_address1" name="perm_address1" />
                               </div>-->
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of Visa</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($visatype))
                                        {{ Form::select('p4_type_visa', $visatype, $visa->p4_type_visa, ['class' => 'form-control select2 box-size', 'id' => 'p4_type_visa']) }}
                                    @else
                                        {{ Form::select('p4_type_visa', $visatype, 0, ['class' => 'form-control select2 box-size', 'id' => 'p4_type_visa']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Type of Visa
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Place of Issue" id="p4_place_issue"  value="{{$visa->p4_place_issue}}" name="p4_place_issue"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Place of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_date_issue}}"   id="p4_date_issue" name="p4_date_issue" placeholder="Date of Issue" type="text"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Date of Issue
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Has Permission To Visit Or To Extend Stay in India Previously Been Refused?
                                Yes  / No  </label>
                            <div class="col-sm-4 col-xs-12">
                                Yes <input  type="radio" {{ $visa->p4_permission_visit == 'Yes' ? 'checked="checked"' : ''}} name="p4_permission_visit"  value="Yes"  id="p4_permission_visit1"  />
                                No  <input  type="radio" value="No"  {{ $visa->p4_permission_visit == 'No' ? 'checked="checked"' : ''}} name="p4_permission_visit"  id="p4_permission_visit2"  />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Refuse Details Yes /No
                            </div>
                        </div>
                        <div class="form-group" id="p4_permission_visit_details_id">
                            <label class="form-check-label col-sm-4 col-xs-12">	If So, When And By Whom (Mention Control No. and Date Also)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_permission_visit_details}}" placeholder="By Whom" name="p4_permission_visit_details"  id="p4_permission_visit_details"  />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                If Yes, when and by whom (mention Control no and date)
                            </div>
                        </div>
<div class="title"><p>Other Information</p></div>


                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Countries visited in last 10 years	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_country_visited_last_10_y}}"  placeholder="Countries Visited in Last 10 Years" id="p4_country_visited_last_10_y" name="p4_country_visited_last_10_y" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Countries Visited in Last 10 Years (Comma Separated)
                            </div>
                        </div>

<div class="title"><p>SAARC Country Visit Details</p></div>

                    <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Have You Visited SAARC Countries (Except Your Own Country) during last 3 years?</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio" {{$visa->p4_saarc_countries_flag == 'Yes' ? 'checked="checked"' : ''}}  id="p4_saarc_countries_flag1" name="p4_saarc_countries_flag"  value="Yes"/><span>yes</span>
                                <input type="radio"  {{$visa->p4_saarc_countries_flag == 'No' ? 'checked="checked"' : ''}} id="p4_saarc_countries_flag2" name="p4_saarc_countries_flag"  value="No"/><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Have you visited "South Asian Association for Regional Cooperation" (SAARC) countries (except your own country) during last 3 years? Yes /No
                            </div>
                    </div>

                    {{--start saved value populated--}}
                    <div id="saarc_data_saved">
                        <?php
                            if($visa->p4_saarc_country_year_visit != '') {
                        foreach($visa->p4_saarc_country_year_visit as $key=>$rows) {?>
                        <div  class="fieldRow clearfix">
                            <div class="col-md-2 col-md-offset-1">
                                <div  class="form-group">
                                    <label for="id_saarc_2_country" class="control-label  requiredField">
                                        Name of SAARC country<span class="star">*</span>
                                    </label><div class="controls ">
                                        <select required class="select form-control" id="saarc_country_saved_<?php echo $key;?>" name="saarc_country_saved[]">
                                            {{-- <option value="" selected="selected">Select</option>--}}
                                            <option <?php if($rows['saarc_country'] == 'AFGHANISTAN') echo 'selected="selected"' ?> value="AFGHANISTAN" title="AFGHANISTAN"> AFGHANISTAN</option>
                                            <option <?php if($rows['saarc_country'] == 'BHUTAN') echo 'selected="selected"' ?> value="BHUTAN" title="BHUTAN"> BHUTAN</option>
                                            <option <?php if($rows['saarc_country'] == 'PAKISTAN') echo 'selected="selected"' ?> value="PAKISTAN" title="PAKISTAN"> PAKISTAN</option>
                                            <option <?php if($rows['saarc_country'] == 'MALDIVES') echo 'selected="selected"' ?> value="MALDIVES" title="MALDIVES"> MALDIVES</option>
                                            <option <?php if($rows['saarc_country'] == 'BANGLADESH') echo 'selected="selected"' ?> value="BANGLADESH" title="BANGLADESH"> BANGLADESH</option>
                                            <option <?php if($rows['saarc_country'] == 'SRI LANKA') echo 'selected="selected"' ?> value="SRI LANKA" title="SRI LANKA"> SRI LANKA</option>
                                            <option <?php if($rows['saarc_country'] == 'NEPAL') echo 'selected="selected"' ?> value="NEPAL" title="NEPAL"> NEPAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div id="div_id_saarc_2_year" class="form-group">
                                    <label for="id_saarc_2_year" class="control-label  requiredField">
                                        Year<span class="star">*</span>
                                    </label><div class="controls ">
                                        <select required class="select form-control" id="saarc_year_saved_<?php echo $key;?>" name="saarc_year_saved[]">
                                            {{-- <option value="" selected="selected">Select</option>--}}
                                            <option <?php if($rows['saarc_year'] == '2018') echo 'selected="selected"' ?> value="2018">2018</option>
                                            <option <?php if($rows['saarc_year'] == '2017') echo 'selected="selected"' ?> value="2017">2017</option>
                                            <option <?php if($rows['saarc_year'] == '2016') echo 'selected="selected"' ?> value="2016">2016</option>
                                            <option <?php if($rows['saarc_year'] == '2015') echo 'selected="selected"' ?> value="2015">2015</option>
                                            <option <?php if($rows['saarc_year'] == '2014') echo 'selected="selected"' ?> value="2014">2014</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div id="div_id_saarc_2_visit" class="form-group">
                                    <label for="id_saarc_2_visit" class="control-label  requiredField">
                                        No. of visits<span class="star">*</span>
                                    </label><div class="controls ">
                                        <input  class="numberinput form-control" required value="<?php echo $rows['saarc_visit']; ?>" id="saarc_visit_saved_<?php echo $key;?>" name="saarc_visit_saved[]" step="0.01" type="number" /> </div>
                                </div>
                            </div>
                        </div>
                        <?php } }?>
                    </div>
                    {{--end saved value populated--}}
                    <div id="saarcContainer">
                        <div id="first">
                            <div class="recordset">
                                <div class="fieldRow clearfix">
                                    <div class="col-md-2 col-md-offset-1">
                                        <div id="div_id_saarc_1_country" class="form-group">
                                            <label for="id_saarc_1_country" class="control-label  requiredField">
                                                Name of SAARC country<span class="star">*</span>
                                            </label><div class="controls ">
                                                <select required class="select form-control" id="id_saarc_1_country" name="saarc_1_country">
                                                    <option value="" selected="selected">Select</option>
                                                    <option value="AFGHANISTAN" title="AFGHANISTAN"> AFGHANISTAN</option>
                                                    <option value="BHUTAN" title="BHUTAN"> BHUTAN</option>
                                                    <option value="PAKISTAN" title="PAKISTAN"> PAKISTAN</option>
                                                    <option value="MALDIVES" title="MALDIVES"> MALDIVES</option>
                                                    <option value="BANGLADESH" title="BANGLADESH"> BANGLADESH</option>
                                                    <option value="SRI LANKA" title="SRI LANKA"> SRI LANKA</option>
                                                    <option value="NEPAL" title="NEPAL"> NEPAL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div id="div_id_saarc_1_year" class="form-group">
                                            <label for="id_saarc_1_year" class="control-label  requiredField">
                                                Year<span class="star">*</span>
                                            </label><div class="controls ">
                                                <select required class="select form-control" id="id_saarc_1_year" name="saarc_1_year">
                                                    <option value="" selected="selected">Select</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div id="div_id_saarc_1_visit" class="form-group">
                                            <label for="id_saarc_1_visit" class="control-label  requiredField">
                                                No. of visits<span class="star">*</span>
                                            </label><div class="controls ">
                                                <input class="numberinput form-control" required id="id_saarc_1_visit" name="saarc_1_visit" step="0.01" type="number" /> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-8 col-xs-12">
                            <h3></h3>
                        </div>
                    </div>

              
					<div class="title"><p>Reference</p></div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Name or Hotel Name in India</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  value="{{$visa->p4_r_name}}" placeholder="Reference Name or Hotel Name in India" id="p4_r_name" name="p4_r_name" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Reference Name or Hotel Name in India
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Address or Hotel Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_address}}" placeholder="Reference Address or Hotel Address" id="p4_r_address" name="p4_r_address" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> City</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Reference City" value="{{$visa->p4_r_city}}" id="p4_r_city" name="p4_r_city" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> State</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  value="{{$visa->p4_r_state}}" placeholder="Reference State" id="p4_r_state" name="p4_r_state" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Country </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Reference country" id="p4_r_country" value="{{$visa->p4_r_country}}" name="p4_r_country" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> ZIP Code / POST Code</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_pincode}}" placeholder="Postal code" id="p4_r_pincode" name="p4_r_pincode" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>  Phone no</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_phone}}"  placeholder="Reference Phone no" id="p4_r_phone" name="p4_r_phone" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Name in Home Country</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Reference Country" id="p4_r_h_name" value="{{$visa->p4_r_h_name}}"  name="p4_r_h_name" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Reference Name and Address in Home Country
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_h_address1}}" placeholder="Address" id="p4_r_h_address1" name="p4_r_h_address1" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Address
                                </div>
                            </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"></label>
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" class="form-control" value="{{$visa->p4_r_h_address2}}" placeholder="City & State" id="p4_r_h_address2" name="p4_r_h_address2" />
                        </div>
                        <div class="col-sm-4 col-xs-12">

                        </div>
                    </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Phone</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_h_phone}}" placeholder="Phone" id="p4_r_h_phone" name="p4_r_h_phone" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Phone no
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="text-center"> To upload Photo click "Browse" .Click "Save and Continue" to directly proceed without photo upload</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12 picture text-center">
                                    <img height="220" width="220" id="profileimg" src="{{ Storage::disk('public')->url('img/visaprofile/' . $visa->p4_photo_name) }}">
                                    {{--<img id="profileimg" height="220" width="220" src="{{ URL::asset('img/frontend/images/photo_not_available.png')}}">--}}
                                    <img id="blah" height="220" width="220" src="{{ URL::asset('img/frontend/images/second.png')}}">
                                </div>
                               
                            </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-xs-12"> </div>
                        <div class="col-sm-8 col-xs-12 picture">
                            <p style="color: #f00;font-size: 18px;">Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here</p>
                        </div>
                        <div class="col-sm-2 col-xs-12"> </div>
                    </div>
                            {{--<div class="form-group">
                                <div class="col-sm-2 col-xs-12">
                                </div>
                                <div class="col-sm-10 col-xs-12">
                                    <!-- <input type="file" class="btn-primary" name="file" id="image" >   -->
                                    <p style="color: #f00;font-size: 18px;">Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here</p>
<span class="btn btn-default btn-file">
				Browse <input  onchange="readURL(this);" type="file" value="photo_not_available.png" name="p4_photo_name" id="image">
</span>
                                </div>
                            </div>--}}


                    <div class="form-group">
                        {{--{{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}--}}
                        <div class="col-sm-4 col-xs-12"> </div>
                        <div class="col-lg-4">

                            <div class="custom-file-input">
                                {!! Form::file($visa->p4_photo_name ? 'p4_photo_name4' : 'p4_photo_name', array('class'=>'form-control inputfile inputfile-1', 'onchange'=>"readURL(this)")) !!}
                                <label for="logo">
                                    <i class="fa fa-upload"></i>
                                    <span>Choose a file</span>
                                </label>
                            </div>
                        </div>
                        <!--col-lg-10-->

                        <div class="col-sm-4 col-xs-12"> </div>
                    </div>
                    <!--form control-->


                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" ></label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="submit" name="submit" value="Save And Continue" id="p4_submit_button" class="btn-primary submit-btn2">
                                    <input type="submit"  name="submit" id="p4_submit_button_exit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
                                </div>
                            </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            $("#p4_visit_india_before1").change(function() {
                if ($("#p4_visit_india_before1").is(":checked")) {
                    $("#prev_visa_details").show();
                    $("#p4_address1").attr("disabled", false);
                    $("#p4_city_prev_visit").attr("disabled", false);
                    $("#p4_last_curr_visa_no").attr("disabled", false);
                    $("#p4_type_visa").attr("disabled", false);
                    $("#p4_place_issue").attr("disabled", false);
                    $("#p4_date_issue").attr("disabled", false);
                }
            }).trigger('change');

            $("#p4_visit_india_before2").change(function() {
                if ($("#p4_visit_india_before2").is(":checked")) {
                    $("#prev_visa_details").hide();
                    $("#p4_address1").attr("disabled", true);
                    $("#p4_city_prev_visit").attr("disabled", true);
                    $("#p4_last_curr_visa_no").attr("disabled", true);
                    $("#p4_type_visa").attr("disabled", true);
                    $("#p4_place_issue").attr("disabled", true);
                    $("#p4_date_issue").attr("disabled", true);
                }else if (!$("#p4_visit_india_before1").is(":checked")) {
                    $("#prev_visa_details").hide();
                    $("#p4_address1").attr("disabled", true);
                    $("#p4_city_prev_visit").attr("disabled", true);
                    $("#p4_last_curr_visa_no").attr("disabled", true);
                    $("#p4_type_visa").attr("disabled", true);
                    $("#p4_place_issue").attr("disabled", true);
                    $("#p4_date_issue").attr("disabled", true);
                }
            }).trigger('change');


            $("#p4_permission_visit1").change(function() {
                if ($("#p4_permission_visit1").is(":checked")) {
                    $("#p4_permission_visit_details_id").show();
                }
            }).trigger('change');

            $("#p4_permission_visit2").change(function() {
                if ($("#p4_permission_visit2").is(":checked")) {
                    $("#p4_permission_visit_details_id").hide();
                }else if (!$("#p4_permission_visit1").is(":checked")) {
                    $("#p4_permission_visit_details_id").hide();
                }
            }).trigger('change');

            $("#p4_saarc_countries_flag1").change(function() {
                if ($("#p4_saarc_countries_flag1").is(":checked")) {
                    $("#saarc_data_saved").show();
                    $("#btnPlus").show();

                    if(!$("#saarc_country_saved_0").val())
                        $("#btnPlus").click();

                    $("#btnMinus").hide();
                    $("#saarcContainer").show();
                }
            }).trigger('change');

            $("#p4_saarc_countries_flag2").change(function() {
                if ($("#p4_saarc_countries_flag2").is(":checked")) {
                    $(".minusclick").click();
                    $("#saarc_data_saved").hide();
                    $("#btnPlus").hide();
                    $("#saarcContainer").hide();
                }
            }).trigger('change');


            $("#p4_medical_id_flag1").change(function() {
                if ($("#p4_medical_id_flag1").is(":checked")) {
                    $("#label_change").html('<span class="star">*</span>Visa number of principal e-Medical Visa holder');
                }
            }).trigger('change');

            $("#p4_medical_id_flag2").change(function() {
                if ($("#p4_medical_id_flag2").is(":checked")) {
                    $("#label_change").html('<span class="star">*</span>Application id of principal e-Medical Visa holder');
                }else if (!$("#p4_medical_id_flag1").is(":checked")) {
                    $("#label_change").html('<span class="star">*</span>Visa number of principal e-Medical Visa holder')
                }
            }).trigger('change');


            $("#p4_booked_operator1").change(function() {
                if ($("#p4_booked_operator1").is(":checked")) {
                    $("#tour_operator_details").show();
                    $("#p4_name_tour_operator").attr("disabled", false);
                    $("#p4_address_tour_operator").attr("disabled", false);
                    $("#p4_name_tour_hotel").attr("disabled", false);
                    $("#p4_place_hotel").attr("disabled", false);
                }
            }).trigger('change');

            $("#p4_booked_operator2").change(function() {
                if ($("#p4_booked_operator2").is(":checked")) {
                    $("#tour_operator_details").hide();
                    $("#p4_name_tour_operator").attr("disabled", true);
                    $("#p4_address_tour_operator").attr("disabled", true);
                    $("#p4_name_tour_hotel").attr("disabled", true);
                    $("#p4_place_hotel").attr("disabled", true);
                }else if (!$("#p4_booked_operator1").is(":checked")) {
                    $("#tour_operator_details").hide();
                    $("#p4_name_tour_operator").attr("disabled", true);
                    $("#p4_address_tour_operator").attr("disabled", true);
                    $("#p4_name_tour_hotel").attr("disabled", true);
                    $("#p4_place_hotel").attr("disabled", true);
                }
            }).trigger('change');


            // To Use Select2
            // Backend.Select2.init();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileimg')
                            .attr('src', e.target.result)
                            .width(220)
                            .height(220);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#p4_submit_button").click(function() {
            var return_bool = false;

            /*if ((!$("#p4_medical_id_flag1").is(":checked")) && (!$("#p4_medical_id_flag2").is(":checked"))) {
                $("#p4_medical_id_flag1").focus();
                $("#p4_medical_id_flag2").focus();
                alert("Please choose Visa No. / Application id of principal e-Medical Visa holder");
                return false;
            }else{
                return_bool = true;
            }*/

            if ((!$("#p4_visit_india_before1").is(":checked")) && (!$("#p4_visit_india_before2").is(":checked"))) {
                $("#p4_visit_india_before1").focus();
                $("#p4_visit_india_before2").focus();
                alert("Please choose Yes or No option for (Have You Ever Visited India Before?)");
                return false;
            }else{
                return_bool = true;
            }

            if ((!$("#p4_permission_visit1").is(":checked")) && (!$("#p4_permission_visit2").is(":checked"))) {
                $("#p4_permission_visit1").focus();
                $("#p4_permission_visit2").focus();
                alert("Please choose Yes or No option for (Has Permission To Visit Or To Extend Stay in India Previously Been Refused? Yes / No)");
                return false;
            }else{
                return_bool = true;
            }

            if ((!$("#p4_saarc_countries_flag1").is(":checked")) && (!$("#p4_saarc_countries_flag2").is(":checked"))) {
                $("#p4_saarc_countries_flag1").focus();
                $("#p4_saarc_countries_flag2").focus();
                alert("Please choose Yes or No option for (Have You Visited SAARC Countries (Except Your Own Country) during last 3 years?)");
                return false;
            }else{
                return_bool = true;
            }

            return return_bool;
        });

        $("#p4_submit_button_exit").click(function() {
            var return_bool = false;
            var msg1 = 'Are you sure you want to Temporary Exit?';
            if(confirm(msg1)){
                alert("Your Reference No. is {{$visa->visa_no}}");
                return true;
            }else{
                return_bool = false;
            }
            return return_bool;
        });

        $("#saarcContainer").czMore();
    </script>
@endsection