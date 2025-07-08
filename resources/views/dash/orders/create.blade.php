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
        border-color: #4A90E2; /* لون عند التركيز */
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        outline: none;
    }
    .color_primary{
        background-color:#32a466;
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
                        <img width="20" class="mb-1" src="{{ asset('/assets/back-end/img/admin-wallet.png') }}" alt="">
                        {{ translate('اضافة طلب جديد') }}
                    </h4>
                    
                    <!-- زر الإرسال -->
                    <button type="submit" class="btn color_primary">
                        {{ translate('حفظ الطلب') }}
                    </button>
            </div>

                <div class="row g-2">
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body  ">

                                <div class="row">
                                    <ul class="nav nav-tabs w-fit-content mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link type_link active" href="#"
                                                id="personal-link">{{ __('بيانات العميل') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link type_link " href="#"
                                                id="company-link">{{ __('عميل جديد') }}</a>
                                        </li>
                                    </ul>
                                    <div class="col-md-12 tenant_form personal-form  text-start" id="personal-form">

                                        @include('dash.orders.includes.customer')

                                    </div>
                                    <div class="col-md-12 tenant_form d-none company-form  text-start" id="company-form">
                                        @include('dash.orders.includes.add_customer')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body  ">

                                <div class="row">
                                    <ul class="nav nav-tabs w-fit-content mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link type_ads_link active" href="#"
                                                id="ads-link">{{ __('بيانات الاعلان') }}</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link type_ads_link " href="#"
                                                id="add_adds-link">{{ __('اعلان جديد') }}</a>
                                        </li> --}}
                                    </ul>
                                    <div class="col-md-12 ads_form  main_ads_from text-start" id="ads_form">

                                        @include('dash.orders.includes.ads')

                                    </div>
                                    {{-- <div class="col-md-12 ads_form d-none add_ads_form  text-start" id="add_ads">
                                        @include('dash.orders.includes.add_ads')
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body  ">

                                <div class="row">
                                    <ul class="nav nav-tabs w-fit-content mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link   active" href="#"
                                                id="personal-link">{{ __('ملاحظات') }}</a>
                                        </li>
                                         
                                    </ul>
                                    <div class="col-md-12  text-start"   >
                                        <div class="form-group">
                                            <label for="name" class="title-color">{{ __('ملاحظات') }}<span
                                                    class="text-danger"> *</span>
                                            </label>
                                            <textarea name="notes" class="form-control  styled-textarea" placeholder="اكتب هنا"></textarea>

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
            if (form_id === 'personal-link') {
                $("#personal-form").removeClass('d-none').addClass('active');
                $("#company-form").removeClass('active').addClass('d-none');
            } else if (form_id === 'company-link') {
                $("#company-form").removeClass('d-none').addClass('active');
                $("#personal-form").removeClass('active').addClass('d-none');
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
       
  

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush