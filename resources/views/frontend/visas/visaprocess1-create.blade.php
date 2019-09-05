@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">

            <div class="row1">
                <h1 style="text-align: center"><strong><?php echo $h1;?></strong></h1>
                <?php //echo validation_errors(); ?>
                <div class="form-outer">

                    <div class="title">

<div class="title"><p class="text-center">e-Visa-India (eVI) Application</p></div>

                    </div>

                    {{ Form::open(['route' => 'frontend.visas.store', 'class' => 'form-horizontal', 'id' => 'process1']) }}
                    {{ Form::hidden('ps', 10001 ) }}
                        <div class="firsttype">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Application
                                    Type</label>

                                <div class="col-sm-6 col-xs-12">

                                    <select id="p1_app_type" class="form-control" name="p1_app_type">
                                        <option value="0"> Select Application Type</option>
                                        <option value="Normal Processing (processing Time 4 To 7 Business Days"> Normal Processing (processing Time 4 To 7 Business Days
                                        </option>
                                        <option value="Urgent Processing (processing Time Maximum 3 Business Days)"> Urgent Processing (processing Time Maximum 3 Business Days)
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
                                <input id="p1_fname" type="text" value="" class="form-control" placeholder="First Name" name="p1_fname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Middle Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_mname" type="text" value="" class="form-control" placeholder="Middle Name" name="p1_mname" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Name</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_lname" type="text" value="" class="form-control" placeholder="Last Name" name="p1_lname" autocomplete="off"/>
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
                           {{ Form::select('p1_nationality', $evisa_country, 0, ['class' => 'form-control select2 box-size', 'id' => 'p1_nationality']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Port of Arrival
                        </label>
                        <div class="col-sm-6 col-xs-12">
                            {{ Form::select('p1_port_arrival', $port_arrival, 0, ['class' => 'form-control select2 box-size', 'id' => 'p1_port_arrival']) }}
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Passport No
                            </label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_passport_number" type="text" value="" class="form-control" placeholder="Passport No."
                                       name="p1_passport_number" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Date input -->
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span> Date of
                                Birth</label>
                            <div class="col-sm-4 col-xs-12">
                                <input placeholder="(DD/MM/YYYY)" type="text" value="" id="p1_dob" name="p1_dob" class="form-control"
                                       type="text" autocomplete="on">
                            </div>
                            <div class="col-sm-4 col-xs-12">(DD/MM/YYYY)</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_email" value="" type="text" class="form-control" placeholder="Email" name="p1_email" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span class="star">*</span>Repeat
                                Email</label>
                            <div class="col-sm-6 col-xs-12">
                                <input id="p1_email2" value="" type="text" class="form-control" placeholder="Repeat Email"
                                       name="p1_email2" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Telephone Number</label>
                            <div class="col-sm-6 col-xs-12">
                                <input  id="p1_phone" value="" type="text" class="form-control" placeholder="Telephone Number"
                                       name="p1_phone" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Expected Date of
                                Arrival</label>
                            <div class="col-sm-4 col-xs-12">
                                <input id="p1_edate" value="" type="text" name="p1_edate" class="form-control"
                                       placeholder="Expected Date of Arrival"  autocomplete="off"/>
                            </div>
                            <div class="col-sm-4 col-xs-12">(DD/MM/YYYY)</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of
                                Visa</label>
                            <div class="col-sm-6 col-xs-12">
                                <?php //echo $visa; ?>
                                <select id="p1_visa_type" name="p1_visa_type" class="form-control">
                                    <option value="0">Select Visa</option>
                                    <option value="e-Tourist Visa">e-Tourist Visa</option>
                                    <option value="e-Medical Visa">e-Medical Visa</option>
                                    <option value="e-Business Visa">e-Business Visa</option>
                                    <option value="e-Attendant Visa">e-Attendant Visa</option>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="row">
                            <div class="about_us">
                                <?php if($url_action == 'C') {?>
                                    <p>The Indian e-Visa is a program that allows citizens of other counties to <strong>apply for Indian Visa</strong> online and at their comfort. Currently, thousands of travelers from different countries can apply for the visa online for different categories like tourist visa, medical visa, business visa and urgent visa based on the purpose of visit India. And the entire process can be done without having to visit the Indian Embassy. Tourists are therefore positive to use this scheme to get their Indian e-Visa as the process is well-organized and easy.</p>
                                    <p><strong>Understanding The Indian E-Visa Process</strong></p>
                                    <p>E-Visa is applied & received online without submitting your passport. The process of applying and getting a traditional Indian visa is very much complicated and take longer time in comparison to <strong>apply for Indian visa online</strong>. Generally, you have to wait about weeks for approval of traditional Visa instead of few days for e-Visa.</p>
                                    <p>The online visa process is made straightforward and easy to allow travelers from different countries of the world to <strong>apply visa to India</strong>.  To apply for an <a href="/"><strong><u>Indian visa from USA</u></strong></a> or any other country you need to follow 3 simple steps:</p>
                                    <ul>
                                        <li><p>Visit the www.evisaindia.in and fill out the application form with correct details.</p></li>
                                        <li><p>Make an online payment using a PayPal, credit or debit card or netbanking.</p></li>
                                        <li><p>Check your email address e-Visa will be sent to your email within a fixed time limit.</p></li>
                                    </ul>
                                    <p>It is very important to know the process of <strong>apply visa to India</strong>. Once an <strong>Indian visa application form</strong> is submitted online then you must not submit any other visa application against the same passport number at any other source.</p>
                                    <p>If you have any doubt in your mind or you are unable to trace the application status then feel free to <strong>chat</strong> with our24x7 customer care service and get the <strong>e-mail support</strong> for your every problem regarding e-Visa India.</p>
                                    <?php } elseif($url_action == 'U') {?>
                                        <p>Are you in an emergency and want to come to India urgently in the next few days but still have not applied for Visa to India? But now you don’t need to take tension.</p>
                                        <p>The Government of India has made efforts to make sure that you can easily travel to India when life presents any unpredictable incidences like illness, the death of any family member or legal engagements that require your availability in India. With <strong>Urgent Indian eVisa Application</strong>, the processing of your India Visa sanction letter (the eVisa) will be completed within 24 working hours and we are (evisaindia.in) also here to handle your every problem & uncertainties regarding urgent visa.</p>
                                        <p><strong>Things to keep in mind before applying for urgent e visa:</strong></p>
                                    <ul>
                                        <li><p>The urgent or emergency visa to India is subject to approval only.</p></li>
                                        <li><p><strong>Applicant can get their Urgent Visa within 24 working hours</strong></p></li>
                                        <li><p>In emergency cases, like medical requirement or death of nearest & dearest, you will be asked to submit a copy of letters from the hospital to prove the happening.</p></li>
                                        <li><p>It is mandatory to provide correct details like email, contact number, and other data.</p></li>
                                        <li><p><strong>Urgent e-tourist Visa</strong> application system does not work on the National holidays of India.</p></li>
                                        <li><p>This visa is valid for Double or Tripple entry.</p></li>
                                        <li><p>Once your urgent visa will process, we will send you a copy. Travelers will need to show a hard copy of the visa to the immigration officers.</p></li>
                                    </ul>
                                    <p>With evisaindia.in visa service, it's sure to get any type of Indian Visa without any hassle. Should you require any further assistance about <strong>Emergency Visa to India</strong>, and then don’t hesitate to <strong>chat</strong> with our customer care executives anytime & any day.  Or you can get <strong>email support</strong> at support@evisaindia.in, we will respond to you as soon as possible. So, apply now for the urgent visa to India with us and see the difference.</p>
                                    <?php } elseif($url_action == 'T') {?>
                                        <p>Indian Government was launched <strong>India tourist e visa</strong> system to allow the citizens of other nations to apply for the visa electronically.  And it is mandatory to all the foreign travelers in India to keep a valid visa while traveling.</p>
                                        <p><strong>Evisaindia.in ASSISTANCE FOR INDIA VISA APPLICATION</strong></p>
                                    <p>With the introduction of <strong>e tourist visa India</strong>, it has significantly made it trouble-free to get India Visa. And we are also there to make it easier when you apply for the tourist visa through us. We will apply on your behalf at a very nominal service charge plus Indian Government visa fee, but this can save yours lots of time and keep you away from tension.</p>
                                    <p><strong>Indian tourist visa</strong> allows travelers to visit India for touristic uses. Some of the big reasons to visit India with this type of visa are:</p>
                                    <ul>
                                        <li><p>Visiting the attractions of India</p></li>
                                        <li><p>Visiting family or friends</p></li>
                                        <li><p>Attending yoga & meditation classes</p></li>
                                    </ul>
                                    <p><strong>Important points to know regarding India travel e visa:</strong></p>
                                    <ul>
                                        <li><p>Validity of tourist visa is 60 days</p></li>
                                        <li><p><strong>Validity of India tourist e-Visa is 1 year after the date of issue.</strong></p></li>
                                        <li><p><strong>The e-tourist visa India allows for Double Entry, up to stay of 60 days</strong></p></li>
                                        <li><p>Non-convertible & non-extendable visa.</p></li>
                                        <li><p>Can apply for only 2 e-visas in a year.</p></li>
                                        <li><p>Must have sufficient fund for visit & stay in India.</p></li>
                                        <li><p>Travelers are required to carry a copy of their approved e-Visa India authorization at all times during their stay.</p></li>
                                        <li><p>Validity of the passport must be at least 6 months from the date of arrival with a minimum of 2 blank pages.</p></li>
                                        <li><p><strong>Entry with e-tourist visa is valid through 26 Airports & 5 Seaports in India.</strong></p></li>
                                    </ul>
                                    <p>There are many other points if you want to know more, then <strong>chat with us</strong> and we are happy to help you. So no matter if you want a <strong>visa for Goa</strong> to enjoy heavenly beaches or North India to explore the Himalayas, we are ready to serve you.</p>
                                    <?php } elseif($url_action == 'B') {?>
                                        <p>Getting a chance to travel to India for business purpose, you will possibly be desperate to seize the opportunity anyhow. India is the best place to visit, even if you’ll mainly be there for business.</p>
                                        <p><strong>India business visa</strong> is very much in demand and thus the Government of India has made it uncomplicated to attain the business visa online. Individuals who want to visit India for business or official deal can apply for electronic India visa by filling an application form online. Though, e-Visa is meant for short term visits but ideal for those who are scheduling a trip for a couple of days.</p>
                                        <p><strong>If the spouse or any dependent family member wants to visit India with e-business visa holder then they must apply for entry visa only after the visa approval of themain business visa holder</strong></p>
                                        <p><strong>Duration of E- Business Visa</strong></p>
                                        <p><strong>An e-business visa permits you stay for up to 60 days, and you only get two times entry through 26 Airports & 5 Seaports, so that you can only leave and return once.</strong></p>
                                        <p>So we at Evisaindia.in are ready to help you to get <strong>Indian e-Business Visa</strong> for a short time-span in which you can explore your business opportunities or represent your corporation in India to advance the relationship with Indian firms.</p>
                                        <p><strong>What Are the Uses of Indian Online Business Visa?</strong></p>
                                        <ol>
                                            <li><p>For company or workshop meetings</p></li>
                                            <li><p>To start a new venture whether its manufacturing or IT</p></li>
                                            <li><p>For attending or giving the lectures under GIAN (Global Initiative for Academic Network)</p></li>
                                            <li><p>For hiring manpower from India</p></li>
                                            <li><p>For the sale & purchase</p></li>
                                            <li><p>For attending seminars, business or trade fairs</p></li>
                                        </ol>
                                    <p><strong>Documents Required For Indian e-Business Visa</strong></p>
                                    <ul>
                                        <li><p>Scanned copy of passport Bio page</p></li>
                                        <li><p>Digitally scanned photograph</p></li>
                                        <li><p>Copy of the business card</p></li>
                                        <li><p>Letter from the company to specify the reason for the visit on letterhead</p></li>
                                        <li><p>Latest photograph of the applicant</p></li>
                                        <li><p>PayPal or Credit card or Debit card or NetBanking account to complete the process</p></li>
                                    </ul>
                                    <p><strong>Apply for e business visa</strong></p>
                                    <p>The process is very simple and won’t take much time for completion. You just need to fill the form on our website with correct details and submit the online application. And after that, it is our responsibility to provide you <strong>e business visa India</strong>.</p>
                                    <?php } elseif($url_action == 'M') {?>
                                    <p>The e-medical visa for India is a category for the visa to get travel authorization to seek medical treatment in India. Only this visa allows travelers to enter the country to seek medical assistance.</p>
                                <p>The <strong>e-medical visa India</strong> is a short term visa granted for medical treatment explanations. But this type of visa is only granted to the patient and not for the caretaker. Caretaker of the patient can obtain the medical attendant visa to be an adjunct to the e-Medical visa holder.</p>
                                <p><strong>How to apply for Indian medical visa?</strong></p>
                                <p>With us (Evisaindia.in) it is very easy to obtain <strong>India Medical Visa</strong>. Eligible applicants who wish to receive medical treatment can easily complete our application form by filling a few necessary details which include their full name, date, and place of birth, nationality, contact info and passport type, etc.</p>
                                <p>But before filling the online application form, applicants must keep in mind the points given below:</p>
                                <ul>
                                    <li><p>Only triple entry is permitted with e-visa medical.</p></li>
                                    <li><p>You can visit only 3 times a year with e-medical visa.</p></li>
                                    <li><p>E-medical visa is non-extendable & non-convertible.</p></li>
                                    <li><p>You should have sufficient funds to continue their treatment.</p></li>
                                    <li><p>You need to carry a copy of approved e-visa every time & everywhere in India.</p></li>
                                    <li><p>You must have an advanced return ticket when applying for a medical visa.</p></li>
                                    <li><p>Parents may not include their children in their online Visa for India application.</p></li>
                                    <li><p>A letter from the hospital in India.</p></li>
                                    <li><p><strong>e- Medical visa India provides you entrance in India through 26 designated airports and 5 seaports.</strong></p></li>
                                </ul>
                                    <p>It is feasible to get a <strong>medical visa India</strong> 3 times per year and each e Medical visa will permit a stay of 60 days. In that way, you can visit India for medical treatment and apply a next electronic visa if you want to. So, go ahead and apply for e-medical visa with us, and if you have any doubt in mind then don’t hesitate to chat with our <strong>customer care executives</strong> anytime.</p>
                            <?php } ?>
                            </div>
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
    </script>
@endsection
