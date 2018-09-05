@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <h4 class="text-center">Port of arrival : {{ $visa->p1_port_arrival }}</h4>
            <h4 class="text-center">Application Type : {{ $visa->p1_app_type }}</h4>
            <h4 class="text-center">Data saved Successfully.Please note down the Temporary Application ID:  {{ $visa->visa_no }}</h4>
            <div class="row1">

                <div class="form-outer">
                    <div class="title">
                        <div class="form-group">
                            <div class="col-sm-8 col-xs-12">

                                <h3> Applicant's Address Details</h3>

                            </div>
                            <div class="col-sm-4 col-xs-12">

                                <h3> 	Help</h3>

                            </div>

                        </div>
                    </div>
                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process3']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10003 ) }}

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h3 class="heading">Present Address</h3> </div>


                        </div>
                        <div class="form-group">

                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>House No./Street </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="House No./Street" id="p3_house_street" name="p3_house_street" value="{{ $visa->p3_house_street }}" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Present Address. Maximum 35 characters (Each Line)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Village/Town/City</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="Village/Town/City" id="p3_village_town" name="p3_village_town" value="{{ $visa->p3_village_town }}"/>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Village/Town/City
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>State/Province/District</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="State/Province/District" id="p3_state" name="p3_state" value="{{ $visa->p3_state }}" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                State/Province/District
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Postal/Zip Code</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_pincode }}"  placeholder="Postal/Zip Code"  id="p3_pincode" name="p3_pincode"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Postal Zip Code
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Country</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_country', $country, $visa->p3_country, ['class' => 'form-control select2 box-size', 'id' => 'p3_country']) }}
                                @else
                                    {{ Form::select('p3_country', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_country']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Country
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Phone No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_phone }}" placeholder="Phone No." id="p3_phone" name="p3_phone" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                One Contact No is Mandatory
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Mobile No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_mobile }}" placeholder="Mobile No." id="p3_mobile" name="p3_mobile" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Mobile no
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Click Here for Same Address</label>


                            <div class="col-sm-8 col-xs-12">
                                <input type="checkbox" id="p3_copy_address" name="p3_copy_address" class="form-check" {{ $visa->p3_copy_address == 'yes' ? 'Checked="Checked"' : '' }}  value="yes">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h5 class="heading">Permanent Address</h5></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>House No./Street  </label>
                            <div class="col-sm-4 col-xs-12">

                                <input class="form-control" placeholder="House No./Street " value="{{ $visa->p3_house_street2 }}"  id="p3_house_street2" name="p3_house_street2"/>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Permanent Address(with Postal/Zip Code)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Village/Town/City</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_village_town2 }}"  placeholder="Village/Town/City" id="p3_village_town2" name="p3_village_town2" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Village/Town/City
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">State/Province/District</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="State/Province/District" id="p3_state2" value="{{ $visa->p3_state2 }}" name="p3_state2" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                State/Province/District
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="title2">
                                <div class="col-sm-8 col-xs-12 title"><h3>Family Details</h3></div>
                                <div class="col-sm-4 col-xs-12"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h5 class="heading">Father's Details</h5></div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_f_name }}" placeholder="Name. " name="p3_f_name"  id="p3_f_name"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Father Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_f_nationality', $country, $visa->p3_f_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p3_f_nationality']) }}
                                @else
                                    {{ Form::select('p3_f_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_f_nationality']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Nationality of Father
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Previous Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_f_prev_nationality', $country, $visa->p3_f_prev_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p3_f_prev_nationality']) }}
                                @else
                                    {{ Form::select('p3_f_prev_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_f_prev_nationality']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Previous Nationality of Father
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Place of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_f_place_birth }}"  placeholder="Place of Birth" id="p3_f_place_birth" name="p3_f_place_birth" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Place of birth
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Country of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_f_country_birth', $country, $visa->p3_f_country_birth, ['class' => 'form-control select2 box-size', 'id' => 'p3_f_country_birth']) }}
                                @else
                                    {{ Form::select('p3_f_country_birth', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_f_country_birth']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Country of Birth
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h5 class="heading">Mother's Details</h5></div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_m_name }}"   placeholder="Name" id="p3_m_name" name="p3_m_name"/>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Mother Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_m_nationality', $country, $visa->p3_m_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p3_m_nationality']) }}
                                @else
                                    {{ Form::select('p3_m_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_m_nationality']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Nationality of Mother
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Previous Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_m_prev_nationality', $country, $visa->p3_m_prev_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p3_m_prev_nationality']) }}
                                @else
                                    {{ Form::select('p3_m_prev_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_m_prev_nationality']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Previous Nationality of Mother
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control"  value="{{ $visa->p3_m_place_birth }}" placeholder="Place of Birth" id="p3_m_place_birth" name="p3_m_place_birth" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Place of birth
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Country of Birth </label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p3_m_country_birth', $country, $visa->p3_m_country_birth, ['class' => 'form-control select2 box-size', 'id' => 'p3_m_country_birth']) }}
                                @else
                                    {{ Form::select('p3_m_country_birth', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_m_country_birth']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Country of Birth
                            </div>
                        </div>
                        <br> <div class="form-group"> <div class="title2">
                                <label class="col-sm-8 col-xs-12 title"></label>
                                <label class="col-sm-4 col-xs-12"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Applicant's Marital Status </label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control"  id="p3_marital_status" name="p3_marital_status">
                                    <option value="0" > Applicant's Marital Status </option>
                                    <option {{ $visa->p3_marital_status == 'Married' ? 'selected="selected"' : '' }} value="Married">Married </option>
                                    <option {{ $visa->p3_marital_status == 'Single' ? 'selected="selected"' : '' }} value="Single">Single </option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Maritial Status
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h5 class="heading">Spouse's Details</h5> </div>

                        </div>
                        <div id="spouse_div">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Name</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{ $visa->p3_s_name }}" placeholder="Name" id="p3_s_name" name="p3_s_name"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Applicant's Spouse Name
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Nationality</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($country))
                                        {{ Form::select('p3_s_nationality', $country, $visa->p3_s_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p3_s_nationality']) }}
                                    @else
                                        {{ Form::select('p3_s_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_s_nationality']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Nationality of Spouse
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Previous Nationality</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($country))
                                        {{ Form::select('p3_s_prev_nationality', $country, $visa->p3_s_prev_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p3_s_prev_nationality']) }}
                                    @else
                                        {{ Form::select('p3_s_prev_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_s_prev_nationality']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Previous Nationality of Spouse
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Birth</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{ $visa->p3_s_place_birth }}"  placeholder="Place of Birth" id="p3_s_place_birth" name="p3_s_place_birth" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Place of birth
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Country of Birth </label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($country))
                                        {{ Form::select('p3_s_country_birth', $country, $visa->p3_s_country_birth, ['class' => 'form-control select2 box-size', 'id' => 'p3_s_country_birth']) }}
                                    @else
                                        {{ Form::select('p3_s_country_birth', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_s_country_birth']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Country of Birth
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"></div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Were your Grandfather/ Grandmother (paternal/maternal) Pakistan Nationals or Belong to Pakistan held area.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio"  {{ $visa->p3_flag1 == 1 ? 'Checked="Checked"' : '' }} value="1"  id="p3_flag11" name="p3_flag1"><span>Yes</span>
                                <input type="radio"  {{ $visa->p3_flag1 == 0 ? 'Checked="Checked"' : '' }}   value="0" id="p3_flag12" name="p3_flag1"><span>No</span>
                                <div id="grandparent_div">
                                    <input class="form-control" id="p3_flag1_detail" name="p3_flag1_detail"  placeholder="If Yes, give details"  value="{{ $visa->p3_flag1_detail }}" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                If Yes, give details
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="title2">
                                <div class="col-sm-8 col-xs-12 title">
                                    <h3> Profession / Occupation Details of Applicant</h3>
                                </div>
                                <div class="col-sm-4 col-xs-12">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Present Occupation</label>

                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($occupation))
                                    {{ Form::select('p3_current_occupation', $occupation, $visa->p3_current_occupation, ['class' => 'form-control select2 box-size', 'id' => 'p3_current_occupation']) }}
                                @else
                                    {{ Form::select('p3_current_occupation', $occupation, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_current_occupation']) }}
                                @endif

                                <input class="form-control" value="{{ $visa->p3_other_occupation }}"    name="p3_other_occupation" id="p3_other_occupation" placeholder="Present Other Occupation"/>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                If Others,please specify
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Employer Name/business</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_employer }}"  placeholder="Employer Name/business" name="p3_employer" id="p3_employer" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Employer Name / Business
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Designation </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_desination }}" placeholder="Designation" name="p3_desination" id="p3_desination" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Designation
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Address </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_address }}"  placeholder="Address" name="p3_address" id="p3_address" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Address
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Employee Phone</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="Employee Phone" value="{{ $visa->p3_po_phone }}"   name="p3_po_phone" id="p3_po_phone" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Phone no
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Past Occupation</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($occupation))
                                    {{ Form::select('p3_past_occupation', $occupation, $visa->p3_past_occupation, ['class' => 'form-control select2 box-size', 'id' => 'p3_past_occupation']) }}
                                @else
                                    {{ Form::select('p3_past_occupation', $occupation, 0, ['class' => 'form-control select2 box-size', 'id' => 'p3_past_occupation']) }}
                                @endif

                                    <input class="form-control" value="{{ $visa->p3_other_past_occupation }}"    name="p3_other_past_occupation" id="p3_other_past_occupation" placeholder="Past Other Occupation" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Past Occupation, if any
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Are/were you in a Military/Semi-Military/Police/Security. Organization?</label><br>
                            <div class="col-sm-4 col-xs-12">
                                <span>Yes</span>
                                <input type="radio"  {{  $visa->p3_flag2 == 'Yes' ? 'Checked="Checked"' : '' }}  id="p3_flag21" value="Yes" name="p3_flag2" />
                                <span>No</span>
                                <input type="radio"  {{  $visa->p3_flag2 == 'No' ? 'Checked="Checked"' : ''}}  id="p3_flag22" value="No" name="p3_flag2" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                If yes,give details
                            </div>
                        </div>
                        <div id="other_organization">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Organisation</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"   value="{{ $visa->p3_other_organization }}"  placeholder="Organisation" name="p3_other_organization" id="p3_other_organization" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Organization
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Designation</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="{{ $visa->p3_other_desination }}" placeholder="Designation" name="p3_other_desination" id="p3_other_desination" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Designation
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Rank</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{ $visa->p3_other_rank }}"  placeholder="Rank" name="p3_other_rank"  id="p3_other_rank" />
                                </div> .
                                <div class="col-sm-4 col-xs-12">
                                    Rank
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Place of Posting</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{ $visa->p3_other_place_posting }}"  placeholder="Place of Posting" name="p3_other_place_posting" id="p3_other_place_posting" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Place of Posting
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="title2">
                            <div class="col-sm-12 col-xs-12 title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" name="submit" value="Save And Continue"  class="btn-primary submit-btn2">
                            <input type="submit"  name="submit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
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
            $("#p3_copy_address").change(function() {
                if ($("#p3_copy_address").is(":checked")) {
                    $("#p3_house_street2").val($("#p3_house_street").val());
                    $("#p3_village_town2").val($("#p3_village_town").val());
                    $("#p3_state2").val($("#p3_state").val());
                } else {
                    $("#p3_house_street2").val('');
                    $("#p3_village_town2").val('');
                    $("#p3_state2").val('');
                }
            }).trigger('change');

            $("#p3_marital_status").change(function() {
                if ($("#p3_marital_status").val() == 'Married') {
                    $("#p3_s_name").attr("disabled", false);
                    $("#p3_s_nationality").attr("disabled", false);
                    $("#p3_s_prev_nationality").attr("disabled", false);
                    $("#p3_s_place_birth").attr("disabled", false);
                    $("#p3_s_country_birth").attr("disabled", false);
                    $("#spouse_div").show();
                } else {
                    $("#spouse_div").hide();
                    $("#p3_s_name").attr("disabled", true);
                    $("#p3_s_nationality").attr("disabled", true);
                    $("#p3_s_prev_nationality").attr("disabled", true);
                    $("#p3_s_place_birth").attr("disabled", true);
                    $("#p3_s_country_birth").attr("disabled", true);

                }
            }).trigger('change');

            $("#p3_flag11").change(function() {
                if ($("#p3_flag11").val() == 1) {
                    $("#p3_flag1_detail").show();
                    $("#p3_flag1_detail").attr("disabled", false);
                }
            }).trigger('change');

            $("#p3_flag12").change(function() {
                if ($("#p3_flag12").val() == 0) {
                    $("#p3_flag1_detail").hide();
                    $("#p3_flag1_detail").attr("disabled", true);
                }
            }).trigger('change');

            $("#p3_current_occupation").change(function() {
                if ($("#p3_current_occupation").val() == 3) { // Other
                    $("#p3_other_occupation").show();
                    $("#p3_other_occupation").attr("disabled", false);
                }else{
                    $("#p3_other_occupation").hide();
                    $("#p3_other_occupation").attr("disabled", true);
                }
            }).trigger('change');

            $("#p3_past_occupation").change(function() {
                if ($("#p3_past_occupation").val() == 3) { // Other
                    $("#p3_other_past_occupation").show();
                    $("#p3_other_past_occupation").attr("disabled", false);
                }else{
                    $("#p3_other_past_occupation").hide();
                    $("#p3_other_past_occupation").attr("disabled", true);
                }
            }).trigger('change');


            $("#p3_flag21").change(function() {;
                if ($("#p3_flag21").val() == 'Yes') {
                    $("#other_organization").show();
                    $("#p3_other_organization").attr("disabled", false);
                    $("#p3_other_desination").attr("disabled", false);
                    $("#p3_other_rank").attr("disabled", false);
                    $("#p3_other_place_posting").attr("disabled", false);
                }
            }).trigger('change');

            $("#p3_flag22").change(function() {
                if ($("#p3_flag22").val() == 'No') {
                    $("#other_organization").hide();
                    $("#p3_other_organization").attr("disabled", true);
                    $("#p3_other_desination").attr("disabled", true);
                    $("#p3_other_rank").attr("disabled", true);
                    $("#p3_other_place_posting").attr("disabled", true);
                }
            }).trigger('change');
            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection