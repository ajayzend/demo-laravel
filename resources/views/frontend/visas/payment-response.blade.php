@extends('frontend.layouts.app4')

@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class="form-outer">
                    <div>&nbsp;</div>
                    <div class="title"> <h1 class="text-center" >{{session()->get('visatype')}}</h1></div>
                    <h2 class="text-center" > <strong> Congratulations! </strong></h2>
                    <h3 class="text-center" > <strong> {{ session()->get('message') }} </strong></h3>
                    <div>&nbsp;</div>

                      <div class="form-group">
                        {{--{{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}--}}
                        <div class="col-sm-4 col-xs-12 second"></div>
                        <div class="col-lg-4">


                        </div>
                        <div class="col-sm-4 col-xs-12 second"></div>
                        <!--col-lg-10-->
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 col-xs-12 control-label" ></label>
                        <div class="col-sm-7 col-xs-12">
                            <input type="button" onclick="javascript:$(location).attr('href','/');" name="submit" value="Go to Home"  class="btn-primary submit-btn2">
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