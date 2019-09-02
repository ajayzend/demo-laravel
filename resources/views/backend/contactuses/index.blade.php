@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.contactuses.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.contactuses.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.contactuses.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.contactuses.partials.contactuses-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="contactuses-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.contactuses.table.id') }}</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Query</th>
                            <th>{{ trans('labels.backend.contactuses.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            var dataTable = $('#contactuses-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.contactuses.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.contactuses.table')}}.id'},
                    {data: 'name', name: '{{config('module.contactuses.table')}}.name'},
                    {data: 'mobile', name: '{{config('module.contactuses.table')}}.mobile'},
                    {data: 'email', name: '{{config('module.contactuses.table')}}.email'},
                    {data: 'query', name: '{{config('module.contactuses.table')}}.query'},
                    {data: 'created_at', name: '{{config('module.contactuses.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            FinBuilders.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
