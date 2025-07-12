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
      justify-content: flex-end;
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
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
@endpush
@section('content')
    @php
        $getTheme = getMainThemeSetting();
    @endphp
    <div class="full-h">

        @include('store.theme2.header')
        {{-- @if (is_array($getTheme) && $getTheme[0]->section_enable == 'on') --}}
        <div class="container-fluid">
            <div dir="ltr" class="swiper sw-single" dir="rtl">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <section class="flat-slider"
                            style="
        background-image: url({{ asset('uploads/bg1.png') }});
    ">
                            <div class="overlay"></div>
                        </section>
                    </div>
                    <div class="swiper-slide">
                        <section class="flat-slider"
                            style="
        background-image: url({{ asset('uploads/bg2.png') }});
    ">
                            <div class="overlay"></div>
                        </section>
                    </div>
                    <div class="swiper-slide">
                        <section class="flat-slider"
                            style="
        background-image: url({{ asset('uploads/bg3.png') }});
    ">
                            <div class="overlay"></div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>

        </div>
        <h3>افضل العقارات</h3>
        <div class="content container-fluid">
            <div class="card mb-3 remove-card-shadow" style=" border-radius: 15px;">
                <div class="card-body" >


                    <div class="row g-2" style=" border-radius: 25px;">
                        @foreach ($ads as $ads_item)
                            <div class="col-lg-4">
                                <!-- Card -->
                                <div class="card h-100 d-flex justify-content-center align-items-center">
                                    <div class="card-body  ">

                                        <div class="row">


                                            <div class="col-md-6 text-end" id="personal-form">

                                                <a class="sub_card" href="{{ route('ads.show', $ads_item->id) }}">
                                                    <div class="title">{{ $ads_item->name }}</div>
                                                    <div class="location">
                                                        <i>📍</i>
                                                        {{ $ads_item->city->name_ar  }} 
                                                        ... {{ $ads_item->district?->name_ar  }}
                                                    </div>

                                                    <div class="features">
                                                        <div class="feature-box">
                                                            <i>🏢</i>
                                                            <div class="feature-label">الممشي : 500</div>
                                                        </div>
                                                        <div class="feature-box">
                                                            <i>📐</i>
                                                            <div class="feature-label">القير : {{ $ads_item->car_motor_status }}</div>
                                                        </div>
                                                    </div>

                                                    <div class="price">
                                                        <span>{{ $ads_item->sale_price ?? 'السعر عند الاتصال'}}</span>
                                                        @if ($ads_item->sale_price)
                                                       <span>﷼</span> @endif
                                                            
                                                    </div>
                                                    @if ($ads_item->sale_price)
                                                    <div class="negotiable">قابل للتفاوض</div>
                                                    @endif
                                                </a>

                                            </div>
                                            <div class="col-md-6 text-start" id="personal-form">
                                                <img src="{{ asset('uploads/bg1.png') }}" alt="">


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js-main')
    <script src="{{ asset('assets/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script>
        const type = new Choices($('#choices-state0')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: false,
        });
        const goal = new Choices($('#choices-type1')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: false,
        });
        //   const estate = new Choices($('#choices-city')[0], {
        //     removeItemButton: true,shouldSort: false,
        //     searchEnabled: true,
        //     noChoicesText: 'لا توجد أنواع أخرى',
        //   });
        const type0 = new Choices($('#choices-type0')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });
        //type0.removeActiveItems();

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
            // console.log(data);

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
                        // console.log(data);

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
            // console.log(data);
            $('.list-main-flt').removeClass('active');
            $(this).addClass('active');

            $('.part-tgt').removeClass('active');
            $('.part-tgt-' + data2).addClass('active');


            $('#choices-type0').val(data);
            changerFiltter();
        });
        $('.list-main-sqt').click(function() {
            var data = $(this).attr('data-type');
            // console.log(data);
            $('.list-main-sqt').removeClass('active');
            $(this).addClass('active');


            $('#choices-data0').val(data);
            changerFiltter();
        });
        //   jQuery('#choices-type0').change(function() {
        //     console.log('fffffffff');
        //     changerFiltter() ;
        //   });
        $('#choices-type0').change(function() {
            const selectedWilayaId = $(this).val();
            // console.log(selectedWilayaId);
            var allAvlb = '{{ $types }}';

            $.post("{{ route('estate.model') }}", {
                _token: "{{ csrf_token() }}",
                state: selectedWilayaId
            }, function(response) {

                // console.log(response[0]);

                goal0.clearChoices();
                response[0].forEach(el => {
                    if (allAvlb.includes(el)) {
                        goal0.setChoices([{
                            value: el,
                            label: el
                        }], 'value', 'label', false);
                    }
                    //$('#choices-goal0').append('<option value="'+el+'">'+el+'</option>');
                });

            });
        });
        $('#choices-type1').change(function() {
            // console.log($(this).val());
            changerFiltter();
        });
        $('#choices-goal0').change(function() {
            // console.log($(this).val());
            changerFiltter();
        });
        $('#choices-state0').change(function() {
            // console.log($(this).val());
            changerFiltter();
        });

        function changerFiltter() {
            // var data = $('.content-filter-part.active').attr('data-type');
            var theme = 'theme2';
            var type = $('#choices-type0').val();
            var goal = $('#choices-goal0').val();
            var model = $('#choices-state0').val();
            var status = $('#choices-type1').val();
            // console.log(type);

            if (type) {
                $.ajax({
                    url: "{{ route('estatefilter') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'theme': theme,
                        'type': type,
                        'goal': goal,
                        'model': model,
                        'status': status
                    },
                    type: "POST",
                    success: function(data) {
                        // console.log(data);

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
            // console.log(headerHeight);
            // console.log($(window).scrollTop());

            // إضافة/إزالة الصنف "scrolled" بناءً على موضع التمرير
            if ($(window).scrollTop() > headerHeight) {
                $('.part-head0').addClass('scrolled');
            } else if (window.scrollY < headerHeight) {
                $('.part-head0').removeClass('scrolled');
            }
        });
    </script>
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
@endpush
