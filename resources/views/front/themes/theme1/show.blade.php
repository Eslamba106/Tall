@extends('store.theme1.layouts.store')
@section('page-title')
    {{ __('الرئيسية') }}
@endsection

@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/css/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    <style>
        body.main-content {
            background: transparent;
        }

        .full-h {
            padding-top: 0;
            margin-top: 0;
        }

        .icon-svg-filter0 {
            display: none;
        }

        .col-auto-main-r .choices[data-type*=select-one] .choices__inner,
        .part-head0.scrolled .col-auto-main-r .choices[data-type*=select-one] .choices__inner {
            padding-right: 15px !important;
        }
    </style>
    <style>
        .car-card {
            background-color: #f9f9f9;
            border-radius: 20px;
            overflow: hidden;
            padding: 20px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .car-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .car-image-container img {
            width: 100%;
            height: auto;
            border-radius: 20px;
        }

        .car-status {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 14px;
        }

        .car-price {
            font-size: 28px;
            font-weight: bold;
            color: #000;
        }

        .muted {
            color: #888;
        }

        .car-feature {
            background-color: #fff;
            border-radius: 15px;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        /* .sub_card {
                                      max-width: 400px;
                                      margin: auto;
                                      background: white;
                                      padding: 25px;
                                      border-radius: 15px;
                                      box-shadow: 0 0 15px rgba(0,0,0,0.1);
                                      text-align: right;
                                    } */

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .location {
            font-size: 14px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 15px;
        }

        .location i {
            color: #555;
        }

        .features {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .feature-box {
            flex: 1;
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
        }

        .feature-box i {
            font-size: 20px;
            margin-bottom: 5px;
            display: block;
        }

        .feature-label {
            font-size: 14px;
            color: #333;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 5px;
        }

        .negotiable {
            text-align: left;
            font-size: 14px;
            color: #444;
            margin-top: 5px;
        }

        a.sub_card {
            text-decoration: none;
            color: inherit;
            display: block;

        }

        .btn-bordered {
            border: 2px solid #0d6efd;
            background-color: #fff;
            color: #0d6efd;
            font-weight: bold;
            border-radius: 30px;
            transition: 0.3s ease;
        }

        .btn-bordered:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
@endpush
@section('content')
    @php
        $getTheme = getMainThemeSetting();
    @endphp
    <div class="full-h">

        @include('store.theme2.header')

        <h3>تفاصيل الاعلان</h3>
        <div class="content container-fluid">
            <div class="card mb-3 remove-card-shadow" style=" border-radius: 15px;">
                <div class="card-body">


                    <div class="row g-2" style=" border-radius: 25px;">
                        <div class="col-lg-6">
                            <img src="{{ asset('uploads/bg1.png') }}" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="sub_card" href="{{ route('ads.show', $ads->id) }}">
                                <div class="title">{{ $ads->name }}</div>
                                <div class="location">
                                    <i>📍</i>
                                    {{ $ads->city->name_ar }}
                                    ... {{ $ads->district?->name_ar }}
                                </div>

                                <div class="features">
                                    <div class="feature-box">
                                        <i>🏢</i>
                                        <div class="feature-label">الممشي : 500</div>
                                    </div>
                                    <div class="feature-box">
                                        <i>📐</i>
                                        <div class="feature-label">القير : {{ $ads->car_motor_status }}</div>
                                    </div>
                                </div>

                                <div class="price text-start">
                                    <span class="  text-start">{{ $ads->sale_price ?? 'السعر عند الاتصال' }}</span>
                                    @if ($ads->sale_price)
                                        <span>﷼</span>
                                    @endif
                                    @if ($ads->financing == 'يقبل تمويل' || $ads->financing == '1')
                                        | <div class="negotiable">قابل للتمويل</div>
                                    @endif
                                </div>
                                @if ($ads->sale_price)
                                    <div class="negotiable text-end">قابل للتفاوض</div>
                                @endif
                            </div>
                            <a class="btn btn-bordered w-50 mt-5" style="background: green;color:white">واتساب</a>
                            <a class="btn btn-bordered w-50">اتصل</a>

                        </div>



                    </div>
                    <div class="row mt-5" style=" border-radius: 25px;">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body  ">
                                    <!-- Order status -->
                                    <div class="order-status d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color">status : </span>

                                        <span
                                            class="badge badge-soft-info font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                            order_status
                                        </span>

                                        <span
                                            class="badge badge-soft-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                            order_status
                                        </span>

                                        <span
                                            class="badge badge-soft-warning font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                            order_status
                                        </span>

                                        <span
                                            class="badge badge-soft-success font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                            order_status
                                        </span>

                                        <span
                                            class="badge badge-soft-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                            order_status
                                        </span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        </div>
                        <div class="row mt-5" style=" border-radius: 25px;">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        الوصف
                                    </div>
                                    <div class="card-body">

                                        {{ $ads->description }}
                                    </div>
                                </div>



                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @push('js-main')
    @endpush
