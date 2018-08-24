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

</table>