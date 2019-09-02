@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">

            <div class="row1">
                <h1 style="text-align: center"><strong><?php echo $h1;?></strong></h1>
                <?php //echo validation_errors(); ?>
                <div class="form-outer">

                    <div class="title">

                        <div class="title"><p class="text-center">Get Touch with US</p></div>

                    </div>

                    {{ Form::open(['route' => 'frontend.contactus', 'class' => 'form-horizontal', 'id' => 'contact-us']) }}

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Name</label>

                        <div class="col-sm-6 col-xs-12">
                            <input id="cu_name" type="text" value="" class="form-control" placeholder="Name" name="cu_name" autocomplete="off"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Email</label>
                        <div class="col-sm-6 col-xs-12">
                            <input id="cu_email" value="" type="text" class="form-control" placeholder="Email" name="cu_email" autocomplete="off"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star"></span>Mobile</label>
                        <div class="col-sm-6 col-xs-12">
                            <input  id="cu_phone" value="" type="text" class="form-control" placeholder="Mobile"
                                    name="cu_phone" autocomplete="off"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Query</label>
                        <div class="col-sm-6 col-xs-12">
                            <textarea name="cu_query" rows="4" cols="3" id="cu_query" class="form-control"></textarea>
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit"   value="Submit"   class="btn-primary submit-btn2">
                        </div>
                    </div>
                    {{ Form::close() }}
                    <div class="title"><p class="text-center">Get Touch with US</p></div>
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
