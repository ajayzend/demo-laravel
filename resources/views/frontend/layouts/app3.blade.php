@php
use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/frontend/images/favicon.ico')}}"/>
    <title>@yield('title', @$visa->header_title)</title>

    <!-- Meta -->
    <meta name="description" content="Official Indian e Visa website for e tourist visa (eTV) for 180+ countries across the World such as UK, USA, Australia, Canada, Japan, UAE, NZ, European Countries & Singapore and so many." />
    <meta name="keywords" content="e Tourist Visa India, Indian Visa, Visa to India, india Visa Requirement, Online Indian Visa Application, e visa india, Indian e visa, Apply Visa for India, Indian visa on arrival"/>

    <meta name="page-topic" content="e-Visa India" />
    <meta name="copyright" content="I9 Technologies Pvt. Ltd." />
    <meta name="author" content="I9 Technologies Pvt. Ltd." />
    <meta name="Robots" content="INDEX, FOLLOW" />
    <meta name="rating" content="safe for kids" />
    <meta name="googlebot" content=" index, follow " />
    <meta name="bingbot" content=" index, follow " />
    <meta name="reply-to" content="support@evisaindia.in" />
    <meta name="allow-search" content="yes" />
    <meta name="revisit-after" content="daily" />
    <meta name="distribution" content="global" />
    <meta name="expires" content="never" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en" />
    <meta name="title" content="e-Tourist Visa">
    <meta name="doc-type" content="Public"/>
    <meta http-equiv="content-language" content="ll-cc"/>
    <meta name="distribution" content="web"/>
    <meta name="googlebot" content="all" />


    <meta name="description" content="EvisaIndia.in website provides online services for India E-Visa applications also available for tourist, business & medical visits. Apply Online Today!."/>
    <link rel="canonical" href="https://evisaindia.in/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="India Visa Online | India e-Visa Tourist & Business | eVisa India" />
    <meta property="og:description" content=" Official Indian Visa website for e-Visa, e tourist Visa (eTV) India for 180+ countries across the Globe such as UK, USA & Canada, UAE, Australia " />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:title" content="" />

    @yield('meta')

            <!-- Styles -->
    @yield('before-styles')

            <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{--@langRTL
        {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
    @else
        {{ Html::style(mix('css/frontend.css')) }}
    @endif
    {!! Html::style('js/select2/select2.css') !!}--}}


    {!! Html::style('css/frontend/bootstrap.css') !!}
    {!! Html::style('css/frontend/style.css') !!}
    {!! Html::style('css/frontend/normalize.css') !!}
    {!! Html::style('css/frontend/datepicker.css') !!}
    {!! Html::style('css/frontend/custom.css') !!}
    @yield('after-styles')

            <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>


    </script>

    <?php
    if(!empty($google_analytics)){
        echo $google_analytics;
    }
    ?>
</head>
<body id="app-layout">
<div id="app">
    @include('frontend.visas.headers')
    @include('frontend.visas.banner')
    <div class="container">
        {{--@include('includes.partials.messages')--}}
        @yield('content')
    </div><!-- container -->

    {{-- @include('includes.partials.logged-in-as')--}}
    {{--@include('frontend.includes.nav')--}}
</div><!--#app-->

<!-- Scripts -->
@yield('before-scripts')
{!! Html::script('js/frontend/jQuery-2.1.4.min.js') !!}
{!! Html::script('js/frontend/calendar/jquery-1.7.1.min.js') !!}
{!! Html::script('js/frontend/calendar/jquery-ui-1.8.18.custom.min.js') !!}
{!! Html::script('js/frontend/validation.js') !!}
{!! Html::script('js/frontend/jquery.validate.js') !!}
{!! Html::script('js/frontend/jquery.czMore-1.5.3.2.js') !!}
@yield('after-scripts')
{{ Html::script('js/jquerysession.js') }}
{{--{{ Html::script('js/frontend/frontend.js') }}
{!! Html::script('js/select2/select2.js') !!}--}}

<script type="text/javascript">
    if("{{Route::currentRouteName()}}" !== "frontend.user.account")
    {
        $.session.clear();
    }
</script>
@include('includes.partials.ga')

<script>
    $(document).ready(function() {

    });
</script>

</body>
</html>