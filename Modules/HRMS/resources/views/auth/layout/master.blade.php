<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="shortcut icon" href="{{asset('assets/media/images/echttech-logo.png')}}" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    @stack('form-style')
    @yield('style')
</head>
<body id="kt_body" class="bg-body">

@if (session('success'))
    <p class="alert alert-success text-center chk">{{ session('success') }}</p>
@endif
@if (session('error'))
    <p class="alert alert-danger text-center chk">{{ session('error') }}</p>
@endif

@yield('content')

<!-- JS Global Compulsory (Do not remove)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
<!--end::Page Custom Javascript-->
@stack('js-scripts')
</body>
</html>
