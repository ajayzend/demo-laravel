@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="row1">
                <div class="form-outer">
                    <div class="title"><p class="text-center">Additional Question Details</p></div>
                    <p class="text-center"><strong>Please note down the Temporary Application ID:</strong> <span class="bred">{{ $visa->visa_no }}</span></p>
                    <p class="text-center"><strong>Your Information will be saved if you click save button or continue to next page. If you exit without doing either of that, your information will be lost.</strong></p>
                    <div class="title"><p class="text-center">Please provide below given details. Please give details if marked YES.</p></div>

                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process51']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 100051 ) }}

                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-1 col-xs-12">
                           <strong>1</strong>
                        </div>
                        <label class="col-sm-4 col-xs-12">Have you ever been arrested/ prosecuted/ convicted by Court of Law of any country?</label>
                        <div class="col-sm-2 col-xs-12">
                            <input type="radio" {{ $visa->p51_question1 == 'Yes' ? 'Checked="Checked"' : '' }} id="p51_question11" name="p51_question1" value="Yes" /><strong>Yes</strong>
                            &nbsp;&nbsp;<input type="radio" {{ $visa->p51_question1 == 'No' ? 'Checked="Checked"' : '' }}  id="p51_question12" name="p51_question1" value="No"/><strong>No</strong>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <textarea class="form-control" style="display: none;" placeholder="Please give details" id="p51_details1" name="p51_details1">{{$visa->p51_details1}}</textarea>
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
<br>
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-1 col-xs-12">
                            <strong>2</strong>
                        </div>
                        <label class="col-sm-4 col-xs-12">Have you ever been refused entry / deported by any country including India?</label>
                        <div class="col-sm-2 col-xs-12">
                            <input type="radio" {{ $visa->p51_question2 == 'Yes' ? 'Checked="Checked"' : '' }} id="p51_question21" name="p51_question2" value="Yes" /><strong>Yes</strong>
                            &nbsp;&nbsp;<input type="radio" {{ $visa->p51_question2 == 'No' ? 'Checked="Checked"' : '' }}  id="p51_question22" name="p51_question2" value="No"/><strong>No</strong>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <textarea class="form-control" style="display: none;" placeholder="Please give details" id="p51_details2" name="p51_details2">{{$visa->p51_details2}}</textarea>
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-1 col-xs-12">
                            <strong>3</strong>
                        </div>
                        <label class="col-sm-4 col-xs-12">Have you ever been engaged in Human trafficking/ Drug trafficking/ Child abuse/ Crime against women/ Economic offense / Financial fraud?</label>
                        <div class="col-sm-2 col-xs-12">
                            <input type="radio" {{ $visa->p51_question3 == 'Yes' ? 'Checked="Checked"' : '' }} id="p51_question31" name="p51_question3" value="Yes" /><strong>Yes</strong>
                            &nbsp;&nbsp;<input type="radio" {{ $visa->p51_question3 == 'No' ? 'Checked="Checked"' : '' }}  id="p51_question32" name="p51_question3" value="No"/><strong>No</strong>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <textarea class="form-control" style="display: none;" placeholder="Please give details" id="p51_details3" name="p51_details3">{{$visa->p51_details3}}</textarea>
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-1 col-xs-12">
                            <strong>4</strong>
                        </div>
                        <label class="col-sm-4 col-xs-12">Have you ever been engaged in Cyber crime/ Terrorist activities/ Sabotage/ Espionage/ Genocide/ Political killing/ other act of violence?</label>
                        <div class="col-sm-2 col-xs-12">
                            <input type="radio" {{ $visa->p51_question4 == 'Yes' ? 'Checked="Checked"' : '' }} id="p51_question41" name="p51_question4" value="Yes" /><strong>Yes</strong>
                            &nbsp;&nbsp;<input type="radio" {{ $visa->p51_question4 == 'No' ? 'Checked="Checked"' : '' }}  id="p51_question42" name="p51_question4" value="No"/><strong>No</strong>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <textarea class="form-control" style="display: none;" placeholder="Please give details" id="p51_details4" name="p51_details4">{{$visa->p51_details4}}</textarea>
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-1 col-xs-12">
                            <strong>5</strong>
                        </div>
                        <label class="col-sm-4 col-xs-12">Have you ever by any means or medium, expressed views that justify or glorify terrorist violence or that may encourage others to terrorist acts or other serious criminal acts?</label>
                        <div class="col-sm-2 col-xs-12">
                            <input type="radio" {{ $visa->p51_question5 == 'Yes' ? 'Checked="Checked"' : '' }} id="p51_question51" name="p51_question5" value="Yes" /><strong>Yes</strong>
                            &nbsp;&nbsp;<input type="radio" {{ $visa->p51_question5 == 'No' ? 'Checked="Checked"' : '' }}  id="p51_question52" name="p51_question5" value="No"/><strong>No</strong>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <textarea class="form-control" style="display: none;" placeholder="Please give details" id="p51_details5" name="p51_details5">{{$visa->p51_details5}}</textarea>
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"></div>
                        <div class="col-sm-1 col-xs-12">
                            <strong>6</strong>
                        </div>
                        <label class="col-sm-4 col-xs-12">Have you sought asylum (political or otherwise)in any country?</label>
                        <div class="col-sm-2 col-xs-12">
                            <input type="radio" {{ $visa->p51_question6 == 'Yes' ? 'Checked="Checked"' : '' }} id="p51_question61" name="p51_question6" value="Yes" /><strong>Yes</strong>
                            &nbsp;&nbsp;<input type="radio" {{ $visa->p51_question6 == 'No' ? 'Checked="Checked"' : '' }}  id="p51_question62" name="p51_question6" value="No"/><strong>No</strong>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <textarea class="form-control" style="display: none;" placeholder="Please give details" id="p51_details6" name="p51_details6">{{$visa->p51_details6}}</textarea>
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            <input name="p51_undertaking" id="p51_undertaking" type="checkbox"   value="" />
                            <?php
                            $fullname = $visa->p1_fname.' '. $visa->p1_mname.' '.$visa->p1_lname
                            ?>
                            <strong> I <?php echo strtoupper($fullname);?>,  hereby declare that the information furnished above is correct to the best of my knowledge and belief. in case the information is found false at any stage, I am liable for legal action/deportation/blacklisting or any other action as deemed fit by the Government of India.</strong>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" name="submit" id="p51_submit_button" value="Save And Continue"  class="btn-primary submit-btn2">
                            <input type="submit"  name="submit" id="51_submit_button_exit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
                        </div>
                    </div>
                    {{ Form::close() }}
                    <div class="title"><p class="text-center">e-Visa-India (eVI) Application</p></div>
                </div>

            </div>

        </div>

    </section>
    @endsection

    @section('after-scripts')
    @if (config('access.captcha.registration'))
    {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            // To Use Select2
            // Backend.Select2.init();
            $("#p51_question11").change(function() {
                if ($("#p51_question11").is(":checked")) {
                    $("#p51_details1").show();
                    $("#p51_details1").attr("disabled", false);
                }
            }).trigger('change');

            $("#p51_question12").change(function() {
                if ($("#p51_question12").is(":checked")) {
                    $("#p51_details1").hide();
                    $("#p51_details1").attr("disabled", true);
                }else if (!$("#p51_question11").is(":checked")) {
                    $("#p51_details1").hide();
                    $("#p51_details1").attr("disabled", true);
                }
            }).trigger('change');


            $("#p51_question21").change(function() {
                if ($("#p51_question21").is(":checked")) {
                    $("#p51_details2").show();
                    $("#p51_details2").attr("disabled", false);
                }
            }).trigger('change');

            $("#p51_question22").change(function() {
                if ($("#p51_question22").is(":checked")) {
                    $("#p51_details2").hide();
                    $("#p51_details2").attr("disabled", true);
                }else if (!$("#p51_question21").is(":checked")) {
                    $("#p51_details2").hide();
                    $("#p51_details2").attr("disabled", true);
                }
            }).trigger('change');



            $("#p51_question31").change(function() {
                if ($("#p51_question31").is(":checked")) {
                    $("#p51_details3").show();
                    $("#p51_details3").attr("disabled", false);
                }
            }).trigger('change');

            $("#p51_question32").change(function() {
                if ($("#p51_question32").is(":checked")) {
                    $("#p51_details3").hide();
                    $("#p51_details3").attr("disabled", true);
                }else if (!$("#p51_question31").is(":checked")) {
                    $("#p51_details3").hide();
                    $("#p51_details3").attr("disabled", true);
                }
            }).trigger('change');



            $("#p51_question41").change(function() {
                if ($("#p51_question41").is(":checked")) {
                    $("#p51_details4").show();
                    $("#p51_details4").attr("disabled", false);
                }
            }).trigger('change');

            $("#p51_question42").change(function() {
                if ($("#p51_question42").is(":checked")) {
                    $("#p51_details4").hide();
                    $("#p51_details4").attr("disabled", true);
                }else if (!$("#p51_question41").is(":checked")) {
                    $("#p51_details4").hide();
                    $("#p51_details4").attr("disabled", true);
                }
            }).trigger('change');

            $("#p51_question51").change(function() {
                if ($("#p51_question51").is(":checked")) {
                    $("#p51_details5").show();
                    $("#p51_details5").attr("disabled", false);
                }
            }).trigger('change');

            $("#p51_question52").change(function() {
                if ($("#p51_question52").is(":checked")) {
                    $("#p51_details5").hide();
                    $("#p51_details5").attr("disabled", true);
                }else if (!$("#p51_question51").is(":checked")) {
                    $("#p51_details5").hide();
                    $("#p51_details5").attr("disabled", true);
                }
            }).trigger('change');



            $("#p51_question61").change(function() {
                if ($("#p51_question61").is(":checked")) {
                    $("#p51_details6").show();
                    $("#p51_details6").attr("disabled", false);
                }
            }).trigger('change');

            $("#p51_question62").change(function() {
                if ($("#p51_question62").is(":checked")) {
                    $("#p51_details6").hide();
                    $("#p51_details6").attr("disabled", true);
                }else if (!$("#p51_question61").is(":checked")) {
                    $("#p51_details6").hide();
                    $("#p51_details6").attr("disabled", true);
                }
            }).trigger('change');

            $("#p51_undertaking").change(function() {
                if ($("#p51_undertaking").is(":checked")) {
                    $("#p51_undertaking").val('yes');
                }else{
                    $("#p51_undertaking").val('no');
                }
            }).trigger('change');

            $("#p51_submit_button").click(function() {
                var return_bool = false;

                if ((!$("#p51_question11").is(":checked")) && (!$("#p51_question12").is(":checked"))) {
                    $("#p51_question11").focus();
                    $("#p51_question12").focus();
                    alert("Question1: Please choose Yes or No option for (Have you ever been arrested/ prosecuted/ convicted by Court of Law of any country?)");
                    return false;
                }else{
                    return_bool = true;
                }

                if ((!$("#p51_question21").is(":checked")) && (!$("#p51_question22").is(":checked"))) {
                    $("#p51_question21").focus();
                    $("#p51_question22").focus();
                    alert("Question2: Please choose Yes or No option for (Have you ever been refused entry / deported by any country including India?)");
                    return false;
                }else{
                    return_bool = true;
                }

                if ((!$("#p51_question31").is(":checked")) && (!$("#p51_question32").is(":checked"))) {
                    $("#p51_question31").focus();
                    $("#p51_question32").focus();
                    alert("Questio3: Please choose Yes or No option for (Have you ever been engaged in Human trafficking/ Drug trafficking/ Child abuse/ Crime against women/ Economic offense / Financial fraud?)");
                    return false;
                }else{
                    return_bool = true;
                }

                if ((!$("#p51_question41").is(":checked")) && (!$("#p51_question42").is(":checked"))) {
                    $("#p51_question41").focus();
                    $("#p51_question42").focus();
                    alert("Question4: Please choose Yes or No option for (Have you ever been engaged in Cyber crime/ Terrorist activities/ Sabotage/ Espionage/ Genocide/ Political killing/ other act of violence?)");
                    return false;
                }else{
                    return_bool = true;
                }

                if ((!$("#p51_question51").is(":checked")) && (!$("#p51_question52").is(":checked"))) {
                    $("#p51_question51").focus();
                    $("#p51_question52").focus();
                    alert("Question5: Please choose Yes or No option for (Have you ever by any means or medium, expressed views that justify or glorify terrorist violence or that may encourage others to terrorist acts or other serious criminal acts?)");
                    return false;
                }else{
                    return_bool = true;
                }

                if ((!$("#p51_question61").is(":checked")) && (!$("#p51_question62").is(":checked"))) {
                    $("#p51_question61").focus();
                    $("#p51_question62").focus();
                    alert("Question6: Please choose Yes or No option for (Have you sought asylum (political or otherwise)in any country?)");
                    return false;
                }else{
                    return_bool = true;
                }

                if ((!$("#p51_question21").is(":checked")) && (!$("#p51_question22").is(":checked"))) {
                    $("#p51_question21").focus();
                    $("#p51_question22").focus();
                    alert("Question2: Please choose Yes or No option for (Temp)");
                    return false;
                }else{
                    return_bool = true;
                }

                var p51_undertaking  = $("#p51_undertaking").val();
                if(p51_undertaking == 'yes'){
                    return_bool =  true;
                }else{
                    alert("Please click the checkbox to continue.");
                    return false;
                }

                return return_bool;
            });
        });
    </script>
    @endsection
