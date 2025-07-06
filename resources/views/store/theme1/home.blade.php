@extends('store.theme1.layouts.store')
@section('page-title')
    {{ __('الرئيسية') }}
@endsection

@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/css/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

@endpush
@section('content')
    @php
        $getTheme = getMainThemeSetting();
        // dd($getTheme);
    @endphp
    <div class="full-h">
        <div class="content-fit-l"></div>

        @include('store.theme1.header')

        @if (is_array($getTheme) && $getTheme[0]->section_enable == 'on')
            <div class="container-fluid">
                <div dir="ltr" class="swiper sw-single" dir="rtl">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <section class="flat-slider"
                                style="
        background-image: url({{ main_path().'./uploads' . $getTheme[0]->homepage_header_bg_image[0]->field_prev_text }});
    ">
                                <div class="overlay"></div>
                            </section>
                        </div>
                        <div class="swiper-slide">
                            <section class="flat-slider"
                                style="
        background-image: url({{ main_path().'./uploads' . $getTheme[0]->homepage_header_bg_image2[0]->field_prev_text }});
    ">
                                <div class="overlay"></div>
                            </section>
                        </div>
                        <div class="swiper-slide">
                            <section class="flat-slider"
                                style="
        background-image: url({{ main_path().'./uploads' . $getTheme[0]->homepage_header_bg_image3[0]->field_prev_text }});
    ">
                                <div class="overlay"></div>
                            </section>
                        </div>
                    </div>
                    <div class="swiper-button swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18" fill="none">
                            <path
                                d="M10.7171 13.7208C10.4242 14.0137 9.94929 14.0137 9.65642 13.7208L5.99086 10.0516C5.40556 9.46571 5.40579 8.51636 5.99132 7.93076L9.65912 4.26304C9.95199 3.97009 10.4269 3.97009 10.7198 4.26304C11.0127 4.55591 11.0127 5.03081 10.7198 5.32369L7.58056 8.46289C7.28761 8.75576 7.28769 9.23066 7.58056 9.52354L10.7171 12.6601C11.01 12.953 11.01 13.4279 10.7171 13.7208Z"
                                fill="white" />
                        </svg></div>
                    <div class="swiper-button swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18" fill="none">
                            <path
                                d="M10.7171 13.7208C10.4242 14.0137 9.94929 14.0137 9.65642 13.7208L5.99086 10.0516C5.40556 9.46571 5.40579 8.51636 5.99132 7.93076L9.65912 4.26304C9.95199 3.97009 10.4269 3.97009 10.7198 4.26304C11.0127 4.55591 11.0127 5.03081 10.7198 5.32369L7.58056 8.46289C7.28761 8.75576 7.28769 9.23066 7.58056 9.52354L10.7171 12.6601C11.01 12.953 11.01 13.4279 10.7171 13.7208Z"
                                fill="white" />
                        </svg></div>
                </div>
                <div class="swiper-pagination"></div>

            </div>
        @endif
        @if (is_array($getTheme) && $getTheme[1]->section_enable == 'on')
            <div class="  part-head0">
                <div class="container-fluid">
                    <div class=" part-head1">
                        {{-- <div class="filter-part">
            @php
                $estate = App\Models\Estate::count();
            @endphp
                <div class="content-filter-part active" data-type='0'>
                    <div class="svg-filt">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M6.49996 7C7.96131 5.53865 9.5935 4.41899 10.6975 3.74088C11.5021 3.24665 12.4978 3.24665 13.3024 3.74088C14.4064 4.41899 16.0386 5.53865 17.5 7C20.6683 10.1684 20.5 12 20.5 15C20.5 16.4098 20.3895 17.5988 20.2725 18.4632C20.1493 19.3726 19.3561 20 18.4384 20H17C15.8954 20 15 19.1046 15 18V16C15 15.2043 14.6839 14.4413 14.1213 13.8787C13.5587 13.3161 12.7956 13 12 13C11.2043 13 10.4413 13.3161 9.87864 13.8787C9.31603 14.4413 8.99996 15.2043 8.99996 16V18C8.99996 19.1046 8.10453 20 6.99996 20H5.56152C4.64378 20 3.85061 19.3726 3.72745 18.4631C3.61039 17.5988 3.49997 16.4098 3.49997 15C3.49997 12 3.33157 10.1684 6.49996 7Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                    </div>
                    <div class="content-sa">
                    <div class="content-n">الكل</div>
                    <div class="content-q">{{$estate}}</div>
                    </div>
            </div>
            @foreach ($estateType as $type)
                @php
                    $estate = App\Models\Estate::where('estate',$type->id)->count();
                @endphp
                    <div class="content-filter-part" data-type='{{$type->id}}'>
                        <div class="svg-filt">
                            @if ($type->id == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.001 48.001">
                                <path id="area" d="M189,471a5.005,5.005,0,0,1-5-5V428a5.006,5.006,0,0,1,5-5h38a5.006,5.006,0,0,1,5,5v38a5.005,5.005,0,0,1-5,5Zm27-2h11a3,3,0,0,0,3-3V455H216Zm-15,0h14V455H201Zm-15-3a3,3,0,0,0,3,3h11V455H186Zm30-12h14V440H216Zm-4.293,0H215v-3.292Zm-4,0H211l-.353-.353,4-4L215,450v-3.293Zm-4,0H207l-.354-.353,8-8L215,446v-3.293ZM201,454h2l-.353-.353,12-12L215,442v-2h-.29a6.88,6.88,0,0,0,.219-1H215V425H201v14h.071a7.047,7.047,0,0,0,.219,1H201v3.292l1.271-1.27a7.068,7.068,0,0,0,.635.779l-1.552,1.553L201,444v3.293l3.331-3.331a6.88,6.88,0,0,0,.932.482l-3.91,3.91L201,448v3.292l6.073-6.073-.848-2.545a5,5,0,1,1,3.55,0L208,448l-.573-1.72-6.073,6.073L201,452Zm-15,0h14V440H186Zm19-16a3,3,0,1,0,3-3A3,3,0,0,0,205,438Zm11,1h14V428a3,3,0,0,0-3-3H216Zm-30-11v11h14V425H189A3,3,0,0,0,186,428Z" transform="translate(-184 -423)"/>
                              </svg>
                              @elseif ($type->id == 3)
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M4.5 14L3 15V21H7M7 21H10M7 21V13L9.5 11V6L12 3L14.5 6V11L17 13V21M10 21H14M10 21V17C10 15.8954 10.8954 15 12 15C13.1046 15 14 15.8954 14 17V21M14 21H17M17 21H21V15L19.5 14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                @elseif ($type->id == 4)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                    <path d="M2 22H22"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.9502 22.0003L3.00019 9.97023C3.00019 9.36023 3.2902 8.78029 3.7702 8.40029L10.7702 2.95027C11.4902 2.39027 12.5002 2.39027 13.2302 2.95027L20.2302 8.39028C20.7202 8.77028 21.0002 9.35023 21.0002 9.97023V22.0003"  stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path opacity="0.4" d="M13 17H11C10.17 17 9.5 17.67 9.5 18.5V22H14.5V18.5C14.5 17.67 13.83 17 13 17Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path opacity="0.4" d="M9.5 13.75H7.5C6.95 13.75 6.5 13.3 6.5 12.75V11.25C6.5 10.7 6.95 10.25 7.5 10.25H9.5C10.05 10.25 10.5 10.7 10.5 11.25V12.75C10.5 13.3 10.05 13.75 9.5 13.75Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path opacity="0.4" d="M16.5 13.75H14.5C13.95 13.75 13.5 13.3 13.5 12.75V11.25C13.5 10.7 13.95 10.25 14.5 10.25H16.5C17.05 10.25 17.5 10.7 17.5 11.25V12.75C17.5 13.3 17.05 13.75 16.5 13.75Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M19.0003 7L18.9703 4H14.5703"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    @elseif ($type->id == 7)
                                    <svg xmlns="http://www.w3.org/2000/svg" style="stroke: none;fill: #565656;" viewBox="0 0 32 32"><rect x="8" y="18" width="6" height="2"/><rect x="8" y="22" width="10" height="2"/><path d="M26,4H6A2.0025,2.0025,0,0,0,4,6V26a2.0025,2.0025,0,0,0,2,2H26a2.0025,2.0025,0,0,0,2-2V6A2.0025,2.0025,0,0,0,26,4ZM18,6v4H14V6ZM6,26V6h6v6h8V6h6l.0012,20Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1"/></svg>
                                    @else    
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M6.49996 7C7.96131 5.53865 9.5935 4.41899 10.6975 3.74088C11.5021 3.24665 12.4978 3.24665 13.3024 3.74088C14.4064 4.41899 16.0386 5.53865 17.5 7C20.6683 10.1684 20.5 12 20.5 15C20.5 16.4098 20.3895 17.5988 20.2725 18.4632C20.1493 19.3726 19.3561 20 18.4384 20H17C15.8954 20 15 19.1046 15 18V16C15 15.2043 14.6839 14.4413 14.1213 13.8787C13.5587 13.3161 12.7956 13 12 13C11.2043 13 10.4413 13.3161 9.87864 13.8787C9.31603 14.4413 8.99996 15.2043 8.99996 16V18C8.99996 19.1046 8.10453 20 6.99996 20H5.56152C4.64378 20 3.85061 19.3726 3.72745 18.4631C3.61039 17.5988 3.49997 16.4098 3.49997 15C3.49997 12 3.33157 10.1684 6.49996 7Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                @endif
                        </div>
                        <div class="content-sa">
                        <div class="content-n">{{$type->name}}</div>
                        <div class="content-q">{{$estate}}</div>
                        </div>
                </div>
                @endforeach
            </div> --}}
                        {{-- <div class="filter-part">
                @php
                    $estate = App\Models\Estate::count();
                @endphp
                    <div class="content-filter-part active" data-type='0'>
                        <div class="svg-filt">
                            <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/villa.png" title="صورة">
                        </div>
                        <div class="content-sa">
                        <div class="content-n">الكل</div>
                        <div class="content-q">{{$estate}}</div>
                        </div>
                </div>
                @foreach ($estateType as $type)
                    @php
                        $estate = App\Models\Estate::where('estate',$type->id)->count();
                    @endphp
                        <div class="content-filter-part" data-type='{{$type->id}}'>
                            <div class="svg-filt">
                                @if ($type->id == 1)
                                <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/town-ship.png" title="صورة">
                                @elseif ($type->id == 3)
                                <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/solo-shop.png" title="صورة">
                                    @elseif ($type->id == 4)
                                    <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/commercial.png" title="صورة">
                                </svg>
                                        @else    
                                        <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/appartment.png" title="صورة">
                                        @endif
                            </div>
                            <div class="content-sa">
                            <div class="content-n">{{$type->name}}</div>
                            <div class="content-q">{{$estate}}</div>
                            </div>
                    </div>
                    @endforeach
                </div> --}}
                        {{-- <div class="filter-part filter-part-2">
                    @php
                        $estate = App\Models\Estate::count();
                    @endphp
                        <div class="content-filter-part active" data-type='0'>
                            <div class="svg-filt">
                                <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/villa.png" title="صورة">
                            </div>
                            <div class="content-sa">
                            <div class="content-n">الكل</div>
                            <div class="content-q">{{$estate}} عقار</div>
                            </div>
                    </div>
                    @foreach ($estateType as $type)
                        @php
                            $estate = App\Models\Estate::where('estate',$type->id)->count();
                        @endphp
                            <div class="content-filter-part" data-type='{{$type->id}}'>
                                <div class="svg-filt">
                                    @if ($type->id == 1)
                                    <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/town-ship.png" title="صورة">
                                    @elseif ($type->id == 3)
                                    <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/solo-shop.png" title="صورة">
                                        @elseif ($type->id == 4)
                                        <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/commercial.png" title="صورة">
                                    </svg>
                                            @else    
                                            <img  src="https://dtthemes.kinsta.cloud/veedoo/wp-content/uploads/sites/3/2024/02/appartment.png" title="صورة">
                                            @endif
                                </div>
                                <div class="content-sa">
                                <div class="content-n">{{$type->name}}</div>
                                <div class="content-q">{{$estate}} عقار</div>
                                </div>
                        </div>
                        @endforeach
                    </div> --}}

                        <div class="completing-filter">
                            <div class="col-auto-main col-auto-main-r">
                                <div class="filter-main-s">
                                    <div class="title-filter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <g clip-path="url(#clip0_78_451)">
                                                <path
                                                    d="M1.6665 10.1698C1.6665 8.26274 1.6665 7.30924 2.09917 6.51879C2.53184 5.72834 3.3223 5.23776 4.90319 4.25661L6.56986 3.22223C8.24099 2.18508 9.07659 1.6665 9.99984 1.6665C10.9231 1.6665 11.7587 2.18508 13.4298 3.22223L15.0965 4.2566C16.6774 5.23776 17.4678 5.72834 17.9005 6.51879C18.3332 7.30924 18.3332 8.26274 18.3332 10.1698V11.4373C18.3332 14.688 18.3332 16.3134 17.3568 17.3233C16.3806 18.3332 14.8092 18.3332 11.6665 18.3332H8.33317C5.19047 18.3332 3.61913 18.3332 2.64281 17.3233C1.6665 16.3134 1.6665 14.688 1.6665 11.4373V10.1698Z"
                                                    stroke="black" stroke-width="1.5" />
                                                <path
                                                    d="M7.5 13.333C8.20865 13.8583 9.0705 14.1663 10 14.1663C10.9295 14.1663 11.7913 13.8583 12.5 13.333"
                                                    stroke="black" stroke-width="1.5" stroke-linecap="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_78_451">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <h4 class="sub-title-filtter">
                                            نوع العقار :
                                        </h4>
                                    </div>
                                    <div class="ce">
                                        <div class="content-form-filter">أدخل نوع العقار هنا ...</div>
                                        <div class="svg-filter"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="none">
                                                <path
                                                    d="M18.2929 15.2893C18.6834 14.8988 18.6834 14.2656 18.2929 13.8751L13.4007 8.98766C12.6195 8.20726 11.3537 8.20757 10.5729 8.98835L5.68257 13.8787C5.29205 14.2692 5.29205 14.9024 5.68257 15.2929C6.0731 15.6835 6.70626 15.6835 7.09679 15.2929L11.2824 11.1073C11.673 10.7168 12.3061 10.7168 12.6966 11.1073L16.8787 15.2893C17.2692 15.6798 17.9024 15.6798 18.2929 15.2893Z" />
                                            </svg></div>
                                    </div>
                                    <div class="filter-content-main">
                                        <div class="content-filt">
                                            <div class="part-tgs">
                                                <span class="list-main-flt active" data-type='تجاري'
                                                    data-id='0'>تجاري</span>
                                                <span class="list-main-flt" data-type='سكني' data-id='1'>سكني</span>
                                            </div>
                                            <div class="part-tgt part-tgt-0 active">
                                                <span class="list-main-sqt" data-type="0"><span
                                                        class="fh-f">الكل</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">أرض</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">مزرعة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">استراحة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">شقة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">دور</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">دوبلكس</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">فيلا</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">قصر</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">شاليه</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">غرفة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">استديو</span></span>
                                            </div>
                                            <div class="part-tgt part-tgt-1">
                                                <span class="list-main-sqt" data-type="0"><span
                                                        class="fh-f">مزرعة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">استراحة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">عمارة</span></span>
                                                <span class="list-main-sqt" data-type="2"><span class="fh-f">محل
                                                        تجاري</span></span>
                                                <span class="list-main-sqt" data-type="2"><span class="fh-f">مكتب
                                                        تجاري</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">مستودع</span></span>
                                                <span class="list-main-sqt" data-type="2"><span
                                                        class="fh-f">شاليه</span></span>
                                                <span class="list-main-sqt" data-type="2"><span class="fh-f">محطة
                                                        بنزين</span></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="type" id="choices-type0" value="0">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M4.75604 13.4468C4.4306 13.7722 4.4306 14.2999 4.75604 14.6253L8.83286 18.6981C9.48386 19.3484 10.5387 19.3482 11.1894 18.6976L15.2646 14.6223C15.5901 14.2969 15.5901 13.7692 15.2646 13.4438C14.9392 13.1184 14.4115 13.1184 14.0861 13.4438L10.5981 16.9318C10.2727 17.2573 9.74503 17.2573 9.41961 16.9318L5.93455 13.4468C5.60911 13.1214 5.08147 13.1214 4.75604 13.4468Z"
                                            fill="#0F0F0F" />
                                        <path
                                            d="M15.2646 6.57246C15.5901 6.24702 15.5901 5.71939 15.2646 5.39395L11.1878 1.32107C10.5368 0.670745 9.48204 0.671003 8.83137 1.32165L4.75604 5.39696C4.4306 5.72239 4.4306 6.25003 4.75604 6.57546C5.08148 6.90091 5.60912 6.90091 5.93455 6.57546L9.42262 3.08743C9.74804 2.76199 10.2757 2.76199 10.6011 3.08743L14.0861 6.57246C14.4115 6.8979 14.9392 6.8979 15.2646 6.57246Z"
                                            fill="#0F0F0F" />
                                    </svg>
                                    <h4 class="sub-title-filtter">
                                        للبيع/للايجار :
                                    </h4>
                                </div>
                                <select value="{{ old('goal') }}" class="form-control" data-trigger name="goal"
                                    id="choices-goal0" class="content-filter-part-tt" required>
                                    <option value="0" selected>إدخـــال للبيع/للايجار ...</option>
                                    <option value="للبيع">للبيع <span class="number-of">({{ $estateSell }})</span>
                                    </option>
                                    <option value="ايجار">للايجار <span class="number-of">({{ $estateRent }})</span>
                                    </option>
                                </select>
                            </div>
                            <div class="col-auto-main col-auto-main-r">

                                <div class="title-filter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M17.1842 7.04183C16.3092 3.19183 12.9508 1.4585 10.0008 1.4585C10.0008 1.4585 10.0008 1.4585 9.9925 1.4585C7.05081 1.4585 3.68415 3.1835 2.80915 7.0335C1.83415 11.3335 4.46748 14.9752 6.85081 17.2668C7.73415 18.1168 8.8675 18.5418 10.0008 18.5418C11.1342 18.5418 12.2675 18.1168 13.1425 17.2668C15.5258 14.9752 18.1592 11.3418 17.1842 7.04183ZM10.0008 11.2168C8.55084 11.2168 7.37581 10.0418 7.37581 8.59183C7.37581 7.14183 8.55084 5.96683 10.0008 5.96683C11.4508 5.96683 12.6258 7.14183 12.6258 8.59183C12.6258 10.0418 11.4508 11.2168 10.0008 11.2168Z"
                                            fill="black" />
                                    </svg>
                                    <h4 class="sub-title-filtter">
                                        إختــــر المدينة :
                                    </h4>
                                </div>
                                <input type="hidden" name="data" id="choices-data0">
                                <select value="{{ old('data') }}" class="form-control" data-trigger name="data"
                                    id="choices-city0" required class="content-filter-part-tt">
                                    <option value="">إدخـــال المدينة هنــا...</option>
                                    @php
                                        $estatStatet = json_decode($estatStatet);
                                    @endphp
                                    @if (in_array('3', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3)->count();
                                        @endphp
                                        <option value="3">الرياض<span class="number-of">({{ $number }})</span>
                                        </option>
                                    @endif

                                    @if (in_array('5', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 5)->count();
                                        @endphp
                                        <option value="5">الطائف({{ $number }})</option>
                                    @endif

                                    @if (in_array('6', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 6)->count();
                                        @endphp
                                        <option value="6">مكة المكرمة<span
                                                class="number-of">({{ $number }})</span></option>
                                    @endif

                                    @if (in_array('10', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 10)->count();
                                        @endphp
                                        <option value="10">حائل({{ $number }})</option>
                                    @endif

                                    @if (in_array('11', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 11)->count();
                                        @endphp
                                        <option value="11">بريدة({{ $number }})</option>
                                    @endif

                                    @if (in_array('13', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 13)->count();
                                        @endphp
                                        <option value="13">الدمام({{ $number }})</option>
                                    @endif

                                    @if (in_array('14', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 14)->count();
                                        @endphp
                                        <option value="14">المدينة المنورة({{ $number }})</option>
                                    @endif

                                    @if (in_array('15', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 15)->count();
                                        @endphp
                                        <option value="15">ابها({{ $number }})</option>
                                    @endif

                                    @if (in_array('17', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 17)->count();
                                        @endphp
                                        <option value="17">جازان({{ $number }})</option>
                                    @endif

                                    @if (in_array('18', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 18)->count();
                                        @endphp
                                        <option value="18">جدة({{ $number }})</option>
                                    @endif

                                    @if (in_array('24', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 24)->count();
                                        @endphp
                                        <option value="24">المجمعة({{ $number }})</option>
                                    @endif

                                    @if (in_array('31', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 31)->count();
                                        @endphp
                                        <option value="31">الخبر({{ $number }})</option>
                                    @endif

                                    @if (in_array('80', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 80)->count();
                                        @endphp
                                        <option value="80">عنيزة({{ $number }})</option>
                                    @endif

                                    @if (in_array('168', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 168)->count();
                                        @endphp
                                        <option value="168">الارطاوية({{ $number }})</option>
                                    @endif

                                    @if (in_array('227', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 227)->count();
                                        @endphp
                                        <option value="227">الظهران({{ $number }})</option>
                                    @endif

                                    @if (in_array('243', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 243)->count();
                                        @endphp
                                        <option value="243">بقيق({{ $number }})</option>
                                    @endif

                                    @if (in_array('253', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 253)->count();
                                        @endphp
                                        <option value="253">صلاصل({{ $number }})</option>
                                    @endif

                                    @if (in_array('270', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 270)->count();
                                        @endphp
                                        <option value="270">الزلفي({{ $number }})</option>
                                    @endif

                                    @if (in_array('306', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 306)->count();
                                        @endphp
                                        <option value="306">الغاط({{ $number }})</option>
                                    @endif

                                    @if (in_array('377', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 377)->count();
                                        @endphp
                                        <option value="377">رابغ({{ $number }})</option>
                                    @endif

                                    @if (in_array('443', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 443)->count();
                                        @endphp
                                        <option value="443">ثادق({{ $number }})</option>
                                    @endif

                                    @if (in_array('444', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 444)->count();
                                        @endphp
                                        <option value="444">الروبضة / رغبة({{ $number }})</option>
                                    @endif

                                    @if (in_array('796', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 796)->count();
                                        @endphp
                                        <option value="796">ملهم({{ $number }})</option>
                                    @endif

                                    @if (in_array('828', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 828)->count();
                                        @endphp
                                        <option value="828">الدرعية({{ $number }})</option>
                                    @endif

                                    @if (in_array('834', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 834)->count();
                                        @endphp
                                        <option value="834">العمارية({{ $number }})</option>
                                    @endif

                                    @if (in_array('990', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 990)->count();
                                        @endphp
                                        <option value="990">المزاحمية({{ $number }})</option>
                                    @endif

                                    @if (in_array('1061', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 1061)->count();
                                        @endphp
                                        <option value="1061">الخرج({{ $number }})</option>
                                    @endif

                                    @if (in_array('1801', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 1801)->count();
                                        @endphp
                                        <option value="1801">محايل({{ $number }})</option>
                                    @endif

                                    @if (in_array('2421', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 2421)->count();
                                        @endphp
                                        <option value="2421">الرس({{ $number }})</option>
                                    @endif

                                    @if (in_array('2522', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 2522)->count();
                                        @endphp
                                        <option value="2522">يدمة({{ $number }})</option>
                                    @endif

                                    @if (in_array('3417', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3417)->count();
                                        @endphp
                                        <option value="3417">نجران({{ $number }})</option>
                                    @endif

                                    @if (in_array('3479', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3479)->count();
                                        @endphp
                                        <option value="3479">صبيا({{ $number }})</option>
                                    @endif

                                    @if (in_array('3499', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3499)->count();
                                        @endphp
                                        <option value="3499">ضمد({{ $number }})</option>
                                    @endif

                                    @if (in_array('3525', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3525)->count();
                                        @endphp
                                        <option value="3525">ابو عريش({{ $number }})</option>
                                    @endif

                                    @if (in_array('3618', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3618)->count();
                                        @endphp
                                        <option value="3618">البديع والقرفي({{ $number }})</option>
                                    @endif

                                    @if (in_array('3652', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3652)->count();
                                        @endphp
                                        <option value="3652">احد المسارحة({{ $number }})</option>
                                    @endif

                                    @if (in_array('3677', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 3677)->count();
                                        @endphp
                                        <option value="3677">الاحساء({{ $number }})</option>
                                    @endif

                                    @if (in_array('23695', $estatStatet))
                                        @php
                                            $number = App\Models\Estate::where('state', 23695)->count();
                                        @endphp
                                        <option value="23695">مدينة الملك عبدالله الاقتصادية({{ $number }})
                                        </option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-auto-main col-auto-main-r">
                                <div class="title-filter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.8334 2.49984C10.8334 2.0396 10.4603 1.6665 10.0001 1.6665C9.53983 1.6665 9.16675 2.0396 9.16675 2.49984V3.38475C6.15115 3.76079 3.76103 6.1509 3.38499 9.1665H2.50008C2.03985 9.1665 1.66675 9.53959 1.66675 9.99984C1.66675 10.4601 2.03985 10.8332 2.50008 10.8332H3.38499C3.76103 13.8488 6.15115 16.2389 9.16675 16.6149V17.4998C9.16675 17.9601 9.53983 18.3332 10.0001 18.3332C10.4603 18.3332 10.8334 17.9601 10.8334 17.4998V16.6149C13.849 16.2389 16.2392 13.8488 16.6152 10.8332H17.5001C17.9603 10.8332 18.3334 10.4601 18.3334 9.99984C18.3334 9.53959 17.9603 9.1665 17.5001 9.1665H16.6152C16.2392 6.1509 13.849 3.76079 10.8334 3.38475V2.49984ZM8.33342 9.99984C8.33342 9.07934 9.07958 8.33317 10.0001 8.33317C10.9206 8.33317 11.6667 9.07934 11.6667 9.99984C11.6667 10.9203 10.9206 11.6665 10.0001 11.6665C9.07958 11.6665 8.33342 10.9203 8.33342 9.99984ZM10.0001 6.6665C8.15913 6.6665 6.66675 8.15889 6.66675 9.99984C6.66675 11.8408 8.15913 13.3332 10.0001 13.3332C11.841 13.3332 13.3334 11.8408 13.3334 9.99984C13.3334 8.15889 11.841 6.6665 10.0001 6.6665Z"
                                            fill="#323232" />
                                    </svg>
                                    <h4 class="sub-title-filtter">
                                        الحــــي :
                                    </h4>
                                </div>
                                <select value="{{ old('city') }}" class="form-control" data-trigger name="city"
                                    placeholder="الحي" id="choices-state0" class="content-filter-part-tt" required>
                                    <option value="0" selected>إدخـــال الحـــي هنــا...</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="container-bg">
                    <h2 class="content-h2">أفضل العقــــارات.</h2>
                    <div class="row">

                        <section class="part-theme0">

                            <div class="estate-data">
                                <div class="row part-content" id="part-content">
                                    @php
                                        $estates = App\Models\Estate::latest()->paginate(
                                            $getTheme[1]->inner_list[2]->field_default_text,
                                        );
                                        //  $estates = App\Models\Estate::latest()->paginate(2);
                                    @endphp
                                    @foreach ($estates as $estate)
                                        <div class="col-lg-3 col-sm-12">
                                            <div class="homelengo-box">
                                                <div class="archive-top">
                                                    <a href="{{ route('products', $estate->id) }}" class="images-group">
                                                        <div class="images-style">
                                                            @if ($estate->thumbnail_image)
                                                                <img class=" ls-is-cached"
                                                                    src="{{ url('/uploads/cover_image/sd_') . $estate->thumbnail_image }}"
                                                                    alt="{{ $estate->name }}">
                                                            @else
                                                                <img class=" ls-is-cached"
                                                                    src="{{ url('/uploads/none.jpg') }}"
                                                                    alt="{{ $estate->name }}">
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
                                                        <a href="{{ route('products', $estate->id) }}"
                                                            class="link-pov"></a>
                                                        <a href="{{ route('products', $estate->id) }}" class="link">
                                                            <h6 class="text-capitalize">{{ $estate->name }}</h6>
                                                        </a>

                                                        @if ($estate->city)
                                                            <div class="bottom">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14" fill="none">
                                                                    <g id="Frame">
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <g id="style=linear">
                                                                                <g id="location">
                                                                                    <path id="vector"
                                                                                        d="M5.3542 11.8481C5.40035 11.8933 5.44594 11.9378 5.4909 11.9815C5.50184 11.9921 5.51275 12.0026 5.52361 12.013M5.3542 11.8481C3.76216 10.2879 1.50888 7.8322 2.15501 4.95234C3.29395 -0.099328 10.7115 -0.093494 11.8447 4.95817C12.5095 7.9215 10.1045 10.4298 8.50303 11.9815C7.35182 13.1026 6.6716 13.1131 5.52361 12.013M5.3542 11.8481L5.52361 12.013"
                                                                                        stroke="#484848"
                                                                                        stroke-width="1.5" />
                                                                                    <path id="ellipse"
                                                                                        d="M6.99984 6.99968C7.80525 6.99968 8.45817 6.34676 8.45817 5.54134C8.45817 4.73593 7.80525 4.08301 6.99984 4.08301C6.19442 4.08301 5.5415 4.73593 5.5415 5.54134C5.5415 6.34676 6.19442 6.99968 6.99984 6.99968Z"
                                                                                        stroke="#484848"
                                                                                        stroke-width="1.5" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                                {{ $estate->statetxt }}, {{ $estate->city }}
                                                            </div>
                                                        @endif

                                                        <ul class="meta-list">
                                                            @php
                                                                $props = App\Models\EstateGroupe::where(
                                                                    'estate',
                                                                    $estate->id,
                                                                )->get();
                                                                $user = App\Models\User::find($estate->user);
                                                            @endphp
                                                            @foreach ($props as $prop)
                                                                @if ($prop->name == 'المساحة')
                                                                    <li class="item">
                                                                        <svg style="stroke: none;fill: rgba(15, 15, 15, 1);    width: 16px;
                                                height: 18px;"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="18" height="18"
                                                                            viewBox="0 0 18 18" fill="none">
                                                                            <g clip-path="url(#clip0_78_522)">
                                                                                <path
                                                                                    d="M2.25 5.25C2.25 5.66421 1.91421 6 1.5 6C1.08579 6 0.75 5.66421 0.75 5.25V2.25C0.75 1.42157 1.42157 0.75 2.25 0.75H5.25C5.66421 0.75 6 1.08579 6 1.5C6 1.91421 5.66421 2.25 5.25 2.25H3.31066L8.03032 6.96967C8.3232 7.26256 8.3232 7.73745 8.03032 8.03032C7.73745 8.3232 7.26256 8.3232 6.96967 8.03032L2.25 3.31066V5.25Z"
                                                                                    fill="#0F0F0F" />
                                                                                <path
                                                                                    d="M15.75 12.75C15.75 12.3358 16.0858 12 16.5 12C16.9142 12 17.25 12.3358 17.25 12.75V15.75C17.25 16.5784 16.5784 17.25 15.75 17.25H12.75C12.3358 17.25 12 16.9142 12 16.5C12 16.0858 12.3358 15.75 12.75 15.75H14.6893L9.96966 11.0303C9.67678 10.7374 9.67678 10.2625 9.96966 9.96966C10.2625 9.67678 10.7374 9.67678 11.0303 9.96966L15.75 14.6893V12.75Z"
                                                                                    fill="#0F0F0F" />
                                                                                <path
                                                                                    d="M15.75 5.25C15.75 5.66421 16.0858 6 16.5 6C16.9142 6 17.25 5.66421 17.25 5.25V2.25C17.25 1.42157 16.5784 0.75 15.75 0.75H12.75C12.3358 0.75 12 1.08579 12 1.5C12 1.91421 12.3358 2.25 12.75 2.25H14.6893L9.96966 6.96967C9.67678 7.26256 9.67678 7.73745 9.96966 8.03032C10.2625 8.3232 10.7374 8.3232 11.0303 8.03032L15.75 3.31066V5.25Z"
                                                                                    fill="#0F0F0F" />
                                                                                <path
                                                                                    d="M2.25 12.75C2.25 12.3358 1.91421 12 1.5 12C1.08579 12 0.75 12.3358 0.75 12.75V15.75C0.75 16.5784 1.42157 17.25 2.25 17.25H5.25C5.66421 17.25 6 16.9142 6 16.5C6 16.0858 5.66421 15.75 5.25 15.75H3.31066L8.03032 11.0303C8.3232 10.7374 8.3232 10.2625 8.03032 9.96966C7.73745 9.67678 7.26256 9.67678 6.96967 9.96966L2.25 14.6893V12.75Z"
                                                                                    fill="#0F0F0F" />
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_78_522">
                                                                                    <rect width="18" height="18"
                                                                                        fill="white" />
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                        <div class="prop-cont">
                                                                            <span
                                                                                class="text-variant-1">{{ $prop->name }}:</span>
                                                                            <span
                                                                                class="fw-6">{{ $prop->value }}</span>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            <li class="item">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                                                        stroke="black" stroke-width="1.5" />
                                                                    <path d="M15 18H9" stroke="black" stroke-width="1.5"
                                                                        stroke-linecap="round" />
                                                                </svg>
                                                                <div class="prop-cont">
                                                                    <span class="text-variant-1">نوع العقار :</span>
                                                                    <span class="fw-6">{{ $estate->type }}</span>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="content-bottom">
                                                        <h6 class="price">{{ $estate->price }} رس</h6>
                                                        @if ($estate->methode == 1)
                                                            <div class="df-0">قابل للتفاوض</div>
                                                        @else
                                                            <div class="df-0">خيار 3</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12">
                                        <!--pagination start-->
                                        <div class="d-flex align-items-center justify-content-between py-3 px-4">
                                            <nav class="paginat">
                                                @if ($estates->hasPages())
                                                    <ul class="pagination">
                                                        {{-- Previous Page Link --}}
                                                        @if ($estates->onFirstPage())
                                                            <li class="page-item disabled page-link-t"
                                                                aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                                <span class="page-link" aria-hidden="true">‹ السابق</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link page-link-t"
                                                                    href="{{ $estates->previousPageUrl() }}"
                                                                    rel="prev" aria-label="@lang('pagination.previous')">‹
                                                                    السابق</a>
                                                            </li>
                                                        @endif

                                                        {{-- Pagination Elements --}}
                                                        @foreach ($estates->getUrlRange(1, $estates->lastPage()) as $page => $url)
                                                            @if ($page == $estates->currentPage())
                                                                <li class="page-item active" aria-current="page"><span
                                                                        class="page-link">{{ $page }}</span></li>
                                                            @else
                                                                <li class="page-item"><a class="page-link"
                                                                        href="{{ $url }}">{{ $page }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                        {{-- Next Page Link --}}
                                                        @if ($estates->hasMorePages())
                                                            <li class="page-item">
                                                                <a class="page-link page-link-t"
                                                                    href="{{ $estates->nextPageUrl() }}" rel="next"
                                                                    aria-label="@lang('pagination.next')">التالي ›</a>
                                                            </li>
                                                        @else
                                                            <li class="page-item disabled" aria-disabled="true"
                                                                aria-label="@lang('pagination.next')">
                                                                <span class="page-link page-link-t"
                                                                    aria-hidden="true">التالي ›</span>
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
    </div>
    </div>
    </div>
@endsection
@push('js-main')
    <script src="{{ asset('assets/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script>
        //     const type = new Choices($('#choices-type')[0], {
        //     removeItemButton: true,shouldSort: false,
        //     searchEnabled: false,
        //   });
        //   const goal = new Choices($('#choices-goal')[0], {
        //     removeItemButton: true,shouldSort: false,
        //     searchEnabled: false,
        //   });
        //   const estate = new Choices($('#choices-city')[0], {
        //     removeItemButton: true,shouldSort: false,
        //     searchEnabled: true,
        //     noChoicesText: 'لا توجد أنواع أخرى',
        //   });
        //   const type0 = new Choices($('#choices-type0')[0], {
        //     removeItemButton: true,shouldSort: false,
        //     searchEnabled: false,
        //   });
        const goal0 = new Choices($('#choices-goal0')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: false,
        });
        const data0 = new Choices($('#choicesstate0')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: false,
        });
        const estate0 = new Choices($('#choices-city0')[0], {
            removeItemButton: true,
            shouldSort: false,
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

            if (data) {
                $.ajax({
                    url: "{{ route('estatefilter') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'data': data,
                        'city': city,
                        'goal': goal,
                        'type': type
                    },
                    type: "POST",
                    success: function(data) {
                        console.log(data);

                        $('#part-content').html(data);
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            }
        });

        $('.filter-main-s .ce').click(function() {

            $('.filter-content-main').toggleClass('active');
            $('.content-fit-l').toggleClass('active');
        });
        $('.content-fit-l').click(function() {

            $('.filter-content-main').toggleClass('active');
            $('.content-fit-l').toggleClass('active');
        });
        $('.list-main-flt').click(function() {
            var data = $(this).attr('data-type');
            var data2 = $(this).attr('data-id');
            console.log(data);
            $('.list-main-flt').removeClass('active');
            $(this).addClass('active');

            $('.part-tgt').removeClass('active');
            $('.part-tgt-' + data2).addClass('active');


            $('#choices-type0').val(data);
            changerFiltter();
        });
        $('.list-main-sqt').click(function() {
            var data = $(this).attr('data-type');
            console.log(data);
            $('.list-main-sqt').removeClass('active');
            $(this).addClass('active');


            $('#choices-data0').val(data);
            changerFiltter();
        });
        //   jQuery('#choices-type0').change(function() {
        //     console.log('fffffffff');
        //     changerFiltter() ;
        //   });
        $('#choices-goal0').change(function() {
            console.log($(this).val());
            changerFiltter();
        });
        $('#choices-city0').change(function() {
            console.log($(this).val());
            changerFiltter();
        });
        $('#choices-data0').change(function() {
            console.log($(this).val());
            changerFiltter();
        });

        function changerFiltter() {
            // var data = $('.content-filter-part.active').attr('data-type');
            var city = $('#choices-city0').val();
            var goal = $('#choices-goal0').val();
            var data = $('#choices-data0').val();
            var type = $('#choices-type0').val();
            console.log(data);

            if (data) {
                $.ajax({
                    url: "{{ route('estatefilter') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'data': data,
                        'city': city,
                        'goal': goal,
                        'type': type
                    },
                    type: "POST",
                    success: function(data) {
                        console.log(data);

                        $('#part-content').html(data);
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            }

        }

        const headerHeight = $('.part-head0').offset().top; // الحصول على ارتفاع الهيدر

        addEventListener('scroll', function() {
            const header = $('.part-head0');
            const headerHeight2 = header.prop("scrollHeight"); // الحصول على ارتفاع الهيدر
            console.log(headerHeight);
            console.log($(window).scrollTop());

            // إضافة/إزالة الصنف "scrolled" بناءً على موضع التمرير
            if ($(window).scrollTop() > headerHeight) {
                $('.part-head0').addClass('scrolled');
            } else if (window.scrollY < headerHeight) {
                $('.part-head0').removeClass('scrolled');
            }
        });
        $('#choices-city0').change(function() {
            const selectedWilayaId = parseInt($('#choices-city0').val());

            $.post("{{ route('estate.state') }}", {
                _token: "{{ csrf_token() }}",
                state: selectedWilayaId // Send the selected wilaya ID in an array
            }, function(response) {
                $('#choices-state0').html('');
                response.forEach(el => {
                    $('#choices-state0').append('<option value="' + el['name_ar'] + '">' + el[
                        'name_ar'] + '</option>');
                });
                console.log(response);
                const statqe = new Choices($('#choices-state0')[0], {
                    removeItemButton: true,
                    shouldSort: false,
                    searchEnabled: true,
                });
            });
        });
    </script>
    <script>
        var swiperSingle = new Swiper(".sw-single", {
            spaceBetween: 16,
            autoplay: {
                delay: 300000,
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".sw-single", {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  });
</script>

@endpush
