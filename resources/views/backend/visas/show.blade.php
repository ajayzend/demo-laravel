@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.visas.management') . ' | ' . trans('labels.backend.visas.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.visas.management') }}
        <small>{{ trans('labels.backend.visas.view') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.visas.view') }}</h3>

            {{--<div class="box-tools pull-right">
                @include('backend.access.includes.partials.visas-header-buttons')
            </div>--}}<!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <table class="table">
            <tr>
                <th>Temp ID</th>
                <td>{{ $visa->visa_no }}</td>
                <th>Nationality</th>
                <td>{{ $visa->p1_nationality }}</td>
            </tr>

            <tr>
                <th>APP Type</th>
                <td>{{ $visa->p1_app_type }}</td>
                <th>Type of Visa</th>
                <td>{{ $visa->p1_visa_type }}</td>
            </tr>

            <tr>
                <th>Payment Status</th>
                <td>{{ $visa->payment_status }}</td>
                <th>Gov Payment Status</th>
                <td>{{ $visa->india_gov_evisa_status }}</td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ Carbon\Carbon::parse($visa->created_at)->format(config('app.dateformat')) }}</td>
                <th>Updated At</th>
                <td>{{ Carbon\Carbon::parse($visa->updated_at)->format(config('app.dateformat')) }}</td>
            </tr>

        </table>
        <div class="box-body">

            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.visas.tabs.titles.step1') }}</a>
                    </li>

                    <li role="presentation">
                        <a href="#history" aria-controls="history" role="tab" data-toggle="tab">{{ trans('labels.backend.visas.tabs.titles.step2') }}</a>
                    </li>

                    <li role="presentation">
                        <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Step3</a>
                    </li>

                    <li role="presentation">
                        <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Step4</a>
                    </li>

                    <li role="presentation">
                        <a href="#tab5" aria-controls="tab" role="tab" data-toggle="tab">Step5</a>
                    </li>

                    <li role="presentation">
                        <a href="#tab6" aria-controls="tab" role="tab" data-toggle="tab">Step6</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.visas.show.tabs.step1')
                    </div><!--tab overview profile-->

                    <div role="tabpanel" class="tab-pane mt-30" id="history">
                        @include('backend.visas.show.tabs.step2')
                    </div><!--tab panel history-->

                    <div role="tabpanel" class="tab-pane mt-30" id="tab3">
                        @include('backend.visas.show.tabs.step3')
                    </div><!--tab panel history-->

                    <div role="tabpanel" class="tab-pane mt-30" id="tab4">
                        @include('backend.visas.show.tabs.step4')
                    </div><!--tab panel history-->

                    <div role="tabpanel" class="tab-pane mt-30" id="tab5">
                        @include('backend.visas.show.tabs.step5')
                    </div><!--tab panel history-->

                    <div role="tabpanel" class="tab-pane mt-30" id="tab6">
                        @include('backend.visas.show.tabs.step6')
                    </div><!--tab panel history-->

                </div><!--tab content-->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection