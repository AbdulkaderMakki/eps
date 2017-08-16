<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('main.head')
</head>

<body>

<div id="app">

    @include('main.header')

    @yield('content')

</div>

@include('main.footer')
<!-- Scripts -->
@include('main.scripts')

</body>

</html>
