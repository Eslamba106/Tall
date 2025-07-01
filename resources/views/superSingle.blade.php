@extends('layouts.super')
@section('page-title')
    {{ __('الطلبات') }}
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12 mt-2">
      <div class="card z-index-2">
        <div class="card-header pb-0 center">
          <h6>{{$tenent->name}}</h6>
        </div>
         <div class="row">
            <div class="col-12">
    
                <div class="col-12">
                    <div class="main-subs center">
                        <div class="row">
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            تاريخ الانشاء:
                        </div>
                        <div class="subs-data">
                            {{ date('d-m-Y', strtotime($tenent->created_at)) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            تاريخ تأكيد الايمايل:
                        </div>
                        <div class="subs-data">
                            @if ($user->email_verified_at == null)
                                غير مأكد
                            @else
                            {{$user->email_verified_at}}
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            تاريخ انتهاء الاشتراك:
                        </div>
                        <div class="subs-data">
                            {{ date('d-m-Y', strtotime($tenent->duration)) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            الاشتراك الحالي
                        </div>
                        <div class="subs-data">
                            @php
                                $subs = App\Models\Subscription::find($user->subscription);
                            @endphp
                            {{$subs->name ?? ""}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            اسم المستخدم:
                        </div>
                        <div class="subs-data">
                            {{$user->name}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            عدد الزيارات:
                        </div>
                        <div class="subs-data">
                            {{$visitor}}
                        </div>
                    </div>
                    @if ($user->affiliate)
                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            مصدر الاحالة:
                        </div>
                        <div class="subs-data">
                            {{$user->affiliate}}
                        </div>
                    </div>
                    @endif


                    <div class="col-lg-4 col-sm-12 subs-info">
                        <div class="subs-title">
                            عدد الطلبات:
                        </div>
                        <div class="subs-data">
                            {{$deals}}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="action-store">
                            <h2 class="title-store">
                                اعدادات المتجر
                            </h2>
                            <div class="row">

                                <div class="col-lg-4 col-sm-6">
                                    <div class="content-store">
                                        حذف المتجر الالكتروني
                                        <form action="{{route('super.delete',$tenent->name)}}" method="post">
                                            @csrf
                                            <input type="submit" value="حذف كامل">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="content-store">
                                        تسجيل الدخول
                                        <form action="{{route('super.loginStore',$tenent->name)}}" method="post">
                                            @csrf
                                            <input type="submit" value="تسجيل الدخول">
                                        </form>
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    
@endsection
@push('js-page')
@endpush