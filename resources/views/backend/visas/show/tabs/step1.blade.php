<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.visas.table.p1_app_type') }}</th>
        <td>{{ $visa->p1_app_type }}</td>
    </tr>

   <tr>
       <th>{{ trans('labels.backend.visas.table.p1_fname') }}</th>
       <td>{{ $visa->p1_fname }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.visas.table.p1_mname') }}</th>
        <td>{{ $visa->p1_mname }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.visas.table.p1_lname') }}</th>
        <td>{{ $visa->p1_lname }}</td>
    </tr>

    <tr>
        <th>Passport Type</th>
        <td>{{ $visa->p1_passport_type }}</td>
    </tr>

    <tr>
        <th>Nationality</th>
        <td>{{ $visa->p1_nationality }}</td>
    </tr>

    <tr>
        <th>Port of Arrival</th>
        <td>{{ $visa->p1_port_arrival }}</td>
    </tr>

    <tr>
        <th>Passport No</th>
        <td>{{ $visa->p1_passport_number }}</td>
    </tr>

    <tr>
        <th>Date of Birth</th>
        <td>{{ Carbon\Carbon::parse($visa->p1_dob)->format(config('app.dateformat')) }}</td>
    </tr>

    <tr>
        <th>Email</th>
        <td>{{ $visa->p1_email }}</td>
    </tr>

    <tr>
        <th>Telephone Number</th>
        <td>{{ $visa->p1_phone }}</td>
    </tr>

    <tr>
        <th>Expected Date of Arrival</th>
        <td>{{ Carbon\Carbon::parse($visa->p1_edate)->format(config('app.dateformat')) }}</td>
    </tr>

    <tr>
        <th>Type of Visa</th>
        <td>{{ $visa->p1_visa_type }}</td>
    </tr>
</table>