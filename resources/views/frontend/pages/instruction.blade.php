@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h1>Instructions for <span>the Applicant</span></h1>
            <p>E- Visa application is a very best initiative from the government of India to make the process hassle-free. Application for e- Visa needs to apply online a minimum of 4 days and a maximum of 120 days before you want to travel to India. Important points regarding <strong>Indian E-Visa</strong> Information that you should keep in mind before applying are given below.</p>
            <p><strong>Online Application Form:</strong></p>
            <ul>
                <li><p>Indian Visa or e-Visa is meant for the foreigners, to get the permission of entry in India.</p></li>
                <li><p>Visa application form is meant for single per only.</p></li>
                <li><p>It is very important to fill the form in exact manners, especially the name, address, and DOB column.</p></li>
                <li><p>Check the details before submitting the form, once the form is submitted then there is no scope of modification.</p></li>
                <li><p>Keep the application ID after submission of the form for further communication.</p></li>
            </ul>
            <p><strong>Photo Requirements</strong></p>
            <p>Your digital photo for the e-visa application should meet the fixed requirements of the authority, which are given below:</p>
            <ul>
                <li><p>JPEG in format and not greater than 300 KB in size</p></li>
                <li><p>Equal height & width</p></li>
                <li><p>Front view & full face</p></li>
                <li><p>Plain, light-colored or white background</p></li>
                <li><p>No shadows on the face or the background</p></li>
            </ul>
            <p><strong>Basic requirements</strong></p>
            <p>The <strong>E-Visa Application</strong> is a very simple process with us, so only if you have the required documents in sequence, your homework will be stress-free. For this you need to do:</p>
            <ul>
                <li><p>Register yourself in online service</p></li>
                <li><p>Fill every detail correctly</p></li>
                <li><p>Attach the copy of your passport</p></li>
                <li><p>Attach your passport size photographs as well.</p></li>
                <li><p>Attach a copy of your passport size photograph</p></li>
                <li><p>Pay the application fees</p></li>
            </ul>
            <p>If you are looking for any type of visa or e-visa India, e-Visa India can help you obtain the same very rapidly. So, don’t hesitate and contact us for the best services.</p>

            <p><strong>Validity</strong></p>
            <ul>
                <li><p><strong>e-Tourist Visa(for 30 Days)</strong>  Visa allow for double entry, non-extendable and non non-convertible.</p></li>
                <li><p><strong>e-Tourist Visa(for 365 Days)</strong> One year e-Tourist Visa allow for multiple entries with duration of 365 days from the date of grant of ETA.</p></li>
                <li><p><strong>e-Tourist Visa(for 5 Years)</strong>  Five years e-Tourist Visa allow for multiple entries with duration of Five years from the date of grant of ETA</p></li>
                <li><p><strong>e-Medical Visa(for 60 Days)</strong> Only triple entry is permitted with with duration of 60 days from the date of grant of ETA.</p></li>
                <li><p><strong>e-Medical Attendant Visa(for 60 Days)</strong> Only triple entry is permitted with with duration of 60 days from the date of grant of ETA.</p></li>
                <li><p><strong>e-Business Visa(for 365 Days)</strong> An e-business visa permits you stay for upto 365 days from the date of grant of ETA, and you only get two times entry.</p></li>
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