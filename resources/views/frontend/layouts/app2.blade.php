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
                p3_house_street					                : 		{ required : true },
                p3_village_town					                : 		{ required : true },
                p3_state            					        : 		{ required : true },
                p3_pincode				                        :		{ required : true},
                p3_country          					        : 		{ required : true , selected : true},
                p3_house_street2    					        : 		{ required : true },
                p3_f_name       				                : 		{ required : true },
                p3_f_nationality                         	    : 		{ required : true , selected : true},
                p3_f_prev_nationality                      	    : 		{ required : true , selected : true},
                p3_f_place_birth            		            :		{ required : true},
                p3_f_country_birth            		            :		{ required : true, selected : true},
                p3_m_name       				                : 		{ required : true },
                p3_m_nationality                         	    : 		{ required : true , selected : true},
                p3_m_prev_nationality                      	    : 		{ required : true , selected : true},
                p3_m_place_birth            		            :		{ required : true},
                p3_m_country_birth            		            :		{ required : true,  selected : true},
                p3_marital_status            		            :		{ required : true,  selected : true},
                p3_s_name                   		            :		{ required : true},
                p3_s_nationality                         	    : 		{ required : true , selected : true},
                p3_s_prev_nationality                      	    : 		{ required : true , selected : true},
                p3_s_place_birth                          	    : 		{ required : true},
                p3_s_country_birth          		            :		{ required : true,  selected : true},
                p3_current_occupation          		            :		{ required : true,  selected : true},
                p3_other_occupation          		            :		{ required : true,  selected : true},
                p3_employer                 		            :		{ required : true},
                p3_address                   		            :		{ required : true}
            },
            messages:{
                p3_house_street			        	            : 		{ required : "Please enter House No./Street" },
                p3_village_town				                    : 		{ required : "Please enter Village/Town/City" },
                p3_state            				            : 		{ required : "Please enter State/Province/District" },
                p3_pincode 				                        :	    { required : "Please enter Postal/Zip Code"},
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
                p3_address                               	    :	    { required : "Please enter Address" }
            }
        });

        var app4 = $("#process4");
        app4.validate({
            rules:{
                p4_place_likely_visit		        : 		{ required : true },
                p4_address1     					: 		{ required : true },
                p4_city_prev_visit					: 		{ required : true },
                p4_last_curr_visa_no	            :		{ required : true},
                p4_type_visa       					: 		{ required : true , selected : true},
                p4_place_issue  					: 		{ required : true },
                p4_date_issue				        : 		{ required : true },
                p4_r_name                        	: 		{ required : true },
                p4_r_address    					: 		{ required : true },
                p4_r_city           				: 		{ required : true },
                p4_r_state      					: 		{ required : true},
                p4_r_country          				: 		{ required : true },
                p4_r_pincode                		: 		{ required : true},
                p4_r_phone                       	: 		{ required : true },
                p4_r_h_name                  		: 		{ required : true},
                p4_r_h_address1          			:		{ required : true},
                p4_r_h_phone                		:		{ required : true}
            },
            messages:{
                p4_place_likely_visit        	    : 		{ required : "Please enter Places Likely To Be Visited" },
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
                p4_r_h_phone                		:	    { required : "Please enter Phone" }
            }
        });

    });

</script>

</body>
</html>