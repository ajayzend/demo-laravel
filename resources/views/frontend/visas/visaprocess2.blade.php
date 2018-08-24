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
                                <input class="form-control"  type="text" placeholder="Surname" name="p2_gender"  id="p2_gender" value="<?php  if($unids){echo  $lname;} ?>">
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                <p>Surname/Family Name (As in Passport)</p>
                            </div>
                        </div>
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
