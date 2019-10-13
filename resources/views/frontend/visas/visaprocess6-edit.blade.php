@extends('frontend.layouts.app2')

<style>
    .form-group {
        margin-bottom: 0px ! important;;
    }
	.hover-div:hover{
		background:#ffa274;
	}
</style>
@section('content')
    <section class="wrapper">
       {{-- <div class="container">--}}
            <div class="row">
                <div class="form-outer">
				<div class="title"><p>Confirm Details</p></div>
                    <h3 class="text-center" > <strong>The applicant is requested to verify the particulars filled in the application Form.The applicant may face legal action(including refusal to enter India or deportation) in case of provision of wrong information.</strong></h3>
                    <p class="text-center">Please verify your Registration Details.   If all details are correct please Press <span style="font-size: large">"Verified and Continue"</span>.</p>
                    <p class="text-center">For any corrections press <span style="font-size: large">"Modify/Edit"</span>.</p>
                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process6']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10006 ) }}
                    <h4 class="text-center">Please note down the Temporary Application ID: <span style="color: #ff231c"><strong>{{ $visa->visa_no }}</strong></span></h4>


                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12 text-center">
                            {{-- @if($visa->p5_passport_photo_name)--}}
                            <img style="margin-bottom:20px;" class="imgbor" height="150" width="150" src="{{ Storage::disk('public')->url('img/visaprofile/' . $visa->p4_photo_name) }}">
                            {{--  @endif--}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block">Applicant Details</div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Surname</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_lname}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Name</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_fname}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Previous Surname</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_previous_surname}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Previous Name</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_previous_name}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Sex</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_gender}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Marital Status</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_marital_status}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Birthdate</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_dob}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Religion</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_religion}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>


                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Place of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_town_city_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Country of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_country_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Citizenship/National Id No.</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_national_id}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Educational Qualification</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_education}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Visible Identification Marks</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_visible_marks}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_national_id}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Nationality by</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_birth_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Previous Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_prev_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block">Passport Details</div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Passport No</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_passport_number}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Issue Date</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_passport_date_issue}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Expiry Date</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_passport_date_expiry}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Issue Place</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_passport_place_issue}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Issue of Other Passport</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{($visa->p2_any_other_valid_passport == 1) ? 'Yes' : 'No'}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Country of Issue of Other Passport</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_other_passport_country}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Other Passport Issue Place</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_other_passport_place_issue}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Other Passport No</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_other_passport_number}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Issue Date of Other Passport</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_other_passport_date_issue}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Nationality Described Therein</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p2_other_nationality_mentioned}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block">Applicant's Address Details</div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Present Address</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_house_street}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor"></label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_village_town}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor"></label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_state}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Postal/Zip Code</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_pincode}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Present Phone No</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_phone}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Mobile</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_mobile}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Email</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_email}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Permanent Address</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_house_street2}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor"></label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_village_town2}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor"></label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_state2}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block">Family Details</div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Father Name</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_f_name}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Father Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_f_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Father Previous Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_f_prev_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Father Place of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_f_place_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Father Country of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_f_country_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Mother Name</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_m_name}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Mother Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_m_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Mother Previous Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_m_prev_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Mother Place of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_m_place_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Mother Country of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_m_country_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Spouse Name</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_s_name}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Spouse Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_s_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Spouse Previous Nationality</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_s_prev_nationality}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Spouse Place of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_s_place_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Spouse Country of Birth</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_s_country_birth}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Grandparent details yes/no</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{ ($visa->p3_flag1 == 1) ? 'Yes' : 'No'}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">If Yes, give details</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{ ($visa->p3_flag1 == 1) ? $visa->p3_flag1_detail : ''}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block">Profession / Occupation Details of Applicant</div>
                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Occupation</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_current_occupation}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    @if($visa->p3_current_occupation == "OTHER")  {{--Other--}}
                        <div class="form-group hover-div">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor"></label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p3_other_occupation}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>
                    @elseif($visa->p3_current_occupation == 'STUDENTS' || $visa->p3_current_occupation == "HOME WIFE")
                        <div class="form-group hover-div">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor">Specify below occupation details of</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p3_occupation_hw}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>
                     @endif

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Employee Designation</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_desination}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Employer Name</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_employer}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Employer Address</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_address}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>
                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Employer Phone</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_po_phone}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Previous Occupation</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_past_occupation}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    @if($visa->p3_past_occupation == "OTHER")  {{--Other--}}
                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor"></label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_other_past_occupation}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>
                @endif
                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Security Agency/Organisation</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_other_organization}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Designation</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_other_desination}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Posting</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_other_place_posting}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Rank</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p3_other_rank}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block hover-div">Details of Visa Sought</div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Visa Type</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_visa_type}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">No of Entries</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_number_entries}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Duration</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_visa_duration}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Journey Date</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_edate}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Entry Point</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_port_arrival}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Exit Point</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_expected_port_exit}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Purpose</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p1_visa_type}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    @if($visa->p1_visa_type == 'e-Business Visa')
                    <div class="title_block hover-div">Details of Purpose "TO SET UP INDUSTRIAL/BUSINESS VENTURE" </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"><strong>Details of the Applicants Company</strong></div>
                            <label class="col-sm-3 labelcolor">Name</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_c_name}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor">Address, Phone no</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_c_phone}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor">Website</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_c_website}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"><strong>Details of Indian Firm</strong></div>
                            <label class="col-sm-3 labelcolor">Name</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_f_name}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor">Address, Phone no</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_f_phone}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor">Website</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_f_website}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12"></div>
                            <label class="col-sm-3 labelcolor">Name and contact number of Indian firm</label>
                            <div class="col-sm-1 col-xs-12"></div>
                            <div class="col-sm-3 uppercase valuecolor">
                                {{$visa->p4_business_f_name_contact}}
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>
                @endif
                    <div class="title_block">Previous Visa Details</div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Old Visa Issue</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_visit_india_before}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Old Visa Type</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_type_visa}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Old Visa No</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_last_curr_visa_no}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Old Visa Issue Place</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_place_issue}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Old Visa Issue Date</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_date_issue}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Previous Visit Address</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_address1}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Visited Cities Details</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_city_prev_visit}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Countries Visited Last 10 year</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_country_visited_last_10_y}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Refuse Details/Number of Entry</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{($visa->p4_permission_visit == 'Yes') ? $visa->p4_permission_visit_details : ''}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="title_block">Reference</div>
                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Name of Sponsor in India</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_r_name}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Address of Sponsor in India</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_r_address}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Phone of Sponsor in India</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_r_phone}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Name of Sponsor in Home Country</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_r_h_name}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Address of Sponsor in Home Country</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_r_h_address1}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group hover-div">
                        <div class="col-sm-3 col-xs-12"></div>
                        <label class="col-sm-3 labelcolor">Phone of Sponsor in Home Country</label>
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-3 uppercase valuecolor">
                            {{$visa->p4_r_h_phone}}
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>
<br>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="button" id="modify_edit"  name="submit" value="Modify/Edit"   class="btn-primary submit-btn2">
                            <input style="display: none" type="submit" id="modify_edit_hidden"  name="submit" value="Modify/Edit"   class="btn-primary submit-btn2">
                            <input type="button" id="verified_continue"  name="submit" value="Verified and Continue"   class="btn-primary submit-btn2">
                            <input style="display: none" type="submit" id="verified_continue_hidden"  name="submit" value="Verified and Continue"   class="btn-primary submit-btn2">
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        {{--</div>--}}
    </section>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            $("#verified_continue").click(function() {
                var ok = '"'+"Ok"+'"';
                var cancel = '"'+"Cancel"+'"';
                var msg = "This application is requested to verify the particulers filled in the application Form.The application may face legal action(including refusal to enter india or deportation) in case of provision of wrong information."+ "\n \n Press "+
                        ok+ " to proceed for Final registration OR  \n" +cancel+ " to modify details";
                if(confirm(msg)){
                    $("#verified_continue_hidden").click();
                }
            });

            $("#modify_edit").click(function() {
                var msg = "Are you sure you want to modify Registration details?";
                if(confirm(msg)){
                    $("#modify_edit_hidden").click();
                }
            });
            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection