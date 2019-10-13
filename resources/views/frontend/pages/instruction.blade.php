@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h1>Instructions for <span>the Applicant</span></h1>
            <p><strong>Important points to know before applying for Indian Visa</strong></p>
            <p>This blog is for the citizens of the US, UK, Australia, and many other countries, who want to apply for Visa or e-Visa for India as a tourist or any other purpose. You are very lucky because now getting a visa for India is much easier and cheaper than before. Citizens of Canada, US, UK, Australia (and others) are all eligible for a 5-years tourist visa for India. To know about <strong>Indian E-Visa Information</strong> and points of e-Visa India read this blog till the end.</p>
            <p><strong>Visa Note</strong></p>
            <p>Generally, there are 5 subcategories in e-Visa for India- Tourist visa, e-Business visa, e-Medical visa and e-Medical Attendant visa. You must apply at least 4 days before you want to arrive in India.</p>
            <p>Few parts of India have been designated protected or restricted regions that need special permission and in some cases before government approval. For these regions, you have to describe your intent to visit when applying for the visa.</p>

            <p><strong>Instructions for <a href="/">E-Visa Application</a></strong></p>
            <p><strong>Validity</strong></p>
            <ul>
                <li><p><strong>e-Tourist Visa(for 30 Days)</strong>  Visa allow for double entry, non-extendable and non non-convertible.</p></li>
                <li><p><strong>e-Tourist Visa(for 365 Days)</strong> One year e-Tourist Visa allow for multiple entries with duration of 365 days from the date of grant of ETA.</p></li>
                <li><p><strong>e-Tourist Visa(for 5 Years)</strong>  Five years e-Tourist Visa allow for multiple entries with duration of Five years from the date of grant of ETA</p></li>
                <li><p><strong>e-Medical Visa(for 60 Days)</strong> Only triple entry is permitted with with duration of 60 days from the date of grant of ETA.</p></li>
                <li><p><strong>e-Medical Attendant Visa(for 60 Days)</strong> Only triple entry is permitted with with duration of 60 days from the date of grant of ETA.</p></li>
                <li><p><strong>e-Business Visa(for 365 Days)</strong> An e-business visa permits you stay for upto 365 days from the date of grant of ETA, and you only get two times entry.</p></li>
            </ul>

            <p><strong>Application to</strong></p>
            <p>The consular selection at your nearest embassy or Indian high commission or for the hassle-free application process you can go through <a href="/">www.evisaindia.in</a>. They will help and assist you to get any type of e-visa India. </p>
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