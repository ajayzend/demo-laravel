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
    <title>@yield('title', (@$header_title) ? @$header_title : app_name())</title>

    <meta name="google-site-verification" content="80oFWWlwO9ySj29V2e4_L46FLzr1ceiC6TCFFjPHUPw" />
    <!-- Meta -->
    <meta name="description" content=<?php if(isset($header_description)) { echo "'$header_description'";} else { echo "'Official Indian e Visa website for e tourist visa (eTV) for 180+ countries across the World such as UK, USA, Australia, Canada, Japan, UAE, NZ, European Countries & Singapore and so many.'";}?> />
    <meta name="keywords" content=<?php if(isset($header_keywords)) { echo "'$header_keywords'";} else { echo "'e Tourist Visa India, Indian Visa, Visa to India, india Visa Requirement, Online Indian Visa Application, e visa india, Indian e visa, Apply Visa for India, Indian visa on arrival.'";}?> />

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

    // Auto Complete Code
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
         the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                         (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                 increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                 decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
             except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    var countries = ["Albania","Andorra","Angola","Anguilla","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Barbados","Belgium","Belize","Bolivia","Bosnia and Herzegovina","Bostwana","Brazil","Brunei","Bulgaria","Burundi","Camroon Republic","Canada","Cape Verde","Cayman Island","Chile","China","China - Macau","China- Sar Hongkong","Colombia","Combodia","Comoros","Cook Islands","Costa rica","Cote D'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor","Ecuador","El Salvador","Eritrea","Estonia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guyana","Haiti","Honduras","Hungary","Iceland","Indonesia","Iran","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Kyrgyzstan","Laos","Latvia","Lesotho","Liberia","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Mali","Malta","Marshall Islanda","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Mozambique","Myammar","Namibia","Nauru","Netherlands","New Zealand","Nicaragua","Niger Republic","Niue Islands","Norway","Oman","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Republic Of Korea","Rewanda","Romania","Russia","Saint Christopher And Nevis","Saint Lucia","Saint Vincent And The Grenadines","Samoa","San Marino","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovania","Solomon Islands","South Africa","Spain","Sri Lanka","Suriname","Swaziland","Sweden","Switzerland","Taiwan","Tajikstan","Tanzania","Thailand","Tongo","Trinidad And Tobago","Turks And Caicos Isl","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States Of America","Uruguay","Uzbekistan","Vanuatu","Vatican City - Holy See","Venezuela","Vietnam","Zambia","Zimbabwe"];
    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), countries);

</script>
@include('frontend.main-footer')
@include('includes.partials.ga')
</body>
</html>