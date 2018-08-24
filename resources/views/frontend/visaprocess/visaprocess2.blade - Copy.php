@extends('frontend.layouts.app2')

@section('content')
    <?php
    $countries = array();
    $country = array();
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
                    {{ Form::open(['route' => 'frontend.visaprocess2', 'class' => 'form-horizontal', 'id' => 'process2']) }}
                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Surname</label>
                            <?php //echo  $visa; ?>
                            <div class="col-sm-4 col-xs-12">
                                <input type="hidden" name="unid" value="<?php if($unids){echo  $unids;}?>"/>
                                <input class="form-control"  type="text" placeholder="Surname" name="lname"  id="lname2" value="<?php  if($unids){echo  $lname;} ?>">
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                <p>Surname/Family Name (As in Passport)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Middle Name</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" type="text" placeholder="Middle Name" name="mname"  id="mname2" value="<?php if($unids){echo  $mname;} ?>" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Middlename/s (As in Passport)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>	Given Name/s </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" placeholder="Given Name/s" type="text" name="fname" id="fname2" value="<?php if($unids){echo  $fname;}?>"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Given Name/s (As in Passport)
                            </div>
                        </div>
                        <div  style="display:none;" class="form-group">
                            <input  class="form-control"  type="hidden" name="price" value="<?php if($unids){echo  $price;}  ?>" />
                        </div>
                        <div class="form-group">
                            <label for="checkbox100"class="col-sm-8 col-xs-12"><h5>Have you ever changed your name? If yes, click the box<input id="chckid" type="checkbox" <?php if($name_check) echo'Checked="Checked"' ?> id="checkfirst" name="name_check" onchange="valueChanged()" class="form-check-input" value="yes"> and give details.</h5></label>
                            <div class="col-sm-4 col-xs-12 des">	If You have ever changed your Name Please tell us.
                            </div>
                        </div><div class="surcheck">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >	Surname </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Surname" type="text" name="surename" id="surename" value="<?php if($unids){echo  $surname;}?>"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Surname
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Name </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Name" type="text" name="surfname" id="surename2" value="<?php echo $surfname;?>"/>
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
                                    <option <?php if($sex == 'Female') echo'Selected="Selected"'?> value="Female">Female</option>
                                    <option <?php if($sex == 'Male') echo'Selected="Selected"'?> value="Male">Male</option>
                                    <option <?php if($sex == 'Transgender') echo'Selected="Selected"'?> value="Transgender">Transgender</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Sex
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <h5><?php  if($unids){echo  $date;}?></h5>
                                <input class="form-control" value="<?php  if($unids){echo  $date;}?>" placeholder="Date of Birth" type="hidden" name="dob" id="dob" >

                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Date of Birth as in Passport in DD/MM/YYYY format
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Town/City of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="<?php if($unids){echo  $cob;} ?>"  placeholder="Town/City of Birth" name="cob" id="cob" >
                            </div>
                            <div class="col-sm-4 col-xs-12"> 	Date of Birth as in Passport in DD/MM/YYYY format
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Country of Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="country" id="country">
                                    <option value="0">Country of Birth</option>
                                    <?php foreach($country as $row)
                                    { ?>
                                    <option value="<?php echo $row->cities;?>" <?php if($unids){ if( $countries[0] == $row->cities) echo 'selected="selected"'; } ?>><?php echo $row->cities; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="col-sm-4 col-xs-12">Province/Town/City of birth

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Citizenship/National Id No.</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="<?php if($unids){echo  $national_id;} ?>" placeholder="Citizenship/National Id No. " name="national_id" id="national_id" />
                            </div>
                            <div class="col-sm-4 col-xs-12">If not applicable Please Type NA


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Religion</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="religion" id="religion">
                                    <option value="0"> Select Religion </option>

                                    <?php foreach($visa_religion as $reg)
                                    { ?>
                                    <option value="<?php echo $reg->religion;?>" <?php if($unids){ if( $religion[0] == $reg->religion) echo 'selected="selected"'; } ?>><?php echo $reg->religion; ?></option>

                                    <?php } ?>
                                    <option id="other_value" <?php  if($religion[0]=='other') echo 'selected="selected"';  ?> value="other"> OTHERS</option>
                                </select>

                                <input class="form-control" <?php if(!empty($other_reg))?> value="<?php if($unids){echo  $other_reg;} ?>" placeholder="OTher Religion" name="other_reg" id="other_reg" />

                            </div>
                            <div class="col-sm-4 col-xs-12">If Others .Please specify
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Visible Identification Marks </label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control"  value="<?php if($unids){echo  $id_mark;} ?>" placeholder="Visible identification marks" name="id_mark" id="id_mark" />
                            </div>
                            <div class="col-sm-4 col-xs-12">Visible Identification Marks
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Educational Qualification </label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="edu" id="edu">
                                    <option value="0" >Select Education</option>
                                    <?php foreach($education as $eduu)
                                    { ?>
                                    <option value="<?php echo $eduu->name;?>" <?php if($unids){ if( $edu[0] == $eduu->name) echo 'selected="selected"'; } ?>><?php echo $eduu->name; ?></option>
                                    <?php } ?>
                                    <option id="other_edu_value"  <?php  if($edu[0]=='other') echo 'selected="selected"';  ?>  value="other"> OTHER</option>

                                </select>

                                <input type="text" name="other_edu" placeholder="OTher Educational Qualification" id="other_edu" class="form-control" value="<?php if($unids){echo  $other_edu;} ?>">
                            </div>
                            <div class="col-sm-4 col-xs-12">Educational Qualification
                            </div></div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="hidden" class="form-control" value="<?php if($unids){echo  $nationality;} ?>">
                                <h4><?php if($unids){echo  $nationality;} ?></h4>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Nationality
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span> Did You Acquire Nationality By Birth or By Naturalization?</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="birth_nationality" id="birth_nationality">
                                    <option value="0"> Did You Acquire Nationality By Birth or By Naturalization?</option>
                                    <option <?php if($birth_nationality == 'By Birth') echo'Selected="Selected"'?>  value="By Birth">By Birth</option>
                                    <option <?php if($birth_nationality == 'Naturalization') echo'Selected="Selected"'?>  value="Naturalization">Naturalization</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Did You Acquire Nationality By Birth or By Naturalization?
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >Prev Nationality</label>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control" name="pre_nationality" id="pre_nationality">
                                    <option value="0">Prev Nationality</option>
                                    <?php foreach($country as $row){ ?>
                                    <option value="<?php echo $row->cities;?>" <?php if($unids){ if( $pre_nationality[0] == $row->cities) echo 'selected="selected"'; } ?>><?php echo $row->cities; ?></option>
                                    <?php } ?>

                                </select>
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

                                    <input type="radio"  <?php if($unids){  if($year == 'Yes') echo'Checked="Checked"'; } ?> value="Yes"  id="optradio" name="years">Yes</label>
                                <label><input type="radio"  <?php if($unids){  if($year == 'No') echo'Checked="Checked"'; } ?>   value="No" id="optradio" name="years">No</label>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 col-xs-12 control-label">
                                <div class="title">
                                    <h3>Passport Details</h3>
                                </div>
                            </label>
                            <div class="col-sm-4 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Passport No</label>
                            <div class="col-sm-4 col-xs-12">
                                <h4><?php if($unids){ echo $pnumbers; } ?>	</h4>
                                <input class="form-control" type="hidden" placeholder="Passport No." name="pnumber" value="<?php if($unids){ echo $pnumbers; }?>" >
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Applicant's Passport Number
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" >	<span class="star">*</span>Place of Issue	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="<?php if($unids){ echo $place_issue; } ?>" name="place_issue" id="place_issue" placeholder="Place of Issue"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Place of Issue
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Issue </label>
                            <div class="col-sm-4 col-xs-12">
                                <input name="issuedate" id="issuedate" placeholder="Date of Issue"  value="<?php if($unids){ echo $issuedate; } ?>" class="form-control"  type="text"  >
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                In DD/MM/YYYY format
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Expiry</label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="text" placeholder="Date of Expiry"  value="<?php if($unids){ echo $expdate; } ?>"  name="expdate" id="expdate" class="form-control">
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                In DD/MM/YYYY format.Minimum Six Month Validity is Required.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Any other valid Passport/Identity Certificate(IC) held</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio"  id="optradio1" name="anyoter_validpass" <?php if($unids){  if($anyoter_validpass == 'Yes') echo'Checked="Checked"'; } ?> value="Yes" >Yes
                                <input type="radio"   <?php if($unids){  if($anyoter_validpass == 'No') echo'Checked="Checked"'; } ?>  id="optradio2" name="anyoter_validpass" value="No">No
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                If Yes Please give Details
                            </div>
                        </div>
                        <div class="coupon_question" id="coupon_question">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Country of Issue</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" id="anyother_conissue" name="anyother_conissue">
                                        <option value="0">Country of Issue</option>
                                        <?php foreach($country as $row)
                                        { ?>
                                        <option value="<?php echo $row->cities;?>" <?php if($unids){ if( $anyother_conissue[0] == $row->cities) echo 'selected="selected"'; } ?>><?php echo $row->cities; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Country of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >	Passport/IC No.</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="<?php if($unids){ echo $anyother_pass_ic; } ?>" placeholder="Passport/IC No." name="anyother_pass_ic" id="anyother_pass_ic"/>
                                </div>

                                <div class="col-sm-4 col-xs-12">
                                    Applicant's Passport Number
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Date input -->
                                <label class="col-sm-4 col-xs-12 control-label" ><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" placeholder="Date of Issue" name="any_other_date_issue" id="any_other_date_issue" class="form-control"  value="<?php if($unids){ echo $any_other_date_issue; } ?>">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    In DD/MM/YYYY format
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){ echo $any_other_place_issue; } ?>" id="any_other_place_issue" placeholder="Place of Issue" name="any_other_place_issue" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Place of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" >Nationality mentioned therein</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select id="any_other_place_con" name="any_other_place_con" class="form-control">
                                        <option value="0"> Nationality mentioned therein</option>
                                        <?php foreach($country as $row)
                                        { ?>
                                        <option value="<?php echo $row->cities;?>" <?php if($unids){ if( $any_other_place_con[0] == $row->cities) echo 'selected="selected"'; } ?>><?php echo $row->cities; ?></option>
                                        <?php } ?>

                                    </select>
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

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"></label>
                        <div class="col-sm-6 col-xs-12">
                            <input type="submit" id="submit" value="Continue" class="btn-primary submit-btn2">
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
