@extends('layouts.admin')
@section('page-title')
    {{ __('تصدير الطلبات') }}
@endsection


@section('content')
<link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}">
<div class="row">
    <div class="col-12">
    <div class="card">

    <div class="card-header pb-0">
    <div class="d-lg-flex">
    <div>
    <h5 class="mb-0">{{__('تصدير الطلبات')}}</h5>
    <p class="text-sm mb-0">
   {{__('أنشئ ملف يحتوي طلبات مدة زمنية معينة')}}
    </p>
    </div></div>
    <div class="card-body px-0 pb-0">
    <div class="col-12 mb-3">
        <form action="{{route('exportStore')}}" method="post">
            @csrf
            <div class="row">
                <div class="input-group">
                    @php
                        $start_date = date('m/d/Y', strtotime('7 days ago'));
                        $end_date = date('m/d/Y', strtotime('today'));
                        if (isset($date_var)) {
                            $start_date = date('m/d/Y', strtotime($date_var[0]));
                            $end_date = date('m/d/Y', strtotime($date_var[1]));
                        }
                    @endphp

                    <input class="form-control date-range-picker date-range" type="text"
                        placeholder="تاريخ البدأ - تاريخ الانتهاء" name="date_range"
                        data-startdate="'{{ $start_date }}'" data-enddate="'{{ $end_date }}'">
                </div>
            </div>
            <input type="submit" class="btn bg-gradient-primary mb-0 mt-2" value="تصدير">
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

@endsection
@push('js-page')
<script src="{{asset('assets/js/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/flatpickr.ar.js')}}"></script>
<script>
    !function(e,n){"object"==typeof exports&&"undefined"!=typeof module?n(exports):"function"==typeof define&&define.amd?define(["exports"],n):n((e="undefined"!=typeof globalThis?globalThis:e||self).ar={})}(this,function(e){"use strict";var n="undefined"!=typeof window&&void 0!==window.flatpickr?window.flatpickr:{l10ns:{}},i={weekdays:{shorthand:["أحد","اثنين","ثلاثاء","أربعاء","خميس","جمعة","سبت"],longhand:["الأحد","الاثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت"]},months:{shorthand:["1","2","3","4","5","6","7","8","9","10","11","12"],longhand:["يناير","فبراير","مارس","أبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر"]},firstDayOfWeek:6,rangeSeparator:" - ",weekAbbreviation:"Wk",scrollTitle:"قم بالتمرير للزيادة",toggleTitle:"اضغط للتبديل",amPM:["ص","م"],yearAriaLabel:"سنة",monthAriaLabel:"شهر",hourAriaLabel:"ساعة",minuteAriaLabel:"دقيقة",time_24hr:!1};n.l10ns.ar=i;n=n.l10ns;e.Arabic=i,e.default=n,Object.defineProperty(e,"__esModule",{value:!0})});

$(".date-range-picker").each(function(a){var t=$(this),e={mode:"range",showMonths:2,dateFormat:"m/d/Y",locale:"ar"},d=t.data("startdate"),r=t.data("enddate");d&&r&&(e.defaultDate=[d,r]),t.flatpickr(e)});
</script>
@endpush
