@extends('store.theme2.layouts.store')
@section('page-title')
    {{ __('البحث') }}
@endsection

@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/css/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back-end') }}/css/toastr.css">

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

        span#slider-range-value2:after,
        span#slider-range-value1:after {
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

        .phone-flex {
            display: flex;
            width: 100%;
        }

        .form-control#prif {
            max-width: 65px;
            margin-right: 15px;
        }

        .form-control {
            padding: 14px 13px;
            border-radius: 20px;
            margin-bottom: 12px;
            display: inline-block;
            border: 1px solid #d9dee3;
        }

        .choices[data-type*=select-one] {
            border-radius: 20px;
            margin-bottom: 12px;
            border: 1px solid #d9dee3;
        }

        .container-requst {
            max-width: 800px;
        }

        .title-requst h1.title-rq {
            color: #000;
            letter-spacing: -0.5px;
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .card-rp {
            background: #ffffff;
            border: 1px solid #ebebeb;
            box-shadow: 0px 4px 18px 0px rgba(0, 0, 0, 0.0784313725);
            margin-bottom: 25px;
            border-radius: 20px;
            padding: 15px;
        }

        h2.rp-title {
            font-size: 16px;
            color: #000;
            letter-spacing: -0.5px;
        }

        .form-control-txterea {
            min-height: 250px;
        }
    </style>
@endpush
@section('content')
    <div class="full-h">
        @include('store.theme2.header')
        <div class="container container-requst">
            <div class="title-requst">
                <h1 class="title-rq">بع سيارتك</h1>
            </div>
            <form action="{{ route('offer.store') }}" method="post">
                @csrf
                <div class="card-rp">
                    <h2 class="rp-title">معلومات الطلب</h2>
                    <div class="col-lg-12 col-sm-12">
                        <label>الماركة:</label>
                        <select value="{{ old('car_type_id') }}" onchange="select_models(this)" class="form-control"
                            data-trigger name="car_type_id" id="choices-multiple-car_type_id" required>
                            <option value="">الماركة</option>
                            @foreach ($car_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name ?? $type->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <label>نوع السيارة :</label>
                        <select value="{{ old('car_model_id') }}" class="form-control" data-trigger name="car_model_id"
                            id="choices-car_model_id" required style="padding: 0.7375rem 0.875rem;">
                            <option value="" selected>نوع السيارة</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <label>الموديل :</label>
                        <input class="form-control" style="
                  padding: 0.77rem 0.875rem;
              "
                            type="number" name="model_year" id="model" placeholder="موديل السيارة ...">
                    </div>
                </div>
                <div class="card-rp">
                    <h2 class="rp-title">المنطقة</h2>
                    <div class="col-sm-12">
                        <label class="mt-2">المدينة</label>
                        <input type="hidden" name="statetxt" class="statetxt">
                        <select class="form-control" data-trigger name="city_id" id="choices-city" required
                            onchange="select_district(this)">
                                    <option selected disabled>{{ __('اختر المدينة') }} </option>

                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name ?? $city->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label class="mt-2">الحي</label>
                        <select class="form-control" data-trigger name="district_id" id="choices-state" required>
                            <option value="0" disabled>حدد المدينة أولا</option>
                        </select>
                    </div>
                </div>
                <div class="card-rp">
                    <h2 class="rp-title">معلومات العميل</h2>
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <label>الاسم :</label>
                        <input placeholder="الاسم الكامل" class="form-control" type="text" name="customer_name"
                            id="name" value="{{ old('customer_name') }}" required>
                    </div>
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <label>رقم الهاتف :</label>
                        <div class="phone-flex mb-4">
                            <input class="form-control mb-2 mt-2" type="number" name="customer_phone" id="phone"
                                placeholder="رقم الهاتف" required="">
                            {{-- <input class="form-control mb-2 mt-2" type="text" name="prif" id="prif" value="+966" disabled=""> --}}
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <label>تفاصيل السيارة :</label>
                        <textarea name="description" id="form-control" class="form-control form-control-txterea"></textarea>
                    </div>
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <input type="submit" class="btn main-btn" value="ارسال الطلب">
                    </div>
                </div>
            </form>
        </div>
    @endsection
    @push('js-main')
    <script src="{{asset('assets/back-end')}}/js/vendor.min.js"></script>

      <script>
            function select_models(element) {
                var id = element.value;

                $.ajax({
                    url: "{{ route('ads.get_models', ':id') }}".replace(':id', id),
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var unitTypeSelect = $("select[name='car_model_id']");
                        unitTypeSelect.empty();
                        unitTypeSelect.append('<option value="">نوع السيارة</option>');
                        if (data && Array.isArray(data.models) && data.models.length > 0) {
                            data.models.forEach(function(model) {
                                console.log(model.name_ar);
                                unitTypeSelect.append(
                                    `<option value="${model.id}">${model.name_ar}</option>`
                                );
                            });
                        } else {
                            console.warn("لم يتم العثور على بيانات models بالشكل المتوقع", data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching models:', error);
                    }
                });
            }
        </script>
        <script src="{{ asset('assets/js/choices.min.js') }}"></script>
        <script src="{{ asset('assets/js/rangle-slider.js') }}"></script>
        <script>
            const type = new Choices($('#choices-type')[0], {
                removeItemButton: true,
                shouldSort: false,
                searchEnabled: false,
            });
            const goal = new Choices($('#choices-goal')[0], {
                removeItemButton: true,
                shouldSort: false,
                searchEnabled: false,
            });
            const estate = new Choices($('#choices-multiple-estate')[0], {
                removeItemButton: true,
                shouldSort: false,
                searchEnabled: true,
                noChoicesText: 'لا توجد أنواع أخرى',
            });


            const city = new Choices($('#choices-city')[0], {
                removeItemButton: true,
                shouldSort: false,
                searchEnabled: true,
            });
            city.removeActiveItems();
            const firstOption = city.getValue(true);
            if (firstOption) {
                city.removeActiveItemsByValue(firstOption);
            }
            $('#choices-city').change(function() {
                $('.statetxt').val($(this).find(":selected").text())
                const selectedWilayaId = parseInt($('#choices-city').val());

                $.post("{{ route('estate.state') }}", {
                    _token: "{{ csrf_token() }}",
                    state: selectedWilayaId // Send the selected wilaya ID in an array
                }, function(response) {
                    $('#choices-state').html('');
                    response.forEach(el => {
                        $('#choices-state').append('<option value="' + el['name_ar'] + '">' + el[
                            'name_ar'] + '</option>');
                    });
                    console.log(response);
                    const state = new Choices($('#choices-state')[0], {
                        removeItemButton: true,
                        shouldSort: false,
                        searchEnabled: true,
                    });
                });
            });

            $('#choices-multiple-estate').change(function() {
                const selectedWilayaId = $('#choices-multiple-estate').val();
                console.log(selectedWilayaId);

                $.post("{{ route('estate.model') }}", {
                    _token: "{{ csrf_token() }}",
                    state: selectedWilayaId
                }, function(response) {
                    console.log(response[0]);
                    $('#choices-type').html('');
                    type.clearStore();

                    response[0].forEach(el => {
                        type.setChoices([{
                            value: el,
                            label: el
                        }], 'value', 'label', false);
                    });
                });
            });
        </script>
        <script>
            function select_district(element) {
                var id = element.value;

                $.ajax({
                    url: "{{ route('ads.get_districts', ':id') }}".replace(':id', id),
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var unitTypeSelect = $("select[name='district_id']");
                        unitTypeSelect.empty();
                        unitTypeSelect.append('<option value="">اختر الحي</option>');
                        if (data && Array.isArray(data.districts) && data.districts.length > 0) {
                            console.log(data.districts);
                            data.districts.forEach(function(district) {
                                unitTypeSelect.append(
                                    `<option value="${district.id}">${district.name_ar}</option>`
                                );
                            });
                        } else {
                            console.warn("لم يتم العثور على بيانات districts بالشكل المتوقع", data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching districts:', error);
                    }
                });
            }
        </script>
      
    @endpush
