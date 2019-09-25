@extends('frontend.layouts.app4')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('error') !!}
                @if($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('success') !!}
                <div class="panel panel-default">
                    {{--<div class="panel-heading">Pay With Razorpay</div>--}}

                    <div class="panel-body text-center">
                        <form action="{!!route('payment')!!}" method="POST" >
                            <!-- Note that the amount is in paise = 50 INR -->
                            <!--amount need to be in paisa-->
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ Config::get('razor.razor_key') }}"
                                data-amount= "{{session()->get('evisafeedollar') * 100 }}" {{--Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.--}}
                                data-currency="USD" {{--You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account--}}
                                {{--data-order_id="order_CgmcjRh9ti2lP7sdfds"--}} {{--Replace with the order_id generated by you in the backend.--}}
                                data-buttontext="Pay Now"
                                data-name="{{session()->get('visatype')}}"
                                data-description="{{session()->get('apptype')}}"
                                data-image="{{ URL::asset('img/frontend/images/logo.png')}}"
                                data-prefill.name="{{session()->get('prefill_name')}}"
                                data-prefill.email="{{session()->get('prefill_email')}}"
                                data-theme.color="#e55b16"


                            ></script>
                            <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $(".panel-default").hide();
       <?php if(!$message = Session::get('success')) { ?>
        $(".razorpay-payment-button").click();
        <?php } else {?>
        $(".panel-default").hide();
        <?php }?>


    });
</script>
@endsection