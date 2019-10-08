@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="row1">
                <div class="form-outer">
                    <div class="title"><p class="text-center">e-Visa-India (eVI) Application</p></div>

                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'edit-visa']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10001 ) }}


                        <div class="firsttype">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Application
                                    Type</label>

                                <div class="col-sm-6 col-xs-12">

                                    <select id="p1_app_type" class="form-control" name="p1_app_type">
                                        <option value="0"> Select Application Type</option>
                                        <option value="Normal Processing (processing Time 4 To 7 Business Days" {{ $visa->p1_app_type == 'Normal Processing (processing Time 4 To 7 Business Days' ? 'selected="selected"' : '' }} > Normal Processing (processing Time 4 to 7 Business Days)
                                        </option>
                                        <option value="Urgent Processing (processing Time Maximum 3 Business Days)" {{ $visa->p1_app_type == 'Urgent Processing (processing Time Maximum 3 Business Days)' ? 'selected="selected"' : '' }}  > Urgent Processing (processing Time 1 to 3 Business Days)
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
                                <input  type="text" id="p1_fname" value="{{ $visa->p1_fname }}" class="form-control" placeholder="First Name" name="p1_fname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Middle Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" id="p1_mname" value="{{ $visa->p1_mname }}" class="form-control" placeholder="Middle Name" name="p1_mname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" id="p1_lname" value="{{ $visa->p1_lname }}" class="form-control" placeholder="Last Name" name="p1_lname" autocomplete="off"/>
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
                            @if(!empty($evisa_country))
                            {{ Form::select('p1_nationality', $evisa_country, $visa->p1_nationality, ['class' => 'form-control select2 box-size', 'id' => 'p1_nationality']) }}
                            @else
                            {{ Form::select('p1_nationality', $evisa_country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p1_nationality']) }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Port of Arrival
                        </label>
                        <div class="col-sm-6 col-xs-12">
                            @if(!empty($port_arrival))
                            {{ Form::select('p1_port_arrival', $port_arrival, $visa->p1_port_arrival, ['class' => 'form-control select2 box-size', 'id' => 'p1_port_arrival']) }}
                            @else
                            {{ Form::select('p1_port_arrival', $port_arrival, 0, ['class' => 'form-control select2 box-size', 'id' => 'p1_port_arrival']) }}
                            @endif
                        </div>
                    </div>


                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Passport No
                            </label>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" id="p1_passport_number" value="{{ $visa->p1_passport_number }}" class="form-control" placeholder="Passport No."
                                       name="p1_passport_number" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Date of
                                Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input placeholder="(DD/MM/YYYY)" value="{{ $visa->p1_dob }}" id="p1_dob" name="p1_dob" class="form-control"
                                       type="text" autocomplete="on">
                            </div>
                           <div class="col-sm-4 col-xs-12">(DD/MM/YYYY)</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" id="p1_email" value="{{ $visa->p1_email }}" class="form-control" placeholder="Email" name="p1_email" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Repeat
                                Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" id="p1_email2" value="{{ $visa->p1_email }}" class="form-control" placeholder="Repeat Email"
                                       name="p1_email2" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Telephone Number</label>
                            <div  class="col-sm-6 col-xs-12">
                                <input type="text" id="p1_phone" value="{{ $visa->p1_phone }}" class="form-control" placeholder="Telephone Number"
                                       name="p1_phone" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Expected Date of
                                Arrival</label>
                            <div class="col-sm-4 col-xs-12">
                                <input id="p1_edate" value="{{ $visa->p1_edate }}" name="p1_edate" class="form-control"
                                       placeholder="Expected Date of Arrival" type="text" autocomplete="on"/>
                            </div>
                            <div class="col-sm-4 col-xs-12 ">(DD/MM/YYYY) </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of
                                Visa</label>
                            <div class="col-sm-6 col-xs-12">
                                <?php //echo $visa; ?>
                                <select id="p1_visa_type" name="p1_visa_type" class="form-control">
                                    <option value="0">Select Visa</option>
                                    <option value="e-Tourist Visa" {{ $visa->p1_visa_type == 'e-Tourist Visa' ? 'selected="selected"' : '' }}>e-Tourist Visa(for 30 days)</option>
                                    <option value="e-Tourist Visa 1 year" {{ $visa->p1_visa_type == 'e-Tourist Visa 1 year' ? 'selected="selected"' : '' }}>e-Tourist Visa(for 1 year)</option>
                                    <option value="e-Tourist Visa 5 years" {{ $visa->p1_visa_type == 'e-Tourist Visa 5 years' ? 'selected="selected"' : '' }}>e-Tourist Visa(for 5 years)</option>
                                    <option value="e-Medical Visa" {{ $visa->p1_visa_type == 'e-Medical Visa' ? 'selected="selected"' : '' }}>e-Medical Visa(for 60 days)</option>
                                    <option value="e-Business Visa" {{ $visa->p1_visa_type == 'e-Business Visa' ? 'selected="selected"' : '' }}>e-Business Visa(for 1 year)</option>
                                    <option value="e-Attendant Visa" {{ $visa->p1_visa_type == 'e-Attendant Visa' ? 'selected="selected"' : '' }}>e-Attendant Visa(for 60 days)</option>
                                </select>
                            </div>

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
