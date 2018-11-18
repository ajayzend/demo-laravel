@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <h4 class="text-center"><strong class="bl">Port of Arrival</strong> : <span class="bred">{{ $visa->p1_port_arrival }}</span></h4>
            <h4 class="text-center"><strong class="bl">Application Type</strong> : <span class="bred">{{ substr($visa->p1_app_type, 0, 17) }}</span></h4>
            <div class="row1"> 	
                <div class="form-outer">
				
					<div class="title"><p class="text-center">{{ $visa->p1_visa_type }} (eTV) Application</p></div>
					<p class="text-center"><strong>Data saved Successfully. Please note down the Temporary Application ID:</strong> <span class="bred">{{ $visa->visa_no }}</span></p>

                    <div class="title2">
						<div class="col-md-8" >e-Visa-India (eVI) Application</div>
						<div class="col-md-4">Help</div>
					</div>
					
                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process2']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10002 ) }}
                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Surname</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  type="text" placeholder="Surname" name="p1_lname"  id="p1_lname" value="{{ $visa->p1_lname }}">
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                               Surname/Family Name (As in Passport)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Middle Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" type="text" placeholder="Middle Name" name="p1_mname"  id="p1_mname" value="{{ $visa->p1_mname }}" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Middlename/s (As in Passport)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>	Given Name/s </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="Given Name/s" type="text" name="p1_fname" id="p1_fname" value="{{ $visa->p1_fname }}"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Given Name/s (As in Passport)
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="checkbox100" class="col-sm-8 col-xs-12"><h5 class="text-center"><strong style="font-size:16px;">Have you ever changed your name? If yes, click the box
                                    <input name="p2_changed_your_name" id="p2_changed_your_name" type="checkbox"  {{ $visa->p2_changed_your_name == 'yes' ? 'Checked="Checked"' : '' }}  value="yes" >
                                    and give details.</h5></label></strong>
                            <div class="col-sm-4 col-xs-12 des">	If You have ever changed your Name Please tell us.
                            </div>
                        </div>

                        <div id="changed_your_name">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Surname </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Surname" type="text" name="p2_previous_surname" id="p2_previous_surname" value="{{ $visa->p2_previous_surname }}"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Surname
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Name </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Name" type="text" name="p2_previous_name" id="p2_previous_name" value="{{ $visa->p2_previous_name }}"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Given name
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Gender</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" id="p2_gender" name="p2_gender" >
                                    <option value="0">Please Select</option>
                                    <option {{ $visa->p2_gender == 'Female' ? 'selected="selected"' : '' }} value="Female">Female</option>
                                    <option {{ $visa->p2_gender == 'Male' ? 'selected="selected"' : '' }} value="Male">Male</option>
                                    <option {{ $visa->p2_gender == 'Transgender' ? 'selected="selected"' : '' }} value="Transgender">Transgender</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Sex
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_dob }}
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Date of Birth as in Passport in DD/MM/YYYY format
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Town/City of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p2_town_city_birth }}"  placeholder="Town/City of Birth" name="p2_town_city_birth" id="p2_town_city_birth" >
                            </div>
                            <div class="col-sm-4 col-xs-12 des"> 	Province/Town/City of birth
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Country of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p2_country_birth', $country, $visa->p2_country_birth, ['class' => 'form-control select2 box-size', 'id' => 'p2_country_birth']) }}
                                @else
                                    {{ Form::select('p2_country_birth', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_country_birth']) }}
                                @endif

                            </div>
                            <div class="col-sm-4 col-xs-12 des">Country of birth

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Citizenship/National Id No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p2_national_id }}" placeholder="Citizenship/National Id No. " name="p2_national_id" id="p2_national_id" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">If not applicable Please Type NA

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Religion</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($religion))
                                    {{ Form::select('p2_religion', $religion, $visa->p2_religion, ['class' => 'form-control select2 box-size', 'id' => 'p2_religion']) }}
                                @else
                                    {{ Form::select('p2_religion', $religion, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_religion']) }}
                                @endif

                                <input type="text" class="form-control" value="{{ $visa->p2_other_religion }}" placeholder="OTher Religion" name="p2_other_religion" id="p2_other_religion" />

                            </div>
                            <div class="col-sm-4 col-xs-12 des">If Others .Please specify
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Visible Identification Marks </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control"  value="{{ $visa->p2_visible_marks }}" placeholder="Visible identification marks" name="p2_visible_marks" id="p2_visible_marks" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">Visible Identification Marks
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Educational Qualification </label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($education))
                                    {{ Form::select('p2_education', $education, $visa->p2_education, ['class' => 'form-control select2 box-size', 'id' => 'p2_education']) }}
                                @else
                                    {{ Form::select('p2_education', $education, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_education']) }}
                                @endif
                                <input type="text" name="p2_other_education" placeholder="OTher Educational Qualification" id="p2_other_education" class="form-control" value="{{ $visa->p2_other_education }}">
                            </div>
                            <div class="col-sm-4 col-xs-12 des">Educational Qualification
                            </div></div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_nationality }}
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Nationality
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span> Did You Acquire Nationality By Birth or By Naturalization?</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="p2_birth_nationality" id="p2_birth_nationality">
                                    <option value="0"> Please Select</option>
                                    <option {{ $visa->p2_birth_nationality == 'By Birth' ? 'selected="selected"' : '' }}  value="By Birth">By Birth</option>
                                    <option {{ $visa->p2_birth_nationality == 'Naturalization' ? 'selected="selected"' : '' }}  value="Naturalization">Naturalization</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Did You Acquire Nationality By Birth or By Naturalization?
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Prev Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($country))
                                    {{ Form::select('p2_prev_nationality', $country, $visa->p2_prev_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p2_prev_nationality']) }}
                                @else
                                    {{ Form::select('p2_prev_nationality', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_prev_nationality']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                If You Have Acquired Nationality By Naturalization

                                Specify Previous Nationality
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >
                                Have You Lived for At Least Two Years in the Country Where
                                You are Applying Visa?</label>
                            <div class="col-sm-8 col-xs-12">
                                <label>
                                    <input type="radio"  {{ $visa->p2_lived_visa_country_years == 1 ? 'Checked="Checked"' : '' }} value="1"  id="p2_lived_visa_country_years1" name="p2_lived_visa_country_years">Yes</label>
                                <label><input type="radio"  {{ $visa->p2_lived_visa_country_years == 0 ? 'Checked="Checked"' : '' }}   value="0" id="p2_lived_visa_country_years2" name="p2_lived_visa_country_years">No</label>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                            </div>
                        </div>
                        <div class="title">
                            <p  class="text-center">Passport Details</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Passport No</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_passport_number }}
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Applicant's Passport Number
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >	<span class="star">*</span>Place of Issue	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{ $visa->p2_passport_place_issue }}" name="p2_passport_place_issue" id="p2_passport_place_issue" placeholder="Place of Issue"  />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Place of Issue
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Issue </label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" name="p2_passport_date_issue" id="p2_passport_date_issue" placeholder="Date of Issue"  value="{{ $visa->p2_passport_date_issue }}" class="form-control"  type="text"  >
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                In DD/MM/YYYY format
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Expiry</label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="text" placeholder="Date of Expiry"  value="{{ $visa->p2_passport_date_expiry }}"  name="p2_passport_date_expiry" id="p2_passport_date_expiry" class="form-control">
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                In DD/MM/YYYY format.Minimum Six Month Validity is Required.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Any other valid Passport/Identity Certificate(IC) held</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio" {{ $visa->p2_any_other_valid_passport == 1 ? 'Checked="Checked"' : '' }} id="p2_any_other_valid_passport1" name="p2_any_other_valid_passport" value="1" />Yes
                                <input type="radio" {{ $visa->p2_any_other_valid_passport == 0 ? 'Checked="Checked"' : '' }}  id="p2_any_other_valid_passport2" name="p2_any_other_valid_passport" value="0"/>No
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                If Yes Please give Details
                            </div>
                        </div>
                        <div class="coupon_question" id="other_valid_passport_details">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Country of Issue</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($country))
                                        {{ Form::select('p2_other_passport_country', $country, $visa->p2_other_passport_country, ['class' => 'form-control select2 box-size', 'id' => 'p2_other_passport_country']) }}
                                    @else
                                        {{ Form::select('p2_other_passport_country', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_other_passport_country']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Country of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >	Passport/IC No.</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="{{ $visa->p2_other_passport_number }}" placeholder="Passport/IC No." name="p2_other_passport_number" id="p2_other_passport_number"/>
                                </div>

                                <div class="col-sm-4 col-xs-12 des">
                                    Passport No
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Date input -->
                                <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" placeholder="Date of Issue" name="p2_other_passport_date_issue" id="p2_other_passport_date_issue" class="form-control"  value="{{ $visa->p2_other_passport_date_issue }}">
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    In DD/MM/YYYY format
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input  type="text" class="form-control" value="{{ $visa->p2_other_passport_place_issue }}" id="p2_other_passport_place_issue" placeholder="Place of Issue" name="p2_other_passport_place_issue" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Place of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Nationality mentioned therein</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($country))
                                        {{ Form::select('p2_other_nationality_mentioned', $country, $visa->p2_other_nationality_mentioned, ['class' => 'form-control select2 box-size', 'id' => 'p2_other_nationality_mentioned']) }}
                                    @else
                                        {{ Form::select('p2_other_nationality_mentioned', $country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_other_nationality_mentioned']) }}
                                    @endif
                                </div>

                                <div class="col-sm-4 col-xs-12 des">
                                    Nationality described therein
                                </div></div>
                        </div>
                        <div class="title">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ></label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="submit" name="submit" id="p2_submit_button" value="Save And Continue"  class="btn-primary submit-btn2">
                                <input type="submit"  name="submit" id="p2_submit_button_exit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
                            </div>
                        </div>

                        {{ Form::close() }}
                        <div class="title">
                            <p class="text-center">e-Visa-India (eVI) Application</p>
                        </div>
                    </div>

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
            $("#p2_changed_your_name").change(function() {
                if ($("#p2_changed_your_name").is(":checked")) {
                    $("#changed_your_name").show();
                    $("#p2_previous_surname").attr("disabled", false);
                    $("#p2_previous_name").attr("disabled", false);
                } else {
                    $("#p2_previous_surname").attr("disabled", true);
                    $("#p2_previous_name").attr("disabled", true);
                    $("#changed_your_name").hide();
                }
            }).trigger('change');

            $("#p2_religion").change(function() {
                if ($("#p2_religion").val() == 3) {
                    $("#p2_other_religion").show();
                    $("#p2_other_religion").attr("disabled", false);
                } else {
                    $("#p2_other_religion").hide();
                    $("#p2_other_religion").attr("disabled", true);
                }
            }).trigger('change');

            $("#p2_education").change(function() {
                if ($("#p2_education").val() == 3) {
                    $("#p2_other_education").show();
                    $("#p2_other_education").attr("disabled", false);
                } else {
                    $("#p2_other_education").hide();
                    $("#p2_other_education").attr("disabled", true);
                }
            }).trigger('change');


            $("#p2_any_other_valid_passport1").change(function() {
                if ($("#p2_any_other_valid_passport1").is(":checked")) {
                    $("#other_valid_passport_details").show();
                    $("#p2_other_passport_country").attr("disabled", false);
                    $("#p2_other_passport_number").attr("disabled", false);
                    $("#p2_other_passport_date_issue").attr("disabled", false);
                    $("#p2_other_passport_place_issue").attr("disabled", false);
                    $("#p2_other_nationality_mentioned").attr("disabled", false);
                }
            }).trigger('change');

            $("#p2_any_other_valid_passport2").change(function() {
                if ($("#p2_any_other_valid_passport2").is(":checked")) {
                    $("#other_valid_passport_details").hide();
                    $("#p2_other_passport_country").attr("disabled", true);
                    $("#p2_other_passport_number").attr("disabled", true);
                    $("#p2_other_passport_date_issue").attr("disabled", true);
                    $("#p2_other_passport_place_issue").attr("disabled", true);
                    $("#p2_other_nationality_mentioned").attr("disabled", true);
                }
            }).trigger('change');

            $("#p2_submit_button").click(function() {
                var p2_birth_nationality = $("#p2_birth_nationality").val();
                var p2_passport_date_expiry = $("#p2_passport_date_expiry").val();
                var return_bool = false;
                if(p2_birth_nationality == 'Naturalization' && $("#p2_prev_nationality").val() == 0){
                    $("#p2_prev_nationality").focus();
                    alert("Please select Prev Nationality.");
                   return false;
                }else{
                    return_bool = true;
                }


                var days = showDays(null, parseDate(p2_passport_date_expiry));
                if(days <= 179){
                    $("#p2_passport_date_expiry").val('');
                    $("#p2_passport_date_expiry").focus();
                    alert("Minimum Six Month Validity is Required.");
                    return false;
                }else{
                    return_bool =  true;
                }
                return return_bool;
            });

            $("#p2_submit_button_exit").click(function() {
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
