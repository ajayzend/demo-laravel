@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class="form-outer">
				<div class="title"><p>{{ $visa->p1_visa_type }} (eTV) Application</p></div>

                    <h2 class="text-center" > <strong>Please upload a scanned copy of your original passport on this page. Please do not upload your digital picture on this page which you uploaded on the last page.</strong></h2>
                    <?php $validate = false;?>
                    @if($visa->p1_visa_type == 'e-Tourist Visa' && !$visa->p5_passport_photo_name)
                        <?php $validate = true;?>
                    @elseif($visa->p1_visa_type == 'e-Business Visa' && !$visa->p5_business_photo_name)
                        <?php $validate = true;?>
                    @elseif($visa->p1_visa_type == 'e-Medical Visa' && !$visa->p5_medical_photo_name)
                        <?php $validate = true;?>
                    @endif

                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => $validate ? 'process5' : 'process55', 'enctype' => 'multipart/form-data']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10005 ) }}
                    <h4 class="text-center"><strong>Temporary Application ID:</strong> <span style="color: #ff231c"><strong>{{ $visa->visa_no }}</strong></span></h4>

                    {{--******************start upload passport*************************--}}
                    <div class="form-group">
                            <div class="col-sm-12 col-xs-12 text-center picture">
                               {{-- @if($visa->p5_passport_photo_name)--}}
                                    <img height="250" width="250" id="passport" src="{{ Storage::disk('public')->url('img/visapassport/' . $visa->p5_passport_photo_name) }}">
                              {{--  @endif--}}
                                {{--<img height="250" width="250"  id="passport" src="{{ URL::asset('img/frontend/images/china.jpg')}}">--}}
                                <img height="250" width="250" id="passport-default"  src="{{ URL::asset('img/frontend/images/china.jpg')}}">
                            </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12 second"></div>
                        <div class="col-lg-6">
                            <div class="custom-file-input instru">
                                <p>Upload A scanned Copy Of Your original Coloured Passport Or Take A picture Of Your Passport and Uploaded.</p>
                                {!! Form::file($visa->p5_passport_photo_name ? 'p5_passport_photo_name' : 'p5_passport_photo_name', array('class'=>'form-control inputfile inputfile-1', 'id' => 'p5_passport_photo_name', 'onchange'=>"readURL(this, 'p5_passport_photo_name')")) !!}
                                <label for="logo">
                                    <i class="fa fa-upload"></i>
                                    {{--<span>Choose a file</span>--}}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12 second"></div>
                        <!--col-lg-10-->
                    </div>
                    {{--******************end upload passport*************************--}}

                    {{--******************start upload Business doc*************************--}}
                @if($visa->p1_visa_type == 'e-Business Visa')
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12 text-center picture">
                            {{-- @if($visa->p5_passport_photo_name)--}}
                            <img height="250" width="250" id="business" src="{{ Storage::disk('public')->url('img/visabusiness/' . $visa->p5_business_photo_name) }}">
                            {{--  @endif--}}
                            {{--<img height="250" width="250"  id="passport" src="{{ URL::asset('img/frontend/images/china.jpg')}}">--}}
                            <img height="250" width="250" id="business-default"  src="{{ URL::asset('img/frontend/images/business.jpg')}}">
                        </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12 second"></div>
                        <div class="col-lg-6">
                            <div class="custom-file-input instru">
                                <p>Upload A Scanned Copy of Business Card.</p>
                                {!! Form::file($visa->p5_business_photo_name ? 'p5_business_photo_name' : 'p5_business_photo_name', array('class'=>'form-control inputfile inputfile-1', 'id' => 'p5_business_photo_name', 'onchange'=>"readURL(this, 'p5_business_photo_name')")) !!}
                                <label for="logo">
                                    <i class="fa fa-upload"></i>
                                    {{--<span>Choose a file</span>--}}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12 second"></div>
                        <!--col-lg-10-->
                    </div>
                    @endif;
                    {{--******************end upload Business doc*************************--}}

                    {{--******************start upload medical doc*************************--}}
                    @if($visa->p1_visa_type == 'e-Medical Visa')
                        <div class="form-group">
                            <div class="col-sm-12 col-xs-12 text-center picture">
                                {{-- @if($visa->p5_passport_photo_name)--}}
                                <img height="250" width="250" id="medical" src="{{ Storage::disk('public')->url('img/visamedical/' . $visa->p5_medical_photo_name) }}">
                                {{--  @endif--}}
                                {{--<img height="250" width="250"  id="passport" src="{{ URL::asset('img/frontend/images/china.jpg')}}">--}}
                                <img height="250" width="250" id="medical-default"  src="{{ URL::asset('img/frontend/images/medical.jpg')}}">
                            </div>
                            <div class="col-sm-2 col-xs-12"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12 second"></div>
                            <div class="col-lg-6">
                                <div class="custom-file-input instru">
                                    <p>Upload A Scanned Copy of Letter from the Hospital concerned in India on its letterhead.</p>
                                    {!! Form::file($visa->p5_medical_photo_name ? 'p5_medical_photo_name' : 'p5_medical_photo_name', array('class'=>'form-control inputfile inputfile-1', 'id' => 'p5_medical_photo_name', 'onchange'=>"readURL(this, 'p5_medical_photo_name')")) !!}
                                    <label for="logo">
                                        <i class="fa fa-upload"></i>
                                        {{--<span>Choose a file</span>--}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12 second"></div>
                            <!--col-lg-10-->
                        </div>
                    @endif;
                    {{--******************end upload medical doc*************************--}}

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" name="submit" value="Save And Continue"  class="btn-primary submit-btn2">
                            <input type="submit"  name="submit" id="p5_submit_button_exit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12"></div>
                        <div class="col-sm-6 col-xs-12">
                            Kindly ensure that the document is as par specifications mentioned below.
                        </div>
                        <div class="col-sm-3 col-xs-12"></div>
                    </div>
<div class="title"><p>Document Specifications</p></div>
                   
                    <div class="instru">
                        <p>i. Passport Upload- Photo page of Passport containing personal details like name,date of birth, nationality , expiry date etc. to be uploaded by the applicant.<br />
                           ii. Photo page of Passport uploaded should be of the same passport whose details are provided in Passport Details section.<br />
                            ii. The application is liable to be rejected if the uploaded document is not clear and as per specification.</p>
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

            // To Use Select2
            // Backend.Select2.init();
        });

        function readURL(input, field) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    if (field == 'p5_passport_photo_name') {
                        $('#passport')
                                .attr('src', e.target.result)
                                .width(245)
                                .height(245);
                    }

                    else if(field == 'p5_business_photo_name'){
                        $('#business')
                                .attr('src', e.target.result)
                                .width(245)
                                .height(245);

                    }

                    else if(field == 'p5_medical_photo_name'){
                        $('#medical')
                                .attr('src', e.target.result)
                                .width(245)
                                .height(245);

                    }
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#p5_submit_button_exit").click(function() {
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
    </script>
@endsection