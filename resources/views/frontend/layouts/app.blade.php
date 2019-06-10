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
        <meta name="description" content="EvisaIndia.in website provides online services for India E-Visa applications also available for tourist, business & medical visits. Apply Online Today!." />
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

        <meta name="description" content=" Official Indian Visa website for e-Visa, e tourist Visa (eTV) India for 180+ countries across the Globe such as UK, USA & Canada, UAE, Australia "/>
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
                    (function () {
                        /*var findTextInTable = function ($tableElements, text) {
                         // highlights if text found (not highlighting during typing)
                         var matched = false;
                         $tableElements.removeClass('highlight');

                         $.each($tableElements, function (index, item) {
                         var $el = $(item);
                         if ($el.html() == text && !matched) {
                         console.log("matched", $el, $el.html());
                         $el.addClass('highlight');
                         matched = true;
                         }
                         });
                         };*/
                        var removeHighlight = function () {
                            $('span.highlight').contents().unwrap();
                        };

                        var wrapContent = function (index, $el, text) {
                            var $highlight = $('<span class="highlight"/>')
                                    .text(text.substring(0, index));
                            //console.log(text.substring(0, index));
                            var normalText = document.createTextNode(text.substring(index, text.length));
                            //console.log(index, $highlight.text(), normalText);
                            $el.html($highlight).append(normalText);
                        };

                        var highlightTextInTable = function ($tableElements, searchText) {
                            // highlights if text found (during typing)
                            var matched = false;
                            //remove spans
                            removeHighlight();

                            $.each($tableElements, function (index, item) {
                                var $el = $(item);
                                if ($el.text().toLowerCase().search(searchText) != -1 && !matched) {
                                    //console.log("matched", $el, $el.html());
                                    wrapContent(searchText.length, $el, $el.html());
                                    //console.log(searchText, $el.text());
                                    if (searchText == $el.text().toLowerCase()) {
                                        // found the entry
                                        //console.log("matched");
                                        matched = true;
                                    }
                                }
                            });
                        };

                        $(function () {
                            //load table into object


                            //console.log($tableRows, $tableElements);

                            $('#search').on('keyup', function (e) {

                                var searchText = $(this).val().toLowerCase();
                                $("#evisa-country tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
                                    var $tableRows = $('table tr');
                                    var $tableElements = $tableRows.children();



                                //var searchText = $(this).val();
                                if (searchText.length == 0) {
                                    // catches false triggers with empty input (e.g. backspace delete or case lock switch would trigger the function)
                                    removeHighlight(); // remove last remaining highlight
                                    return;
                                }
                                //findTextInTable($tableElements, searchText);

                                highlightTextInTable($tableElements, searchText);
                                });
                            });
                        });

                    })();

        </script>
        @include('frontend.footer')
        @include('includes.partials.ga')
    </body>
</html>