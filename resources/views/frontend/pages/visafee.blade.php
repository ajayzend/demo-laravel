@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h1>e-Visa Fee <span>Calculator</span></h1>
            <br>
            {{--<ul>
                <li><p>e-Visa is valid for 60 days from the date of arrival. The visa must be availed within its period of validity. The e-Tourist visa for the purpose of Tourism and Business will be valid for two entries and for Medical purpose it will be valid for Three entries from the date of the first arrival date in India. e-Visa is allowed for a maximum of two visits in a calendar year.</p></li>
                <li><p>The visa result shall be emailed 110 days prior to your expected arrival date in India if you have applied more than 120 days in advance. If your application is submitted within 120 days prior to your expected arrival date in India then your visa result shall be emailed within 4 to 7 business days (Excluding Saturdays, Sundays and Indian public Holidays) from the date of submission. If your travel is within 4 days then your visa result shall be emailed in maximum 72 hours. To avail the fast track service, your travel date must be after 72 hours from the time you have submitted and paid against the application. All the processing times are valid after receipt of the appropriate documents against each individual application. e-Visa India will not be responsible for any delay in the process due to non-availability of proper documents. Our delivery time starts after the application is complete with all the information and documents required to process the same.The delivery times are not applicable for Sri Lankan and Chinese Passport Holders. For these nationalities the delivery time is 5 business days in case of urgent processing and 10 business days in case of normal processing. Please send an email at support@evisaindia.in or Chat 24/7 customer care if you haven't received the delivery in the above mentioned time. Once the fee is paid against the application, it is non-refundable.</p></li>
                <li><p>e-Tourist Visa India (eTV) is valid for minimum two entries against each visa issued and you can apply only twice in a calendar year.</li>
                <li><p>One recently clicked passport size photograph with white background, to be uploaded along with the photo page/first page of the applicants Passport containing personal details like name, date of birth, nationality, expiry date etc. Utmost care regarding the photograph clarity and other specifications should be taken while uploading with the application, failing to which might cause rejection of the application.</p></li>
                <li><p>The applicant must carry a copy of the eTourist Visa along with him/her at the time of travel.</li>
                <li><p>On arrival in India the biometric details of the applicant will be mandatorily captured at Immigration. The applicant's entry is at the sole discretion of the Immigration officer at the India Airport who is a representative of the Government of India.</p></li>
            </ul>--}}
<p>Please select below your nationality, application type and visa type to see visa fee, It would be final price and there is no any hidden charge.</p>
            <p>For any kind of assist, feel free to contact on chat or on email <b>support@evisaindia.in</b>, We will respond you as soon as possible.</p>
            <br>
            <div class="form-group">
                <label class="col-sm-4 col-xs-12 control-label">Nationality
                </label>
                <div class="col-sm-6 col-xs-12">
                    {{ Form::select('evisa_nationality', $evisa_country, 0, ['class' => 'form-control select2 box-size', 'id' => 'evisa_nationality', 'onchange' => 'reseteVisaFee()']) }}
                </div>
            </div>
            <br>
            <br>

            <div class="form-group">
                <label class="col-sm-4 col-xs-12 control-label">Application
                    Type</label>
                <div class="col-sm-6 col-xs-12">
                    <select id="app_type" class="form-control" name="visa_type"  onchange=reseteVisaFee()>
                        <option value="0"> Select Application Type</option>
                        <option value="1"> Normal Processing (processing Time 4 To 7 Business Days
                        </option>
                        <option value="2"> Urgent Processing (processing Time Maximum 3 Business Days)
                        </option>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label class="col-sm-4 col-xs-12 control-label">Visa Type</label>
                <div class="col-sm-6 col-xs-12">
                    <select id="visa_type" name="visa_type" class="form-control" onchange=reseteVisaFee()>
                        <option value="">Select Visa</option>
                        <option value="EV30D">e-Tourist Visa(for 30 days)</option>
                        <option value="EV1Y">e-Tourist Visa(for 1 year)</option>
                        <option value="EV5Y">e-Tourist Visa(for 5 years)</option>
                        <option value="EVM">e-Medical Visa(for 60 days)</option>
                        <option value="EVB">e-Business Visa(for 1 year)</option>
                        <option value="EVA">e-Attendant Visa(for 60 days)</option>
                    </select>

                </div>
            </div>

<br>
<br>
            <div class="form-group" style="display: none" id="mainvisafee">
                <label class="col-sm-4 col-xs-12 control-label">e-Visa Fee</label>
                <div class="col-sm-6 col-xs-12" id="efee">

                </div>
            </div>

            <br>
            <br>

            <div class="form-group">
                <label class="col-sm-4 col-xs-12 control-label"></label>
                <div class="col-sm-6 col-xs-12">
                    <!--<input type="submit" id="submit" value="Continue" class="btn-primary submit-btn2">-->
                    {{ Form::submit('Click here to see e-Visa Fee', ['class' => 'btn btn-primary btn-md', 'id' => 'evisa-fee-cal']) }}
                </div>
            </div>
            <br>
            <br>

             </div>
    </div>
</div>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">
        function reseteVisaFee(){
            $("#mainvisafee").hide();
        }
            $(document).ready(function () {

                $("#evisa-fee-cal").click(function() {
                var country = $("#evisa_nationality").val();
                var app_type = $("#app_type").val();
                var visa_type = $("#visa_type").val();
                    var html;
                $.ajax({
                    url: "evisa-fee-cal?country="+country+"&app_type="+app_type+"&visa_type="+visa_type,
                    cache: false,
                    success: function (response) {
                        if($.isNumeric(response)){
                            $("#mainvisafee").show();
                            if(app_type == 2)
                                html = "<strong><a href='/visas/urgent-visa'>$"+response+" USD</a></strong>";
                            else if(visa_type == "EVM")
                                html = "<strong><a href='/visas/medical-visa'>$"+response+" USD</a></strong>";
                            else if(visa_type == "EVB")
                                html = "<strong><a href='/visas/business-visa'>$"+response+" USD</a></strong>";
                            else
                            html = "<strong><a href='/visas/create'>$"+response+" USD</a></strong>";
                            $("#efee").html(html);
                        }else{
                            $("#mainvisafee").hide();
                            alert(response);
                        }
                    }
                });
            });
        });
    </script>
@endsection