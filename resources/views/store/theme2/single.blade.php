@extends('store.theme2.layouts.store')
@section('page-title'){{$estate->name}}
@endsection
@push('css-page')
<link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}">
<style>

.thumbs-sw-pagi {
    margin-top: 16px;
    direction: rtl;
}.thumbs-sw-pagi .img-thumb-pagi {
    border-radius: 8px;
    overflow: hidden;
}.single-property-gallery .image-sw-single {
    border-radius: 16px;
    overflow: hidden;
}h1.main-title {
    color: #000;
    margin-top: 10px;
    margin-bottom: 10px;
}
.prod-date svg * {
    stroke: #b9b9b9;
}
.prod-location svg *{
    stroke: #b9b9b9;
}
.data-title svg {
    width: 16px;
    height: 16px;
    margin-left: 5px;
    position: relative;
    top: -2px;
}.data-title {
    color: #000000;
    font-size: 15px;
}span.prod-date {
    margin-left: 15px;
}
.single-main {
    margin-top: 10px;
}h4.small-title {
    font-size: 17px;
    color: #000;
    letter-spacing: -0.5px;
    margin-bottom: 15px;
    margin-top: 0;
}
span.t-svg {
    border: 1px solid rgb(228, 228, 228);
    border-radius: 10px;
    display: inline-block;
    padding: 6px;
    display: flex
;
    width: 48px;
    height: 48px;
    padding: 13px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    background: #fff;
    border-radius: 24px;
    border: none;
}.content-dec {
    color: #4D4D4D;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 40px;
}
span.t-svg svg {
    width: 30px;
    height: 30px;
}.list-namer-xr {
    margin-bottom: 15px;
    display: flex
;
    list-style: none;
}
span.data-txts {
    display: flex;
    flex-direction: column;
    margin-right: 15px;
}
span.data-txts span.name-x {
    font-weight: 500;
    font-size: 12px;
    color: #525252;
}
span.valeu-x {
    color: #000;
    font-weight: 600;
    font-size: 14px;
}
.content-item-place {
    flex: 1;
    padding: 10px 20px;
}
.image-sw-single img {
    min-width: 100%;object-fit: cover;
    aspect-ratio: 1.8;
    max-height: 450px;
}
.item-title {
    font-weight: 600;
    font-size: 13px;
}
.map-main {
    border-radius: 12px;
    margin-top: 20px;
    margin-bottom: 40px;
}
.sidebare-stk {
    position: sticky;
    top: 20px;
    background: #F4F4F4;
}
h2.mid-title {
    color: #000;
    font-size: 17px;
    letter-spacing: -0.5px;}
.sidebare-stk .form-control {
    padding: 14px 13px;
    border-radius: 20px;
    margin-bottom: 12px;
    display: inline-block;
}
.sidebare-stk .form-control#prif {
    max-width: 65px; margin-right: 15px;
}
.phone-flex {
    display: flex;
    width: 100%;
}
.btn-main {
    width: 100%;
    margin-bottom: 9px !important;
    display: inline-block;
    font-size: 13px !important;
    padding: 15px 15px !important;
    letter-spacing: 0;
}

.content-cat-main {
    display: flex;
    margin-bottom: 1em;
}

.content-price {
    font-size: 2.5em;
    font-weight: 700;
    color: #000;
    
    text-align: right;
}.d-flex.max-pr {
    align-items: center;
}
span.dev-pri {
    font-size: 0.4em;
    font-weight: 400;
    color: #000;
}
.top-title {
    flex: 1;
}
.avatar img {
    width: 100%;
    min-width: 100%;
    height: 100%;
    object-fit: cover;
}.avatar.round {
    border-radius: 50%;
    overflow: hidden;
}
.avt-100 {
    width: 100px;
    min-width: 100px;
    height: 100px;
}.single-property-contact .box-avatar {
    flex-wrap: wrap;
    display: flex
;
    align-items: center;
    gap: 20px;
} .box-avatar .name {
    margin-bottom: 12px;
} .box-avatar .list li:not(:last-child) {
    margin-bottom: 6px;
}ul.list {
    margin: 0;
    padding: 0;
}
.content-cat-main {
    padding: 0em 2em;
}
.box-avatar {
    display: flex
;margin-top: 40px;
    align-items: center;
}.avatar.round {
    border-radius: 50%;
    overflow: hidden;
    margin-left: 15px;
}.sidb {
    margin-top: 40px;
}.single-property-gallery-2 .box-navigation {
    display: none;
}.col-pd {
    border-radius: 40px;
    background: #F4F4F4;
    border: none;
}
h1.main-title{color:#000;font-size:22px;margin-top:5px;font-weight:500;margin-bottom:5px;}
.prod-date svg *{stroke:#b9b9b9;}
.prod-location svg *{stroke:#b9b9b9;}
.data-title svg{width:19px;height:19px;margin-left:5px;}
.data-title{color:#b9b9b9;font-size:15px;}
span.prod-date{margin-left:15px;}
.top-price{display:flex;padding-bottom:35px;width:100%;padding:20px 0;}
.title-price{font-size:14px;color:#45567B;}
.rt-price{color:#171D35;font-size:16px;font-weight:700;}
.content-price{flex:1;border-right:3px solid #00a463;padding-right:13px;}
span.dev-pri{color:#c7c7c7;font-size:0.6em;}
.max-pr{box-shadow:0 0 0 1px #e9ebf2;padding:20px;margin-top:30px;border-radius:20px;}
.top-title{flex:1;}
span.dev-pri{display:block;font-size:15px;}
span.dev-pri{display:inline-block;font-size:12px;font-weight:400;}

.contact-main{display:flex;width:100%;}
/*! CSS Used from: Embedded */
.contanct-f{display:flex;align-items:center;flex:1;justify-content:start;}
.content-main-anonn{font-weight:600;color:#3F51B5;margin-right:8px;}
.content-main-anonn a{color:#3F51B5;}
.title-ann{margin-right:5px;}

.phone-call-row {
    max-width: 90%;
    display: none;
    position: fixed;
    background: #ffffff;
    padding: 30px;
    width: 450px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    box-shadow: -2px 2px 6px 1px #00000057;
    z-index: 999;
    text-align: center;
    border: none;
}.phone-call-row.active{
    display: inline;
}
h3.title-call {
    font-size: 16px;
    color: #0057ff;
    letter-spacing: -0.5px;
}
h4.num-call {
    width: max-content;
    margin: 0 auto;
    background: #0000000f;
    padding: 5px 13px;
    border-radius: 20px;
}
.phone-call-pv.active {
    width: 100%;
    height: 100%;
    z-index: 99;
    position: fixed;
    cursor: pointer;
}.icon-share {
    background: #fff;
    width: 40px;
    height: 40px;
    border-radius: 20px;
    cursor: pointer;display: flex
;
    align-items: center;
    justify-content: center;
}
.icon-share svg {
    width: 19px;
    height: 20px;
}
.main-single-c span.prod-location svg {
    width: 15px;
    height: 15px;
    /* stroke: #000 !important; */
}.main-single-c span.prod-location svg path {
    stroke: rgba(72, 72, 72, 1) !important;
}
</style>
@endpush
@section('content')
<div class="full-h">
    <div class="phone-call-pv"></div>
    <div class="phone-call-row">
        <div class="phone-call">
            <div class="main-call">
                <h3 class="title-call">رقم مندوب المبيعات</h3>
                <h4 class="num-call"><a href="tel:+{{$estate->phone}}">{{$estate->phone}}</a></h4>
            </div>
        </div>
    </div>
    @include('store.theme1.header')

    <div class="container-fluid single-main">
        <div class="row">
            <div class="col-12"><div class="content-cat-main">
                <div class="cat-main">
                    <a href="{{route('index')}}">الرئيسية</a>
                </div> 
                <div class="cat-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <g clip-path="url(#clip0_92_600)">
                        <mask id="mask0_92_600" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="14" height="14">
                        <path d="M14 0V14H0V0H14Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_92_600)">
                        <path d="M8.16699 9.91602L5.25033 6.99935" stroke="#009877" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.25033 7L8.16699 4.08333" stroke="#009877" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_92_600">
                        <rect width="14" height="14" fill="white" transform="matrix(0 -1 -1 0 14 14)"/>
                        </clipPath>
                        </defs>
                        </svg>
                </div> 
                <div class="cat-main">
                    {{$estate->name}}
                </div>
            </div></div>
            <div class="col-lg-8 col-sm-12">
                <div class="col-pd-w">

                <div class="single-property-gallery single-property-gallery-2" >
                    <div class="position-relative">
                        <div dir="ltr" class="swiper sw-single" dir="rtl">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-sw-single">
                                        <img src="{{url('/uploads/cover_image/fhd_').$estate->thumbnail_image}}" alt="{{$estate->thumbnail_image}}">
                                    </div>
                                </div>
        
                                @foreach ($estate->estate_images as $key => $image)
                                <div class="swiper-slide">
                                    <div class="image-sw-single">
                                        <img src="{{ asset('uploads/product_image/' . $estate->id . '/fhd_' . $image->product_images) }}" alt="images">
        
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="swiper-button swiper-button-next swiper-button-single"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M10.7171 13.7208C10.4242 14.0137 9.94929 14.0137 9.65642 13.7208L5.99086 10.0516C5.40556 9.46571 5.40579 8.51636 5.99132 7.93076L9.65912 4.26304C9.95199 3.97009 10.4269 3.97009 10.7198 4.26304C11.0127 4.55591 11.0127 5.03081 10.7198 5.32369L7.58056 8.46289C7.28761 8.75576 7.28769 9.23066 7.58056 9.52354L10.7171 12.6601C11.01 12.953 11.01 13.4279 10.7171 13.7208Z" fill="white"/>
                              </svg></div>
                            <div class="swiper-button swiper-button-prev swiper-button-single"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M10.7171 13.7208C10.4242 14.0137 9.94929 14.0137 9.65642 13.7208L5.99086 10.0516C5.40556 9.46571 5.40579 8.51636 5.99132 7.93076L9.65912 4.26304C9.95199 3.97009 10.4269 3.97009 10.7198 4.26304C11.0127 4.55591 11.0127 5.03081 10.7198 5.32369L7.58056 8.46289C7.28761 8.75576 7.28769 9.23066 7.58056 9.52354L10.7171 12.6601C11.01 12.953 11.01 13.4279 10.7171 13.7208Z" fill="white"/>
                              </svg></div>
                        </div>
                    </div>
                    <div dir="ltr" class="swiper thumbs-sw-pagi">
                        <div class="swiper-wrapper">
                            @foreach ($estate->estate_images as $key => $image)
                            <div class="swiper-slide">
                                <div class="img-thumb-pagi">
                                    <img src="{{ asset('uploads/product_image/' . $estate->id . '/sd_' . $image->product_images) }}" alt="images">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-pd col-pd-mobile">
                    
                    <div class="single-main-content">
                        <div class="share-content">
                            <div class="icon-share">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.803 5.83333C13.803 3.99238 15.3022 2.5 17.1515 2.5C19.0008 2.5 20.5 3.99238 20.5 5.83333C20.5 7.67428 19.0008 9.16667 17.1515 9.16667C16.2177 9.16667 15.3738 8.78596 14.7671 8.17347L10.1317 11.3295C10.1745 11.5425 10.197 11.7625 10.197 11.9872C10.197 12.4322 10.109 12.8576 9.94959 13.2464L15.0323 16.5858C15.6092 16.1161 16.3473 15.8333 17.1515 15.8333C19.0008 15.8333 20.5 17.3257 20.5 19.1667C20.5 21.0076 19.0008 22.5 17.1515 22.5C15.3022 22.5 13.803 21.0076 13.803 19.1667C13.803 18.6845 13.9062 18.2255 14.0917 17.8111L9.05007 14.4987C8.46196 15.0098 7.6916 15.3205 6.84848 15.3205C4.99917 15.3205 3.5 13.8281 3.5 11.9872C3.5 10.1462 4.99917 8.65385 6.84848 8.65385C7.9119 8.65385 8.85853 9.14725 9.47145 9.91518L13.9639 6.85642C13.8594 6.53359 13.803 6.1896 13.803 5.83333Z" fill="#091B3C"/>
                                    </svg>
                            </div>
                        </div>
                        <div class="main-single-c">
                            
                            <h1 class="title-single">{{$estate->name}}</h1>
                            <span class="prod-location"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>{{$estate->statetxt}} , {{$estate->city}}</span>
                                <div class="price-single-x">
                                    <span class="price-x">{{$estate->price}} <span class="dev-pri">رس</span>
                                    <ul class="d-flex mps">
                                        @if ($estate->status == 1)
                                        <div class="flag-simple">متاح</div>
                                        @else
                                        <div class="flag-simple">غير متاح</div>
                                        @endif
                                    </ul>
    
                                </span>
                                    @if ($estate->methode == 1)
                                    <div class="df-10">قابل للتفاوض</div>
                                    @else
                                    <div class="df-10">خيار 3</div>
                                    @endif
    
                                </div>
                        </div>
                    </div>
                    <div class="btn-submit">
            
    <a target="_blanc" href="https://wa.me/+213781781853?text=طلب+جديد" class="btn btn-main  bg-gradient-primary watts btn-sm mb-0 sdr2"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
        <g clip-path="url(#clip0_92_714)">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 2C5.35786 2 2 5.35786 2 9.5C2 10.9172 2.39379 12.2446 3.07817 13.3762L2.40936 15.6502C2.24017 16.2254 2.77463 16.7599 3.34981 16.5907L5.62378 15.9218C6.75544 16.6063 8.0828 17 9.5 17C13.6421 17 17 13.6421 17 9.5C17 5.35786 13.6421 2 9.5 2ZM7.80366 11.197C9.32053 12.7139 10.769 12.9139 11.2804 12.9327C12.0583 12.9613 12.8158 12.3673 13.111 11.6782C13.1834 11.5094 13.1653 11.3064 13.0441 11.1511C12.6337 10.6254 12.078 10.2487 11.5351 9.8738C11.3005 9.7115 10.9779 9.76175 10.8051 9.99163L10.3546 10.6779C10.3045 10.7541 10.2052 10.7803 10.1261 10.735C9.82123 10.5607 9.3767 10.2635 9.0569 9.9437C8.73748 9.62428 8.45833 9.19985 8.30165 8.91463C8.26048 8.83963 8.28328 8.747 8.3519 8.696L9.04453 8.18165C9.25108 8.00285 9.28738 7.69915 9.13535 7.47671C8.79875 6.98427 8.40665 6.3584 7.83913 5.94445C7.68412 5.83138 7.48805 5.81869 7.32616 5.88806C6.63628 6.18373 6.03931 6.94092 6.06799 7.72021C6.08681 8.23168 6.28679 9.68015 7.80366 11.197Z" fill="white"/>
        </g>
        <defs>
        <clipPath id="clip0_92_714">
        <rect width="18" height="18" fill="white" transform="translate(0.5 0.5)"/>
        </clipPath>
        </defs>
        </svg>
        واتســـاب</a>
                        <a  href="{{route('estateSubmit',$estate->id)}}" class="btn btn-main  bg-gradient-primary watts btn-sm mb-0 sdr3"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                            <path d="M14.2501 13.625V5.375C14.2973 4.53024 14.0083 3.70115 13.4462 3.06879C12.884 2.43643 12.0946 2.05219 11.2501 2H6.7501C5.90564 2.05219 5.11615 2.43643 4.55405 3.06879C3.99195 3.70115 3.70292 4.53024 3.75011 5.375V13.625C3.70292 14.4697 3.99195 15.2988 4.55405 15.9311C5.11615 16.5635 5.90564 16.9477 6.7501 16.9999H11.2501C12.0946 16.9477 12.884 16.5635 13.4462 15.9311C14.0083 15.2988 14.2973 14.4697 14.2501 13.625Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 4.25H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>إتصـــل</a></div>
                </div>
                <div class="col-pd">
                <div class="content-props">
                    <h4 class="small-title">نظرة عامة:</h4>
                    <div class="row">
                        
                        <li class="col-lg-4 col-sm-6 list-namer-xr"><span class="t-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M2.25 6L4.2914 7.70115C4.42618 7.8135 4.59608 7.875 4.77154 7.875H13.2284C13.4039 7.875 13.5738 7.8135 13.7086 7.70115L15.75 6M4.875 10.5H4.8825M13.125 10.5H13.1325M6.12049 3.375H11.8796C12.4178 3.375 12.9148 3.66343 13.1818 4.13079L15.3547 7.93327C15.6137 8.38657 15.75 8.89957 15.75 9.42172V13.875C15.75 14.2892 15.4142 14.625 15 14.625H14.25C13.8358 14.625 13.5 14.2892 13.5 13.875V13.125H4.5V13.875C4.5 14.2892 4.16421 14.625 3.75 14.625H3C2.58579 14.625 2.25 14.2892 2.25 13.875V9.42172C2.25 8.89957 2.38624 8.38657 2.64527 7.93327L4.81812 4.13079C5.08518 3.66343 5.5822 3.375 6.12049 3.375ZM5.25 10.5C5.25 10.7071 5.08211 10.875 4.875 10.875C4.66789 10.875 4.5 10.7071 4.5 10.5C4.5 10.2929 4.66789 10.125 4.875 10.125C5.08211 10.125 5.25 10.2929 5.25 10.5ZM13.5 10.5C13.5 10.7071 13.3321 10.875 13.125 10.875C12.9179 10.875 12.75 10.7071 12.75 10.5C12.75 10.2929 12.9179 10.125 13.125 10.125C13.3321 10.125 13.5 10.2929 13.5 10.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                        </span><span class="data-txts"><span class="name-x">النوع:</span><span class="valeu-x">{{$estate->type}}</span></span></li>
                        <li class="col-lg-4 col-sm-6 list-namer-xr"><span class="t-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                <path d="M6.31263 1.875C6.31263 1.56434 6.06078 1.3125 5.75013 1.3125C5.43947 1.3125 5.18763 1.56434 5.18763 1.875V3.05944C4.10813 3.14588 3.39945 3.35803 2.8788 3.87868C2.35815 4.39933 2.14601 5.108 2.05957 6.1875H16.9407C16.8543 5.108 16.6421 4.39933 16.1214 3.87868C15.6008 3.35803 14.8921 3.14588 13.8126 3.05944V1.875C13.8126 1.56434 13.5608 1.3125 13.2501 1.3125C12.9395 1.3125 12.6876 1.56434 12.6876 1.875V3.00967C12.1887 3 11.6294 3 11.0001 3H8.00013C7.37085 3 6.81158 3 6.31263 3.00967V1.875Z" fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 9C2 8.37075 2 7.81148 2.00968 7.3125H16.9903C17 7.81148 17 8.37075 17 9V10.5C17 13.3284 17 14.7427 16.1213 15.6213C15.2427 16.5 13.8284 16.5 11 16.5H8C5.17157 16.5 3.75736 16.5 2.87868 15.6213C2 14.7427 2 13.3284 2 10.5V9ZM13.25 10.5C13.6642 10.5 14 10.1642 14 9.75C14 9.33577 13.6642 9 13.25 9C12.8358 9 12.5 9.33577 12.5 9.75C12.5 10.1642 12.8358 10.5 13.25 10.5ZM13.25 13.5C13.6642 13.5 14 13.1642 14 12.75C14 12.3358 13.6642 12 13.25 12C12.8358 12 12.5 12.3358 12.5 12.75C12.5 13.1642 12.8358 13.5 13.25 13.5ZM10.25 9.75C10.25 10.1642 9.91423 10.5 9.5 10.5C9.08578 10.5 8.75 10.1642 8.75 9.75C8.75 9.33577 9.08578 9 9.5 9C9.91423 9 10.25 9.33577 10.25 9.75ZM10.25 12.75C10.25 13.1642 9.91423 13.5 9.5 13.5C9.08578 13.5 8.75 13.1642 8.75 12.75C8.75 12.3358 9.08578 12 9.5 12C9.91423 12 10.25 12.3358 10.25 12.75ZM5.75 10.5C6.16421 10.5 6.5 10.1642 6.5 9.75C6.5 9.33577 6.16421 9 5.75 9C5.33579 9 5 9.33577 5 9.75C5 10.1642 5.33579 10.5 5.75 10.5ZM5.75 13.5C6.16421 13.5 6.5 13.1642 6.5 12.75C6.5 12.3358 6.16421 12 5.75 12C5.33579 12 5 12.3358 5 12.75C5 13.1642 5.33579 13.5 5.75 13.5Z" fill="black"/>
                              </svg>
                        </span><span class="data-txts"><span class="name-x">السنة:</span><span class="valeu-x">{{$estate->model}}</span></span></li>
                        <li class="col-lg-4 col-sm-6 list-namer-xr"><span class="t-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <g clip-path="url(#clip0_81_5624)">
                                  <path d="M15.75 13.638V9V4.36124C16.6207 4.05074 17.25 3.2265 17.25 2.25C17.25 1.00874 16.2405 0 15 0C13.7595 0 12.75 1.00874 12.75 2.25C12.75 3.2265 13.3792 4.05074 14.25 4.36124V8.24998H9.75V4.36124C10.6207 4.05074 11.25 3.2265 11.25 2.25C11.25 1.00874 10.2405 0 8.99998 0C7.75949 0 6.74998 1.00874 6.74998 2.25C6.74998 3.2265 7.37924 4.05074 8.24999 4.36124V8.24998H3.74999V4.36124C4.62074 4.05074 5.25 3.2265 5.25 2.25C5.25 1.00874 4.24049 0 3 0C1.75951 0 0.75 1.00874 0.75 2.25C0.75 3.2265 1.37926 4.05074 2.25001 4.36124V9C2.25001 9.414 2.58526 9.74999 3 9.74999H8.24999V13.638C7.37924 13.9485 6.74998 14.7735 6.74998 15.75C6.74998 16.9905 7.75949 18 8.99998 18C10.2405 18 11.25 16.9905 11.25 15.75C11.25 14.7735 10.6207 13.9485 9.74996 13.638V9.74999H14.25V13.638C13.3792 13.9485 12.75 14.7735 12.75 15.75C12.75 16.9905 13.7595 18 15 18C16.2404 18 17.25 16.9905 17.25 15.75C17.25 14.7735 16.6207 13.9485 15.75 13.638Z" fill="black"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_81_5624">
                                    <rect width="18" height="18" fill="white"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </span><span class="data-txts"><span class="name-x">ناقل الحركة:</span><span class="valeu-x">{{$estate->motor}}</span></span></li>
                                <li class="col-lg-4 col-sm-6 list-namer-xr"><span class="t-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5059 14.2522L10.5103 12.75C10.5103 12.3358 10.8469 12 11.2621 12C11.6773 12 12.014 12.3358 12.014 12.75V14.2324C12.014 14.5935 12.014 14.7741 12.1298 14.8848C12.2456 14.9956 12.4228 14.988 12.7771 14.973C14.1743 14.9139 15.0328 14.7249 15.6378 14.1213C16.2443 13.5163 16.4332 12.6574 16.492 11.2579C16.5037 10.9804 16.5096 10.8415 16.4578 10.749C16.4059 10.6564 16.199 10.5409 15.7852 10.3097C15.3256 10.0531 15.0149 9.56273 15.0149 9C15.0149 8.43727 15.3256 7.94693 15.7852 7.69028C16.199 7.45916 16.4059 7.3436 16.4578 7.25102C16.5096 7.15843 16.5037 7.01965 16.492 6.7421C16.4332 5.34254 16.2443 4.48367 15.6378 3.87868C14.9795 3.22203 14.0214 3.0561 12.3958 3.01417C12.1861 3.00877 12.014 3.17789 12.014 3.38714V5.25C12.014 5.66421 11.6773 6 11.2621 6C10.8469 6 10.5103 5.66421 10.5103 5.25L10.5048 3.37391C10.5042 3.16723 10.3361 3 10.1289 3H7.49626C4.66079 3 3.24305 3 2.36218 3.87868C1.75568 4.48367 1.56677 5.34254 1.50793 6.7421C1.49626 7.01965 1.49043 7.15844 1.54225 7.25102C1.59409 7.3436 1.801 7.45916 2.21481 7.69028C2.67439 7.94693 2.98505 8.43727 2.98505 9C2.98505 9.56273 2.67439 10.0531 2.21481 10.3097C1.801 10.5409 1.59409 10.6564 1.54225 10.749C1.49043 10.8415 1.49626 10.9804 1.50793 11.2579C1.56677 12.6574 1.75568 13.5163 2.36218 14.1213C3.24305 15 4.66078 15 7.49626 15H9.75405C10.1075 15 10.2843 15 10.3943 14.8906C10.5043 14.7811 10.5049 14.6048 10.5059 14.2522ZM12.014 9.75V8.25C12.014 7.83577 11.6773 7.5 11.2621 7.5C10.8469 7.5 10.5103 7.83577 10.5103 8.25V9.75C10.5103 10.1642 10.8469 10.5 11.2621 10.5C11.6773 10.5 12.014 10.1642 12.014 9.75Z" fill="#1C274C"/>
                                      </svg>
                                </span><span class="data-txts"><span class="name-x">حالة السيارة:</span><span class="valeu-x">                                                        @if ($estate->newer == 'جديد')
                                     جديد
                                    @else
                                     مستعمل
                                    @endif</span></span></li>
        
                                <li class="col-lg-4 col-sm-6 list-namer-xr"><span class="t-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                        <path d="M14 6C14 8.48527 11.9853 10.5 9.5 10.5C7.01472 10.5 5 8.48527 5 6C5 3.51472 7.01472 1.5 9.5 1.5C11.9853 1.5 14 3.51472 14 6Z" fill="{{$estate->color}}"/>
                                        <path d="M4.27512 8.08752C2.91622 8.86197 2 10.3239 2 12C2 14.4852 4.01472 16.5 6.5 16.5C8.98527 16.5 11 14.4852 11 12C11 11.8077 10.9879 11.6183 10.9645 11.4324C10.4976 11.558 10.0066 11.625 9.5 11.625C7.13104 11.625 5.10412 10.1605 4.27512 8.08752Z" fill="{{$estate->color}}"/>
                                        <path d="M12.0397 11.0202C12.0956 11.3384 12.1248 11.6658 12.1248 12C12.1248 13.5679 11.4832 14.9861 10.4482 16.0062C11.0635 16.3219 11.7608 16.5 12.4998 16.5C14.9851 16.5 16.9998 14.4852 16.9998 12C16.9998 10.3239 16.0835 8.86197 14.7247 8.08752C14.2155 9.3608 13.2544 10.4044 12.0397 11.0202Z" fill="{{$estate->color}}"/>
                                      </svg>
                                </span><span class="data-txts"><span class="name-x">اللون:</span><span class="valeu-x">{{$estate->colortxt}}</span></span></li>
                
                    @foreach ($props as $prop)
                        <li class="col-lg-4 col-sm-6 list-namer-xr"><span class="t-svg">
                            @if ($prop->name == 'المسافة')
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g clip-path="url(#clip0_81_5675)">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM13 4.06189V5C13 5.55228 12.5523 6 12 6C11.4872 6 11.0645 5.61396 11.0067 5.11662L11 5V4.06189C7.46744 4.5024 4.65014 7.24607 4.09821 10.7428L4.06189 11H5C5.55228 11 6 11.4477 6 12C6 12.5128 5.61396 12.9355 5.11662 12.9933L5 13H4.06189C4.55399 16.9463 7.92038 20 12 20C15.9928 20 19.3024 17.0749 19.9028 13.2507L19.9381 13H19C18.4477 13 18 12.5523 18 12C18 11.4872 18.386 11.0645 18.8834 11.0067L19 11H19.9381C19.7149 9.21042 18.9007 7.60441 17.6969 6.38349L15.2725 11.1417L15.1183 11.436L14.8076 12.0461C14.4385 12.7668 14.0356 13.4999 13.4849 14.0506C12.5132 15.0223 10.8972 15.1399 9.87861 14.1213C8.86 13.1027 8.97764 11.4868 9.94932 10.5151C10.4214 10.043 11.0274 9.67957 11.6448 9.35293L12.5639 8.8816L13.413 8.43849L17.6162 6.30275C16.3953 5.09914 14.7894 4.28503 13 4.06189ZM13.1623 10.8376L12.9523 10.9503L12.7357 11.0631C12.3336 11.2717 11.914 11.4893 11.5637 11.7607L11.3625 11.9304L11.2898 12.0145C11.0974 12.2747 11.1552 12.5695 11.2928 12.7071C11.4305 12.8448 11.7252 12.9026 11.9854 12.7101L12.0706 12.6364L12.2392 12.4363C12.4564 12.1561 12.6391 11.8315 12.8102 11.5069L12.9368 11.2642C13.0125 11.1183 13.0869 10.9747 13.1623 10.8376Z" fill="black"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_81_5675">
                                    <rect width="24" height="24" fill="white"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            @elseif ($prop->name == 'الاصدار')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                @elseif ($prop->name == 'الممشى')
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_81_5675)">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM13 4.06189V5C13 5.55228 12.5523 6 12 6C11.4872 6 11.0645 5.61396 11.0067 5.11662L11 5V4.06189C7.46744 4.5024 4.65014 7.24607 4.09821 10.7428L4.06189 11H5C5.55228 11 6 11.4477 6 12C6 12.5128 5.61396 12.9355 5.11662 12.9933L5 13H4.06189C4.55399 16.9463 7.92038 20 12 20C15.9928 20 19.3024 17.0749 19.9028 13.2507L19.9381 13H19C18.4477 13 18 12.5523 18 12C18 11.4872 18.386 11.0645 18.8834 11.0067L19 11H19.9381C19.7149 9.21042 18.9007 7.60441 17.6969 6.38349L15.2725 11.1417L15.1183 11.436L14.8076 12.0461C14.4385 12.7668 14.0356 13.4999 13.4849 14.0506C12.5132 15.0223 10.8972 15.1399 9.87861 14.1213C8.86 13.1027 8.97764 11.4868 9.94932 10.5151C10.4214 10.043 11.0274 9.67957 11.6448 9.35293L12.5639 8.8816L13.413 8.43849L17.6162 6.30275C16.3953 5.09914 14.7894 4.28503 13 4.06189ZM13.1623 10.8376L12.9523 10.9503L12.7357 11.0631C12.3336 11.2717 11.914 11.4893 11.5637 11.7607L11.3625 11.9304L11.2898 12.0145C11.0974 12.2747 11.1552 12.5695 11.2928 12.7071C11.4305 12.8448 11.7252 12.9026 11.9854 12.7101L12.0706 12.6364L12.2392 12.4363C12.4564 12.1561 12.6391 11.8315 12.8102 11.5069L12.9368 11.2642C13.0125 11.1183 13.0869 10.9747 13.1623 10.8376Z" fill="black"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_81_5675">
                                        <rect width="24" height="24" fill="white"/>
                                      </clipPath>
                                    </defs>
                                  </svg>                    @elseif ($prop->name == 'النوع')
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#bbbbbb" stroke='none' version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M448,387.654V256V124.346c24.858-8.784,42.667-32.474,42.667-60.346c0-35.355-28.645-64-64-64c-35.355,0-64,28.645-64,64    c0,27.872,17.808,51.562,42.667,60.346v110.321h-128V124.346C302.192,115.562,320,91.872,320,64c0-35.355-28.645-64-64-64    s-64,28.645-64,64c0,27.872,17.808,51.562,42.667,60.346v110.321h-128V124.346c24.858-8.784,42.667-32.474,42.667-60.346    c0-35.355-28.645-64-64-64s-64,28.645-64,64c0,27.872,17.808,51.562,42.667,60.346V256c0,11.782,9.551,21.333,21.333,21.333    h149.333v110.321C209.808,396.438,192,420.128,192,448c0,35.355,28.645,64,64,64s64-28.645,64-64    c0-27.872-17.808-51.562-42.667-60.346V277.333h128v110.321c-24.858,8.784-42.667,32.474-42.667,60.346c0,35.355,28.645,64,64,64    c35.355,0,64-28.645,64-64C490.667,420.128,472.858,396.438,448,387.654z M426.667,42.667C438.458,42.667,448,52.209,448,64    s-9.542,21.333-21.333,21.333S405.333,75.791,405.333,64S414.875,42.667,426.667,42.667z M256,42.667    c11.791,0,21.333,9.542,21.333,21.333S267.791,85.333,256,85.333c-11.791,0-21.333-9.542-21.333-21.333S244.209,42.667,256,42.667    z M85.333,42.667c11.791,0,21.333,9.542,21.333,21.333s-9.542,21.333-21.333,21.333S64,75.791,64,64S73.542,42.667,85.333,42.667z     M256,469.333c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333c11.791,0,21.333,9.542,21.333,21.333    S267.791,469.333,256,469.333z M426.667,469.333c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333    S448,436.209,448,448S438.458,469.333,426.667,469.333z"/>
                                    </g>
                                </g>
                                </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M9 20H7C5.89543 20 5 19.1046 5 18V10.9199C5 10.336 5.25513 9.78132 5.69842 9.40136L10.6984 5.11564C11.4474 4.47366 12.5526 4.47366 13.3016 5.11564L18.3016 9.40136C18.7449 9.78132 19 10.336 19 10.9199V18C19 19.1046 18.1046 20 17 20H15M9 20V14C9 13.4477 9.44772 13 10 13H14C14.5523 13 15 13.4477 15 14V20M9 20H15" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @endif
                            </span><span class="data-txts"><span class="name-x">{{$prop->name}}:</span><span class="valeu-x">{{$prop->value}}</span></span></li>
                    @endforeach    
                </div></div></div>
        @if ($estate->description)
        <div class="col-pd">
            <div class="content-dec">
                <h4 class="small-title">الوصف:</h4>
                {{$estate->description}}
            </div>
        </div>
        @endif
        @if ($estate->video)
        <div class="col-pd">
            <div class="content-dec video-content">
                <svg xmlns="http://www.w3.org/2000/svg" id="video-active" width="32" height="33" viewBox="0 0 32 33" fill="none">
                    <path d="M8.9585 8.87454C8.95894 7.62437 10.3119 6.84283 11.395 7.46731L25.4771 15.5894C26.5611 16.2146 26.5609 17.7794 25.4771 18.4048L11.395 26.5269L11.2935 26.5816C10.2291 27.1029 8.9586 26.3312 8.9585 25.1197V8.87454Z"  fill="white"/>
                  </svg>
                <img src="{{url('/uploads/cover_image/fhd_').$estate->thumbnail_image}}" height="420px" width="100%" alt="" class="main-video-cs">
                <iframe src="" class="thumb-img thumb-video" frameborder="0" title="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" height="420px" data-sm="{{url('/uploads/cover_image/fhd_').$estate->thumbnail_image}}" allowfullscreen></iframe>
            </div>
        </div>
        @endif

        <div class="col-pd">

        <div class="content-place">
            
        <div class="location-map">
            <div id="map" style="height: 450px; width: 100%;" class="map-main"></div>

        </div>
        </div>
        </div></div> 
        <div class="col-lg-4 col-sm-12 ">
            <div class="col-pd sidebare-stk col-pd-pc">
                {{-- <h4 class="small-title">أطلب الأن:</h4> --}}
                {{-- <div class="contact-main">
                    <div class="contanct-f">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_3557_224930)">
                            <path d="M1.93359 0.816406C2.87736 0.816406 3.66486 1.49622 3.8334 2.39179C7.36014 3.89064 12.8808 3.91016 12.9375 3.91016H15.3633C16.8172 3.91016 18 5.09299 18 6.54688V9.07812C18 10.532 16.8172 11.7148 15.3633 11.7148H13.3643L12.4324 16.0848C12.1789 17.3009 11.0933 18.1836 9.85113 18.1836C8.94818 18.1836 8.2781 17.3533 8.46162 16.4743L8.84289 14.6442C7.8063 14.3055 6.9929 13.4725 6.67927 12.4278C5.69032 12.6087 4.72725 12.8556 3.83326 13.2339C3.66448 14.1291 2.87712 14.8086 1.93359 14.8086C0.867411 14.8086 0 13.9412 0 12.875V2.75C0 1.68382 0.867411 0.816406 1.93359 0.816406ZM6.99128 11.3055C7.57389 11.1964 10.561 10.8164 12.4102 10.6911V4.9562C10.9731 4.91735 6.93207 4.70434 3.86719 3.54179V12.0861C4.86809 11.7145 5.9336 11.478 6.99128 11.3055ZM16.9453 9.07812V6.54688C16.9453 5.67454 16.2356 4.96484 15.3633 4.96484H13.4648V10.6602H15.3633C16.2356 10.6602 16.9453 9.95046 16.9453 9.07812ZM9.85113 17.1289C10.5964 17.1289 11.2479 16.5993 11.4004 15.8672L12.2767 11.7577C11.6951 11.8 11.0862 11.856 10.4872 11.9223L9.49405 16.6897C9.44673 16.9164 9.61942 17.1289 9.85113 17.1289ZM9.05994 13.6022L9.38327 12.0502C8.83533 12.114 8.28327 12.1796 7.7343 12.2579C7.96138 12.8737 8.44685 13.3665 9.05994 13.6022ZM1.05469 12.875C1.05469 13.3596 1.44897 13.7539 1.93359 13.7539C2.41822 13.7539 2.8125 13.3596 2.8125 12.875V2.75C2.8125 2.26537 2.41822 1.87109 1.93359 1.87109C1.44897 1.87109 1.05469 2.26537 1.05469 2.75V12.875Z" fill="#6A7791" stroke="#6A7791" stroke-width="0.2"></path>
                            </g>
                            <defs>
                            <clipPath id="clip0_3557_224930">
                            <rect width="18" height="18" fill="white" transform="matrix(-1 0 0 1 18 0.5)"></rect>
                            </clipPath>
                            </defs>
                            </svg>
                            <div class="title-ann">رقم الاعلان</div>
                            <div class="content-main-anonn">{{$estate->id}}</div>
                    </div>
                    <div class="contanct-f">
                        <svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" transform="rotate(270)">

                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            
                            <g id="SVGRepo_iconCarrier"> <path d="M15.1008 15.0272L15.6446 15.5437V15.5437L15.1008 15.0272ZM15.5562 14.5477L15.0124 14.0312V14.0312L15.5562 14.5477ZM17.9729 14.2123L17.5987 14.8623H17.5987L17.9729 14.2123ZM19.8834 15.312L19.5092 15.962L19.8834 15.312ZM20.4217 18.7584L20.9655 19.275L20.9655 19.2749L20.4217 18.7584ZM19.0012 20.254L18.4574 19.7375L19.0012 20.254ZM17.6763 20.9631L17.75 21.7095L17.6763 20.9631ZM7.8154 16.4752L8.3592 15.9587L7.8154 16.4752ZM3.75185 6.92574C3.72965 6.51212 3.37635 6.19481 2.96273 6.21701C2.54911 6.23921 2.23181 6.59252 2.25401 7.00613L3.75185 6.92574ZM9.19075 8.80507L9.73454 9.32159L9.19075 8.80507ZM9.47756 8.50311L10.0214 9.01963L9.47756 8.50311ZM9.63428 5.6931L10.2467 5.26012L9.63428 5.6931ZM8.3733 3.90961L7.7609 4.3426V4.3426L8.3733 3.90961ZM4.7177 3.09213C4.43244 3.39246 4.44465 3.86717 4.74498 4.15244C5.04531 4.4377 5.52002 4.42549 5.80529 4.12516L4.7177 3.09213ZM11.0632 13.0559L11.607 12.5394L11.0632 13.0559ZM10.6641 19.8123C11.0148 20.0327 11.4778 19.9271 11.6982 19.5764C11.9186 19.2257 11.8129 18.7627 11.4622 18.5423L10.6641 19.8123ZM15.113 20.0584C14.7076 19.9735 14.3101 20.2334 14.2252 20.6388C14.1403 21.0442 14.4001 21.4417 14.8056 21.5266L15.113 20.0584ZM15.6446 15.5437L16.1 15.0642L15.0124 14.0312L14.557 14.5107L15.6446 15.5437ZM17.5987 14.8623L19.5092 15.962L20.2575 14.662L18.347 13.5623L17.5987 14.8623ZM19.8779 18.2419L18.4574 19.7375L19.545 20.7705L20.9655 19.275L19.8779 18.2419ZM8.3592 15.9587C4.48307 11.8778 3.83289 8.43556 3.75185 6.92574L2.25401 7.00613C2.35326 8.85536 3.13844 12.6403 7.27161 16.9917L8.3592 15.9587ZM9.73454 9.32159L10.0214 9.01963L8.93377 7.9866L8.64695 8.28856L9.73454 9.32159ZM10.2467 5.26012L8.98569 3.47663L7.7609 4.3426L9.02189 6.12608L10.2467 5.26012ZM9.19075 8.80507C8.64695 8.28856 8.64626 8.28929 8.64556 8.29002C8.64533 8.29028 8.64463 8.29102 8.64415 8.29152C8.6432 8.29254 8.64223 8.29357 8.64125 8.29463C8.63928 8.29675 8.63724 8.29896 8.63515 8.30127C8.63095 8.30588 8.6265 8.31087 8.62182 8.31625C8.61247 8.32701 8.60219 8.33931 8.5912 8.3532C8.56922 8.38098 8.54435 8.41511 8.51826 8.45588C8.46595 8.53764 8.40921 8.64531 8.36117 8.78033C8.26346 9.0549 8.21022 9.4185 8.27675 9.87257C8.40746 10.7647 8.99202 11.9644 10.5194 13.5724L11.607 12.5394C10.1793 11.0363 9.82765 10.1106 9.7609 9.65511C9.72871 9.43536 9.76142 9.31957 9.77436 9.28321C9.78163 9.26277 9.78639 9.25709 9.78174 9.26437C9.77948 9.26789 9.77498 9.27451 9.76742 9.28407C9.76363 9.28885 9.75908 9.29437 9.75364 9.30063C9.75092 9.30375 9.74798 9.30706 9.7448 9.31056C9.74321 9.31231 9.74156 9.3141 9.73985 9.31594C9.739 9.31686 9.73813 9.31779 9.73724 9.31873C9.7368 9.3192 9.73612 9.31992 9.7359 9.32015C9.73522 9.32087 9.73454 9.32159 9.19075 8.80507ZM10.5194 13.5724C12.0422 15.1757 13.1924 15.806 14.0699 15.9485C14.5201 16.0216 14.8846 15.9632 15.1606 15.8544C15.2955 15.8012 15.4023 15.7387 15.4824 15.6819C15.5223 15.6535 15.5556 15.6266 15.5825 15.6031C15.5959 15.5913 15.6078 15.5803 15.6181 15.5703C15.6233 15.5654 15.628 15.5606 15.6324 15.5562C15.6346 15.554 15.6368 15.5518 15.6388 15.5497C15.6398 15.5487 15.6408 15.5477 15.6417 15.5467C15.6422 15.5462 15.6429 15.5454 15.6432 15.5452C15.6439 15.5444 15.6446 15.5437 15.1008 15.0272C14.557 14.5107 14.5577 14.51 14.5583 14.5093C14.5586 14.509 14.5592 14.5083 14.5597 14.5078C14.5606 14.5069 14.5615 14.506 14.5623 14.5051C14.5641 14.5033 14.5658 14.5015 14.5675 14.4998C14.5708 14.4965 14.574 14.4933 14.577 14.4904C14.5831 14.4846 14.5885 14.4796 14.5933 14.4754C14.6029 14.467 14.61 14.4616 14.6146 14.4584C14.6239 14.4517 14.623 14.454 14.6102 14.459C14.5909 14.4666 14.5001 14.4987 14.3103 14.4679C13.9078 14.4025 13.0391 14.0472 11.607 12.5394L10.5194 13.5724ZM8.98569 3.47663C7.9721 2.04305 5.94388 1.80119 4.7177 3.09213L5.80529 4.12516C6.32812 3.57471 7.24855 3.61795 7.7609 4.3426L8.98569 3.47663ZM18.4574 19.7375C18.1783 20.0313 17.8864 20.1887 17.6026 20.2167L17.75 21.7095C18.497 21.6357 19.1016 21.2373 19.545 20.7705L18.4574 19.7375ZM10.0214 9.01963C10.9889 8.00095 11.0574 6.40678 10.2467 5.26012L9.02189 6.12608C9.44404 6.72315 9.3793 7.51753 8.93377 7.9866L10.0214 9.01963ZM19.5092 15.962C20.3301 16.4345 20.4907 17.5968 19.8779 18.2419L20.9655 19.2749C22.2705 17.901 21.8904 15.6019 20.2575 14.662L19.5092 15.962ZM16.1 15.0642C16.4854 14.6584 17.086 14.5672 17.5987 14.8623L18.347 13.5623C17.2485 12.93 15.8862 13.1113 15.0124 14.0312L16.1 15.0642ZM11.4622 18.5423C10.4785 17.9241 9.43149 17.0876 8.3592 15.9587L7.27161 16.9917C8.42564 18.2067 9.56897 19.1241 10.6641 19.8123L11.4622 18.5423ZM17.6026 20.2167C17.0561 20.2707 16.1912 20.2842 15.113 20.0584L14.8056 21.5266C16.0541 21.788 17.0742 21.7762 17.75 21.7095L17.6026 20.2167Z" fill="#1C274C"/> </g>
                            </svg>
                            <div class="content-main-anonn"><a href="tel:+{{$estate->phone}}">{{$estate->phone}}</a></div>
                    </div>

                </div> --}}
                <div class="single-main-content">
                    <div class="share-content">
                        <div class="icon-share">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.803 5.83333C13.803 3.99238 15.3022 2.5 17.1515 2.5C19.0008 2.5 20.5 3.99238 20.5 5.83333C20.5 7.67428 19.0008 9.16667 17.1515 9.16667C16.2177 9.16667 15.3738 8.78596 14.7671 8.17347L10.1317 11.3295C10.1745 11.5425 10.197 11.7625 10.197 11.9872C10.197 12.4322 10.109 12.8576 9.94959 13.2464L15.0323 16.5858C15.6092 16.1161 16.3473 15.8333 17.1515 15.8333C19.0008 15.8333 20.5 17.3257 20.5 19.1667C20.5 21.0076 19.0008 22.5 17.1515 22.5C15.3022 22.5 13.803 21.0076 13.803 19.1667C13.803 18.6845 13.9062 18.2255 14.0917 17.8111L9.05007 14.4987C8.46196 15.0098 7.6916 15.3205 6.84848 15.3205C4.99917 15.3205 3.5 13.8281 3.5 11.9872C3.5 10.1462 4.99917 8.65385 6.84848 8.65385C7.9119 8.65385 8.85853 9.14725 9.47145 9.91518L13.9639 6.85642C13.8594 6.53359 13.803 6.1896 13.803 5.83333Z" fill="#091B3C"/>
                                </svg>
                        </div>
                    </div>
                    <div class="main-single-c">
                        
                        <h1 class="title-single">{{$estate->name}}</h1>
                        <span class="prod-location"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>{{$estate->statetxt}} , {{$estate->city}}</span>
                            <div class="price-single-x">
                                <span class="price-x">{{$estate->price}} <span class="dev-pri">رس</span>
                                <ul class="d-flex mps">
                                    @if ($estate->status == 1)
                                    <div class="flag-simple">متاح</div>
                                    @else
                                    <div class="flag-simple">غير متاح</div>
                                    @endif
                                </ul>

                            </span>
                                @if ($estate->methode == 1)
                                <div class="df-10">قابل للتفاوض</div>
                                @else
                                <div class="df-10">خيار 3</div>
                                @endif

                            </div>
                    </div>
                </div>
                <div class="btn-submit">
                    <style>
.btn-submit svg {
    width: 24px;
    height: 23px;margin-right: 5px;
    margin-left: 5px;
}
.btn-submit a.btn.btn-main {
    border-radius: 40px;
    border: none;
    width: max-content;
    padding: 12px 34px !important;
    background: #0057ff;
    }.btn-submit {
    display: flex
;
    width: 100%;
}.sdr2 {
    background: rgba(37, 211, 102, 1)!important;
    color: #fff !important;
}a.btn.btn-main.bg-gradient-primary.watts.btn-sm.mb-0.sdr3 {
    padding: 12px !important;background: rgba(65, 117, 250, 1)!important;
}
a.btn.btn-main.bg-gradient-primary.watts.btn-sm.mb-0.sdr3 svg{
    margin: 0 !important;
}.btn-submit a {
    margin: 0 5px!important;
}.col-pd.sidebare-stk {
    padding: 25px;
}
a.btn.btn-main.bg-gradient-primary.watts.btn-sm.mb-0.sdr3 svg path{
    margin: 0 !important;
}.btn-submit {
    display: flex
;
    width: 100%;
    flex-direction: column;
    gap: 12px;
}
.btn-submit a.btn.btn-main {
    border-radius: 40px;
    border: none;
    width: max-content;
    padding: 12px 34px !important;
    background: #0057ff;
    flex: 1;
    width: 100%;
    font-size: 12px !important;
    font-weight: 500;
    color: #fff !important;
}.btn-submit a.btn.btn-main {
    display: flex
;
    align-items: center;
    justify-content: center;
    flex-direction: row-reverse;
}
</style>
<a target="_blanc" href="https://wa.me/+213781781853?text=طلب+جديد" class="btn btn-main  bg-gradient-primary watts btn-sm mb-0 sdr2"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
    <g clip-path="url(#clip0_92_714)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 2C5.35786 2 2 5.35786 2 9.5C2 10.9172 2.39379 12.2446 3.07817 13.3762L2.40936 15.6502C2.24017 16.2254 2.77463 16.7599 3.34981 16.5907L5.62378 15.9218C6.75544 16.6063 8.0828 17 9.5 17C13.6421 17 17 13.6421 17 9.5C17 5.35786 13.6421 2 9.5 2ZM7.80366 11.197C9.32053 12.7139 10.769 12.9139 11.2804 12.9327C12.0583 12.9613 12.8158 12.3673 13.111 11.6782C13.1834 11.5094 13.1653 11.3064 13.0441 11.1511C12.6337 10.6254 12.078 10.2487 11.5351 9.8738C11.3005 9.7115 10.9779 9.76175 10.8051 9.99163L10.3546 10.6779C10.3045 10.7541 10.2052 10.7803 10.1261 10.735C9.82123 10.5607 9.3767 10.2635 9.0569 9.9437C8.73748 9.62428 8.45833 9.19985 8.30165 8.91463C8.26048 8.83963 8.28328 8.747 8.3519 8.696L9.04453 8.18165C9.25108 8.00285 9.28738 7.69915 9.13535 7.47671C8.79875 6.98427 8.40665 6.3584 7.83913 5.94445C7.68412 5.83138 7.48805 5.81869 7.32616 5.88806C6.63628 6.18373 6.03931 6.94092 6.06799 7.72021C6.08681 8.23168 6.28679 9.68015 7.80366 11.197Z" fill="white"/>
    </g>
    <defs>
    <clipPath id="clip0_92_714">
    <rect width="18" height="18" fill="white" transform="translate(0.5 0.5)"/>
    </clipPath>
    </defs>
    </svg>
    واتســـاب</a>
                    <a  href="{{route('estateSubmit',$estate->id)}}" class="btn btn-main  bg-gradient-primary watts btn-sm mb-0 sdr3"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                        <path d="M14.2501 13.625V5.375C14.2973 4.53024 14.0083 3.70115 13.4462 3.06879C12.884 2.43643 12.0946 2.05219 11.2501 2H6.7501C5.90564 2.05219 5.11615 2.43643 4.55405 3.06879C3.99195 3.70115 3.70292 4.53024 3.75011 5.375V13.625C3.70292 14.4697 3.99195 15.2988 4.55405 15.9311C5.11615 16.5635 5.90564 16.9477 6.7501 16.9999H11.2501C12.0946 16.9477 12.884 16.5635 13.4462 15.9311C14.0083 15.2988 14.2973 14.4697 14.2501 13.625Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.5 4.25H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>إتصـــل</a></div>
            </div>
        </div>
    </div>
    {{-- <div class="related-main mt-4">
        <div class="content-main row mt-4">
            <h4 class="small-title">خيارات مشابهة:</h4>
            @foreach ($related as $estate)
            <div class="col-lg-4 col-sm-12">
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
                        <div class="content-top">
                                                <a href="{{route('products',$estate->id)}}" class="link"><h6 class="text-capitalize">{{$estate->name}}</h6></a>

                            @if ($estate->city)
                            <div class="bottom">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                {{$estate->statetxt}}, {{$estate->city}}  
                            </div>
                            @endif

                            <ul class="meta-list">
                                @php
                                    $props = App\Models\EstateGroupe::where('estate',$estate->id)->get();
                                    $user = App\Models\User::find($estate->user);
                                    @endphp
                                @foreach ($props as $prop)
                                @if ($prop->name == 'المساحة')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                                    <path d="M44 44L4 4V44H44Z" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                    
                                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 35H25L13 23V35Z" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        </svg>
                                <li class="item">
                                    <span class="text-variant-1">{{$prop->name}}:</span>
                                    <span class="fw-6">{{$prop->value}}</span>
                                </li>

                                @endif
                                @endforeach
                                </ul>
                            
                        </div>
                        
                        <div class="content-bottom">
                            <div class="d-flex gap-8 align-items-center">
                                @if ($estate->methode == 1)
                                <div class="df-0">قابل للتفاوض</div>
                                @else
                                <div class="df-0">خيار 3</div>
                                @endif

                            </div>
                            <h6 class="price">{{$estate->price}} رس</h6>
                        </div>
                    </div>
                </div></div>
            @endforeach
        </div>
    </div> --}}
    </div>
</div>

</div>
@endsection
@push('js-main')
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpHUfhJm-iMzab-nUflkl3YkeLOMqFGfM&libraries=places&callback=initMap&language=ar"></script>

{{-- @if (getSetting('slider') == '1')

<script>
    var swiperSingle = new Swiper(".sw-single", {
  spaceBetween: 16,
  autoplay: {
    delay: 3000000,
    disableOnInteraction: false,
  },
  speed: 500,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  pagination: {
    el: '.swiper-pagination',
  },
  navigation: {
    clickable: true,
    nextEl: ".nav-prev-single",
    prevEl: ".nav-next-single",
  },
});
</script>
@endif --}}
@if (getSetting('slider') == '0')
<script>
    var swiperSingle = new Swiper(".sw-single", {
  spaceBetween: 16,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  speed: 500,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  thumbs: {
    swiper: pagithumbs,
  },
  navigation: {
    clickable: true,
    nextEl: ".nav-prev-single",
    prevEl: ".nav-next-single",
  },
});
var pagithumbs = new Swiper(".thumbs-sw-pagi", {
  spaceBetween: 14,
  slidesPerView: "auto",
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {
    375: {
        slidesPerView: "auto",
    },
    500: {
      slidesPerView: "auto",
    },
  },
});
</script>
@endif
<script>
/*  
*   Maps
*/
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 24.7135517, lng: 46.6752957 }, // Riyadh, Saudi Arabia
    zoom: 13,
    mapTypeControl: false,streetViewControl: false
  });

  const input = document.getElementById("coordinates");
  const searchInput = document.getElementById("searchInput");


  const marker = new google.maps.Marker({
    map: map,
    draggable: true, // Allow marker dragging
  });

    // Add a click listener to the map
  map.addListener("click", (event) => {
    marker.setPosition(event.latLng);
    marker.setVisible(true);
    input.value = event.latLng.lat() + ", " + event.latLng.lng();
  });

     // Update coordinates on marker dragend
  marker.addListener("dragend", () => {
    input.value = marker.getPosition().lat() + ", " + marker.getPosition().lng();
  });


    // Search functionality (if needed)
  const autocomplete = new google.maps.places.Autocomplete(searchInput);
  autocomplete.bindTo("bounds", map);

  autocomplete.addListener("place_changed", () => {
    const place = autocomplete.getPlace();
        
        if (!place.geometry || !place.geometry.location) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
      } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);  
        }
          
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
          
      input.value = place.geometry.location.lat() + ", " + place.geometry.location.lng();
  });
}
$('.sdr1').click(function(e) {
    e.preventDefault();
    $('.phone-call-row').toggleClass('active');
    $('.phone-call-pv').toggleClass('active');
});
$('.phone-call-pv').click(function(e) {
    e.preventDefault();
    $('.phone-call-row').toggleClass('active');
    $('.phone-call-pv').toggleClass('active');
});
@if ($estate->video)
function getId(a) {const b = a.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/);return b && b[2] && 11 === b[2].length ? b[2] : null}
$(".main-video-cs").click(function() {
  $('.content-dec.video-content iframe.thumb-img.thumb-video').toggleClass('active');
  $('.main-video-cs').toggleClass('active');
    var $this = $(".thumb-img"); 
    var videoId = getId("{{ $estate->video }}");
    var embedUrl = "https://www.youtube.com/embed/" + videoId;
    $this.attr("src", embedUrl); 
});
$("#video-active").click(function() {
  $('.content-dec.video-content iframe.thumb-img.thumb-video').toggleClass('active');
  $('.main-video-cs').toggleClass('active');
    var $this = $(".thumb-img"); 
    var videoId = getId("{{ $estate->video }}");
    var embedUrl = "https://www.youtube.com/embed/" + videoId;
    $this.attr("src", embedUrl); 
});
@endif
</script>
@endpush