@extends('frontend.layouts.app2')

@section('content')

@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {

            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection