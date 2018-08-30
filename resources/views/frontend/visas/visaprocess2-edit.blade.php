@extends('frontend.layouts.app2')

@section('content')
    <?php
    $countries = array();
    //$country = array();
    $visa_religion = array();
    $religion = array();
    $education = array();
    $edu = array();
    $pre_nationality = array();
    $anyother_conissue = array();
    $any_other_place_con = array();
    $unids = 1;
    //if($unids){
    //foreach($users as $user){
    $unid =  "ddd";
    $fname =  "ddd";
    $mname =  "ddd";
    $lname =  "ddd";
    $type =  "ddd";
    $price =  "ddd";
    $date = "ddd";;
    $type =  "ddd";
    $arrival =  "ddd";
    $surname =  "ddd";
    $surfname =  "ddd";
    $sex =  "ddd";
    $countries[] =  "ddd";
    $religion[] =  "ddd";
    $cob =  "ddd";
    $national_id =  "ddd";
    $id_mark =  "ddd";
    $edu[] =  "ddd";
    $other_edu =  "ddd";
    $pre_nationality[] =  "ddd";
    $nationality =  "ddd";
    $birth_nationality	 = "ddd";
    $year	 =  "ddd";
    $place_issue	 =  "ddd";
    $issuedate	 =  "ddd";
    $expdate	 =  "ddd";
    $pnumbers	 = "ddd";
    $any_other_place_issue	 =  "ddd";
    $anyother_conissue[]	 =  "ddd";
    $anyother_pass_ic	 =  "ddd";
    $any_other_date_issue	 =  "ddd";
    $any_other_place_con[]	 =  "ddd";
    $other_reg	 =  "ddd";
    $name_check	 =  "ddd";
    $anyoter_validpass	 =  "ddd";


    //}
    // }

    if($anyoter_validpass == 'No'){ echo '<style>
  #coupon_question{  display:none }
  </style>';
    }
    ?>
    <style>
        .error {
            color: red;
            font-weight: normal;
        }

        .form-group {
            margin-bottom: 7px;
        }

        .star {
            text-align: left;
            color: #f00;
            float: right;
        }

        .title {
            background: #e55a15;
            height: 45px;

            padding-bottom: 41px;
        }

        .title h3.text-center {
            padding-top: 8px;
        }

        label {

            font-weight: normal;
        }

        #selecttype {

            padding-left: 35%;
        }

        .form-outer {

            padding: 0px 0px 40px 0px;

        }

        .firsttype {
            background-color: #faebd7;
            padding-bottom: 15px;
            padding-top: 29px;
        }

        .form-outer {
            width: 80%;
        }

        .ui-datepicker-header {
            border: 1px solid #75A7D6;
            background: #75A7D6 url(images/ui-bg_highlight-soft_75_75A7D6_1x100.png) 50% 50% repeat-x;
            color: #222;
            font-weight: bold;
        }
        .ui-widget-content {
            border: 1px solid #aaa;
            background: #fff url(images/ui-bg_flat_75_ffffff_40x100.png) 50% 50% repeat-x;
            color: #222;
        }

        .col-sm-4.col-xs-12 img {
            position: absolute;
        }

        #dib, #edate {
            float: left;
        }
    </style>
    <section class="wrapper">
        <div class="container">
            <div class="row1">

                <?php //echo validation_errors(); ?>
                <div class="form-outer">
                    <div class="title">

                        <h3 class="text-center">e-Visa-India (eVI) Application</h3>
                    </div>
                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'pocess2']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10002 ) }}
                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Surname</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control"  type="text" placeholder="Surname" name="p1_lname"  id="p1_lname" value="{{ $visa->p1_lname }}">
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                <p>Surname/Family Name (As in Passport)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Middle Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" type="text" placeholder="Middle Name" name="p1_mname"  id="p1_mname" value="{{ $visa->p1_mname }}" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Middlename/s (As in Passport)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>	Given Name/s </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="Given Name/s" type="text" name="p1_fname" id="p1_fname" value="{{ $visa->p1_fname }}"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Given Name/s (As in Passport)
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="checkbox100"class="col-sm-8 col-xs-12"><h5>Have you ever changed your name? If yes, click the box<input id="chckid" type="checkbox" <?php if($name_check) echo'Checked="Checked"' ?> id="checkfirst" name="name_check" onchange="valueChanged()" class="form-check-input" value="yes"> and give details.</h5></label>
                            <div class="col-sm-4 col-xs-12 des">	If You have ever changed your Name Please tell us.
                            </div>
                        </div>

                        <div class="surcheck">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Surname </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Surname" type="text" name="p2_previous_surname" id="p2_previous_surname" value="{{ $visa->p2_previous_surname }}"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Surname
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Name </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Name" type="text" name="p2_previous_name" id="p2_previous_name" value="{{ $visa->p2_previous_name }}"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Given name
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Gender</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" id="sex" name="sex" >
                                    <option value="0">Gender</option>
                                    <option {{ $visa->p2_gender = 'Female' ? 'selected="selected"' : '' }} value="Female">Female</option>
                                    <option {{ $visa->p2_gender = 'Male' ? 'selected="selected"' : '' }} value="Male">Male</option>
                                    <option {{ $visa->p2_gender = 'Transgender' ? 'selected="selected"' : '' }} value="Transgender">Transgender</option>
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
                            <div class="col-sm-4 col-xs-12"> 	Province/Town/City of birth
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
                            <div class="col-sm-4 col-xs-12">Country of birth

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Citizenship/National Id No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p2_national_id }}" placeholder="Citizenship/National Id No. " name="p2_national_id" id="p2_national_id" />
                            </div>
                            <div class="col-sm-4 col-xs-12">If not applicable Please Type NA


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Religion</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="p2_religion" id="p2_religion">
                                    <option value="0"> Select Religion </option>

                                    <?php foreach($visa_religion as $reg)
                                    { ?>
                                    <option value="<?php echo $reg->religion;?>" <?php if($unids){ if( $religion[0] == $reg->religion) echo 'selected="selected"'; } ?>><?php echo $reg->religion; ?></option>

                                    <?php } ?>
                                    <option id="other_value" <?php  if($religion[0]=='other') echo 'selected="selected"';  ?> value="other"> OTHERS</option>
                                </select>

                                <input class="form-control" value="{{ $visa->p2_other_religion }}" placeholder="OTher Religion" name="p2_other_religion" id="p2_other_religion" />

                            </div>
                            <div class="col-sm-4 col-xs-12">If Others .Please specify
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Visible Identification Marks </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control"  value="{{ $visa->p2_visible_marks }}" placeholder="Visible identification marks" name="p2_visible_marks" id="p2_visible_marks" />
                            </div>
                            <div class="col-sm-4 col-xs-12">Visible Identification Marks
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Educational Qualification </label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="p2_education" id="p2_education">
                                    <option value="0" >Select Education</option>
                                    <?php foreach($education as $eduu)
                                    { ?>
                                    <option value="<?php echo $eduu->name;?>" <?php if($unids){ if( $edu[0] == $eduu->name) echo 'selected="selected"'; } ?>><?php echo $eduu->name; ?></option>
                                    <?php } ?>
                                    <option id="other_edu_value"  <?php  if($edu[0]=='other') echo 'selected="selected"';  ?>  value="other"> OTHER</option>

                                </select>

                                <input type="text" name="p2_other_education" placeholder="OTher Educational Qualification" id="p2_other_education" class="form-control" value="{{ $visa->p2_other_education }}">
                            </div>
                            <div class="col-sm-4 col-xs-12">Educational Qualification
                            </div></div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_nationality }}
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Nationality
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span> Did You Acquire Nationality By Birth or By Naturalization?</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="p2_birth_nationality" id="p2_birth_nationality">
                                    <option value="0"> Did You Acquire Nationality By Birth or By Naturalization?</option>
                                    <option {{ $visa->p2_birth_nationality = 'By Birth' ? 'selected="selected"' : '' }}  value="By Birth">By Birth</option>
                                    <option {{ $visa->p2_birth_nationality = 'Naturalization' ? 'selected="selected"' : '' }}  value="Naturalization">Naturalization</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12">
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
                            <div class="col-sm-4 col-xs-12">
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
                                    <input type="radio"  {{ $visa->p2_lived_visa_country_years = 1 ? 'Checked="Checked"' : '' }} value="1"  id="p2_lived_visa_country_years1" name="p2_lived_visa_country_years">Yes</label>
                                <label><input type="radio"  {{ $visa->p2_lived_visa_country_years = 0 ? 'Checked="Checked"' : '' }}   value="0" id="p2_lived_visa_country_years2" name="p2_lived_visa_country_years">No</label>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                            </div>
                        </div>
                        <div class="title">
                            <h3 class="text-center">Passport Details</h3>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Passport No</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_passport_number }}
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Passport Number
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >	<span class="star">*</span>Place of Issue	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{ $visa->p2_passport_place_issue }}" name="p2_passport_place_issue" id="p2_passport_place_issue" placeholder="Place of Issue"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Place of Issue
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Issue </label>
                            <div class="col-sm-4 col-xs-12">
                                <input name="p2_passport_date_issue" id="p2_passport_date_issue" placeholder="Date of Issue"  value="{{ $visa->p2_passport_date_issue }}" class="form-control"  type="text"  >
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                In DD/MM/YYYY format
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Expiry</label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="text" placeholder="Date of Expiry"  value="{{ $visa->p2_passport_date_expiry }}"  name="p2_passport_date_expiry" id="p2_passport_date_expiry" class="form-control">
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                In DD/MM/YYYY format.Minimum Six Month Validity is Required.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Any other valid Passport/Identity Certificate(IC) held</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio" {{ $visa->p2_any_other_valid_passport = 1 ? 'Checked="Checked"' : '' }} id="p2_any_other_valid_passport1" name="p2_any_other_valid_passport" value="1" />Yes
                                <input type="radio" {{ $visa->p2_any_other_valid_passport = 0 ? 'Checked="Checked"' : '' }}  id="p2_any_other_valid_passport2" name="p2_any_other_valid_passport" value="0"/>No
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                If Yes Please give Details
                            </div>
                        </div>
                        <div class="coupon_question" id="coupon_question">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Country of Issue</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($evisa_country))
                                        {{ Form::select('p2_other_passport_country', $evisa_country, $visa->p2_other_passport_country, ['class' => 'form-control select2 box-size', 'id' => 'p2_other_passport_country']) }}
                                    @else
                                        {{ Form::select('p2_other_passport_country', $evisa_country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p2_other_passport_country']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Country of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >	Passport/IC No.</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="{{ $visa->p2_other_passport_number }}" placeholder="Passport/IC No." name="p2_other_passport_number" id="p2_other_passport_number"/>
                                </div>

                                <div class="col-sm-4 col-xs-12">
                                    Applicant's Passport Number
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Date input -->
                                <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" placeholder="Date of Issue" name="p2_other_passport_date_issue" id="p2_other_passport_date_issue" class="form-control"  value="{{ $visa->p2_other_passport_date_issue }}">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    In DD/MM/YYYY format
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{ $visa->p2_other_passport_place_issue }}" id="p2_other_passport_place_issue" placeholder="Place of Issue" name="p2_other_passport_place_issue" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
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

                                <div class="col-sm-4 col-xs-12">
                                    Applicant's Passport Number
                                </div></div>
                        </div>
                        <div class="title">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ></label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="submit" name="submit" value="Save And Continue" onclick="show12()" class="btn-primary submit-btn2">
                                <input type="submit"  name="exit" onclick="show2()" value="Save and Register Later"   class="btn-primary submit-btn2">
                            </div>
                        </div>

                        {{ Form::close() }}
                        <div class="title">
                            <h3 class="text-center">e-Visa-India (eVI) Application</h3>
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
            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection
