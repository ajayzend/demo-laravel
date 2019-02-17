@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h4>Frequently Asked Questions</h4>
            <p><strong>What is the Electronic Visa (e-Visa)?</strong></p>
            <p>The Electronic Visa or e-Visa is an online visa issued by the Indian Government for citizens of 161 countries, who wish to visit India for touristic, business or medical reasons, for a maximum stay of 60 consecutive days. You can apply for an e-Tourist, e-Business or e-Medical Visa twice in a calendar year.

                A valid Indian visa and an international travel document, eg; a valid and current passport, are required for all foreign visitors going to India</p>
            <a href="/"><strong>Apply Online</strong></a>
            <br/><br/>
            <p><strong>What do I need to apply for an e-Tourist Visa?</strong></p>

            <p>Current passport, picture, credit/debit card. If deemed necessary you may be required to provide additional information such as your home address, occupation, and family information.

                It is necessary to supply extra information or documentation for business or medical visas.

                For business visas for India, applicants must submit a Business Card giving information of the receiving organization.

                For medical visas for India, applicants must submit a letter from the participating hospital.

                At the moment of application, it is not necessary to have the extra information as you can provide them at a later date.</p>
<tr></tr>
            <p><strong>Who is eligible to apply for Electronic Visa (e-Visa)?</strong></p>
            <p>Citizens of the 166 countries listed below are eligible for the e-Visa, including the US, the UK, Canada and Australia (see full list below). Note all Pakistani nationals and foreign citizens who have Pakistani relatives, are required to apply for the traditional Indian Visa.

                Please find below the complete list of the 166 countries whose citizens are eligible to apply for the e-Visa:</p>

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
            <p><strong>How long before my trip to India should I apply for the e-Tourist Visa?</strong></p>
            <p>You must apply for Electronic Visa (e-Visa) at least four (4) days before departing for India.

                However, it is recommended to apply at least one (1) month in advance.</p>
            <br/>
            <p><strong>Is the Electronic Visa (e-Visa) a single or multiple entry and can it be extended?</strong></p>
            <p>As of April 2017, the electronic visa is a double-entry visa for the e-Tourist and e-Business and a triple entry for e-Medical, non-extendable , non-convertible & not valid for visiting Protected/Restricted and Cantonment Areas. It is valid for 60 consecutive days, starting the day of arrival in India. You can apply for an e-Visa a maximum of two (2) times per year.</p>
            <br/>
            <p><strong>What to do in case I have made a mistake on my application?</strong></p>
            <p>In case you have entered incorrect information and only realized the mistake after having submitted your e-Visa application, you will need to re-apply for a new travel authorization. The old application will be automatically canceled.</p>
            <p><strong>What to do after I receive my eVisa online?</strong></p>
            <p>You will receive your approved e-Tourist or e-business or e-Medical Visa application via email. You must save this email, as it is the official confirmation of your approved Visa.

                You are required to print at least one copy and have it on you at all times, during your entire stay in India.

                Upon arrival at one of the designated airports, you will be required to show your printed Electronic Visa (e-Visa) and your passport.

                Once your documents have been verified, you have an obligation to provide your fingerprints and photo (biometric information). Then an immigration officer will place a visa sticker in your passport.</p>
            <p><strong>Are there any restrictions to enter India with an Electronic Visa (e-Visa)?</strong></p>
            <p>Yes, foreign nationals who enter India with an e-Visa must arrive in one of the following airports:</p>
            <ul>
        <?php
        $port_count = count($port_arrival);
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
            <p><strong>Are there any restrictions to exit India with an e-Visa?</strong></p>
            <p>No. You can exit India through any authorised Immigration Check Post (ICP).</p>
            <p><strong>Is the e-Tourist Visa (e-Visa) valid for cruise ships?</strong></p>
            <p>Yes, from April 2017 the e-Tourist visa (e-Visa) for India is valid for cruise ships docking at the following designated seaports:</p>
            <ul>
                <li>COCHIN</li>
                <li>GOA</li>
                <li>MANGALORE</li>
            </ul>
            <p>If you are taking a cruise which docks in another seaport, you must have a traditional visa stamped inside the passport.</p>
            <p><strong>What is the difference between a traditional Indian Visa and an Electronic Visa?</strong></p>
            <p>The traditional Indian Visa can only be obtained through a presential application at the embassy or consulate. The process to obtain a traditional Indian Visa is much more complicated and takes a lot longer, as you are required to submit your original passport along with your visa application, financial and residence statements via mail in order for the visa to be approved and stamped inside the physical passport. The traditional Indian Visa allows for stays of up to ninety (90) consecutive days.

                The Electronic Visa e-Visa (e-Tourist, e-Business, e-Medical) application online is a much simpler and easier process, is issued electronically and sent to the applicant via e-mail, which he or she must print out to present upon arrival in India.
                From April 2017, the e-Visa is accepted in 24 different international airports in India as well as 3 seaports. This number will soon rise according to the Indian Government. The e-Visa also allows holders to remain in India for up to sixty (60) consecutive days. It has also been changed to a double-entry visa allowing holders to enter India twice with the same visa.</p>
            <p><strong>What vaccines do I need to travel to India?</strong></p>
            <p>While you are not required to get vaccinated before your trip to India, it is highly recommendable that you do.

                Following are the most commonly spread diseases for which you should get vaccinated:</p>
            <ul>
                <li>Hepatitis A</li>
                <li>Hepatitis BA</li>
                <li>Typhoid fever</li>
                <li>Encephalitis</li>
                <li>Yellow fever</li>
            </ul>
            <p>Find more information regarding the health regulations <a target="_blank" href="https://wwwnc.cdc.gov/travel/destinations/traveler/none/india"><u>here</u></a>.</p>
            <p><strong>Do I need a Yellow Fever Vaccination Card to enter India?</strong></p>
            <p><strong>A</strong> Angola, Argentina</p>
            <p><strong>B</strong> Benin,Bolivia, Brazil, Burkina Faso, Burundi</p>
            <p><strong>C</strong> Cameroon,Central African Republic, Chad, Colombia, Congo, Cote d’Ivoire</p>
            <p><strong>D</strong> Democratic Republic of Congo</p>
            <p><strong>E</strong> Ecuador, Equatorial Guinea, Ethiopia,</p>
            <p><strong>F</strong> French Guyana</p>
            <p><strong>G</strong> Gabon, Gambia, Ghana, Guinea, Guinea-Bissau, Guyana</p>
            <p><strong>K</strong> Kenya</p>
            <p><strong>L</strong> Liberia</p>
            <p><strong>M</strong> Mali, Mauritania</p>
            <p><strong>N</strong> Niger, Nigeria</p>
            <p><strong>P</strong> Panama, Paraguay, Peru</p>
            <p><strong>R</strong> Rwanda</p>
            <p><strong>S</strong> Senegal, Sierra Leone, Sudan, Suriname, South Sudan</p>
            <p><strong>T</strong> Togo, Trinidad and Tobago</p>
            <p><strong>U</strong> Uganda</p>
            <p><strong>V</strong> Venezuela</p>
            <p><strong>Important Note:</strong> All citizens of Yellow Fever affected countries, who wish to visit India, must present a Yellow Fever Vaccination Card at arrival. If the traveler does not carry a vaccination card, he/she will be quarantined for a period of six (6) days, after having arrived.</p>
            <a href="/"><strong style="text-align: center">Apply for eVisa</strong></a>
        </div>
    </div>
</div>
@endsection