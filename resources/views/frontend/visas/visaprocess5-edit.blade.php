@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class="form-outer">
				<div class="title"><p>{{ $visa->p1_visa_type }} (eTV) Application</p></div>

                    <h2 class="text-center" > <strong>Please upload a scanned copy of your original passport on this page. Please do not upload your digital picture on this page which you uploaded on the last page.</strong></h2>
                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => $visa->p5_passport_photo_name ? 'process55' : 'process5', 'enctype' => 'multipart/form-data']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10005 ) }}
                    <h4 class="text-center"><strong>Temporary Application ID:</strong> <span style="color: #ff231c"><strong>{{ $visa->visa_no }}</strong></span></h4>

                    <div class="form-group">
                            <div class="col-sm-12 col-xs-12 text-center picture">
                               {{-- @if($visa->p5_passport_photo_name)--}}
                                    <img height="250" width="250" id="passport" src="{{ Storage::disk('public')->url('img/visapassport/' . $visa->p5_passport_photo_name) }}">
                              {{--  @endif--}}
                                {{--<img height="250" width="250"  id="passport" src="{{ URL::asset('img/frontend/images/china.jpg')}}">--}}
                                <img height="250" width="250" id="spass"  src="{{ URL::asset('img/frontend/images/china.jpg')}}">
                            </div>
                        <div class="col-sm-2 col-xs-12"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12"></div>
                        <div class="col-sm-6 col-xs-12 instru">
                            <p>Upload A scanned Copy Of Your original Coloured Passport Or Take A picture Of Your Passport and Uploaded.</p>
                        </div>
                        <div class="col-sm-3 col-xs-12"></div>
                    </div>

                    <div class="form-group">
                        {{--{{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}--}}
                        <div class="col-sm-4 col-xs-12 second"></div>
                        <div class="col-lg-4">

                            <div class="custom-file-input">
                                {!! Form::file($visa->p5_passport_photo_name ? 'p5_passport_photo_name5' : 'p5_passport_photo_name', array('class'=>'form-control inputfile inputfile-1', 'id' => 'p5_passport_photo_name', 'onchange'=>"readURL(this)")) !!}
                                <label for="logo">
                                    <i class="fa fa-upload"></i>
                                    <span>Choose a file</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12 second"></div>
                        <!--col-lg-10-->
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" name="submit" value="Save And Continue"  class="btn-primary submit-btn2">
                            <input type="submit"  name="submit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#passport')
                            .attr('src', e.target.result)
                            .width(245)
                            .height(245);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection