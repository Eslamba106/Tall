<!DOCTYPE html>
<html lang="ar" dir="rtl">
@section('page-title')
    {{ __('تسجيل الدخول') }}
@endsection
@include('layouts.head')

<body class="g-sidenav-show rtl bg-gray-100">
    <style>
        .w-full {
    width: 100%;
}.content-login {
    max-width: 450px;
    margin: 0 auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 20px;
}.container-login {
    height: 100vh;
    display: flex
;
    align-items: center;
}h1.login-title {
    font-size: 1.4em;
    color: #000;margin-top: 0;
}.flex.items-center.justify-end {
    display: flex
;
    align-items: center;
    justify-content: space-between;
}label.block.font-medium.text-sm.text-gray-700 {
    font-size: 12px !important;
    margin-bottom: 0;
    margin-top: 5px;
}
    </style>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps__rtl ps--active-y">

        <div class="container container-login">
            <div class="content-login">
                <h1 class="login-title">تسجيل الدخول</h1>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('سيتم ارسال رسالة تأكيد للبريد الالكتروني الخاص بك') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الالكتروني')" />
            <x-text-input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn bg-gradient-primary btn-sm mb-0">
                {{ __('ارسال رسالة تأكيد البريد') }}
            </x-primary-button>
        </div>
    </form>
</div></div>
</body>