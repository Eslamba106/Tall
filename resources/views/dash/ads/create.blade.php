@extends('dash.layouts.back-end.app')

@section('title', translate('dashboard'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .styled-textarea {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 12px;
            min-height: 120px;
            resize: vertical;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .styled-textarea:focus {
            border-color: #4A90E2;
            /* لون عند التركيز */
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
            outline: none;
        }

        .color_primary {
            background-color: #32a466;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content container-fluid">
            <div class="card mb-3 remove-card-shadow">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="d-flex align-items-center text-capitalize gap-2 mb-0">
                            <img width="20" class="mb-1" src="{{ asset('/assets/back-end/img/admin-wallet.png') }}"
                                alt="">
                            {{ translate('اضافة اعلان جديد') }}
                        </h4>

                        <!-- زر الإرسال -->
                        <button type="submit" class="btn color_primary">
                            {{ translate('حفظ الاعلان') }}
                        </button>
                    </div>

                    <div class="row g-2">
                        <div class="col-lg-12">
                            <!-- Card -->
                            <div class="card  ">
                                <div class="card-body  ">

                                    <div class="row">
                                        <ul class="nav nav-tabs w-fit-content mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link type_link active" href="#"
                                                    id="basic-link">{{ __('المعلومات الاساسية') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link type_link " href="#"
                                                    id="details-link">{{ __('تفاصيل') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link type_link " href="#"
                                                    id="location-link">{{ __('الموقع') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link type_link " href="#"
                                                    id="share-link">{{ __('نشر في المتجر') }}</a>
                                            </li>
                                        </ul>
                                        <div class="col-md-12  tenant_form basic-form  text-start" id="basic-form">

                                            @include('dash.ads.includes.basic_info') 
                                        </div>
                                        <div class="col-md-12  tenant_form d-none details-form  text-start"
                                            id="details-form">
                                            @include('dash.ads.includes.details')
                                        </div>
                                        <div class="col-md-12  tenant_form d-none location-form  text-start"
                                            id="location-form">
                                            @include('dash.ads.includes.location')
                                        </div>
                                        <div class="col-md-12  tenant_form d-none share-form  text-start" id="share-form">
                                            @include('dash.ads.includes.share')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('script')
    <script src="{{ asset('assets/back-end') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('assets/back-end') }}/vendor/chart.js.extensions/chartjs-extensions.js"></script>
@endpush


@push('script_2')
    <script>
        $(".type_link").click(function(e) {
            e.preventDefault();
            $(".type_link").removeClass('active');
            $(".tenant_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            if (form_id === 'basic-link') {
                $("#details-form").removeClass('active').addClass('d-none');
                $("#location-form").removeClass('active').addClass('d-none');
                $("#share-form").removeClass('active').addClass('d-none');
                $("#basic-form").removeClass('d-none').addClass('active');
            } else if (form_id === "details-link") {
                $("#basic-form").removeClass('active').addClass('d-none');
                $("#location-form").removeClass('active').addClass('d-none');
                $("#share-form").removeClass('active').addClass('d-none');
                $("#details-form").removeClass('d-none').addClass('active');
            } else if (form_id === "location-link") {
                $("#basic-form").removeClass('active').addClass('d-none');
                $("#details-form").removeClass('active').addClass('d-none');
                $("#share-form").removeClass('active').addClass('d-none');
                $("#location-form").removeClass('d-none').addClass('active');
            } else if (form_id === "share-link") {
                $("#basic-form").removeClass('active').addClass('d-none');
                $("#location-form").removeClass('active').addClass('d-none');
                $("#details-form").removeClass('active').addClass('d-none');
                $("#share-form").removeClass('d-none').addClass('active');
            }


        });
        $(".type_ads_link").click(function(e) {
            e.preventDefault();
            $(".type_ads_link").removeClass('active');
            $(".ads_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            if (form_id === 'ads-link') {
                $("#ads_form").removeClass('d-none').addClass('active');
                $("#add_ads").removeClass('active').addClass('d-none');
            } else if (form_id === 'add_adds-link') {
                $("#add_ads").removeClass('d-none').addClass('active');
                $("#ads_form").removeClass('active').addClass('d-none');
            }

        });

        // $(".prefix_link").click(function() {
        //     $(".prefix_input").addClass('d-none');
        //     if ($(this).attr('id') === "active") {
        //         $(".prefix_input").removeClass('d-none');
        //     }
        // });
        // $(".fill_zero_link").click(function() {
        //     $(".fill_zero_link_input").addClass('d-none');
        //     if ($(this).attr('id') === "active") {
        //         $(".fill_zero_link_input").removeClass('d-none');
        //     }
        // });

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
