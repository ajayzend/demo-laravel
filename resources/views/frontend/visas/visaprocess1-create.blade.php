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
                                        <option  value="Normal Processing (processing Time 4 To 7 Business Days"> Normal Processing (processing Time 4 to 7 Business Days)
                                        </option>

                                        <option @if($url_action == 'U') selected  @endif value="Urgent Processing (processing Time Maximum 3 Business Days)"> Urgent Processing (processing Time 1 to 3 Business Days)

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
                                    <option value="e-Tourist Visa">e-Tourist Visa(for 30 days)</option>
                                    <option value="e-Tourist Visa 1 year">e-Tourist Visa(for 1 year)</option>
                                    <option value="e-Tourist Visa 5 years">e-Tourist Visa(for 5 years)</option>
                                    <option @if($url_action == 'M') selected @endif value="e-Medical Visa">e-Medical Visa(for 60 days)</option>
                                    <option @if($url_action == 'B') selected @endif value="e-Business Visa">e-Business Visa(for 1 year)</option>
                                    <option value="e-Attendant Visa">e-Medical Attendant Visa(for 60 days)</option>
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
                                    <p>All foreign nationals, their children and even as newly born babies need to <strong>apply for Indian visa</strong>. But the citizens of Nepal & Bhutan can enter India without any visa, but if they (citizens of Nepal & Bhutan) enter India from China then they need a visa. </p>
                                    <p>Fees of visas are non-refundable even if the requested service is customized or not arranged. And one more important thing here is the validity of the visa begins from the date of issue not from the date of travel. Citizens from yellow fever affected countries who <strong>apply visa to India</strong> must have a valid vaccination certificate.</p>
                                    <p>Visa holders <strong>apply for Indian visa online</strong> for long term visas valid for more than 180 days should fulfill the related registration official procedure. Individuals who have Student Visa, Employment Visa and Business Visa with the validity of more than 180 days are mandatory to get themselves registered in the nearby Foreign Registration Office or Foreigners Regional Registration Office within 14 days of arrival in India.</p>
                                    <p><strong>Online Visa Application Steps</strong></p>
                                    <p>The website <a href="/">http://e-visa-india.in/</a> helps the applicants to <strong>apply for Indian visa from USA</strong> or other nation with all legal formalities. Through this website you will get any type of visa very easily by providing the following information:-</p>
                                    <ul>
                                        <li><p><strong>The nation you are applying for a visa from</strong> - The applicants need to choose the country they apply from.</p></li>
                                        <li><p><strong>Indian Mission</strong> - Choose the appropriate Indian Mission/Post applicable to your location</p></li>
                                        <li><p><strong>Nationality</strong> – Reveal your nationality</p></li>
                                        <li><p><strong>Date of Birth</strong> – Without any mistake in DD/MM/YYYY format</p></li>
                                        <li><p><strong>Email ID</strong> - The soft copy of sanctioned visa is sent to this email</p></li>
                                        <li><p><strong>Expected Date of Arrival</strong> - Without any mistake in DD/MM/YYYY format</p></li>
                                        <li><p><strong>Visa Type</strong> – Depend on the purpose of the travel, the aspirant must opt for the types of visa he/she is applying for.</p></li>
                                        <li><p><strong>Reason</strong> – There are different types of visas depends on the purpose of visit in India, applicants must reveal their purpose of visit.</p></li>
                                    </ul>
                                    <p>So, if you are ready to fill <strong>Indian visa application form</strong> then contact us, we will happy to help you.</p>
                                    <?php } elseif($url_action == 'U') {?>
                                       <p>Generally, <strong>urgent e-tourist Visa</strong> for India is only approved to individuals who are from an Indian origin, in case of any emergency in their families like death or illness. In this visa type, the decision of the Consular Officer will be ultimate on the subject of what comprises an emergency.</p>
                                        <p>Emergency Visa services will not exist to aspirants falling under reference categories. Marriage ceremonies, visits for a religious purpose or visits for tourism, etc. do not come under this category.</p>
                                        <p><strong>The eligibility criteria for Emergency Visa to India</strong></p>
                                        <p><strong>Urgent Indian eVisa Application</strong> is valid for 6-months to naturalize US citizens of Indian origin. If you want an emergency visa, then you need to submit your application with us, with all the necessary details of your visa requirement.</p>
                                        <p>There are many important documents you need to arrange when applying for an <strong>emergency visa to India.</strong></p>
                                    <ul>
                                        <li><p>Valid Passport with 6-month validity</p></li>
                                        <li><p>Passport size photograph with a plain background.</p></li>
                                        <li><p>Proof of local address</p></li>
                                        <li><p>Proof of emergency</p></li>
                                        <li><p>Certificate for Renunciation of Indian Citizenship or any other relevant document</p></li>
                                    </ul>
                                    <p>Urgent Indian eVisa applicants should upload their application online for the processing of their emergency visas. It is very important to fill every detail correctly; if there is any mistake your e-visa application will not be approved. And that’s why we are here to help you to move every step towards Urgent Indian eVisa.</p>
                                    <p><strong>Duration & Validity</strong></p>
                                    <p>Once you completed the application with valid documents and confirmation of full payment, you will get your emergency India e-visa with 1 to 3 days. But application for the emergency visas does not process on Indian National Holidays.</p>
                                    <p>It is very hard to get an emergency visa to India and a minor mistake can reject your application. So, it is very important to take the help of an expert and we are always ready to help you. If you have any queries regarding an emergency visa then feel free to contact us.</p>
                                    <?php } elseif($url_action == 'T') {?>
                                        <p><strong>E tourist visa India</strong> is an online approval for the travelers whose only intention is visiting India for tourism. Recently, the Government of India has opened this facility for the citizens of 165 countries. Not worry, if your country is not available on the list of 165 countries you may go for the normal visa which may take a slightly longer time. However, in the end, you will be able to visit India as a tourist.</p>
                                        <p><strong>The eligibility criteria for Indian e-Tourist visa</strong></p>
                                    <ul>
                                        <li><p>Foreign citizens whose purpose for visiting India is recreation & tourism for the short duration can apply for e-tourist visa</p></li>
                                        <li><p>Passport with minimum 6 months validity and at least two blank pages</p></li>
                                        <li><p>Return ticket or onward journey ticket</p></li>
                                        <li><p>Sufficient funds to spend</p></li>
                                        <li><p>India travel e visa not available to Diplomatic / Official Passport Holders</p></li>
                                        <li><p>Children & newly born babies also need a valid e-visa</p></li>
                                    </ul>
                                    <p><strong>Duration & Validity</strong></p>
                                    <p><strong>Indian tourist visa</strong> has 3 special validities and a number of possible entries into India to choose from considering better flexibility for travelers.</p>
                                    <ol>
                                        <li><p>If you choose a double entry e-Tourist visa, it comes with a validity of 30 days from the date of issue and gives you permission for a stay of 30 days.</p></li>
                                        <li><p>If you choose multiple entry e-Tourist visa, it comes with the validity of 1 year from the day of issue and you can say up to 180 days.</p></li>
                                        <li><p>Another multiple entry visa comes with 5 years of validity from the day of issue for stay up to 180 days per entry.</p></li>
                                    </ol>
                                    <p><strong>India tourist e visa</strong> is very simple to apply through <a href="/">https://www.e-visa-india.in/</a>. So, if you are looking for <strong>visa for Goa</strong> to visit India but have many doubts in your mind regarding visa and other legal formalities, you can chat with us anytime without any hesitation.</p>
                                    <?php } elseif($url_action == 'B') {?>
                                        <p><strong>Indian Business Visas</strong> or e-business visa India is issued to individuals who want to visit India for specific business purposes like promotion, negotiations, and establishment related business activities in India. As well as, people who want to set up a contact for future business relations are permitted to travel on an e-business visa in India.</p>
                                        <p>But here you should keep in mind that, if you are entering India to work as employees then you need to apply for an employment visa, not for an <strong>e business visa India</strong></p>
                                        <p><strong>An e-business visa India is granted to the following types of individuals:</strong></p>
                                    <ul>
                                        <li><p>You are approaching India for a legal business reason, such as establishing some international business, dealing with commercial products, for business meetings, hiring people for your business, participating in a trade fair, or other valid business activities.</p></li>
                                        <li><p>You should be of “guaranteed financial position” - i.e. you should have sufficient funds (you should also be able to verify this to be granted a business visa).</p></li>
                                        <li><p>You’re not coming to India to lend money, or to run an irrelevant business.</p></li>
                                        <li><p>You stick to any tax liabilities you might face</p></li>
                                        <li><p>As we mentioned in the upper paragraph, you are not going to be employed in India, for that you need to apply for an employment visa.</p></li>
                                    </ul>
                                    <p><strong>Duration & Validity</strong></p>
                                    <p>An <strong>Indian e-Business Visa</strong> may be valid for 1 year or more with numerous entries. Citizens from the United States can stay only 180 days in India unless the individual obtains a residential permit. Businessmen who want to set up their own business or initiate a joint venture in India can apply for 1 years visa with multiple entries. For any queries regarding the eBusiness visa in India, you can contact us anytime.</p>
                                    <?php } elseif($url_action == 'M') {?>
                                    <p>A medical visa is a very good initiative for the individual who seeks the best & affordable treatment in India. Individuals can <strong>apply for Indian medical visa</strong> to get treatment from any reputed and government recognized hospitals or medical centers. If you want to take any attendant with you then only up to 2 attendants are permissible who must be your blood relative with separate medical attendant visas and equal visa validity as the Medical Visa. The serious disorders or medical conditions would be of key consideration for the medical visa for India</p>
                                    <p><strong>Required documents for India Medical Visa seekers</strong></p>
                                    <ul>
                                        <li><p><strong>Passport with personal details:</strong> Passport with minimum 6 months validity, at least two blank pages, photocopy of passport with signature page.</p></li>
                                        <li><p><strong>Passport size photographs:</strong> Most recent 2 x 2 passport size colored photograph with front view and plain background.</p></li>
                                        <li><p><strong>Hospital Letter:</strong> An official document of preliminary medical recommendation from the country of origin/country of residence that certifies the aspirant has been counseled to go for particular medical treatment. In cases where the aspirant requests to go for treatment under the Indian system of Medicine, the case may also be considered.</p></li>
                                        <li><p><strong>Deceleration of funds:</strong> Aspirants with the occupation of Student, Retired or Unemployed; 3 most recent bank statements are recommended for the deceleration of sufficient funds.</p></li>
                                    </ul>
                                    <p><strong>Duration & Validity</strong></p>
                                    <p>The opening duration of the <strong>e-medical visa India</strong> is up to 60 days or the time of the treatment, whichever is less. The medical visa will be valid for a maximum of 3 entries in one year. And the duration starts from day one from the issue day, not on the day of entry.</p>
                                    <p>If you want the medical visa India without any hassle then we can help you. For any queries or uncertainties in your mind regarding visa, feel free to call us.</p>
                                    <?php } elseif($url_action == 'A') {?>
                                    <p>India is not only a tourist but one of the most preferred medical hubs in the world, thanks to its modern and affordable best quality healthcare facilities. And that’s why many patients from developed nations or third world countries come here with the expectations of best medical treatments. </p>
                                    <p>But, just like other foreign individuals, they need to take a visa permit from the Government of India. When the patients get their e-medical visa, but they also need attendants to take care of them while they get treatment. Most patients have deadly illnesses like cancer and therefore need personalized care from a family member. And if any of their family members want to come with them as an attendant then they need to apply for the e-Medical attendant visa.</p>
                                    <p><strong>Indian e-Medical Attendant Visa </strong></p>
                                    <p>Indian e-Medical Attendant Visa is only granted to a maximum of 2 relatives of the patient. This visa demands that the attendant of the patient remains with the patient during the treatment period.</p>
                                   <p>The applicant for the attended visa is compulsory to produce a letter from a recognized /specialized Hospital/ in India validating that assistance is required by the patient with the Medical Attendant's name mentioned in the letter.</p>
                                   <p><strong>Requirements:</strong></p>
                                    <ul>
                                        <li><p>A recent colored photograph of medical attendant visa applicants should be not more than 3 MB in size (2inch X 2inch), white background and no shadow on the face.</p></li>
                                        <li>Passport with a minimum of 6 months validity, the passport should have at least 2 blank pages. </li>
                                    </ul>
                                    <p><strong>E-Medical Attendant Visa Fees & possession</strong></p>
                                    <p>Upon successful fulfilling the requirements and paperwork, a medical attendant visa applicant will be prompted to pay for this service.</p>
                                   <p>After the submission of the application, applicants will receive a notification through their email address of the successful application of e medical attendant visa. In the emergency cases Indian e-Medical Attendant Visa, applicants get the notification within 1 to 3 working days.</p>
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
