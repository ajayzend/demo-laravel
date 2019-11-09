@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.evisacountries.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.evisacountries.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.evisacountries.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.evisacountries.partials.evisacountries-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="evisacountries-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.evisacountries.table.id') }}</th>
                            <th>E-Visa Country</th>
                            <th>E-Visa Fee</th>
                            <th>T_30Day_AJ Fee</th>
                            <th>T_30Day_JM Fee</th>
                            <th>T_1Year Fee</th>
                            <th>T_5Years Fee</th>
                            <th>{{ trans('labels.backend.evisacountries.table.createdat') }}</th>
                            <th>Updated At</th>
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
            var dataTable = $('#evisacountries-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.evisacountries.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.evisacountries.table')}}.id'},
                    {data: 'name', name: '{{config('module.evisacountries.table')}}.name'},
                    {data: 'fee', name: '{{config('module.evisacountries.table')}}.fee'},
                    {data: 'evisa_aj_30d_fee', name: '{{config('module.evisacountries.table')}}.evisa_aj_30d_fee'},
                    {data: 'evisa_jm_30d_fee', name: '{{config('module.evisacountries.table')}}.evisa_jm_30d_fee'},
                    {data: 'evisa_1y_fee', name: '{{config('module.evisacountries.table')}}.evisa_1y_fee'},
                    {data: 'evisa_5y_fee', name: '{{config('module.evisacountries.table')}}.evisa_5y_fee'},
                    {data: 'created_at', name: '{{config('module.evisacountries.table')}}.created_at'},
                    {data: 'updated_at', name: '{{config('module.evisacountries.table')}}.updated_at'},
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