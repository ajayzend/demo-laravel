@php
use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'e-visa-India')">
    <meta name="author" content="@yield('meta_author', 'Ajay Sahu')">
    @yield('meta')

            <!-- Styles -->
    @yield('before-styles')

            <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{--@langRTL
        {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
    @else
        {{ Html::style(mix('css/frontend.css')) }}
    @endif
    {!! Html::style('js/select2/select2.css') !!}--}}


    {!! Html::style('css/frontend/bootstrap.css') !!}
    {!! Html::style('css/frontend/style.css') !!}
    {!! Html::style('css/frontend/normalize.css') !!}
    {!! Html::style('css/frontend/datepicker.css') !!}
    @yield('after-styles')

            <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>


    </script>

    <?php
    if(!empty($google_analytics)){
        echo $google_analytics;
    }
    ?>
</head>
<body id="app-layout">
<div id="app">
    @include('frontend.header')

    <div class="container">
        {{--@include('includes.partials.messages')--}}
        @yield('content')
    </div><!-- container -->

    {{-- @include('includes.partials.logged-in-as')--}}
    {{--@include('frontend.includes.nav')--}}
</div><!--#app-->

<!-- Scripts -->
@yield('before-scripts')
{!! Html::script('js/frontend/jQuery-2.1.4.min.js') !!}
{!! Html::script('js/frontend/calendar/jquery-1.7.1.min.js') !!}
{!! Html::script('js/frontend/calendar/jquery-ui-1.8.18.custom.min.js') !!}
{!! Html::script('js/frontend/validation.js') !!}
{!! Html::script('js/frontend/jquery.validate.js') !!}

@yield('after-scripts')
{{ Html::script('js/jquerysession.js') }}
 {{--{{ Html::script('js/frontend/frontend.js') }}
 {!! Html::script('js/select2/select2.js') !!}--}}

<script type="text/javascript">
    if("{{Route::currentRouteName()}}" !== "frontend.user.account")
    {
        $.session.clear();
    }
</script>
@include('frontend.footer')
@include('includes.partials.ga')

<script type="text/javascript">

    $(function(){
        $('#p1_dob').datepicker({
            //inline: true,
            nextText: '&rarr;',
            prevText: '&larr;',
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            //showOn: "button",
            buttonImage: "{{ URL::asset('img/frontend/images/clander.png')}}",
            buttonImageOnly: true,
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            maxDate: 0
        });

        $('#p1_edate').datepicker({
            inline: true,
            nextText: '&rarr;',
            prevText: '&larr;',
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            //showOn: "button",
            buttonImage: "{{ URL::asset('img/frontend/images/clander.png')}}",
            buttonImageOnly: true,
            changeMonth: true,
            changeYear: true,
            //yearRange: "+100:+0",
            minDate: 0
        });
    });


</script>

<script>
    $(document).ready(function(){

        var app = $("#process1");

        var validator = app.validate({

            rules:{
                p1_app_type 		: { required : true, selected : true},
                p1_fname 		: { required : true },
                p1_lname 		: { required : true },
                p1_passport_type 		: { required : true, selected : true},
                p1_nationality : { required : true, selected : true},
                p1_port_arrival 	: { required : true, selected : true},
                p1_passport_number	    : { required : true },
                p1_dob			: { required : true },
                p1_email       : { required : true,email : true },
                p1_email2 	    :{required : true, equalTo: "#p1_email"},
                p1_phone	    : { required : true, digits : true },
                p1_edate		: { required : true },
                p1_visa_type		: { required : true, selected : true}
            },
            messages:{
                p1_app_type : { required : "For travel within next 5 days please select Urgent Processing in the Application Type. With normal Processing you can only travel after 5 day", selected : "Please select Application Type" },
                p1_fname :{ required : "Please enter  First Name" },
                p1_lname :{ required : "Please enter  Last Name" },
                p1_passport_type : { required : "This field is required", selected : "Please select Passport Type" },
                p1_nationality : { required : "This field is required", selected : "Please select Nationality" },
                p1_port_arrival : { required : "This field is required", selected : "Please select Port of Arrival" },
                p1_passport_number :{ required : "Please enter Passport No"},
                p1_dob :{ required : "Please enter Date of Birth" },
                p1_email : { required : "Please enter Email", email : "Please enter valid email address", remote : "Email already taken" },
                p1_email2 :{ required : "Please repeat Email" },
                p1_phone:{ required : "Please enter  Telephone Number", digits : "Please enter numbers only" },
                p1_edate:{ required : "Please enter Expected Date of Arrival" },
                p1_visa_type: { required : "This field is required", selected : "Please select Visa type" }


            }
        });
    });

</script>

</body>
</html>