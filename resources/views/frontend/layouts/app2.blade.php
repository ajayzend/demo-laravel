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
    {!! Html::style('css/frontend/custom.css') !!}
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

        // Visa Process1
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

        // Visa Process2
        $('#issuedate').datepicker({
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
            yearRange: "-100:+0",
            maxDate: 0
        });

        $('#expdate').datepicker({
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
            yearRange: "-0:+100",
            minDate: 0
        });
        $('#any_other_date_issue').datepicker({
            inline: true,
            nextText: '&rarr;',
            prevText: '&larr;',
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            //	showOn: "button",
            buttonImage: "{{ URL::asset('img/frontend/images/clander.png')}}",
            buttonImageOnly: true,
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            maxDate: 0
        });
    });


</script>

<script>
    $(document).ready(function(){

        var app1 = $("#process1");
        app1.validate({
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

        var app2 = $("#process2");
        app2.validate({
            rules:{
                fname2					: 		{ required : true },
                mname2					: 		{ required : true },
                lname2					: 		{ required : true },
                cob						: 		{ required : true },
                dob						: 		{ required : true },
                national_id				: 		{ required : true },
                any_other_place_issue	: 		{ required : true },
                id_mark					: 		{ required : true },
                place_issue				: 		{ required : true },
                expdate					: 		{ required : true },
                issuedate				: 		{ required : true },
                anyother_pass_ic		: 		{ required : true },
                any_other_date_issue	: 		{ required : true },
                any_other_place_con		: 		{ required : true, selected : true},
                p2_gender				:		{ required : true, selected : true},
                country					:		{ required : true/*, selected : true*/},
                religion				:		{ required : true, selected : true},
                edu						:		{ required : true, selected : true},
                birth_nationality		:		{ required : true, selected : true},
                pre_nationality			:		{ required : false, selected : false}

            },
            messages:{
                anyother_pass_ic				    : 		{ required : "Please enter Passport/IC No" },
                fname2				    : 		{ required : "This field is required" },
                mname2 					:	    { required : "This field is required" },
                lname2				    :       { required : "This field is required" },
                cob				  	 	:       { required : "Please enter City of Birth" },
                dob				  		:       { required : "Please enter Date of Birth" },
                national_id			    :       { required : "Please enter Citizenship/National Id No" },
                any_other_place_issue   : 		{ required : "Please enter Place of Issue" },
                id_mark  				: 		{ required : "Please enter Visible Identification Marks" },
                place_issue  			: 		{ required : "Please enter Place of Issue" },
                expdate  				: 		{ required : "Please enter Date of Expire" },
                issuedate  				: 		{ required : "Please enter Date of Issue" },
                any_other_date_issue  	: 		{ required : "Please enter Date of Issue" },
                any_other_place_con		: 		{ required : "This field is required", selected : "Please select atleast one option" },
                p2_gender 				:	    { required : "This field is required", selected : "Please select Gender" },
                country 				:	    { required : "This field is required", selected : "Please select Country" },
                religion 				:	    { required : "This field is required", selected : "Please select Religion" },
                edu 					:	    { required : "This field is required", selected : "Please enter Education" },
                birth_nationality		:	    { required : "This field is required", selected : "Please select Nationality By Birth or By Naturalization" },
                pre_nationality			:	    { required : "This field is required", selected : "Please select Prev Nationality" }

            }
        });
    });

</script>

</body>
</html>