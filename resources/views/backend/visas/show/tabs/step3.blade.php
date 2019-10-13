<table class="table table-striped table-hover">
    <tr>
        <th colspan="2" style="text-align: center"> <h3>Applicant's Address Details</h3></th>
    </tr>

    <tr>
        <th colspan="2" style="text-align: center"> <h4>Present Address</h4></th>
    </tr>

    <tr>
        <th>House No./Street</th>
        <td>{{ $visa->p3_house_street }}</td>
    </tr>

    <tr>
        <th>Village/Town/City</th>
        <td>{{ $visa->p3_village_town }}</td>
    </tr>

    <tr>
        <th>State/Province/District</th>
        <td>{{ $visa->p3_state }}</td>
    </tr>

    <tr>
        <th>Postal/Zip Code</th>
        <td>{{ $visa->p3_pincode }}</td>
    </tr>

    <tr>
        <th>Country</th>
        <td>{{ $visa->p3_country }}</td>
    </tr>


    <tr>
        <th>Phone No</th>
        <td>{{ $visa->p3_phone }}</td>
    </tr>

    <tr>
        <th>Mobile No</th>
        <td>{{ $visa->p3_mobile }}</td>
    </tr>


    <tr>
        <th colspan="2" style="text-align: center"> <h4>Permanent Address</h4></th>
    </tr>

    <tr>
        <th>House No./Street</th>
        <td>{{ $visa->p3_house_street2 }}</td>
    </tr>

    <tr>
        <th>Village/Town/City</th>
        <td>{{ $visa->p3_village_town2 }}</td>
    </tr>

    <tr>
        <th>State/Province/District</th>
        <td>{{ $visa->p3_state2 }}</td>
    </tr>

    <tr>
        <th colspan="2" style="text-align: center"> <h3>Family Details</h3></th>
    </tr>
    <tr>
        <th colspan="2" style="text-align: center"> <h4>Father's Details</h4></th>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $visa->p3_f_name }}</td>
    </tr>

    <tr>
        <th>Nationality</th>
        <td>{{ $visa->p3_f_nationality }}</td>
    </tr>

    <tr>
        <th>Previous Nationality</th>
        <td>{{ $visa->p3_f_prev_nationality }}</td>
    </tr>

    <tr>
        <th>Place of Birth</th>
        <td>{{ $visa->p3_f_place_birth }}</td>
    </tr>

    <tr>
        <th>Country of Birth</th>
        <td>{{ $visa->p3_f_country_birth }}</td>
    </tr>

    <tr>
        <th colspan="2" style="text-align: center"> <h4>Mother's Details</h4></th>
    </tr>

    <tr>
        <th>Name</th>
        <td>{{ $visa->p3_m_name }}</td>
    </tr>

    <tr>
        <th>Nationality</th>
        <td>{{ $visa->p3_m_nationality }}</td>
    </tr>

    <tr>
        <th>Previous Nationality</th>
        <td>{{ $visa->p3_m_prev_nationality }}</td>
    </tr>

    <tr>
        <th>Place of Birth</th>
        <td>{{ $visa->p3_m_place_birth }}</td>
    </tr>

    <tr>
        <th>Country of Birth</th>
        <td>{{ $visa->p3_m_country_birth }}</td>
    </tr>
    <tr>
        <th colspan="2" style="text-align: center"> </th>
    </tr>
    <tr>
        <th>Applicant's Marital Status</th>
        <td>{{ $visa->p3_marital_status }}</td>
    </tr>
    <tr>
        <th colspan="2" style="text-align: center"> <h4>Spouse's Details</h4></th>
    </tr>

    @if($visa->p3_marital_status == 'Married')
        <tr>
            <th>Name</th>
            <td>{{ $visa->p3_s_name }}</td>
        </tr>

        <tr>
            <th>Nationality</th>
            <td>{{ $visa->p3_s_nationality }}</td>
        </tr>
        <tr>
            <th>Previous Nationality</th>
            <td>{{ $visa->p3_s_prev_nationality }}</td>
        </tr>
        <tr>
            <th>Place of Birth</th>
            <td>{{ $visa->p3_s_place_birth }}</td>
        </tr>

        <tr>
            <th>Country of Birth</th>
            <td>{{ $visa->p3_s_country_birth }}</td>
        </tr>
    @endif

    <tr>
        <th>Were your Grandfather/ Grandmother (paternal/maternal) <br>Pakistan Nationals or Belong to Pakistan held area</th>
        <td>{{ ($visa->p3_flag1 == 1) ? 'Yes' : 'No' }}</td>
    </tr>
    @if($visa->p3_flag1 == 1)
        <tr>
            <th>If Yes, give details</th>
            <td>{{ $visa->p3_flag1_detail }}</td>
        </tr>
    @endif

    <tr>
        <th colspan="2" style="text-align: center"> <h3>Profession / Occupation Details of Applicant</h3></th>
    </tr>

    <tr>
        <th>Present Occupation</th>
        <td>{{ $visa->p3_current_occupation }}</td>
    </tr>

    @if($visa->p3_current_occupation == 'OTHER')
        <tr>
            <td>If Others,please specify</td>
            <td>{{ $visa->p3_other_occupation }}</td>
        </tr>
        @elseif($visa->p3_current_occupation == 'STUDENTS' || $visa->p3_current_occupation == "HOME WIFE")
        <tr>
            <td>Specify below occupation details of</td>
            <td>{{ $visa->p3_occupation_hw }}</td>
        </tr>
    @endif
    <tr>
        <th>Employer Name/business</th>
        <td>{{ $visa->p3_employer }}</td>
    </tr>
    <tr>
        <th>Designation</th>
        <td>{{ $visa->p3_desination }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $visa->p3_address }}</td>
    </tr>
    <tr>
        <th>Employee Phone</th>
        <td>{{ $visa->p3_po_phone }}</td>
    </tr>
    <tr>
        <th>Past Occupation</th>
        <td>{{ $visa->p3_past_occupation }}</td>
    </tr>

    @if($visa->p3_past_occupation == 'OTHER')
        <tr>
            <td>If Others,please specify</td>
            <td>{{ $visa->p3_other_past_occupation }}</td>
        </tr>
    @endif

    <tr>
        <th>Are/were you in a Military/Semi-Military/Police/Security.<br> Organization?</th>
        <td>{{ $visa->p3_flag2 }}</td>
    </tr>
    @if($visa->p3_flag2 == 'Yes')
        <tr>
            <th>Organisation</th>
            <td>{{ $visa->p3_other_organization }}</td>
        </tr>
        <tr>
            <th>Designation</th>
            <td>{{ $visa->p3_other_desination }}</td>
        </tr>
        <tr>
            <th>Rank</th>
            <td>{{ $visa->p3_other_rank }}</td>
        </tr>

        <tr>
            <th>Place of Posting</th>
            <td>{{ $visa->p3_other_place_posting }}</td>
        </tr>
    @endif

    <tr>
        <td>Blank&nbsp;</td>
        <td>Blank&nbsp;</td>
        <td>Blank&nbsp;</td>
        <td>Blank&nbsp;</td>
        <td>Blank&nbsp;</td>
        <td>Blank&nbsp;</td>
    </tr>
</table>