<table class="table table-striped table-hover">
    <tr>
        <th>Surname</th>
        <td>{{ $visa->p1_lname }}</td>
    </tr>

    <tr>
        <th>Middle Name</th>
        <td>{{ $visa->p1_mname }}</td>
    </tr>

    <tr>
        <th>Given Name/s</th>
        <td>{{ $visa->p1_fname }}</td>
    </tr>

    <tr>
        <th>Have you ever changed your name</th>
        <td>{{ $visa->p2_changed_your_name }}</td>
    </tr>

     @if($visa->p2_changed_your_name  == 'yes')
    <tr>
        <th>Surname</th>
        <td>{{ $visa->p2_previous_surname }}</td>
    </tr>


    <tr>
        <th>Name</th>
        <td>{{ $visa->p2_previous_name }}</td>
    </tr>
    @endif

    <tr>
        <th>Gender</th>
        <td>{{ $visa->p2_gender }}</td>
    </tr>

    <tr>
        <th>Date of Birth</th>
        <td>{{ Carbon\Carbon::parse($visa->p1_dob)->format(config('app.dateformat')) }}</td>
    </tr>

    <tr>
        <th>Town/City of Birth</th>
        <td>{{ $visa->p2_town_city_birth }}</td>
    </tr>

    <tr>
        <th>Country of Birth</th>
        <td>{{ $visa->p2_country_birth }}</td>
    </tr>

    <tr>
        <th>Citizenship/National Id No</th>
        <td>{{ $visa->p2_national_id }}</td>
    </tr>

    <tr>
        <th>Religion</th>
        <td>{{ $visa->p2_religion }}</td>
    </tr>

    @if($visa->p2_religion == 'Other')
        <tr>
            <th>Religion Others</th>
            <td>{{ $visa->p2_other_religion }}</td>
        </tr>
    @endif

    <tr>
        <th>Visible Identification Marks</th>
        <td>{{ $visa->p2_visible_marks }}</td>
    </tr>

    <tr>
        <th>Educational Qualification</th>
        <td>{{ $visa->p2_education }}</td>
    </tr>

    @if($visa->p2_education == 'Other')
        <tr>
            <th>Educational Qualification Others</th>
            <td>{{ $visa->p2_other_education }}</td>
        </tr>
    @endif

    <tr>
        <th>Nationality</th>
        <td>{{ $visa->p1_nationality }}</td>
    </tr>

    <tr>
        <th>Did You Acquire Nationality By Birth or By Naturalization?</th>
        <td>{{ $visa->p2_birth_nationality }}</td>
    </tr>

    <tr>
        <th>Prev Nationality</th>
        <td>{{ $visa->p2_prev_nationality }}</td>
    </tr>

    <tr>
        <th>Have You Lived for At Least Two Years in the <br>Country Where You are Applying Visa?</th>
        <td>{{ ($visa->p2_lived_visa_country_years == 1) ? 'Yes' : 'No' }}</td>
    </tr>

    <tr>
        <th colspan="2" style="text-align: center"> <h3>Passport Details</h3></th>
    </tr>

    <tr>
        <th>Passport No</th>
        <td>{{ $visa->p1_passport_number }}</td>
    </tr>

    <tr>
        <th>Place of Issue</th>
        <td>{{ $visa->p2_passport_place_issue }}</td>
    </tr>

    <tr>
        <th>Date of Issue</th>
        <td>{{ Carbon\Carbon::parse($visa->p2_passport_date_issue)->format(config('app.dateformat')) }}</td>
    </tr>

    <tr>
        <th>Date of Expiry</th>
        <td>{{ Carbon\Carbon::parse($visa->p2_passport_date_expiry)->format(config('app.dateformat')) }}</td>
    </tr>

    <tr>
        <th>Any other valid Passport/Identity Certificate(IC) held</th>
        <td>{{ ($visa->p2_any_other_valid_passport == 1) ? 'Yes' : 'No' }}</td>
    </tr>

    @if($visa->p2_any_other_valid_passport == 1)
    <tr>
        <th>Country of Issue</th>
        <td>{{ $visa->p2_other_passport_country }}</td>
    </tr>

    <tr>
        <th>Passport/IC No.</th>
        <td>{{ $visa->p2_other_passport_number }}</td>
    </tr>

    <tr>
        <th>Date of Issue</th>
        <td>{{ Carbon\Carbon::parse($visa->p2_other_passport_date_issue)->format(config('app.dateformat')) }}</td>
    </tr>

    <tr>
        <th>Place of Issue</th>
        <td>{{ $visa->p2_other_passport_place_issue }}</td>
    </tr>

    <tr>
        <th>Nationality mentioned therein</th>
        <td>{{ $visa->p2_other_nationality_mentioned }}</td>
    </tr>

   @endif

</table>