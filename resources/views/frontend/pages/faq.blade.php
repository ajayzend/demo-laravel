@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h1>Frequently Asked Questions</h1>
            <p><strong>Q1. What is an India Tourist e Visa?</strong></p>
            <p>This is an official permit to enter in India and this permit is electronically attached with your passport.</p>

            <p><strong>Q2. India Tourist e Visa Validity, Number of Entries and Max Stay?</strong></p>
            <p>There are 3 types of e Visa validity:</p>

            <p><strong>30 days after issued Entries: </strong> Double Entry</p>
            <p><strong>1 year after issued Entries:</strong> Several Entries. Continuous stay during each stay shall not more than 90 days, but the citizens of the USA, UK, Canada, and Japan can stay up to 180 days on each visit.</p>
            <p><strong>5 years after issued</strong></p>
            <p><strong>Entries:</strong> Several Entries. Continuous stay during each stay shall not more than 90 days, but the citizens of the USA, UK, Canada, and Japan can stay up to 180 days on each visit.</p>

            <p><strong>Q3. Do I need to apply for the tourist e Visa if I am traveling to India on a ship?</strong></p>

            <p>Of course, however, there are five entry points in India through waterway which are:</p>
            <ul>
                <li><p>CHENNAI</p></li>
                <li><p>COCHIN</p></li>
                <li><p>GOA</p></li>
                <li><p>MANGALORE</p></li>
                <li><p>MUMBAI</p></li>
            </ul>

            <p><strong>Q4. Do I need a hard copy of the India Tourist e Visa?</strong></p>
            <p>Yes, you will need a hardcopy of the Indian Tourist e visa upon arrival. Just after the approval of your visa, we will forward it to your email with other important details like your application ID, visa number, and validity of Visa. We recommend everyone to print this authentication and always keep a copy with your passport.</p>
            <p><strong>Q5. Can I extend my stay beyond the limit?</strong></p>
            <p>No, the duration of stay cannot be extended.</p>
            <p><strong>Q6. How long does it take to get an India Tourist e Visa?</strong></p>
            <p>It depends on your selected process timing. Generally, there are three process timing options which are:</p>
            <ol>
                <li><p>Standard Processing which takes 5 days.</p></li>
                <li><p>Rush Processing takes 3 days.</p></li>
                <li><p>Super Rush Processing takes 2 days.</p></li>
            </ol>
            <p><strong>Q7. Who is eligible to apply for Electronic Visa (e-Visa)?</strong></p>
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
                        </tr>
                        <?php

                        } ?>
                    </table>
                </div>
            </div>
<p><strong>Note:</strong> If your country is not on this list, this does not mean you will not be able to travel to India. You will need to apply for a traditional Indian Visa at the nearest Embassy or Consulate</p>
            <p><strong>Q8. How long before my trip to India should I apply for the e-Tourist Visa?</strong></p>
            <p>You must apply for Electronic Visa (e-Visa) at least four (4) days before departing for India.

                However, it is recommended to apply at least one (1) month in advance.</p>
            <br/>
            <p><strong>Q9. Is the Electronic Visa (e-Visa) a single, multiple or multiple entry and can it be extended?</strong></p>
            <p><b>For Tourist e-Visa</b></p>
            <ol>
                <li><p>One Month (30 days) e-Tourist Visa Duration from the date of grant of ETA with Double Entry, non-extendable and non-convertible.</p></li>
                <li><p>One year (365 days) e-Tourist Visa Duration from the date of grant of ETA with Multiple Entry.</p></li>
                <li><p>Five years e-Tourist Visa Duration from the date of grant of ETA with Multiple Entry.</p></li>
            </ol>
            <p><b>For Business e-Visa</b></p>
            <p>One year (365 days) e-Business Visa Duration from the date of grant of ETA with Multiple Entry.</p>
            <p><b>For Medical e-Visa</b></p>
            <p>Sixty days (60 days) e-Medical Visa Duration from the date of grant of ETA with Tripple Entry.</p>
            <br/>
            <p><strong>Q10. What to do in case I have made a mistake on my application?</strong></p>
            <p>In case you have entered incorrect information and only realized the mistake after having submitted your e-Visa application, you will need to re-apply for a new travel authorization. The old application will be automatically canceled.</p>
            <p><strong>Q11. Are there any restrictions to enter India with an Electronic Visa (e-Visa)?</strong></p>
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
            <p><strong>Q12. Are there any restrictions to exit India with an e-Visa?</strong></p>
            <p>No. You can exit India through any authorised Immigration Check Post (ICP).</p>
            <p><strong>Q13. Is the e-Tourist Visa (e-Visa) valid for cruise ships?</strong></p>
            <p>Yes, from April 2017 the e-Tourist visa (e-Visa) for India is valid for cruise ships docking at the following designated seaports:</p>
            <ul>
                <li>CHENNAI</li>
                <li>COCHIN</li>
                <li>GOA</li>
                <li>MANGALORE</li>
                <li>MUMBAI</li>
            </ul>
            <p>If you are taking a cruise which docks in another seaport, you must have a traditional visa stamped inside the passport.</p>
            <p><strong>Q14. What vaccines do I need to travel to India?</strong></p>
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
            <p><strong>Q15. Do I need a Yellow Fever Vaccination Card to enter India?</strong></p>
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