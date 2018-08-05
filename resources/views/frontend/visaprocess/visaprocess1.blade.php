@extends('frontend.layouts.app2')
@section('content')

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

                        <h3 class="text-center">e-Visa-India (eVI) Application</h3></div>

                    <form method="post" class="form-horizontal" id="order" action="Info1/addneworder?Applicationfileno"
                          method="post" role="form">
                        <div class="firsttype">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Application
                                    Type</label>

                                <div class="col-sm-6 col-xs-12">

                                    <select id="type" class="form-control" onchange="changeFunc();" name="type">
                                        <option value="0"> Select Application Type</option>
                                        <option value="1"> Normal Processing (processing Time 4 To 7 Business Days
                                        </option>
                                        <option value="2"> Urgent Processing (processing Time Maximum 3 Business Days)
                                        </option>
                                    </select>

                                </div>

                            </div>
                            <span id="selecttype"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>First
                                Name</label>

                            <div class="col-sm-6 col-xs-12">
                                <input id="fname" value="" class="form-control" placeholder="First Name" name="fname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Middle Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="mname" value="" class="form-control" placeholder="Middle Name" name="mname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="lname" value="" class="form-control" placeholder="Last Name" name="lname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Passport
                                Type</label>
                            <div class="col-sm-6 col-xs-12">
                                <select id="ptype" class="form-control" name="ptype">

                                <option value="Ordinary Passport" selected="selected"> Ordinary Passport</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Nationality
                            </label>
                            <div class="col-sm-6 col-xs-12">
                                <select id="nationality" class="form-control" name="nationality">
                                <option value="0">Select Nationality</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Port of Arrival
                            </label>
                            <div class="col-sm-6 col-xs-12">
                                <select id="arrival" class="form-control" name="arrival">
                                <option value="0">Select</option>

                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Passport No
                            </label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="pnumber" value="" class="form-control" placeholder="Passport No."
                                       name="pnumber" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Date of
                                Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <!-- <div  class="input-group date" id="dp3" data-provide="datepicker" data-date-start-date="0d">      -->
                                <input placeholder="(DD/MM/YYYY)" value="" id="dib" name="dob" class="form-control"
                                       type="text" autocomplete="off">
                                <!-- <span class="input-group-addon btn">
                                   </div> -->
                            </div>
                            (DD/MM/YYYY)
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="email2" value="" class="form-control" placeholder="Email" name="email2" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Repeat
                                Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="remail" value="" class="form-control" placeholder="Repeat Email"
                                       name="remail" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Telephone Number</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="phone2" value="" class="form-control" placeholder="Telephone Number"
                                       name="phone2" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Expected Date of
                                Arrival</label>
                            <div class="col-sm-4 col-xs-12">
                                <input id="edate" value="" name="edate" class="form-control"
                                       placeholder="Expected Date of Arrival" type="text" autocomplete="off"/>
                            </div>
                            (DD/MM/YYYY)
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of
                                Visa</label>
                            <div class="col-sm-6 col-xs-12">
                                <?php //echo $visa; ?>
                                <select id="visa" name="visa" class="form-control"/>
                                <option value="0">Select Visa</option>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"></label>
                            <div class="col-sm-6 col-xs-12">
                                <input type="submit" id="submit" value="Continue" class="btn-primary submit-btn2">
                            </div>
                        </div>
                    </form>
                    <div class="title">
                        <h3 class="text-center">e-Visa-India (eVI) Application</h3></div>
                </div>

            </div>


        </div>


    </section>
    @endsection
