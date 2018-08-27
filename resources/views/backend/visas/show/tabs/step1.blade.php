<table class="table table-striped table-hover">
    <tr>
        <th>Temp ID</th>
        <td>{{ $visa->visa_no }}</td>
    </tr>

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
        <td>{{ $visa->p1_dob }}</td>
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
        <td>{{ $visa->p1_edate }}</td>
    </tr>

    <tr>
        <th>Type of Visa</th>
        <td>{{ $visa->p1_visa_type }}</td>
    </tr>

    <tr>
        <th>Created At</th>
        <td>{{ $visa->created_at }}</td>
    </tr>

    <tr>
        <th>Updated At</th>
        <td>{{ $visa->updated_at }}</td>
    </tr>

    <tr>
        <th>Payment Status</th>
        <td>{{ $visa->payment_status }}</td>
    </tr>
</table>