<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{-- {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }} --}}

        {{--<div class="col-lg-10">--}}
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required']) }} --}}
       {{-- </div>--}}<!--col-lg-10-->

        {{-- First Name --}}
        <div class="form-group">
            {{ Form::label('APP Type', trans('validation.attributes.backend.access.visas.p1_app_type'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('p1_app_type', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.visas.p1_app_type'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- First Name --}}
        <div class="form-group">
            {{ Form::label('First Name', trans('validation.attributes.backend.access.visas.p1_fname'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('p1_fname', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.visas.p1_fname'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- First Name --}}
        <div class="form-group">
            {{ Form::label('Middle Name', trans('validation.attributes.backend.access.visas.p1_mname'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('p1_mname', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.visas.p1_mname'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- Last Name --}}
        <div class="form-group">
            {{ Form::label('Last Name', trans('validation.attributes.backend.access.visas.p1_lname'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('p1_lname', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.visas.p1_lname'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
