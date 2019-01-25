@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="title"><p class="text-center">{{ $visa->p1_visa_type }} (eTV) Application</p></div>
            <p class="text-center"><strong>Please note down the Temporary Application ID:</strong> <span class="bred">{{ $visa->visa_no }}</span></p>
            <p class="text-center">Your information will be saved if you click save button or continue to next page. If you exit without doing either of that, your information will be lost.</p>
            <p class="text-center"><strong>Application Type :</strong> <span class="bred">{{ substr($visa->p1_app_type, 0, 17) }}</span></p>
            <div class="row1">

                <div class="form-outer">
				  <div class="title2">
						<div class="col-md-8" >Applicant's Address Details</div>
						<div class="col-md-4">Help</div>
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
                                <input type="text" class="form-control" placeholder="House No./Street" id="p3_house_street" name="p3_house_street" value="{{ $visa->p3_house_street }}" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Applicant's Present Address. Maximum 35 characters (Each Line)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Village/Town/City</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="Village/Town/City" id="p3_village_town" name="p3_village_town" value="{{ $visa->p3_village_town }}"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Village/Town/City
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>State/Province/District</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="State/Province/District" id="p3_state" name="p3_state" value="{{ $visa->p3_state }}" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                State/Province/District
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Postal/Zip Code</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_pincode }}"  placeholder="Postal/Zip Code"  id="p3_pincode" name="p3_pincode"  />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
                                Country
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Phone No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_phone }}" placeholder="Phone No." id="p3_phone" name="p3_phone" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                One Contact No is Mandatory
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Mobile No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_mobile }}" placeholder="Mobile No." id="p3_mobile" name="p3_mobile" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Mobile no
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Click Here for Same Address</label>


                            <div class="col-sm-8 col-xs-12">
                                <input type="checkbox" id="p3_copy_address" name="p3_copy_address" class="form-check" {{ $visa->p3_copy_address == 'yes' ? 'Checked="Checked"' : '' }}  value="yes">
                            </div>
                        </div>
						
						
						  <div class="title">

                        <p class="text-center">Permanent Address</p>
                    </div>
                        

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>House No./Street  </label>
                            <div class="col-sm-4 col-xs-12">

                                <input type="text" class="form-control" placeholder="House No./Street " value="{{ $visa->p3_house_street2 }}"  id="p3_house_street2" name="p3_house_street2"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Applicant's Permanent Address(with Postal/Zip Code)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Village/Town/City</label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="text" class="form-control" value="{{ $visa->p3_village_town2 }}"  placeholder="Village/Town/City" id="p3_village_town2" name="p3_village_town2" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Village/Town/City
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">State/Province/District</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="State/Province/District" id="p3_state2" value="{{ $visa->p3_state2 }}" name="p3_state2" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                State/Province/District
                            </div>
                        </div>
                        <div class="title"><p class="text-center">Family Details</p></div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h3 class="heading"><strong>Father's Details</strong></h3></div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_f_name }}" placeholder="Name. " name="p3_f_name"  id="p3_f_name"  />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
                                Previous Nationality of Father
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Place of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_f_place_birth }}"  placeholder="Place of Birth" id="p3_f_place_birth" name="p3_f_place_birth" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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
							
                            <div class="col-sm-4 col-xs-12 des">
                                Country of Birth
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h3 class="heading"><strong>Mother's Details</strong></h3></div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p3_m_name }}"   placeholder="Name" id="p3_m_name" name="p3_m_name"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
                                Previous Nationality of Mother
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{ $visa->p3_m_place_birth }}" placeholder="Place of Birth" id="p3_m_place_birth" name="p3_m_place_birth" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
                                Country of Birth
                            </div>
                        </div>
                        <br> 
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Applicant's Marital Status </label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control"  id="p3_marital_status" name="p3_marital_status">
                                    <option value="0" > Applicant's Marital Status </option>
                                    <option {{ $visa->p3_marital_status == 'Married' ? 'selected="selected"' : '' }} value="Married">Married </option>
                                    <option {{ $visa->p3_marital_status == 'Single' ? 'selected="selected"' : '' }} value="Single">Single </option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Applicant's Maritial Status
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> </label>

                            <div class="col-sm-8 col-xs-12"><h5 class="heading"><strong style="font-size:14px;">Spouse's Details</strong></h5> </div>

                        </div>
                        <div id="spouse_div">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Name</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $visa->p3_s_name }}" placeholder="Name" id="p3_s_name" name="p3_s_name"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
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
                                <div class="col-sm-4 col-xs-12 des">
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
                                <div class="col-sm-4 col-xs-12 des">
                                    Previous Nationality of Spouse
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Birth</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $visa->p3_s_place_birth }}"  placeholder="Place of Birth" id="p3_s_place_birth" name="p3_s_place_birth" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
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
                                <div class="col-sm-4 col-xs-12 des">
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
                                    <input type="text" class="form-control" id="p3_flag1_detail" name="p3_flag1_detail"  placeholder="If Yes, give details"  value="{{ $visa->p3_flag1_detail }}" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                If Yes, give details
                            </div>

                        </div>
                        <div class="title"><p class="text-cetner"> Profession / Occupation Details of Applicant</p></div>
						
						
						
						
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
                            <div class="col-sm-4 col-xs-12 des">
                                If Others,please specify
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Employer Name/business</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_employer }}"  placeholder="Employer Name/business" name="p3_employer" id="p3_employer" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Employer Name / Business
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Designation </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p3_desination }}" placeholder="Designation" name="p3_desination" id="p3_desination" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Designation
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Address </label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="text"class="form-control" value="{{ $visa->p3_address }}"  placeholder="Address" name="p3_address" id="p3_address" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Address
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Employee Phone</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="Employee Phone" value="{{ $visa->p3_po_phone }}"   name="p3_po_phone" id="p3_po_phone" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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

                                    <input type="text" class="form-control" value="{{ $visa->p3_other_past_occupation }}"    name="p3_other_past_occupation" id="p3_other_past_occupation" placeholder="Past Other Occupation" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
                                If yes,give details
                            </div>
                        </div>
                        <div id="other_organization">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Organisation</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"   value="{{ $visa->p3_other_organization }}"  placeholder="Organisation" name="p3_other_organization" id="p3_other_organization" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Organization
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Designation</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  value="{{ $visa->p3_other_desination }}" placeholder="Designation" name="p3_other_desination" id="p3_other_desination" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Designation
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Rank</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  value="{{ $visa->p3_other_rank }}" placeholder="Rank" name="p3_other_rank" id="p3_other_rank" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Rank
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">Place of Posting</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $visa->p3_other_place_posting }}"  placeholder="Place of Posting" name="p3_other_place_posting" id="p3_other_place_posting" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Place of Posting
                                </div>
                            </div>
                        </div>
                  
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" name="submit" value="Save And Continue" id="p3_submit_button"  class="btn-primary submit-btn2">
                            <input type="submit"  name="submit" value="Save and Temporarily Exit" id="p3_submit_button_exit"   class="btn-primary submit-btn2">
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
                if ($("#p3_flag11").is(":checked")) {
                    $("#p3_flag1_detail").show();
                    $("#p3_flag1_detail").attr("disabled", false);
                }
            }).trigger('change');

            $("#p3_flag12").change(function() {
                if ($("#p3_flag12").is(":checked")) {
                    $("#p3_flag1_detail").hide();
                    $("#p3_flag1_detail").attr("disabled", true);
                }
            }).trigger('change');

            $("#p3_current_occupation").change(function() {
                if ($("#p3_current_occupation").val() == 23) { // Other
                    $("#p3_other_occupation").show();
                    $("#p3_other_occupation").attr("disabled", false);
                }else{
                    $("#p3_other_occupation").hide();
                    $("#p3_other_occupation").attr("disabled", true);
                }
            }).trigger('change');

            $("#p3_past_occupation").change(function() {
                if ($("#p3_past_occupation").val() == 23) { // Other
                    $("#p3_other_past_occupation").show();
                    $("#p3_other_past_occupation").attr("disabled", false);
                }else{
                    $("#p3_other_past_occupation").hide();
                    $("#p3_other_past_occupation").attr("disabled", true);
                }
            }).trigger('change');


            $("#p3_flag21").change(function() {
                if ($("#p3_flag21").is(":checked")) {
                    $("#other_organization").show();
                    $("#p3_other_organization").attr("disabled", false);
                    $("#p3_other_desination").attr("disabled", false);
                    $("#p3_other_rank").attr("disabled", false);
                    $("#p3_other_place_posting").attr("disabled", false);
                }
            }).trigger('change');

            $("#p3_flag22").change(function() {
                if ($("#p3_flag22").is(":checked")) {
                    $("#other_organization").hide();
                    $("#p3_other_organization").attr("disabled", true);
                    $("#p3_other_desination").attr("disabled", true);
                    $("#p3_other_rank").attr("disabled", true);
                    $("#p3_other_place_posting").attr("disabled", true);
                }
            }).trigger('change');

            $("#p3_submit_button").click(function() {
                var p3_phone = $("#p3_phone").val();
                var p3_mobile = $("#p3_mobile").val();
                if(p3_phone == '' && p3_mobile == ''){
                    $("#p3_phone").focus();
                    alert("Please enter either Present Phone No. or Mobile No.");
                    return false;
                }else{
                    return true;
                }
            });

            $("#p3_submit_button_exit").click(function() {
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
            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection