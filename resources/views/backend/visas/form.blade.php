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
            {{ Form::label('Visa No', 'Visa No', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ $visa->visa_no }}
            </div><!--col-lg-10-->
        </div><!--form control-->


        <div class="form-group">
            {{ Form::label('APP Type', 'APP Type', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ $visa->p1_app_type }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('Visa Type', 'Visa Type', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ $visa->p1_visa_type }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- First Name --}}
        <div class="form-group">
            {{ Form::label('Payment Status', 'Payment Status', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                <select id="payment_status" name="payment_status" class="form-control box-size">
                    <option value="0">Select Payment Status</option>
                    <option value="wip" {{ $visa->payment_status == 'wip' ? 'selected="selected"' : '' }}>WIP</option>
                    <option value="success" {{ $visa->payment_status == 'success' ? 'selected="selected"' : '' }}>Success</option>
                    <option value="failed" {{ $visa->payment_status == 'failed' ? 'selected="selected"' : '' }}>Failed</option>
                    <option value="cancelled" {{ $visa->payment_status == 'cancelled' ? 'selected="selected"' : '' }}>Cancelled</option>
                    <option value="aborted" {{ $visa->payment_status == 'aborted' ? 'selected="selected"' : '' }}>Aborted</option>
                </select>
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('Gov Payment Status', 'Gov Payment Status', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                <select id="india_gov_evisa_status" name="india_gov_evisa_status" class="form-control box-size">
                    <option value="0">Select Payment Status</option>
                    <option value="open" {{ $visa->india_gov_evisa_status == 'open' ? 'selected="selected"' : '' }}>Open</option>
                    <option value="granted" {{ $visa->india_gov_evisa_status == 'granted' ? 'selected="selected"' : '' }}>Granted</option>
                    <option value="wip" {{ $visa->india_gov_evisa_status == 'wip' ? 'selected="selected"' : '' }}>WIP</option>
                    <option value="success" {{ $visa->india_gov_evisa_status == 'success' ? 'selected="selected"' : '' }}>Success</option>
                    <option value="failed" {{ $visa->india_gov_evisa_status == 'failed' ? 'selected="selected"' : '' }}>Failed</option>
                    <option value="cancelled" {{ $visa->india_gov_evisa_status == 'cancelled' ? 'selected="selected"' : '' }}>Cancelled</option>
                    <option value="aborted" {{ $visa->india_gov_evisa_status == 'aborted' ? 'selected="selected"' : '' }}>Aborted</option>
                </select>
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
