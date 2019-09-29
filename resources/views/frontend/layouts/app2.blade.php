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
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/frontend/images/favicon.ico')}}"/>
    <title>@yield('title', (@$visa->header_title) ? @$visa->header_title : $header_title)</title>

    <!-- Meta -->
    <meta name="description" content=<?php if(isset($header_description)) { echo "'$header_description'";} else { echo "'Official Indian e Visa website for e tourist visa (eTV) for 180+ countries across the World such as UK, USA, Australia, Canada, Japan, UAE, NZ, European Countries & Singapore and so many.'";}?> />
    <meta name="keywords" content=<?php if(isset($header_keywords)) { echo "'$header_keywords'";} else { echo "'e Tourist Visa India, Indian Visa, Visa to India, india Visa Requirement, Online Indian Visa Application, e visa india, Indian e visa, Apply Visa for India, Indian visa on arrival.'";}?> />

    <meta name="page-topic" content="e-Visa India" />
    <meta name="copyright" content="I9 Technologies Pvt. Ltd." />
    <meta name="author" content="I9 Technologies Pvt. Ltd." />
    <meta name="Robots" content="INDEX, FOLLOW" />
    <meta name="rating" content="safe for kids" />
    <meta name="googlebot" content=" index, follow " />
    <meta name="bingbot" content=" index, follow " />
    <meta name="reply-to" content="support@evisaindia.in" />
    <meta name="allow-search" content="yes" />
    <meta name="revisit-after" content="daily" />
    <meta name="distribution" content="global" />
    <meta name="expires" content="never" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en" />
    <meta name="title" content="e-Tourist Visa">
    <meta name="doc-type" content="Public"/>
    <meta http-equiv="content-language" content="ll-cc"/>
    <meta name="distribution" content="web"/>
    <meta name="googlebot" content="all" />

    <link rel="canonical" href="https://evisaindia.in/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="India Visa Online | India e-Visa Tourist & Business | eVisa India" />
    <meta property="og:description" content=" Official Indian Visa website for e-Visa, e tourist Visa (eTV) India for 180+ countries across the Globe such as UK, USA & Canada, UAE, Australia " />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:title" content="" />
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
    @include('frontend.visas.header')
    @include('frontend.visas.banner')
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
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/frontend/calendar/jquery-1.7.1.min.js') !!}
{!! Html::script('js/frontend/calendar/jquery-ui-1.8.18.custom.min.js') !!}
{!! Html::script('js/frontend/validation.js') !!}
{!! Html::script('js/frontend/jquery.validate.js') !!}
{!! Html::script('js/frontend/jquery.czMore-1.5.3.2.js') !!}
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
{{--@include('frontend.footer')--}}

        <!-- Global site tag (gtag.js) - Google Ads: 757972711 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-757972711"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-757972711'); </script>

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
            //yearRange: "+1:+0",
            minDate: 1,
            maxDate: 120
        });

        // Visa Process2
        $('#p2_passport_date_issue').datepicker({
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

        $('#p2_passport_date_expiry').datepicker({
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
        $('#p2_other_passport_date_issue').datepicker({
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

        $('#p4_date_issue').datepicker({
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

    function showDays(firstDate, secondDate){
        var startDay;
        if(firstDate == ''|| firstDate == null)
            startDay = new Date();
        else
            startDay = new Date(firstDate);

        //var endDay = new Date(secondDate);
        var endDay = secondDate;
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;

        // Round down.
        return Math.floor(days);
    }

    // mm/dd/yyyy to yyyy-mm/dd
    function parseDate(str) {
        var mdy = str.split('/');
        return new Date(mdy[2], mdy[1]-1, mdy[0]);
    }

    function stringMatch(str1, str2) {
        var status = false;
        if (str1.indexOf(str2) != -1) {
            status =  true
        }
        return status;
    }

    $("#p1_submit_button").click(function() {
        var p1_app_type = $("#p1_app_type").val();
        var p1_edate = $("#p1_edate").val();
        var p1_visa_type = $("#p1_visa_type").val();
        var days = showDays(null, parseDate(p1_edate));
        var return_bool = false;
        var today = new Date();
        if (days < -1) {
            alert("Your arrival date must be greater than or equal to current date.");
            return false;
        }
        if (days >= 28 && stringMatch(p1_app_type, 'Urgent')) {
            alert("Please select normal processing from the drop down because your arrival date is beyond 30 days.");
            $("#p1_edate").val('');
            $("#p1_edate").focus();
            return_bool = false;
            return return_bool;
        }
        if (days > 28 && p1_visa_type == 'e-Tourist Visa') {
            alert("For e-Tourist Visa(for 30 days) your expected Date of Arrival must be with in next 30 Days only.");
            $("#p1_edate").val('');
            $("#p1_edate").focus();
            return_bool = false;
            return return_bool;
        }
        else {
            return_bool = true;
        }

        if (days <= 4 && stringMatch(p1_app_type, 'Normal')) {
            alert("For travel within next 5 days please select Urgent Processing in the Application Type. With normal Processing you can only travel after 5 day.");
            $("#p1_edate").val('');
            $("#p1_edate").focus();
            return_bool = false;
            return return_bool;
        } else {
            return_bool = true;
        }

        return return_bool;
    });

    $(document).ready(function(){
        $( "#p1_fname" ).keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });

        $( "#p1_mname" ).keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                //alert("okk");
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });

        $( "#p1_lname" ).keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });

        $( "#p3_f_name" ).keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });

        $( "#p3_m_name" ).keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });

        $( "#p3_s_name" ).keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
        var app1 = $("#process1");
        app1.validate({
            rules:{
                p1_app_type 		: { required : true, selected : true},
                p1_fname 		: { required : true, maxlength : 25},
                p1_mname 		: { required : false, maxlength : 25 },
                p1_lname 		: { required : true , maxlength : 25},
                p1_passport_type 		: { required : true, selected : true},
                p1_nationality : { required : true, selected : true},
                p1_port_arrival 	: { required : true, selected : true},
                p1_passport_number	    : { required : true },
                p1_dob			: { required : true/*, date: true*/},
                p1_email       : { required : true,email : true },
                p1_email2 	    :{required : true, equalTo: "#p1_email"},
                p1_phone	    : { required : true, digits : true, maxlength : 10, minlength: 10 },
                p1_edate		: { required : true/*, date: true*/ },
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
                p1_phone:{ required : "Please enter your 10 digit correct phone or mobile number without zero- Character Value not allowed!", digits : "Please enter numbers only" },
                p1_edate:{ required : "Please enter Expected Date of Arrival" },
                p1_visa_type: { required : "This field is required", selected : "Please select Visa type" }
            }
        });

        var app2 = $("#process2");
        app2.validate({
            rules:{
                p1_fname					        : 		{ required : true },
                p2_previous_surname					: 		{ required : true },
                p2_previous_name					: 		{ required : true },
                p2_gender				            :		{ required : true, selected : true},
                p2_town_city_birth					: 		{ required : true },
                p2_country_birth					: 		{ required : true },
                p2_national_id				        : 		{ required : true },
                p2_religion                     	: 		{ required : true , selected : true},
                p2_other_religion					: 		{ required : true },
                p2_visible_marks    				: 		{ required : true },
                p2_education    					: 		{ required : true , selected : true},
                p2_other_education  				: 		{ required : true },
                p2_birth_nationality        		: 		{ required : true , selected : true},
                p2_passport_place_issue         	: 		{ required : true },
                p2_passport_date_issue      		: 		{ required : true},
                p2_passport_date_expiry 			:		{ required : true},
                p2_other_passport_date_issue		:		{ required : true}
            },
            messages:{
                p1_fname			        	    : 		{ required : "Please enter Given Name/s" },
                p2_previous_surname				    : 		{ required : "Please enter Surname" },
                p2_previous_name				    : 		{ required : "Please enter Name" },
                p2_gender 				            :	    { required : "This field is required", selected : "Please select Gender" },
                p2_town_city_birth 					:	    { required : "Please enter Town/City of Birth" },
                p2_country_birth				    :       { required : "This field is required", selected : "Please select Country of Birth" },
                p2_national_id				  	 	:       { required : "Please enter Citizenship/National Id No." },
                p2_religion				  		    :       { required : "This field is required", selected : "Please select Religion" },
                p2_other_religion			        :       { required : "Please enter Other Religion" },
                p2_visible_marks                    : 		{ required : "Please enter Visible Identification Marks" },
                p2_education          				: 		{ required : "This field is required", selected : "Please select Educational Qualification" },
                p2_other_education        			: 		{ required : "Please enter Other Educational Qualification" },
                p2_birth_nationality  				: 		{ required : "This field is required", selected : "Please select Nationality By Birth or By Naturalization" },
                p2_passport_place_issue				: 		{ required : "Please enter Place of Issue" },
                p2_passport_date_issue            	: 		{ required : "Please enter Date of Issue" },
                p2_passport_date_expiry     		: 		{ required : "Please enter Date of Expiry" },
                p2_other_passport_date_issue		:	    { required : "Please enter Date of Issue" }
            }
        });

        var app3 = $("#process3");
        app3.validate({
            rules:{
                p3_house_street					                : 		{ required : true, maxlength : 35 },
                p3_village_town					                : 		{ required : true, maxlength : 35 },
                p3_state            					        : 		{ required : true , maxlength : 35},
                p3_pincode				                        :		{ required : true},
                p3_country          					        : 		{ required : true , selected : true},
                p3_phone          					            : 		{ required : false, digits : true, maxlength : 10, minlength: 10},
                p3_mobile          					            : 		{ required : false, digits : true, maxlength : 10, minlength: 10},
                p3_house_street2    					        : 		{ required : true , maxlength : 35},
                p3_village_town2    					        : 		{ required : false , maxlength : 35},
                p3_state2    					                : 		{ required : false , maxlength : 35},
                p3_f_name       				                : 		{ required : true, maxlength : 75},
                p3_f_nationality                         	    : 		{ required : true , selected : true},
                p3_f_prev_nationality                      	    : 		{ required : true , selected : true},
                p3_f_place_birth            		            :		{ required : true},
                p3_f_country_birth            		            :		{ required : true, selected : true},
                p3_m_name       				                : 		{ required : true, maxlength : 75 },
                p3_m_nationality                         	    : 		{ required : true , selected : true},
                p3_m_prev_nationality                      	    : 		{ required : true , selected : true},
                p3_m_place_birth            		            :		{ required : true},
                p3_m_country_birth            		            :		{ required : true,  selected : true},
                p3_marital_status            		            :		{ required : true,  selected : true},
                p3_s_name                   		            :		{ required : true, maxlength : 75},
                p3_s_nationality                         	    : 		{ required : true , selected : true},
                p3_s_prev_nationality                      	    : 		{ required : true , selected : true},
                p3_s_place_birth                          	    : 		{ required : true},
                p3_s_country_birth          		            :		{ required : true,  selected : true},
                p3_current_occupation          		            :		{ required : true,  selected : true},
                p3_other_occupation          		            :		{ required : true,  selected : true},
                p3_employer                 		            :		{ required : true},
                p3_address                   		            :		{ required : true},
                p3_other_organization                   		:		{ required : true},
                p3_other_desination                   		    :		{ required : true},
                p3_other_rank                   		        :		{ required : true},
                p3_other_place_posting                   		:		{ required : true},
                p3_po_phone                   		            :		{ required : false, digits : true, maxlength : 10, minlength: 10}
            },
            messages:{
                p3_house_street			        	            : 		{ required : "Please enter House No./Street" },
                p3_village_town				                    : 		{ required : "Please enter Village/Town/City" },
                p3_state            				            : 		{ required : "Please enter State/Province/District" },
                p3_pincode 				                        :	    { required : "Please enter Postal/Zip Code"},
                p3_phone                                        :       { required : "Please enter your 10 digit correct phone or mobile number without zero- Character Value not allowed!", digits : "Please enter your 10 digit correct phone number without zero- Character Value not allowed!" },
                p3_mobile                                        :       { required : "Please enter your 10 digit correct phone or mobile number without zero- Character Value not allowed!", digits : "Please enter your 10 digit correct mobile number without zero- Character Value not allowed!" },
                p3_country 					                    :	    { required : "This field is required", selected : "Please select Country" },
                p3_house_street2				                :       { required : "Please enter House No./Street" },
                p3_f_name       				  	 	        :       { required : "Please enter Name" },
                p3_f_nationality				  		        :       { required : "This field is required", selected : "Please select Nationality" },
                p3_f_prev_nationality			  		        :       { required : "This field is required", selected : "Please select Previous Nationality" },
                p3_f_place_birth                        		:	    { required : "Please enter Place of Birth" },
                p3_f_country_birth                        		:	    { required : "This field is required", selected : "Please select Country of Birth" },
                p3_m_name       				  	 	        :       { required : "Please enter Name" },
                p3_m_nationality				  		        :       { required : "This field is required", selected : "Please select Nationality" },
                p3_m_prev_nationality			  		        :       { required : "This field is required", selected : "Please select Previous Nationality" },
                p3_m_place_birth                        		:	    { required : "Please enter Place of Birth" },
                p3_m_country_birth                        		:	    { required : "This field is required", selected : "Please select Country of Birth" },
                p3_marital_status                        		:	    { required : "This field is required", selected : "Please select Applicant's Marital Status" },
                p3_s_name                               		:	    { required : "Please enter Name" },
                p3_s_nationality				  		        :       { required : "This field is required", selected : "Please select Nationality" },
                p3_s_prev_nationality			  		        :       { required : "This field is required", selected : "Please select Previous Nationality" },
                p3_s_place_birth    			  		        :       { required : "Please enter Place of Birth" },
                p3_s_country_birth                          	:	    { required : "This field is required", selected : "Please select Country of Birth" },
                p3_current_occupation                          	:	    { required : "This field is required", selected : "Please select Present Occupation" },
                p3_other_occupation                        	    :	    { required : "This field is required", selected : "Please select Present Other Occupation" },
                p3_employer                             	    :	    { required : "Please enter Employer Name/business" },
                p3_address                               	    :	    { required : "Please enter Address" },
                p3_other_organization                           :	    { required : "Please enter Organisation" },
                p3_other_desination                             :	    { required : "Please enter Designation" },
                p3_other_rank                                   :	    { required : "Please enter Rank" },
                p3_other_place_posting                           :	    { required : "Please enter Place of Postin" },
                p3_po_phone                                      :       { required : "Please enter your 10 digit correct phone or mobile number without zero- Character Value not allowed!", digits : "Please enter your 10 digit correct phone number without zero- Character Value not allowed!" }
            }
        });

        var app4 = $("#process4");
        app4.validate({
            rules:{
                p4_place_likely_visit		        : 		{ required : true },
                p4_business_c_name		            : 		{ required : true , maxlength : 250},
                p4_business_c_phone		            : 		{ required : true , maxlength : 250},
                p4_business_c_website		        : 		{ required : true , maxlength : 100},
                p4_business_f_name		            : 		{ required : true , maxlength : 250},
                p4_business_f_phone		            : 		{ required : true , maxlength : 250},
                p4_business_f_website		        : 		{ required : true , maxlength : 100},
                p4_business_f_name_contact          : 		{ required : true , maxlength : 250},
                p4_medical_name		                : 		{ required : true , maxlength : 100},
                p4_medical_id		                : 		{ required : true , maxlength : 30},
                p4_medical_passport	                : 		{ required : true , maxlength : 30},
                p4_medical_dob  	                : 		{ required : true , maxlength : 30},
                p4_address1     					: 		{ required : true },
                p4_medical_nationality              : { required : true, selected : true},
                p4_city_prev_visit					: 		{ required : true },
                p4_last_curr_visa_no	            :		{ required : true},
                p4_type_visa       					: 		{ required : true , selected : true},
                p4_place_issue  					: 		{ required : true },
                p4_date_issue				        : 		{ required : true },
                p4_r_name                        	: 		{ required : true, maxlength : 50 },
                p4_r_address    					: 		{ required : true, maxlength : 50 },
                p4_r_city           				: 		{ required : true, maxlength : 50 },
                p4_r_state      					: 		{ required : true, maxlength : 50},
                p4_r_country          				: 		{ required : true , maxlength : 50},
                p4_r_pincode                		: 		{ required : true},
                p4_r_phone                       	: 		{ required : true },
                p4_r_h_name                  		: 		{ required : true, maxlength : 50},
                p4_r_h_address1          			:		{ required : true, maxlength : 35},
                p4_r_h_address2          			:		{ required : false, maxlength : 35},
                p4_r_h_phone                		:		{required : true , digits : true, maxlength : 10, minlength: 10},
                p4_photo_name                		:		{ required : true}
            },
            messages:{
                p4_place_likely_visit        	    : 		{ required : "Please enter Places Likely To Be Visited" },
                p4_business_c_name     				: 		{ required : "Please enter Name" },
                p4_business_c_phone     			: 		{ required : "Please enter Address" },
                p4_business_c_website     			: 		{ required : "Please enter Address" },
                p4_medical_name     			    : 		{ required : "Please enter Name of the principal e-Medical Visa holder" },
                p4_medical_id        			    : 		{ required : "Please enter Visa number or Application id or of principal e-Medical Visa holder" },
                p4_medical_passport  				: 		{ required : "Please enter Passport number of principal e-Medical Visa holder" },
                p4_medical_dob     				    : 		{ required : "Please select Date of birth of principal e-Medical Visa holder" },
                p4_medical_nationality			    : 		{ required : "This field is required", selected : "Please select Nationality of principal e-Medical Visa holder" },
                p4_address1     				    : 		{ required : "Please enter Address" },
                p4_city_prev_visit				    : 		{ required : "Please enter Cities Previously Visited in India" },
                p4_last_curr_visa_no	            :	    { required : "Please enter Last Indian Visa No/Currently Valid Indian Visa No" },
                p4_type_visa     					:	    { required : "This field is required", selected : "Please select Type of Visa" },
                p4_place_issue  				    :       { required : "Please enter Place of Issue" },
                p4_date_issue				  	 	:       { required : "Please enter Date of Issue" },
                p4_r_name				  		    :       { required : "Please enter Reference Name or Hotel Name in India" },
                p4_r_address    			        :       { required : "Please enter Reference Address or Hotel Address" },
                p4_r_city                           : 		{ required : "Please enter City" },
                p4_r_state          				: 		{ required : "Please enter State" },
                p4_r_country            			: 		{ required : "Please enter Country" },
                p4_r_pincode          				: 		{ required : "Please enter ZIP Code / POST Code" },
                p4_r_phone          				: 		{ required : "Please enter Phone no" },
                p4_r_h_name                     	: 		{ required : "Please enter Reference Name in Home Country" },
                p4_r_h_address1              		: 		{ required : "Please enter Address" },
                p4_r_h_phone                		:	    { required : "Please enter 10 digit correct phone without zero- Character Value not allowed!", digits : "Please enter 10 digit correct phone without zero- Character Value not allowed!" },
                p4_photo_name                		:	    { required : "Please Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here" }
            }
        });

        var app5 = $("#process5");
        app5.validate({
            rules:{
                p5_passport_photo_name		        : 		{ required : true },
                p5_medical_photo_name		        : 		{ required : true },
                p5_business_photo_name		        : 		{ required : true }
            },
            messages:{
                p5_passport_photo_name        	    : 		{ required : "Please Upload A scanned Copy Of Your original Coloured Passport Or Take A picture Of Your Passport and Uploaded." },
                p5_medical_photo_name        	    : 		{ required : "Please Upload A Scanned Copy of Letter from the Hospital concerned in India on its letterhead." },
                p5_business_photo_name        	    : 		{ required : "Upload A Scanned Copy of Business Card." }
            }
        });

        var app51 = $("#process51");
        app51.validate({
            rules:{
                p51_details1		        : 		{ required : true },
                p51_details2		        : 		{ required : true },
                p51_details3		        : 		{ required : true },
                p51_details4		        : 		{ required : true },
                p51_details5		        : 		{ required : true },
                p51_details6		        : 		{ required : true }
            },
            messages:{
                p51_details1        	    : 		{ required : "Please give details" },
                p51_details2        	    : 		{ required : "Please give details" },
                p51_details3        	    : 		{ required : "Please give details." },
                p51_details4        	    : 		{ required : "Please give details." },
                p51_details5        	    : 		{ required : "Please give details." },
                p51_details6        	    : 		{ required : "Please give details." }
            }
        });

        var app6 = $("#contact-us");
        app6.validate({
            rules:{
                cu_name		        : 		    { required : true },
                cu_email		        : 		    { required : true, email: true },
                cu_query		        : 		    { required : true }
            },
            messages:{
                cu_name        	    : 		    { required : "Please enter your name." },
                cu_email        	    : 		    { required : "Please enter your email", email : "Please enter valid email address", remote : "Email already taken" },
                cu_query        	    : 		    { required : "Please enter query." }
            }
        });
    });

</script>

</body>
</html>