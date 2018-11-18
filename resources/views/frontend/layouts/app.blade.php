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
        <title>@yield('title', app_name())</title>
        <meta name="google-site-verification" content="80oFWWlwO9ySj29V2e4_L46FLzr1ceiC6TCFFjPHUPw" />
        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'e-visa-India')">
        <meta name="author" content="@yield('meta_author', 'Ajay Sahu')">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
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
            @include('frontend.visas.header')
            @include('frontend.visas.banner')
            @include('frontend.visasteps')
            @include('frontend.home1')
            <div class="container">
                {{--@include('includes.partials.messages')--}}
                @yield('content')
            </div><!-- container -->
            @include('frontend.home2')
           {{-- @include('includes.partials.logged-in-as')--}}
            {{--@include('frontend.includes.nav')--}}
        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script('js/frontend/jQuery-2.1.4.min.js') !!}
		{!! Html::script('js/bootstrap.min.js') !!}
       {{-- {!! Html::script(mix('js/frontend.js')) !!}--}}
        @yield('after-scripts')
        {{ Html::script('js/jquerysession.js') }}
       {{-- {{ Html::script('js/frontend/frontend.js') }}
        {!! Html::script('js/select2/select2.js') !!}--}}

        <script type="text/javascript">
            if("{{Route::currentRouteName()}}" !== "frontend.user.account")
            {
                $.session.clear();
            }
        </script>
        @include('frontend.footer')
        @include('includes.partials.ga')
    </body>
</html>