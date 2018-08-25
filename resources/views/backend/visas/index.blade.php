@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.visas.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.visas.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.visas.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.visas.partials.visas-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="visas-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.visas.table.id') }}</th>
                            <th>{{ trans('labels.backend.visas.table.visa_no') }}</th>
                            <th>{{ trans('labels.backend.visas.table.p1_app_type') }}</th>
                            <th>{{ trans('labels.backend.visas.table.p1_fname') }}</th>
                            <th>{{ trans('labels.backend.visas.table.p1_mname') }}</th>
                            <th>{{ trans('labels.backend.visas.table.p1_lname') }}</th>
                            <th>{{ trans('labels.backend.visas.table.createdat') }}</th>
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
            var dataTable = $('#visas-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.visas.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.visas.table')}}.id'},
                    {data: 'visa_no', name: '{{config('module.visas.table')}}.visa_no'},
                    {data: 'p1_app_type', name: '{{config('module.visas.table')}}.p1_app_type'},
                    {data: 'p1_fname', name: '{{config('module.visas.table')}}.p1_fname'},
                    {data: 'p1_mname', name: '{{config('module.visas.table')}}.p1_mname'},
                    {data: 'p1_lname', name: '{{config('module.visas.table')}}.p1_lname'},
                    {data: 'created_at', name: '{{config('module.visas.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: true, sortable: false}
                ],
                order: [[0, "desc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
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
