<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('main.head')
</head>

<body>

<div id="app">
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).foundation();
            $(".inner-wrap, .left-off-canvas-menu, .main-section").height($(window).height() - $(".fixed").height());
        })
    </script>
    <!-- -->
    <style type="text/css">
        .removedash:after, .removedash:before {
            padding-bottom: 0px;
        }
    </style>
    <div class="off-canvas-wrap" data-offcanvas="">
        <div class="inner-wrap" style="height: 671px;">

            {{--header--}}
            @include('main.header.layout')
            {{--header--}}


            <center>
                {{--content--}}
                @yield('content')
            </center>


            {{--footer--}}
            @include('main.footer')
            {{--footer--}}


            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>

<!-- Footer Scripts -->
@include('main.scripts')

</body>

</html>
