<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.visas.table.app_type') }}</th>
        <td>{{ $visa->app_type }}</td>
    </tr>

   <tr>
       <th>{{ trans('labels.backend.visas.table.fname') }}</th>
       <td>{{ $visa->fname }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.visas.table.mname') }}</th>
        <td>{{ $visa->mname }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.visas.table.lname') }}</th>
        <td>{{ $visa->lname }}</td>
    </tr>

</table>