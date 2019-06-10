@extends('frontend.layouts.app4')

@section('content')
    <section class="wrapper">
       {{-- <div class="container">--}}
            <div class="row">
                <div class="form-outer">
				<div class="title"><p>Fee Payment</p></div>
                    <h4 class="text-center"><strong class="payment-label">Temporary Application ID:</strong> <span class="valuecolor"><strong>{{ $visa->visa_no }}</strong></span></h4>
                    <h4 class="text-center"><strong class="payment-label">APPLICANT NAME:</strong> <span class="valuecolor"><strong>{{ $visa->p1_fname." ".$visa->p1_mname." ".$visa->p1_lname}}</strong></span></h4>
                    <h3 class="text-center" > <strong>On pressing "Pay Now" ,the application will be redirected to Payment Gateway to pay the visa fee and will be outside the control of Visa Online Application. The responsibility of security of transaction process and details on payment page will be of Payment gateway.</strong></h3>
                    <h3 class="text-center" > <strong>On pressing "Pay Later", you can pay the visa fee later using your Temporary Application ID and date of birth.</strong></h3>


                    {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process7']) }}
                    {{ Form::hidden('evpuid', $visa->visa_no ) }}
                    {{ Form::hidden('ps', 10007 ) }}

                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12 payment-label">
                            Disclaimer
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            All travelers seeking admission to India under the e-Tourist Visa Scheme are required to carry printout of the Electronic Travel Authorisation sent through email by Bureau of Immigration.
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
					<br />
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            If your Electronic Travel Authorisation application is approved, it establishes that you are admissible to enter India under the e-Tourist Visa Scheme of Government of India. Upon arrival in India, records would be examined by an Immigration Officer at the port of entry.
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
<br />
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            Biometric Details (Photograph & Fingerprints) of the applicant shall be mandatorily captured at Immigration on arrival in India. Non-compliance to do so would lead to denial of entry into India.
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
<br />
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            A determination that you are not eligible for electronic travel authorisation does not preclude you from applying for a visa in Indian Mission for travel to India.
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
<br />
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            All information provided by you, or on your behalf by a designated third party, must be true and correct. An electronic travel authorisation may be revoked at any time and for any reason, such as new information influencing eligibility. You may be subject to legal action if you make a materially false, fictitious, or fraudulent statement or representation in an electronic travel authorisation application submitted by you.
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
<br />
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            {{--Blank space--}}
                            &nbsp;
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12 payment-label">
                           Undertaking
                        </div>
                        <div class="col-sm-1 col-xs-12"> </div>
                    </div>
<br />
                    <div class="form-group">
                        <div class="col-sm-1 col-xs-12"> </div>
                        <div class="col-sm-10 col-xs-12">
                            <input name="p7_undertaking" id="p7_undertaking" type="checkbox"   value="" />
                            I, the applicant, hereby certify that I agree to all the terms and conditions given on the website www.e-touristvisaindia.com and understand all the questions and statements of this application. The answers and information furnished in this application are true and correct to the best of my knowledge and belief. <strong>I understand and agree that once the fee is paid towards the Temporary application ID </strong> <span class="valuecolor"><strong>{{ $visa->visa_no }}</strong></span> <strong>is 100% non-refundable and I will not claim a refund or dispute the transaction incase of cancellation request raised at my end. I also understand that e-touristvisaindia.com is only responsible for processing my application and the visa may be granted or rejected by the indian government. I authorized them to take the payment from my card online.</strong>
                        </div>
                          <div class="col-sm-4 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-xs-12"> </div>
                        <div class="col-sm-5 col-xs-12 payment-label">
                            <?php if(stripos($visa->p1_app_type, 'urgent') !== false){  echo 'Urgent';} else { echo 'Normal';} ?>   {{$visa->p1_visa_type}} fee = ${{$evisafeedollar}} USD
                        </div>
                        <div class="col-sm-3 col-xs-12"> </div>
                    </div>
					<br />
                    <div class="form-group text-center">
                    
               
                            <input  type="radio" value="Yes"  id="p4_visit_india_before1" name="p4_visit_india_before"   {{ $visa->p4_visit_india_before == 'Yes' ? 'checked="checked"' : '' }}/><span><img height="30" width="50" id="spass"  src="{{ URL::asset('img/frontend/images/visa.png')}}"></span>

     
                            <input  type="radio" value="No" id="p4_visit_india_before2" name="p4_visit_india_before" {{ $visa->p4_visit_india_before == 'No' ? 'checked="checked"' : '' }}  /><span><img height="30" width="50" id="spass"  src="{{ URL::asset('img/frontend/images/master.png')}}"></span>
                   
                    </div>
<br />
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12 text-center">
                            <input type="submit" name="submit" id="read_undertaking" value="Pay Now"  class="btn-primary submit-btn2">
                            <input type="submit"  name="submit" id="pay_later" value="Pay Later"   class="btn-primary submit-btn2">
                        </div>
                    </div>


                    {{ Form::close() }}
                </div>
            </div>
        {{--</div>--}}
    </section>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            $("#read_undertaking").click(function() {
                var p7_undertaking  = $("#p7_undertaking").val();
                if(p7_undertaking == 'yes'){
                    return true;
                }else{
                    alert("Before making the payment please check the box and confirm that you agree to all the terms and conditions.");
                    return false;
                }
            });


            $("#pay_later").click(function() {
                var msg = "You must make the payment against your e-Tourist Fee within 48 hours after submitting your application to avoid rejection. You may not be able to apply on the website for next 2 weeks once application is rejected. You will receive an email with important links and information to complete your application.";
                if(confirm(msg)){
                   // location.reload();
                    return true;
                }else{
                    return false;
                }
            });


            $("#p7_undertaking").change(function() {
                if ($("#p7_undertaking").is(":checked")) {
                    $("#p7_undertaking").val('yes');
                }else{
                    $("#p7_undertaking").val('no');
                }
            }).trigger('change');

            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection