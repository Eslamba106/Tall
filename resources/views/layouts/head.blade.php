<head>
    <meta charset="utf-8"  dir="rtl">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
    
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href='{{asset('uploads/esooq.ico')}}' rel='icon' type='image/x-icon'/>
    <style>
       
        .nav-tabs .nav-link.main_active {
            color: #32a466 !important;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    @stack('css-page')
</head>
