@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h1>Instructions for <span>the Applicant</span></h1>
            <ul>
                <li><p>e-Visa is valid for 60 days from the date of arrival. The visa must be availed within its period of validity. The e-Tourist visa for the purpose of Tourism and Business will be valid for two entries and for Medical purpose it will be valid for Three entries from the date of the first arrival date in India. e-Visa is allowed for a maximum of two visits in a calendar year.</p></li>
                <li><p>The visa result shall be emailed 110 days prior to your expected arrival date in India if you have applied more than 120 days in advance. If your application is submitted within 120 days prior to your expected arrival date in India then your visa result shall be emailed within 4 to 7 business days (Excluding Saturdays, Sundays and Indian public Holidays) from the date of submission. If your travel is within 4 days then your visa result shall be emailed in maximum 72 hours. To avail the fast track service, your travel date must be after 72 hours from the time you have submitted and paid against the application. All the processing times are valid after receipt of the appropriate documents against each individual application. e-Visa India will not be responsible for any delay in the process due to non-availability of proper documents. Our delivery time starts after the application is complete with all the information and documents required to process the same.The delivery times are not applicable for Sri Lankan and Chinese Passport Holders. For these nationalities the delivery time is 5 business days in case of urgent processing and 10 business days in case of normal processing. Please send an email at support@evisaindia.in or Chat 24/7 customer care if you haven't received the delivery in the above mentioned time. Once the fee is paid against the application, it is non-refundable.</p></li>
            <li><p>e-Tourist Visa India (eTV) is valid for minimum two entries against each visa issued and you can apply only twice in a calendar year.</li>
           <li><p>One recently clicked passport size photograph with white background, to be uploaded along with the photo page/first page of the applicants Passport containing personal details like name, date of birth, nationality, expiry date etc. Utmost care regarding the photograph clarity and other specifications should be taken while uploading with the application, failing to which might cause rejection of the application.</p></li>
            <li><p>The applicant must carry a copy of the eTourist Visa along with him/her at the time of travel.</li>
            <li><p>On arrival in India the biometric details of the applicant will be mandatorily captured at Immigration. The applicant's entry is at the sole discretion of the Immigration officer at the India Airport who is a representative of the Government of India.</p></li>
            </ul>

            <p><strong>e-Visa Facility is available for holders of passport of following countries</strong></p>
            <?php $visa_count = count($evisa_country);?>
            <p>Citizens of the <?=$visa_count;?> countries listed below are eligible for the e-Visa, including the US, the UK, Canada and Australia (see full list below). Note all Pakistani nationals and foreign citizens who have Pakistani relatives, are required to apply for the traditional Indian Visa. Please find below the complete list of the <?=$visa_count;?> countries whose citizens are eligible to apply for the e-Visa:</p>
            <div class="panel clum_new" style="display: block;">
                <div class="clum_new">
                    <input class="form-control" id="search" type="text" placeholder="Search your country.....">
                    <br>

                    <table class="table table-bordered table-striped" id="evisa-country">
                        <?php
                        $j = -1;
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
                            <td><?php
                                $k4 = ++$j;
                                if($j < $visa_count && $evisa_country[$k4]){ echo $evisa_country[$k4];} ?>
                            </td>
                        </tr>
                        <?php

                        } ?>
                    </table>
                </div>
            </div>
            <p><strong>Note:</strong> If your country is not on this list, this does not mean you will not be able to travel to India. You will need to apply for a traditional Indian Visa at the nearest Embassy or Consulate</p>
            <?php $port_count = count($port_arrival);?>
            <p><strong>e-Visa is valid for entry through <?=$port_count?> designated Airports</strong></p>
            <ul>
                <?php
                for($i = 0; $i < $port_count; $i++){ ?>
                <li><?php echo $port_arrival[$i] ?></li>
                <?php } ?>
            </ul>
            <p>Or these designated seaports:</p>
            <ul>
                <li>CHENNAI</li>
                <li>COCHIN</li>
                <li>GOA</li>
                <li>MANGALORE</li>
                <li>MUMBAI</li>
            </ul>
            <p>Attempting to enter the country through any other entry port other than the ones specified above will result in having your entrance to India denied.

                Those who wish to enter the country by land or different sea or airports must have previously applied and received a traditional Visa.</p>
       <p>e-Visa once when issued is non-extendable, non-convertible & not valid for visiting Protected/Restricted and Cantonment Areas.</p>
        </div>
    </div>
</div>
@endsection