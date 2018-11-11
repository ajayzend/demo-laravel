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


                <div class="form-outer">
                    <div class="title">

                        <p class="text-center">Visa Fee Payment</p>
                    </div>

                    <br />
                    <div>
                        <h2 class="text-center error">{{session()->get('visa_notfound')}}</h2>
                    </div>
                    @if($visa_notfound != null)
                    <div>
                        <h2 class="text-center error">{{$visa_notfound}}</h2>
                    </div>
                    @endif
                    {{ Form::open(['route' => 'frontend.paymentprocess', 'class' => 'form-horizontal', 'id' => 'process3']) }}
                    <div class="form-group">
                        <label class="col-xs-12 col-md-4 control-label" >Temporary Application ID</label>
                        <div class="col-xs-12 col-md-4">

                            <input   class="form-control" placeholder="Temporary Application ID" name="evpuid" id="evpuid" />
                        </div>  <div class="col-xs-4 col-md-4">

                            (Example : GBR9810358689)
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit"   value="Submit"   class="btn-primary submit-btn2">
                        </div>
                    </div>

                    {{ Form::close() }}
                    <br />
                    <div class="title">
                        <p class="text-center">e-Visa-India (eVI) Application</p>
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