@extends('store.theme1.layouts.store')
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
.phone-flex {
    display: flex
;
    width: 100%;
} .form-control#prif {
    max-width: 65px;
    margin-right: 15px;
}
.form-control{
    padding: 14px 13px;
    border-radius: 20px;
    margin-bottom: 12px;
    display: inline-block;
    border: 1px solid #d9dee3;
}
 .choices[data-type*=select-one]{
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
      @include('store.theme1.header')
       <div class="container container-requst">
        <div class="title-requst">
            <h1 class="title-rq">طلب عقار</h1>
        </div>
        <form action="{{route('requestStore')}}" method="post">
            @csrf
            <div class="card-rp">
                <h2 class="rp-title">معلومات الطلب</h2>
            <div class="col-lg-12">
                <label>نوع العقار :</label>
                <select
                value="{{old('type')}}"
                class="form-control"
                data-trigger
                name="type"
                id="choices-type"
                required
                >
                <option value="تجاري" selected>تجاري</option>
                <option value="سكني">سكني</option>
                </select>
            </div>
            <div class="col-lg-12">
                <label>المعاملة :</label>
                <select
                value="{{old('goal')}}"
                class="form-control"
                data-trigger
                name="goal"
                id="choices-goal"
                required
                >
                <option value="ايجار" selected>ايجار</option>
                <option value="بيع">بيع</option>
                </select>
            </div>
            <div class="col-lg-12">
                <label>المنتج العقاري :</label>
                <select
                value="{{old('estate')}}"
                class="form-control"
                data-trigger
                name="estate"
                id="choices-multiple-estate"
                required
                >
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
                </select>
            </div>
            </div>
            <div class="card-rp">
                <h2 class="rp-title">المنطقة</h2>
                <div class="col-sm-12">
                    <label class="mt-2">المدينة</label>
                    <input type="hidden" name="statetxt" class="statetxt">
                    <select
                    class="form-control"
                    data-trigger
                    name="state"
                    id="choices-city"
                    required
                    >
                        <option value="3">الرياض</option>
                        <option value="5">الطائف</option>
                        <option value="6">مكة المكرمة</option>
                        <option value="10">حائل</option>
                        <option value="11">بريدة</option>
                        <option value="13">الدمام</option>
                        <option value="14">المدينة المنورة</option>
                        <option value="15">ابها</option>
                        <option value="17">جازان</option>
                        <option value="18">جدة</option>
                        <option value="24">المجمعة</option>
                        <option value="31">الخبر</option>
                        <option value="80">عنيزة</option>
                        <option value="168">الارطاوية</option>
                        <option value="227">الظهران</option>
                        <option value="243">بقيق</option>
                        <option value="253">صلاصل</option>
                        <option value="270">الزلفي</option>
                        <option value="306">الغاط</option>
                        <option value="377">رابغ</option>
                        <option value="443">ثادق</option>
                        <option value="444">الروبضة / رغبة</option>
                        <option value="796">ملهم</option>
                        <option value="828">الدرعية</option>
                        <option value="834">العمارية</option>
                        <option value="990">المزاحمية</option>
                        <option value="1061">الخرج</option>
                        <option value="1801">محايل</option>
                        <option value="2421">الرس</option>
                        <option value="2522">يدمة</option>
                        <option value="3417">نجران</option>
                        <option value="3479">صبيا</option>
                        <option value="3499">ضمد</option>
                        <option value="3525">ابو عريش</option>
                        <option value="3618">البديع والقرفي</option>
                        <option value="3652">احد المسارحة</option>
                        <option value="3677">الاحساء</option>
                        <option value="23695">مدينة الملك عبدالله الاقتصادية</option>
                    </select>
                </div>     
                <div class="col-sm-12">
                    <label class="mt-2">الحي</label>
                    <select
                    class="form-control"
                    data-trigger
                    name="city"
                    id="choices-state"
                    required
                    >
                        <option value="0" disabled>حدد المدينة أولا</option>
                    </select>
                </div>
            </div>
            <div class="card-rp">
              <h2 class="rp-title">معلومات العميل</h2>
              <div class="col-lg-12 col-sm-12 mb-3">
                <label>الاسم :</label>
                <input placeholder="الاسم الكامل" class="form-control" type="text" name="name" id="name" value="{{old('name')}}" required>
            </div>
            <div class="col-lg-12 col-sm-12 mb-3">
              <label>رقم الهاتف :</label>
              <div class="phone-flex mb-4">
                <input class="form-control mb-2 mt-2" type="number" name="phone" id="phone" placeholder="رقم الهاتف" required="">
                <input class="form-control mb-2 mt-2" type="text" name="prif" id="prif" value="+966" disabled="">
               </div>
              </div>
              <div class="col-lg-12 col-sm-12 mb-3">
                <label>تفاصيل العقار :</label>
                <textarea name="notes" id="form-control" class="form-control form-control-txterea"></textarea>
                </div>
                <div class="col-lg-12 col-sm-12 mb-3">
                  <input type="submit" class="btn main-btn" value="ارسال الطلب">
                </div>
  
            </div>
        </form>
       </div>

    @endsection
    @push('js-main')
    <script src="{{asset('assets/js/choices.min.js')}}"></script>
    <script src="{{asset('assets/js/rangle-slider.js')}}"></script>
    <script>
        const type = new Choices($('#choices-type')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: false,
      });
      const goal = new Choices($('#choices-goal')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: false,
      });
      const estate = new Choices($('#choices-multiple-estate')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
        noChoicesText: 'لا توجد أنواع أخرى',
      });


      const city = new Choices($('#choices-city')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
      });
      city.removeActiveItems();
      const firstOption = city.getValue(true);
        if (firstOption) {
            city.removeActiveItemsByValue(firstOption); 
        }
      $('#choices-city').change(function(){
        $('.statetxt').val($(this).find(":selected").text())
    const selectedWilayaId = parseInt($('#choices-city').val());

     $.post("{{ route('estate.state') }}", {
      _token: "{{ csrf_token() }}",
      state: selectedWilayaId // Send the selected wilaya ID in an array
    }, function(response) {
        $('#choices-state').html('');
        response.forEach(el => {
            $('#choices-state').append('<option value="'+el['name_ar']+'">'+el['name_ar']+'</option>');
        });
    console.log(response);
    const state = new Choices($('#choices-state')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
      });
    });
});

   </script>
     @endpush