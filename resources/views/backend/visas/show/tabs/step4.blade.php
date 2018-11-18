<table class="table table-striped table-hover">
    <tr>
        <th colspan="2" style="text-align: center"> <h3>Details of Visa Sought</h3></th>
    </tr>
    <tr>
        <th>Type of Visa</th>
        <td>{{ $visa->p1_visa_type }}</td>
    </tr>

    <tr>
        <th>Duration of Visa (in Days)</th>
        <td>{{ $visa->p4_visa_duration }}</td>
    </tr>

    <tr>
        <th>No. of Entries</th>
        <td>{{ $visa->p4_number_entries }}</td>
    </tr>

    <tr>
        <th>Port of Arrival in India</th>
        <td>{{ $visa->p1_port_arrival }}</td>
    </tr>

    <tr>
        <th>Expected Port of Exit from India</th>
        <td>{{ $visa->p4_expected_port_exit }}</td>
    </tr>

    <tr>
        <th>Places Likely To Be Visited</th>
        <td>{{ $visa->p4_place_likely_visit }}</td>
    </tr>

    @if($visa->p1_visa_type == 'e-Business Visa' )
        <tr>
            <th colspan="2" style="text-align: center"> <h3>Previous Visa/Currently valid Visa Details</h3></th>
        </tr>

        <tr>
            <th colspan="2" style="text-align: center"> <h5>Details of the Applicants Company</h5></th>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $visa->p4_business_c_name }}</td>
        </tr>
        <tr>
            <th>Address, Phone no</th>
            <td>{{ $visa->p4_business_c_phone }}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{ $visa->p4_business_c_website }}</td>
        </tr>


        <tr>
            <th colspan="2" style="text-align: center"> <h5>Details of Indian Firm</h5></th>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $visa->p4_business_f_name }}</td>
        </tr>
        <tr>
            <th>Address, Phone no</th>
            <td>{{ $visa->p4_business_f_phone }}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{ $visa->p4_business_f_website }}</td>
        </tr>
        <tr>
            <th>Name and contact number of Indian firm.</th>
            <td>{{ $visa->p4_business_f_name_contact }}</td>
        </tr>
    @endif


    <tr>
        <th colspan="2" style="text-align: center"> <h3>Previous Visa/Currently valid Visa Details</h3></th>
    </tr>
    <tr>
        <th>Have You Ever Visited India Before?</th>
        <td>{{ $visa->p4_visit_india_before }}</td>
    </tr>

    @if($visa->p4_visit_india_before == 'Yes')
        <tr>
            <th>Address</th>
            <td>{{ $visa->p4_address1 }}</td>
        </tr>
        <tr>
            <th>Cities Previously Visited in India</th>
            <td>{{ $visa->p4_city_prev_visit }}</td>
        </tr>

        <tr>
            <th>Last Indian Visa No/Currently Valid Indian Visa No</th>
            <td>{{ $visa->p4_last_curr_visa_no }}</td>
        </tr>

        <tr>
            <th>Type of Visa</th>
            <td>{{ $visa->p4_type_visa }}</td>
        </tr>

        <tr>
            <th>Place of Issue</th>
            <td>{{ $visa->p4_place_issue }}</td>
        </tr>

        <tr>
            <th>Date of Issue</th>
            <td>{{ Carbon\Carbon::parse($visa->p4_date_issue)->format(config('app.dateformat')) }}</td>
        </tr>
    @endif
    <tr>
        <th>Has Permission To Visit Or To Extend Stay in <br> India Previously Been Refused? Yes / No</th>
        <td>{{ $visa->p4_permission_visit }}</td>
    </tr>

    @if($visa->p4_permission_visit == 'Yes')
        <tr>
            <th>If So, When And By Whom (Mention Control No. and Date Also)</th>
            <td>{{ $visa->p4_permission_visit_details }}</td>
        </tr>
    @endif
    <tr>
        <th colspan="2" style="text-align: center"> <h3>Other Information</h3></th>
    </tr>

    <tr>
        <th>Countries visited in last 10 years</th>
        <td>{{ $visa->p4_country_visited_last_10_y }}</td>
    </tr>

    <tr>
        <th colspan="2" style="text-align: center"> <h3>SAARC Country Visit Details</h3></th>
    </tr>


    <tr>
        <th>Have You Visited SAARC Countries <br>(Except Your Own Country) during last 3 years?</th>
        <td>{{ $visa->p4_saarc_countries_flag }}</td>
    </tr>


    <?php
    if($visa->p4_saarc_country_year_visit != '' && $visa->p4_saarc_countries_flag == 'Yes') {
    foreach($visa->p4_saarc_country_year_visit as $key=>$rows) {?>
    <tr>
        <td><b>Name of SAARC country</b> <select disabled class="select form-control" id="saarc_country_saved_<?php echo $key;?>" name="saarc_country_saved[]">
                {{-- <option value="" selected="selected">Select</option>--}}
                <option <?php if($rows['saarc_country'] == 'AFGHANISTAN') echo 'selected="selected"' ?> value="AFGHANISTAN" title="AFGHANISTAN"> AFGHANISTAN</option>
                <option <?php if($rows['saarc_country'] == 'BHUTAN') echo 'selected="selected"' ?> value="BHUTAN" title="BHUTAN"> BHUTAN</option>
                <option <?php if($rows['saarc_country'] == 'PAKISTAN') echo 'selected="selected"' ?> value="PAKISTAN" title="PAKISTAN"> PAKISTAN</option>
                <option <?php if($rows['saarc_country'] == 'MALDIVES') echo 'selected="selected"' ?> value="MALDIVES" title="MALDIVES"> MALDIVES</option>
                <option <?php if($rows['saarc_country'] == 'BANGLADESH') echo 'selected="selected"' ?> value="BANGLADESH" title="BANGLADESH"> BANGLADESH</option>
                <option <?php if($rows['saarc_country'] == 'SRI LANKA') echo 'selected="selected"' ?> value="SRI LANKA" title="SRI LANKA"> SRI LANKA</option>
                <option <?php if($rows['saarc_country'] == 'NEPAL') echo 'selected="selected"' ?> value="NEPAL" title="NEPAL"> NEPAL</option>
            </select></td>

        <td> <b>Year</b><select disabled class="select form-control" id="saarc_year_saved_<?php echo $key;?>" name="saarc_year_saved[]">
                {{-- <option value="" selected="selected">Select</option>--}}
                <option <?php if($rows['saarc_year'] == '2018') echo 'selected="selected"' ?> value="2018">2018</option>
                <option <?php if($rows['saarc_year'] == '2017') echo 'selected="selected"' ?> value="2017">2017</option>
                <option <?php if($rows['saarc_year'] == '2016') echo 'selected="selected"' ?> value="2016">2016</option>
                <option <?php if($rows['saarc_year'] == '2015') echo 'selected="selected"' ?> value="2015">2015</option>
                <option <?php if($rows['saarc_year'] == '2014') echo 'selected="selected"' ?> value="2014">2014</option>
            </select></td>

        <td><b>No. of visits</b><input  class="numberinput form-control" disabled value="<?php echo $rows['saarc_visit']; ?>" id="saarc_visit_saved_<?php echo $key;?>" name="saarc_visit_saved[]" step="0.01" type="number" /> </div></td>
    </tr>
    <?php } }?>

    <tr>
        <th colspan="2" style="text-align: center"> <h3>Reference</h3></th>
    </tr>

    <tr>
        <th>Reference Name or Hotel Name in India</th>
        <td>{{ $visa->p4_r_name }}</td>
    </tr>

    <tr>
        <th>Reference Address or Hotel Address</th>
        <td>{{ $visa->p4_r_address }}</td>
    </tr>

    <tr>
        <th>City</th>
        <td>{{ $visa->p4_r_city }}</td>
    </tr>

    <tr>
        <th>State</th>
        <td>{{ $visa->p4_r_state }}</td>
    </tr>

    <tr>
        <th>Country</th>
        <td>{{ $visa->p4_r_country }}</td>
    </tr>

    <tr>
        <th>ZIP Code / POST Code</th>
        <td>{{ $visa->p4_r_pincode }}</td>
    </tr>

    <tr>
        <th>Phone no</th>
        <td>{{ $visa->p4_r_phone }}</td>
    </tr>

    <tr>
        <th>Reference Name in Home Country</th>
        <td>{{ $visa->p4_r_h_name }}</td>
    </tr>

    <tr>
        <th>Address</th>
        <td>{{ $visa->p4_r_h_address1 }}</td>
    </tr>

    <tr>
        <th></th>
        <td>{{ $visa->p4_r_h_address2 }}</td>
    </tr>

    <tr>
        <th>Phone</th>
        <td>{{ $visa->p4_r_h_phone }}</td>
    </tr>

    <tr>
        <th>Profile Photo</th>
        <td><img height="220" width="220" id="profileimg" src="{{ Storage::disk('public')->url('img/visaprofile/' . $visa->p4_photo_name) }}"></td>
    </tr>
</table>