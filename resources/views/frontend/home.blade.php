@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h1>Welcome to Indian</br> <span>Visa Online</span></h1>
            <h3>e-Visa India</h3>
            <p>It is mandatory for all the foreign nationals to carry valid passport along with the print out of Indian
                tourist visa approval sent to their email, before leaving the country of travel origin. Visa to India
                can be applied through the online e-tourist visa link.</p>
            <p><strong>Important guidelines for the Indian Visa Process</strong></p>

            <ul>
                <li><p>After the initiation or submission of an application, one must not start any other application
                        against the same passport number. The consecutive applications will be rejected by the
                        Government of India due to redundancy.</p>
                </li>
                <li><p>One shall not be granted new e-Visa against the same passport until the expiry of the existing
                        e-Visa, this is applicable even if the details are incorrect.</p></li>
                <li><p>There can be no cancellation, amendment or refund once the visa is granted or an application is
                        submitted against a passport.</p></li>
                <li><p>It is strictly advisable to submit only one e-Visa India application form at a timeand complete
                        the same application that was initiated.</p></li>
                <li><p>Applicants are advised to carefully fill in the details in the application and review the same
                        before makingthefinalpayment.</p></li>
                <li><p>In case if the application ID cannot be traced, then one must immediately contact the 24/7
                        Customer Care service to get it checked before making further process.</p></li>
            </ul>

            <p><strong>Checklist for Indian Visa Application</strong></p>
            <ul>
                <li><p>Scanned copy of front page of the original passport.</p></li>
                <li><p>Recent digital photograph with white background.</p></li>
            </ul>
            <p>Make sure that these documents are ready and at hands reach, as it is required to upload them along with
                the application. Also, to note that visa fees are non-refundable.</p>
            <p><strong>e-Tourist Visa India requirement</strong></p>
            <ul>
                <li><p>An applicant's passport is required to have a minimum validity of six months from the date of
                        arrival in India.</p></li>
                <li><p>It is necessary that the passport has at least two blank pages for Visa stamping.</p></li>
                <li><p>At the time of arrival travelers should carry an onward journey ticket or a return ticket.</p>
                </li>
                <li><p>Sufficient expenditure money should be at one’s disposal during the stay in India.</p></li>
                <li><p>Applications need to be made online minimum of 4 days and maximum of 120 days prior to the date
                        of arrival.</p></li>
            </ul>
            <p>The validity of Indian Visa is for 60 days from the date of arrival. The visa is to be availed during the
                validity period.</p>
            <p><strong> The Indian e-Visa is divided into three categories</strong></p>
            <ul>
                <li><p><strong>e-Tourist Visa</strong></p></li>
                <p>Valid for two entries from the first arrival date.</p>
                <li><p><strong>e-Business Visa </strong></p></li>
                <p>Also Valid for two entries from the first arrival date.</p>
                <li><p><strong>e-Medical Visa</strong></p></li>
                <p>Two e-Medical Attendant Visas are granted against one e-Medical Visa.</p>
            </ul>
            <p>Valid for three entries from the first arrival date</p>
            <p>Indian Entry Points that Accept e-Visas</p>
            <p><strong>One can get entry through 26 international airports in India</strong></P>
            <p>Ahmedabad, Amritsar, Bagdogra, Bangalore, Calicut, Chennai, Chandigarh, Kochi, Coimbatore, Delhi, Gaya,
                Goa, Guwahati, Hyderabad, Jaipur, Kolkata, Lucknow, Madurai, Mangalore, Mumbai, Nagpur, Pune,
                Tiruchirapalli, Trivandrum, Varanasi, and Vishakhapatnam</p>
            <p><strong>One can also enter through the five designated seaports in India</strong></p>
            <p>Kochi, Goa, Mangalore, Mumbai, Chennai.</p>
            <p>Foreigners are allowedto exit from any of the authorized Immigration Check Posts (ICPs) in India.</p>
            <p>Finally, the Indian Embassy reserves the authority to the grant or reject the Indian Visa.</p>
            <p><strong> List of Countries eligible for Indian e Visa:</strong></p>
            {{--<p> <strong>Click here to view the complete list </strong></p>--}}

            <div class="panel clum_new" style="display: block;">
                <div class="clum_new">
                    <input class="form-control" id="search" type="text" placeholder="Search your country.....">
                    <br>

                    <table class="table table-bordered table-striped" id="evisa-country">
                        <?php
                            $j = -1;
                        $visa_count = count($evisa_country);
                        for($i = 0; $i < $visa_count; $i++){
                        if($j >= $visa_count)
                            break;
                        ?>

                        <tr>
                            <td><?php
                                $k1 = ++$j;
                                if($j < $visa_count && $evisa_country[$k1]){ echo $evisa_country[$k1];}
                                ?>
                            </td>
                            <td><?php
                                $k2 = ++$j;
                                if($j < $visa_count && $evisa_country[$k2]){ echo $evisa_country[$k2];} ?>
                            </td>
                            <td><?php
                                $k3 = ++$j;
                                if($j < $visa_count && $evisa_country[$k3]){ echo $evisa_country[$k3];} ?>
                            </td>

                        </tr>
                        <?php

                            } ?>
                    </table>
                </div>
            </div>

            <br/><br/><br/>
            {{--<p> <strong>Indian Visa Application
            Checklist: </strong></p>
            <p>For obtaining the Visa for India, visitors would only need to upload a scanned copy of the front page of the original passport and a digital photograph with white background which can be taken at home with your digital camera or camera phone. It must be with a white background. Please make sure your have these documents ready on your system, laptop, IPAD or smart phone before you start filling the application form because you will be required to upload them with the application. Visa fees are non-refundable.

            </p>
            <p> <strong>e-Tourist Visa India Facility:
            </strong></p>

            <p> Passport should have at least six months validity from the date of arrival in India. The passport should have at least two blank pages for stamping by the Immigration Officer for Indian Visa on Arrival. International Travellers should have return ticket or onward journey ticket, with sufficient money to spend during his/her stay in India. Applicants of the eligible countries are requested to apply online minimum 4 days in advance of the date of arrival with a window of 120 days. The delivery times are not applicable for Sri Lankan and Chinese Passport Holders. For these nationalities the delivery time is 5 business days in case of urgent processing and 10 business days in case of normal processing.
            </p>
            <p>The Official Indian Visa is valid for 60 days from the date of arrival. The visa must be availed within its period of validity. The Indian e-Tourist visa for the purpose of Tourism and Business will be valid for two entries and for Medical purpose it will be valid for Three entries from the date of the first arrival date in India. e-Visa is allowed for a maximum of two visits in a calendar year. e-Visa is valid for entry through 25 designated Airports (i.e. Ahmedabad, Amritsar, Bagdogra, Bengaluru, Calicut, Chennai, Chandigarh,Cochin, Coimbatore, Delhi, Gaya, Goa, Guwahati, Hyderabad, Jaipur, Kolkata, Lucknow, Mangalore, Mumbai, Nagpur, Pune, Tiruchirapalli, Trivandrum, Varanasi & Visakhapatnam) and 5 designated seaports (i.e. Cochin, Goa, Mangalore, Chennai & Mumbai). However, the foreigner can take exit from any of the authorized Immigration Check Posts (ICPs) in India. Indian Embassy reserves the authority to the grant or reject the Indian Visa.

            </p>
                                    <button class="btn-info about_read">Read More</button>
                       --}}         </div>


    </div>
</div>
@endsection