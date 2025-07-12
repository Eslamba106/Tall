@extends('dash.layouts.back-end.app')

@section('title', translate('dashboard'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Heading -->
        <div class="page-header pb-0 border-0 mb-3">
            <div class="flex-between row align-items-center mx-1">
                <div>
                    <h1 class="page-header-title">{{__('الرئيسية')}}</h1>
                    <div>{{ __('مرحبا بك !')}}.</div>
                </div>

                {{-- <div>
                    <a class="btn btn--primary" href="{{route('seller.product.list')}}">
                        <i class="tio-premium-outlined mr-1"></i> {{translate('products')}}
                    </a>
                </div> --}}
            </div>
        </div>
 
    </div>

@endsection

@push('script')
    <script src="{{asset('public/assets/back-end')}}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/chart.js.extensions/chartjs-extensions.js"></script>
    <script
        src="{{asset('public/assets/back-end')}}/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
@endpush

@push('script_2')
    
@endpush
