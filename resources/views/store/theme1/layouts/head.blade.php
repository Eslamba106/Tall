<head>
    <meta charset="utf-8"  dir="rtl">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and icons -->
    <link rel="stylesheet" href="{{asset('assets/back-end')}}/css/toastr.css">

    {{-- <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet" /> --}}
    <style>
        @font-face {
    font-family: 'Lama Sans';
    font-style: normal;
    font-weight: 400;
    src: url({{ main_path().'/assets/fonts/LamaSans-Regular.woff' }}) format('woff');
    }
@font-face {
    font-family: 'Lama Sans';
    font-style: normal;
    font-weight: 500;
    src: url({{ main_path(). '/assets/fonts/LamaSans-Regular.woff'}}) format('woff');
    }
    @font-face {
    font-family: 'Lama Sans';
    font-style: normal;
    font-weight: 700; /* أو 'bold' */
    src: url({{ main_path().'/assets/fonts/LamaSans-Bold.woff' }}) format('woff');
}
@font-face {
    font-family: 'Lama Sans';
    font-style: normal;
    font-weight: 800; /* أو 'bold' */
    src: url({{ main_path(). '/assets/fonts/LamaSans-Black.woff'}}) format('woff');
}
@font-face {
    font-family: 'Lama Sans';
    font-style: normal;
    font-weight: 900;
    src: url({{ main_path().'/assets/fonts/LamaSans-ExtraBold.woff' }}) format('woff');
}
    </style>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link id="pagestyle" href="{{asset('assets/css/theme.css')}}" rel="stylesheet" />
    @stack('css-page')
</head>
