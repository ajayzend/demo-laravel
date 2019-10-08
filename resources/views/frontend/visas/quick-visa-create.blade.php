@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">

            <div class="row1">
                <h4>We are commited to provide you visa within <strong>24 to 48 business hours for urgent request</strong>. You can apply Tourist Visa, Business Visa, Medical Visa & Medical Attendant Visa. <br>There are basically three type of Tourist Visa.
                <ol>
                    <li><p>e-Tourist Visa(30 Days)  Visa allow for double entry, non-extendable and non non-convertible.</p></li>
                    <li><p>e-Tourist Visa(365 Days) One year e-Tourist Visa allow for multiple entries with duration of 365 days from the date of grant of ETA.</p></li>
                    <li><p>e-Tourist Visa(5 Years)  Five years e-Tourist Visa allow for multiple entries with duration of Five years from the date of grant of ETA</p></li>
                </ol>
                <ul>
                    <li><p>e-Medical Visa(for 60 Days) Only triple entry is permitted with with duration of 60 days from the date of grant of ETA.</p></li>
                    <li><p>e-Medical Attendant Visa(for 60 Days) Only triple entry is permitted with with duration of 60 days from the date of grant of ETA.</p></li>
                    <li><p>e-Business Visa(for 365 Days) An e-business visa permits you stay for upto 365 days from the date of grant of ETA, and you only get two times entry.</p></li>
                </ul>
                </h4>
                <h1 style="text-align: center"><strong><?php echo $h1;?></strong></h1>
                <?php //echo validation_errors(); ?>
                <div class="form-outer">

                    <div class="title">

<div class="title"><p class="text-center">e-Visa-India (eVI) Application</p></div>

                    </div>

                    {{ Form::open(['route' => 'frontend.visas.store', 'class' => 'form-horizontal', 'id' => 'process1']) }}
                    {{ Form::hidden('ps', 10001 ) }}

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of
                            Visa</label>
                        <div class="col-sm-6 col-xs-12">
                            <?php //echo $visa; ?>
                            <select id="p1_visa_type" name="p1_visa_type" class="form-control">
                                <option value="0">Select Visa</option>
                                <option value="e-Tourist Visa">e-Tourist Visa(for 30 days)</option>
                                <option value="e-Tourist Visa 1 year">e-Tourist Visa(for 1 year)</option>
                                <option value="e-Tourist Visa 5 years">e-Tourist Visa(for 5 years)</option>
                                <option @if($url_action == 'M') selected @endif value="e-Medical Visa">e-Medical Visa(for 60 days)</option>
                                <option @if($url_action == 'B') selected @endif value="e-Business Visa">e-Business Visa(for 1 year)</option>
                                <option value="e-Attendant Visa">e-Attendant Visa(for 60 days)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Application
                            Type</label>
                        <div class="col-sm-6 col-xs-12">
                            <select id="p1_app_type" class="form-control" name="p1_app_type">
                                <option value="0"> Select Application Type</option>
                                <option  value="Normal"> Normal Processing(Normal Processing (processing Time 4 to 7 Business Days)
                                </option>

                                <option @if($url_action == 'U') selected  @endif value="Urgent"> Urgent Processing (24 to 48 Business Hours)

                                </option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>First
                                Name</label>

                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_fname" type="text" value="" class="form-control" placeholder="First Name" name="p1_fname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Middle Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_mname" type="text" value="" class="form-control" placeholder="Middle Name" name="p1_mname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_lname" type="text" value="" class="form-control" placeholder="Last Name" name="p1_lname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Passport
                                Type</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_passport_type" disabled type="text" value="Ordinary Passport" class="form-control" placeholder="Ordinary Passport" name="p1_passport_type" autocomplete="off"/>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Nationality
                        </label>
                        <div class="col-sm-6 col-xs-12">
                           {{ Form::select('p1_nationality', $evisa_country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p1_nationality']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Port of Arrival
                        </label>
                        <div class="col-sm-6 col-xs-12">
                            {{ Form::select('p1_port_arrival', $port_arrival, 0, ['class' => 'form-control select2 box-size', 'id' => 'p1_port_arrival']) }}
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Passport No
                            </label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_passport_number" type="text" value="" class="form-control" placeholder="Passport No."
                                       name="p1_passport_number" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Date of
                                Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input placeholder="(DD/MM/YYYY)" type="text" value="" id="p1_dob" name="p1_dob" class="form-control"
                                       type="text" autocomplete="on">
                            </div>
                            <div class="col-sm-4 col-xs-12">(DD/MM/YYYY)</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_email" value="" type="text" class="form-control" placeholder="Email" name="p1_email" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Repeat
                                Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_email2" value="" type="text" class="form-control" placeholder="Repeat Email"
                                       name="p1_email2" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Telephone Number</label>
                            <div class="col-sm-6 col-xs-12">
                                <input  id="p1_phone" value="" type="text" class="form-control" placeholder="Telephone Number"
                                       name="p1_phone" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Expected Date of
                                Arrival</label>
                            <div class="col-sm-4 col-xs-12">
                                <input id="p1_edate" value="" type="text" name="p1_edate" class="form-control"
                                       placeholder="Expected Date of Arrival"  autocomplete="off"/>
                            </div>
                            <div class="col-sm-4 col-xs-12">(DD/MM/YYYY)</div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"></label>
                            <div class="col-sm-6 col-xs-12">
                                <!--<input type="submit" id="submit" value="Continue" class="btn-primary submit-btn2">-->
                                {{ Form::submit('Continue', ['class' => 'btn btn-primary btn-md', 'id' => 'p1_submit_button']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                    <div class="title"><p class="text-center">e-Visa-India (eVI) Application</p></div>
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
