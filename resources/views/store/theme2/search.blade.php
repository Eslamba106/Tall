@extends('store.theme2.layouts.store')
@section('page-title'){{ __('البحث') }} 
@endsection

@push('css-page')
<link rel="stylesheet" href="{{asset('assets/css/choices.min.css')}}">
<style>
.slider-contents .main-filter {
    border: 1px solid #ebebeb;
    border-radius: 15px;
}
/*------------ range slider ---------------- */
.noUi-target,
.noUi-target * {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -ms-touch-action: none;
  touch-action: none;
  -ms-user-select: none;
  -moz-user-select: none;
  user-select: none;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  cursor: pointer;
}

.noUi-target {
  position: relative;
  direction: ltr;
}

.noUi-base {
  width: 100%;
  height: 100%;
  position: relative;
  z-index: 1;
  background: #E7F0FF;
}

.noUi-origin {
  position: absolute;
  right: 0;
  top: 0;
  left: 0;
  bottom: 0;
}

.noUi-handle {
  position: relative;
  z-index: 1;
}

.noUi-stacking .noUi-handle {
  z-index: 10;
}

.noUi-state-tap .noUi-origin {
  -webkit-transition: left 0.3s, top 0.3s;
  transition: left 0.3s, top 0.3s;
}

.noUi-state-drag * {
  cursor: inherit !important;
}

.noUi-base,
.noUi-handle {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.noUi-horizontal {
  height: 4px;
}

.noUi-horizontal .noUi-handle {
  position: relative;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  left: 0px;
  top: 50%;
  transform: translateY(-50%);
  background-color: #32a466;
  border: 2px solid #ffffff;
  cursor: pointer;
}

.caption {
  margin-bottom: 10px;
}

/* Styling; */
.noUi-background {
  background: #E7F0FF;
}

.noUi-connect {
  background: #32a466;
  -webkit-transition: background 450ms;
  transition: background 450ms;
}

.noUi-origin {
  border-radius: 0px;
}

.noUi-target {
  width: 100%;
  padding-right: 15px;
}

/* Handles and cursors;
 */
.noUi-draggable {
  cursor: w-resize;
}

.noUi-vertical .noUi-draggable {
  cursor: n-resize;
}

.noUi-handle {
  cursor: default;
  -webkit-box-sizing: border-box !important;
  -moz-box-sizing: border-box !important;
  box-sizing: border-box !important;
}

/* Disabled state; */
[disabled].noUi-connect,
[disabled] .noUi-connect {
  background: #b8b8b8;
}

[disabled].noUi-origin,
[disabled] .noUi-handle {
  cursor: not-allowed;
}

.slider-labels .caption {
  font-weight: 500;
  font-size: 16px;
}
.caption-price {
    color: #000;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 20px;
}
span#slider-range-value2:after, span#slider-range-value1:after {
    content: 'رس';
    margin-left: 10px;
    margin-right: 3px;
    color: #999;
    font-size: 13px;
}

.col-price {
    width: max-content;
    margin: 0 auto;
    text-align: center;
    padding: 0 15px 45px;
    min-width: 350px;
}

.slider-contents .main-filter {
    border: none;
    border-radius: 15px;
    width: 100%;
    margin-top: 0;
    display: block;
    max-width: 100%;
}
.content-filter-part {
    float: right;
}
.filter-part {
    display: inline-block;
    align-items: center;
    overflow: scroll;
}
body.main-content {
    background: transparent;
}.full-h {
    padding-top: 0;
    margin-top: 0;}
    .icon-svg-filter0 {
    display: none;
}.col-auto-main-r .choices[data-type*=select-one] .choices__inner ,.part-head0.scrolled .col-auto-main-r .choices[data-type*=select-one] .choices__inner{
    padding-right: 15px !important;
}
</style>
@endpush
@section('content')
<div class="full-h">
@php
    $getTheme = getThemeSetting();
@endphp
    @include('store.theme2.header')

    @if ($getTheme[1]->section_enable == 'on')
    <div class="  part-head0" style="margin-top: 50px;">
        <div class="container-fluid"><div class=" part-head1">
    <div class="completing-filter">
        <div class="col-auto-main col-auto-main-r">
            <div class="title-filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_14_139)">
                      <path d="M20 0H0V20H20V0Z" fill="white"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M5 7.5C5 4.73857 7.23857 2.5 10 2.5C12.7614 2.5 15 4.73857 15 7.5C15 10.2614 12.7614 12.5 10 12.5C7.23857 12.5 5 10.2614 5 7.5Z" fill="black"/>
                      <path d="M5.92485 11.6739L5.12187 14.0828C4.40594 16.2306 6.68547 18.1479 8.67883 17.0746L9.605 16.5758C9.85167 16.443 10.1486 16.443 10.3952 16.5758L11.3214 17.0746C13.3147 18.1479 15.5943 16.2306 14.8783 14.0828L14.0753 11.6736C13.0238 12.7005 11.5858 13.3333 9.99992 13.3333C8.41425 13.3333 6.97631 12.7006 5.92485 11.6739Z" fill="black"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_14_139">
                        <rect width="20" height="20" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                <h4 class="sub-title-filtter">
                    المـــاركة :
                </h4>
            </div>
            <div class="icon-svg-filter00">

                <div class="icon-svg-filter0">
                    <svg style="stroke: #a5b0af;fill: transparent;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1"><path class="cls-1" d="M2.45,17.73H7.23a0,0,0,0,1,0,0v2.86a1,1,0,0,1-1,1H3.41a1,1,0,0,1-1-1V17.73A0,0,0,0,1,2.45,17.73Z"/><path class="cls-1" d="M16.77,17.73h4.77a0,0,0,0,1,0,0v2.86a1,1,0,0,1-1,1H17.73a1,1,0,0,1-1-1V17.73A0,0,0,0,1,16.77,17.73Z"/><path class="cls-1" d="M5.32,9.14H18.68A3.82,3.82,0,0,1,22.5,13v4.77a0,0,0,0,1,0,0H1.5a0,0,0,0,1,0,0V13A3.82,3.82,0,0,1,5.32,9.14Z"/><path class="cls-1" d="M16.29,2.45H7.71A1.91,1.91,0,0,0,5.88,3.84L4.36,9.14H19.64l-1.52-5.3A1.91,1.91,0,0,0,16.29,2.45Z"/><circle class="cls-2" cx="4.84" cy="13.43" r="1.43"/><circle class="cls-2" cx="19.16" cy="13.43" r="1.43"/><path class="cls-1" d="M14.86,13.91h0Z"/><line class="cls-1" x1="22.5" y1="7.23" x2="19.09" y2="7.23"/><line class="cls-1" x1="4.91" y1="7.23" x2="1.5" y2="7.23"/></svg>                        </div>
                
                    @php
                    // 1. قائمة الماركات التي تريد عرضها
                    $carBrands = [
                        'تويوتا', 'فورد', 'شيفروليه', 'نيسان', 'هيونداي', 'جنسس', 'لكزس', 'جي ام سي',
                        'مرسيدس', 'هوندا', 'بي ام دبليو', 'كيا', 'دودج', 'كرايزلر', 'جيب', 'ميتسوبيشي',
                        'مازدا', 'لاند روفر', 'ايسوزو', 'كاديلاك', 'بورش', 'اودي', 'سوزوكي', 'انفنيتي',
                        'همر', 'لنكولن', 'فولكس واجن', 'دايهاتسو', 'جيلي', 'ميركوري', 'فولفو', 'بيجو',
                        'بنتلي', 'جاكوار', 'سوبارو', 'MG', 'ZXAUTO', 'شانجان', 'رينو', 'بويك',
                        'مازيراتي', 'رولز رويس', 'لامبورجيني', 'اوبل', 'سكودا', 'فيراري', 'سيتروين',
                        'شيري', 'سيات', 'دايو', 'ساب', 'فيات', 'سانج يونج', 'استون مارتن', 'بروتون',
                        'هافال', 'جي ايه سي GAC', 'جريت وول Great Wall', 'فاو FAW', 'BYD', 'الفا روميو',
                        'تاتا', 'جى ام سي JMC', 'جيتور', 'سي ام سي', 'فوتون', 'فيكتوري اوتو', 'ليفان',
                        'ماكسيس', 'ماكلارين', 'جاك JAC', 'بايك', 'دونج فينج', 'اكسيد', 'تسلا',
                        'ساوايست', 'ماهيندرا', 'زوتي', 'هونشي', 'سمارت', 'تانك', 'لينك اند كو',
                        'لوسيد', 'اينيوس'
                    ];
                
                    // 2. استعلام واحد لجلب أعداد الماركات الموجودة في قاعدة البيانات
                    // استخدام pluck لإنشاء مصفوفة ترابطية [اسم الماركة => العدد] لسهولة البحث
                    $estateCounts = App\Models\Estate::select('estatetxt', DB::raw('count(*) as total'))
                                      ->whereIn('estatetxt', $carBrands) // اختياري: لجلب فقط الماركات الموجودة في قائمتك
                                      ->groupBy('estatetxt')
                                      ->pluck('total', 'estatetxt'); // يعيد [ 'تويوتا' => 5, 'فورد' => 10, ... ]
                
                @endphp

                <select
                value="{{old('type')}}"
                class="form-control"
                data-trigger
                name="type"
                placeholder="الماركا"
                id="choices-type0"
                class="content-filter-part-tt"
                required
                >
                <option value="">الماركا</option>
                @foreach ($carBrands as $brand)
                    @php
                        $count = $estateCounts[$brand] ?? 0;
                    @endphp
                    @if ($count == 0)
                        @continue
                    @endif
                    <option value="{{ $brand }}">{{ $brand }} <span class="number-of">({{ $count }})</span></option>
                @endforeach
                </select>
            </div>
                {{-- <select
            value="{{old('type')}}"
            class="form-control"
            data-trigger
            name="type"
            id="choices-type0"
            required
            class="content-filter-part-tt"
            >
            <option value="0" selected>نوع العقار</option>
            <option value="سكني" >سكني</option>
            <option value="تجاري">تجاري</option>
            </select> --}}
        </div>
        <div class="col-auto-main col-auto-main-r">
            <div class="title-filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M16.3125 5.9986C16.3125 6.30609 16.0575 6.5611 15.75 6.5611H2.25C1.9425 6.5611 1.6875 6.30609 1.6875 5.9986C1.6875 5.6911 1.9425 5.4361 2.25 5.4361H3.015L3.3 4.0786C3.57 2.7661 4.1325 1.55859 6.3675 1.55859H11.6325C13.8675 1.55859 14.43 2.7661 14.7 4.0786L14.985 5.4361H15.75C16.0575 5.4361 16.3125 5.6911 16.3125 5.9986Z" fill="black"/>
                    <path d="M16.6362 10.245C16.5237 9.0075 16.1936 7.6875 13.7861 7.6875H4.21616C1.80866 7.6875 1.48616 9.0075 1.36616 10.245L0.946163 14.8125C0.893663 15.3825 1.08116 15.9525 1.47116 16.38C1.86866 16.815 2.43116 17.0625 3.03116 17.0625H4.44116C5.65616 17.0625 5.88866 16.365 6.03866 15.9075L6.18866 15.4575C6.36116 14.94 6.40616 14.8125 7.08116 14.8125H10.9212C11.5962 14.8125 11.6187 14.8875 11.8137 15.4575L11.9637 15.9075C12.1137 16.365 12.3462 17.0625 13.5612 17.0625H14.9711C15.5637 17.0625 16.1337 16.815 16.5312 16.38C16.9212 15.9525 17.1087 15.3825 17.0562 14.8125L16.6362 10.245ZM6.75116 11.8125H4.50116C4.19366 11.8125 3.93866 11.5575 3.93866 11.25C3.93866 10.9425 4.19366 10.6875 4.50116 10.6875H6.75116C7.05866 10.6875 7.31366 10.9425 7.31366 11.25C7.31366 11.5575 7.05866 11.8125 6.75116 11.8125ZM13.5012 11.8125H11.2512C10.9437 11.8125 10.6887 11.5575 10.6887 11.25C10.6887 10.9425 10.9437 10.6875 11.2512 10.6875H13.5012C13.8087 10.6875 14.0637 10.9425 14.0637 11.25C14.0637 11.5575 13.8087 11.8125 13.5012 11.8125Z" fill="black"/>
                  </svg>
                <h4 class="sub-title-filtter">
                    نوع السيارة :
                </h4>
            </div>
            <div class="icon-svg-filter00">

                <div class="icon-svg-filter0">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none">
                        <path d="M16 8V5L19 2L20 4L22 5L19 8H16ZM16 8L12 11.9999M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

            <select
            value="{{old('goal')}}"
            class="form-control"
            data-trigger
            name="goal"
            id="choices-goal0"
            class="content-filter-part-tt"
            required
            >
            <option value="">اختر النوع</option>
    </select></div>
        </div>


        <div class="col-auto-main col-auto-main-r">
            
            <div class="title-filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <g clip-path="url(#clip0_14_178)">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M5.68524 3C5.14696 3 4.64994 3.28843 4.38288 3.75579L1.69763 8.45498C1.56812 8.68163 1.5 8.93813 1.5 9.1992V12.5729C1.5 12.8058 1.55422 13.0355 1.65836 13.2438L2.49689 14.9208C2.75097 15.429 3.27037 15.75 3.83852 15.75H4.5C5.32843 15.75 6 15.0785 6 14.25H12C12 15.0785 12.6716 15.75 13.5 15.75H14.1615C14.7296 15.75 15.249 15.429 15.5031 14.9208L16.3417 13.2438C16.4458 13.0355 16.5 12.8058 16.5 12.5729V9.1992C16.5 8.93813 16.4319 8.68163 16.3024 8.45498L13.6172 3.75579C13.3501 3.28843 12.8531 3 12.3148 3H5.68524ZM9 9C7.80203 9 6.69608 8.74298 5.58502 8.32898C5.21461 8.14403 4.76433 8.29425 4.57916 8.6646C4.39392 9.03503 4.54409 9.48555 4.91457 9.6708C5.28506 9.85605 7.16969 10.5 9 10.5C10.3907 10.5 11.8261 10.2947 13.0835 9.6717C13.4501 9.489 13.6042 9.03135 13.4208 8.6646C13.2356 8.29418 12.7853 8.14403 12.415 8.32898C11.3914 8.8401 10.122 9 9 9Z" fill="black"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_14_178">
                        <rect width="18" height="18" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                <h4 class="sub-title-filtter">
                    موديل السيارة :
                </h4>
            </div>
            <div class="icon-svg-filter00">

                <div class="icon-svg-filter0">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none">
                        <path d="M16 8V5L19 2L20 4L22 5L19 8H16ZM16 8L12 11.9999M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
            <div class="icon-svg-filter00">

                <div class="icon-svg-filter0">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none">
                        <g id="Edit / Select_Multiple">
                        <path id="Vector" d="M3 9V19.4C3 19.9601 3 20.2399 3.10899 20.4538C3.20487 20.642 3.35774 20.7952 3.5459 20.8911C3.7596 21 4.0395 21 4.59846 21H15.0001M17 8L13 12L11 10M7 13.8002V6.2002C7 5.08009 7 4.51962 7.21799 4.0918C7.40973 3.71547 7.71547 3.40973 8.0918 3.21799C8.51962 3 9.08009 3 10.2002 3H17.8002C18.9203 3 19.4801 3 19.9079 3.21799C20.2842 3.40973 20.5905 3.71547 20.7822 4.0918C21.0002 4.51962 21.0002 5.07969 21.0002 6.19978L21.0002 13.7998C21.0002 14.9199 21.0002 15.48 20.7822 15.9078C20.5905 16.2841 20.2842 16.5905 19.9079 16.7822C19.4805 17 18.9215 17 17.8036 17H10.1969C9.07899 17 8.5192 17 8.0918 16.7822C7.71547 16.5905 7.40973 16.2842 7.21799 15.9079C7 15.4801 7 14.9203 7 13.8002Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        </svg>
                    </div></div>
            <select
            value="{{old('city')}}"
            class="form-control"
            data-trigger
            name="model"
            placeholder="الموديل"
            id="choices-state0"
            class="content-filter-part-tt"
            required
            >
            <option value="">الموديل</option>
            @foreach ($estateModel as $model)
            @if ($model)
            @php
                $count = App\Models\Estate::where('model', $model)->count();
            @endphp
            <option value="{{$model}}">{{$model}} <span class="number-of">({{$count}})</span></option>
            @endif
            @endforeach
            </select>
        </div></div>
        <div class="col-auto-main col-auto-main-r">
        
            <div class="title-filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M3.75 12.75H9.75M3.75 9H14.25M8.25 5.25H14.25" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                <h4 class="sub-title-filtter">
                    الحالة:
                </h4>
            </div>
            <div class="icon-svg-filter00">

                <div class="icon-svg-filter0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                        <path d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#a5b0af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
            <select
            value="{{old('city')}}"
            class="form-control"
            data-trigger
            name="model"
            placeholder="الحالة"
            id="choices-type1"
            class="content-filter-part-tt"
            required
            >
            @php
            $count1 = App\Models\Estate::where('newer', 'جديد')->count();
            $count2 = App\Models\Estate::where('newer', 'مستعمل')->count();
            @endphp
            <option value="">الحالة</option>
            <option value="0">مستعمل <span class="number-of">({{$count2}})</span></option>
            <option value="1">جديد <span class="number-of">({{$count1}})</span></option>
            </select></div>
        </div>
    </div></div></div></div>
    <div class="container-fluid" style="padding-left: 1.5em!important;padding-right: 1.5em!important;">
        <div class="container-bg">
            <div class="row">
                <section class="part-theme0">

                    <div class="estate-data">
                    <div class="row part-content" id="part-content">
                        @php
                           $estates = App\Models\Estate::latest()->paginate($getTheme[1]->inner_list[2]->field_default_text);
                          //  $estates = App\Models\Estate::latest()->paginate(2);
                            @endphp
                                @foreach ($estates as $estate)
                                <div class="col-lg-3 col-sm-12">
                                <div class="homelengo-box">
                                    <div class="archive-top">
                                        <a href="{{route('products',$estate->id)}}" class="images-group">
                                            <div class="images-style">
                                                @if ($estate->thumbnail_image)
                                                <img class=" ls-is-cached" src="{{url('/uploads/cover_image/sd_').$estate->thumbnail_image}}" alt="{{$estate->name}}">
                                                @else
                                                <img class=" ls-is-cached" src="{{url('/uploads/none.jpg')}}" alt="{{$estate->name}}">

                                                @endif
                                            </div>
                                            <div class="top">
                                                <ul class="d-flex mps">
                                                    @if ($estate->status == 1)
                                                    <li class="flag-tag primary">متاح</li>
                                                    @else
                                                    <li class="flag-tag primary">غير متاح</li>
                                                    @endif
                                                </ul>
                                                
                                            </div>
                                        </a>
                                        
                                    </div>
                                    <div class="archive-bottom">
                                        <div class="content-top"> <a href="{{route('products',$estate->id)}}" class="link-pov"></a>

                                                                <a href="{{route('products',$estate->id)}}" class="link"><h6 class="text-capitalize">{{$estate->name}}</h6></a>

                                            <div class="data-newer">
                                                <span class="n-newer">
                                                    @if ($estate->newer == 'جديد')
                                                    الحالة : جديد
                                                    @else
                                                    الحالة : مستعمل
                                                    @endif
                                                </span>
                                            </div>
                                            <ul class="meta-list">
                                                @php
                                                    $props = App\Models\EstateGroupe::where('estate',$estate->id)->get();
                                                    $user = App\Models\User::find($estate->user);
                                                    @endphp
                                                @foreach ($props as $prop)
                                                @if ($prop->name == 'الممشى')
                                                <li class="item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <g clip-path="url(#clip0_14_215)">
                                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM13 4.06189V5C13 5.55228 12.5523 6 12 6C11.4872 6 11.0645 5.61396 11.0067 5.11662L11 5V4.06189C7.46744 4.5024 4.65014 7.24607 4.09821 10.7428L4.06189 11H5C5.55228 11 6 11.4477 6 12C6 12.5128 5.61396 12.9355 5.11662 12.9933L5 13H4.06189C4.55399 16.9463 7.92038 20 12 20C15.9928 20 19.3024 17.0749 19.9028 13.2507L19.9381 13H19C18.4477 13 18 12.5523 18 12C18 11.4872 18.386 11.0645 18.8834 11.0067L19 11H19.9381C19.7149 9.21042 18.9007 7.60441 17.6969 6.38349L15.2725 11.1417L15.1183 11.436L14.8076 12.0461C14.4385 12.7668 14.0356 13.4999 13.4849 14.0506C12.5132 15.0223 10.8972 15.1399 9.87861 14.1213C8.86 13.1027 8.97764 11.4868 9.94932 10.5151C10.4214 10.043 11.0274 9.67957 11.6448 9.35293L12.5639 8.8816L13.413 8.43849L17.6162 6.30275C16.3953 5.09914 14.7894 4.28503 13 4.06189ZM13.1623 10.8376L12.9523 10.9503L12.7357 11.0631C12.3336 11.2717 11.914 11.4893 11.5637 11.7607L11.3625 11.9304L11.2898 12.0145C11.0974 12.2747 11.1552 12.5695 11.2928 12.7071C11.4305 12.8448 11.7252 12.9026 11.9854 12.7101L12.0706 12.6364L12.2392 12.4363C12.4564 12.1561 12.6391 11.8315 12.8102 11.5069L12.9368 11.2642C13.0125 11.1183 13.0869 10.9747 13.1623 10.8376Z" fill="black"/>
                                                        </g>
                                                        <defs>
                                                          <clipPath id="clip0_14_215">
                                                            <rect width="24" height="24" fill="white"/>
                                                          </clipPath>
                                                        </defs>
                                                      </svg>
                                                  <div class="prop-cont">
                                                    <span class="fw-6">{{$prop->value}}</span></div>
                                                </li>
                                                @endif
                                                @endforeach
                                                <li class="item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.25 2H10.25C13.0784 2 14.4926 2 15.3713 2.87868C16.25 3.75736 16.25 5.17157 16.25 8V16.25H17.8214C19.0246 16.25 20 17.2254 20 18.4286V18.5C20 18.9142 20.3358 19.25 20.75 19.25C21.1642 19.25 21.5 18.9142 21.5 18.5V13.75L20.2757 13.3419C19.6631 13.1377 19.25 12.5645 19.25 11.9189V9.5C19.25 8.67157 19.9216 8 20.75 8H21.5V7.62247C21.5 7.43743 21.4997 7.37384 21.4965 7.31573C21.4631 6.72114 21.1953 6.16405 20.7519 5.76653C20.7085 5.72768 20.6591 5.68774 20.5146 5.57215L19.2815 4.58568C18.958 4.32692 18.9056 3.85495 19.1643 3.53151C19.4231 3.20806 19.8951 3.15562 20.2185 3.41438L21.4678 4.41378C21.5901 4.51163 21.6745 4.57915 21.7531 4.64962C22.4922 5.31214 22.9384 6.24063 22.9941 7.23161C23 7.33702 23 7.44511 23 7.60177V18.5C23 19.7427 21.9926 20.75 20.75 20.75C19.5074 20.75 18.5 19.7427 18.5 18.5V18.4286C18.5 18.0538 18.1962 17.75 17.8214 17.75H16.25V21.25H17.3734C17.7876 21.25 18.1234 21.5858 18.1234 22C18.1234 22.4142 17.7876 22.75 17.3734 22.75H2.25C1.83579 22.75 1.5 22.4142 1.5 22C1.5 21.5858 1.83579 21.25 2.25 21.25H3.25V8C3.25 5.17157 3.25 3.75736 4.12868 2.87868C5.00736 2 6.42157 2 9.25 2ZM7.5 16.25C7.08579 16.25 6.75 16.5858 6.75 17C6.75 17.4142 7.08579 17.75 7.5 17.75H12.5C12.9142 17.75 13.25 17.4142 13.25 17C13.25 16.5858 12.9142 16.25 12.5 16.25H7.5ZM11.5 6H8.5C7.55719 6 7.08579 6 6.79289 6.29289C6.5 6.58579 6.5 7.05719 6.5 8C6.5 8.94281 6.5 9.41421 6.79289 9.70711C7.08579 10 7.55719 10 8.5 10H11.5C12.4428 10 12.9142 10 13.2071 9.70711C13.5 9.41421 13.5 8.94281 13.5 8C13.5 7.05719 13.5 6.58579 13.2071 6.29289C12.9142 6 12.4428 6 11.5 6Z" fill="black"/>
                                                      </svg>
                                                      <div class="prop-cont">
                                                    <span class="fw-6">{{$estate->gas}}</span></div>
                                                </li>
                                                <li class="item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M21 18.184V12V5.81498C22.161 5.40098 23 4.302 23 3C23 1.34498 21.654 0 20 0C18.346 0 17 1.34498 17 3C17 4.302 17.839 5.40098 19 5.81498V11H13V5.81498C14.161 5.40098 15 4.302 15 3C15 1.34498 13.654 0 12 0C10.346 0 8.99997 1.34498 8.99997 3C8.99997 4.302 9.83898 5.40098 11 5.81498V11H4.99998V5.81498C6.16098 5.40098 7 4.302 7 3C7 1.34498 5.65398 0 4 0C2.34602 0 1 1.34498 1 3C1 4.302 1.83902 5.40098 3.00002 5.81498V12C3.00002 12.552 3.44702 13 4 13H11V18.184C9.83898 18.598 8.99997 19.698 8.99997 21C8.99997 22.654 10.346 24 12 24C13.654 24 15 22.654 15 21C15 19.698 14.161 18.598 13 18.184V13H19V18.184C17.839 18.598 16.9999 19.698 16.9999 21C16.9999 22.654 18.346 24 19.9999 24C21.6539 24 22.9999 22.654 22.9999 21C23 19.698 22.161 18.598 21 18.184Z" fill="black"/>
                                                      </svg>
                                                      <div class="prop-cont">
                                                    <span class="fw-6">{{$estate->motor}}</span></div>
                                                </li>
                                                </ul>
                                            
                                        </div>
                                        
                                        <div class="content-bottom">
                                            <h6 class="price">{{$estate->price}} رس</h6>
                                                @if ($estate->methode == 1)
                                                <div class="df-0">قابل للتفاوض</div>
                                                @else
                                                <div class="df-0">خيار 3</div>
                                                @endif
                                        </div>
                                    </div>
                                </div></div>
                                @endforeach
                                <div class="col-12">
                                <!--pagination start-->
                                <div class="d-flex align-items-center justify-content-between py-3 px-4">
                                    <nav class="paginat">
                                        @if ($estates->hasPages())
                                            <ul class="pagination">
                                                {{-- Previous Page Link --}}
                                                @if ($estates->onFirstPage())
                                                    <li class="page-item disabled page-link-t" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                        <span class="page-link" aria-hidden="true">‹ السابق</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link page-link-t" href="{{ $estates->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">‹ السابق</a>
                                                    </li>
                                                @endif
                                    
                                                {{-- Pagination Elements --}}
                                                @foreach ($estates->getUrlRange(1, $estates->lastPage()) as $page => $url)
                                                    @if ($page == $estates->currentPage())
                                                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach
                                    
                                                {{-- Next Page Link --}}
                                                @if ($estates->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link page-link-t" href="{{ $estates->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">التالي ›</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                                        <span class="page-link page-link-t" aria-hidden="true">التالي ›</span>
                                                    </li>
                                                @endif
                                            </ul>
                                        @endif
                                    </nav>
                                    
                                </div>
                                <!--pagination end-->

                                </div>
    
                            </div>
                            
                        </div>
                    </div>
                </section>
        </div>
        @endif
    </div></div></div>

    @endsection
    @push('js-main')
    <script src="{{asset('assets/js/choices.min.js')}}"></script>

    <script src="{{asset('assets/js/rangle-slider.js')}}"></script>
    <script>

      const type = new Choices($('#choices-state0')[0], {
      removeItemButton: true,shouldSort: false,
      searchEnabled: false,
    });
    const goal = new Choices($('#choices-type1')[0], {
      removeItemButton: true,shouldSort: false,
      searchEnabled: false,
    });
  //   const estate = new Choices($('#choices-city')[0], {
  //     removeItemButton: true,shouldSort: false,
  //     searchEnabled: true,
  //     noChoicesText: 'لا توجد أنواع أخرى',
  //   });
    const type0 = new Choices($('#choices-type0')[0], {
      removeItemButton: true,shouldSort: false,
      searchEnabled: true,
    });
    const goal0 = new Choices($('#choices-goal0')[0], {
      removeItemButton: true,shouldSort: false,
      searchEnabled: false,
    });
    const data0 = new Choices($('#choicesstate0')[0], {
      removeItemButton: true,shouldSort: false,
      searchEnabled: false,
    });
    const estate0 = new Choices($('#choices-city0')[0], {
      removeItemButton: true,shouldSort: false,
      searchEnabled: true,
      noChoicesText: 'لا توجد أنواع أخرى',
    });
  
    
      jQuery('.content-filter-part').click(function() {
          $('.completing-filter').addClass('active');
      $('.content-filter-part').removeClass('active');
      $(this).addClass('active');
      var data = $(this).attr('data-type');
      var city = $('#choices-city0').val();
      var goal = $('#choices-goal0').val();
      var type = $('#choices-type0').val();
      console.log(data);
  
      if(data){
        $.ajax({
          url: "{{route('estatefilter')}}",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {'data' :  data,'city' :  city,'goal' :  goal,'type' :  type},
          type: "POST",
          success: function (data) {
              console.log(data);
              
              $('#part-content').html(data);
          },
          error: function (data) {
              console.log('error');
          }
      });
      }
    });
  
    $('.filter-main-s .ce').click(function () {
      
      $('.filter-content-main').toggleClass('active');
      $('.content-fit-l').toggleClass('active');
  });
  $('.content-fit-l').click(function () {
      
      $('.filter-content-main').toggleClass('active');
      $('.content-fit-l').toggleClass('active');
  });
  $('.list-main-flt').click(function () {
      var data = $(this).attr('data-type');
      var data2 = $(this).attr('data-id');
      console.log(data);
      $('.list-main-flt').removeClass('active');
      $(this).addClass('active');
  
      $('.part-tgt').removeClass('active');
      $('.part-tgt-'+data2).addClass('active');
  
      
      $('#choices-type0').val(data);
      changerFiltter() ;
  });
  $('.list-main-sqt').click(function () {
      var data = $(this).attr('data-type');
      console.log(data);
      $('.list-main-sqt').removeClass('active');
      $(this).addClass('active');
  
      
      $('#choices-data0').val(data);
      changerFiltter() ;
  });
  //   jQuery('#choices-type0').change(function() {
  //     console.log('fffffffff');
  //     changerFiltter() ;
  //   });
  $('#choices-type0').change(function () {
  const selectedWilayaId = $(this).val();
console.log(selectedWilayaId);
var allAvlb = '{{$types}}';

$.post("{{ route('estate.model') }}", {
_token: "{{ csrf_token() }}",
state: selectedWilayaId 
}, function(response) {

  console.log(response[0]);
  
  goal0.clearChoices();
  response[0].forEach(el => {
      if (allAvlb.includes(el)) {
      goal0.setChoices([{ value: el, label: el }], 'value', 'label', false);
  }
      //$('#choices-goal0').append('<option value="'+el+'">'+el+'</option>');
  });

});
  });
  $('#choices-type1').change(function () {
      console.log($(this).val());
      changerFiltter() ;
  });
    $('#choices-goal0').change(function () {
      console.log($(this).val());
      changerFiltter() ;
  });
  $('#choices-state0').change(function () {
      console.log($(this).val());
      changerFiltter() ;
  });
  function changerFiltter() {
      // var data = $('.content-filter-part.active').attr('data-type');
      var theme = 'theme2';
      var type = $('#choices-type0').val();
      var goal = $('#choices-goal0').val();
      var model = $('#choices-state0').val();
      var status = $('#choices-type1').val();
      console.log(type);
  
      if(type){
        $.ajax({
          url: "{{route('estatefilter')}}",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {'theme' :  theme,'type' :  type,'goal' :  goal,'model' :  model,'status' :  status},
          type: "POST",
          success: function (data) {
              console.log(data);
              
              $('#part-content').html(data);
          },
          error: function (data) {
              console.log('error');
          }
      });
      }
  
  }
  
  const headerHeight = $('.part-head0').offset().top ; // الحصول على ارتفاع الهيدر
  
  addEventListener('scroll', function() {
      const header = $('.part-head0');
      const headerHeight2 = header.prop("scrollHeight"); // الحصول على ارتفاع الهيدر
      console.log(headerHeight);
      console.log($(window).scrollTop());
      
      // إضافة/إزالة الصنف "scrolled" بناءً على موضع التمرير
      if ($(window).scrollTop() > headerHeight) {
          $('.part-head0').addClass('scrolled');
      } else if(window.scrollY < headerHeight) {
          $('.part-head0').removeClass('scrolled');
      }
  });</script>
     @endpush