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

                </div><!--tab content-->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection