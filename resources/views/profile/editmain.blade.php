@extends('layouts.super')
@section('page-title')
    {{ __('تعديل الحساب') }}
@endsection
@push('css-page')
<link rel="stylesheet" href="{{asset('assets/css/choices.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}">
@endpush
@section('content')

<div class="loadinder-thumb"></div>
<div class="loadinder"><ul class="wave-menu"><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul><span>جار تشفير المتجر</span><span>لا تغلق الصفحة</span></div>

<form action="" method="POST" enctype="multipart/form-data" class="addProducts" id="form_post">
@csrf
    <div class="row">
        <div class="col-lg-6">
            <h4>تعديل معلومات الحساب</h4>
        </div>
    </div>

<div class="row mt-4">
    <div class="col-lg-6 mt-lg-0 mt-4">
        <div class="card">
            <div class="card-body">
                <h5>المعلومات الشخصية</h5>
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <form method="post" action="{{ route('profile.update') }}" class="profile-form-info">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name">الاسم الكامل:</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{old('name', $user->name)}}" required autofocus autocomplete="name" />
                    </div>

                    <div>
                        <label for="name">رقم الهاتف:</label>
                        <input id="phone" name="phone" type="text" class="form-control" value="{{old('phone', $user->phone)}}" required autofocus autocomplete="phone" />
                    </div>

                    <div>
                        <label for="email">البريد الالكتروني</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{old('email', $user->email)}}" required autocomplete="username" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    يجب عليك تأكيد بريدك الالكتروني

                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                       اعادة ارسال رسالة التأكيد
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        تم ارسال رسالة تحقق جيدة
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center">
                        <button class="btn bg-gradient-primary mt-3">تغيير</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-lg-0 mt-4">
        <div class="card">
            <div class="card-body">
                <h5>تغيير كلمة المرور</h5>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div>
                        <label for="current_password">كلمة المرور الحالية</label>
                        <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password"  placeholder="كلمة المرور الحالية"/>
                    </div>

                    <div>
                        <label for="password">كلمة المرور الجديدة</label>
                        <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" placeholder="كلمة المرور الجديدة"/>
                    </div>

                    <div>
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" placeholder="تأكيد كلمة المرور"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="btn bg-gradient-primary mt-3">تغيير</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</form>

@endsection
@push('js-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if (!empty($errors->updatePassword->get('current_password')))
<script>toastr.success("تأكد من ادخال كلمة السر الصحيحة","حدث خطأ");</script>
@elseif (!empty($errors->updatePassword->get('password')))
<script>toastr.success("تأكد من كلمة السر الجديدة","حدث خطأ");</script>
@elseif (!empty($errors->updatePassword->get('password_confirmation')))
<script>toastr.success("تأكد من مطابقة كلمة السر","حدث خطأ");</script>
@endif
@if (session('status') === 'profile-updated' && session('status') === 'password-updated')
<script>toastr.success("تمت عملية تحديث الحساب بنجاح","تم التحديث");</script>
@endif


@endpush
