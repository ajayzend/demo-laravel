@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.evisacountries.management') . ' | ' . trans('labels.backend.evisacountries.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.evisacountries.management') }}
        <small>{{ trans('labels.backend.evisacountries.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($evisacountry, ['route' => ['admin.evisacountries.update', $evisacountry], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-evisacountry']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.evisacountries.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.evisacountries.partials.evisacountries-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.evisacountries.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.evisacountries.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
