<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="ASU-EPS">
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'EPS-ASU') }}</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Jquery -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!-- modernizr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- ASU Style -->
<link rel="stylesheet" href="{{ asset('main/foundation.min.css') }}">
<link rel="stylesheet" href="{{ asset('main/app.css') }}">
<link rel="stylesheet" href="{{ asset('main/common.css') }}">
