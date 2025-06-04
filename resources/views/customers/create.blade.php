@extends('layouts.admin')
@section('page-title')
    {{ __('اضافة عميل جديد') }}
@endsection
@push('css-page')
<link rel="stylesheet" href="{{asset('assets/css/choices.min.css')}}">
<style>
    
.modal-ai .modal-content.act:after {content: 'جار انشاء الاعلان';padding: 0.3em 2em;position: absolute;top: 50%;left: 50%;background: #ffffff;transform: translate(-50%, -50%);border-radius: 50px;z-index: 9999;font-size: 0.9em;}
li.data-row-div {
    list-style: none;
    display: inline-block;
    padding: 10px 20px;
    margin: 0 10px;
    font-weight: 600;
    background: #ffffff;
    border-radius: 10px;    cursor: pointer;
}
ul.diver-list {
    padding: 0;
}
li.data-row-div.active {
    color: #03a9f4;
    background: hsl(199deg 98% 48% / 22%);
    outline: 2px solid #03a9f4;
}
li.data-row-div p {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
}
.card-diver-main {
    display: none;
    position: relative;
    margin-top: 30px;
    transition: 0.3s easy;
    opacity: 0;
}.card-diver-main.active {
    display: flex;
    top: 0;
    opacity: 1;
}
ul.diver-list.hidden-list li.data-row-div {
    pointer-events: none;
    opacity: 0.6;
}input#phonecode {
    background-color: #fff;
    width: max-content;
    min-width: auto;
    display: inline-block;
    float: left;
    max-width: 68px;
    text-align: center;
    font-weight: 600;margin-right: 10px}.phone-sys {
    display: flex
;
}
</style>
@endpush
@section('content')

<div class="loadinder-thumb"></div>
<div class="loadinder"><span>جار التعديل ...</span></div>


<form action="{{route('customers.store')}}" method="POST">
@csrf
    <div class="row">
        <div class="col-lg-6">
            <h3>اضافة عميل جديد</h3>
        </div>
        <div class="col-lg-6 text-right d-flex  justify-content-end align-items-center">
      
            <input type="submit" class="btn bg-gradient-primary mb-0" value="نشر">
        </div>
    </div>
<div class="row mt-4">
    <div class="col-lg-12 mt-lg-0 mt-4">
        <div class="card card-diver-main diver-props active">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <label>اسم العميل :</label>
                        <input placeholder="اسم العميل" class="form-control" type="text" name="user" id="user" value="{{old('user')}}" required>
                    </div>
                    {{-- <div class="col-lg-6 col-sm-12 mb-3">
                        <label>نوع العميل :</label>
                        <select
                        value="{{old('type')}}"
                        class="form-control"
                        data-trigger
                        name="type"
                        id="choices-type"
                        required
                        >
                        <option value="مالك عقار" selected>مالك عقار</option>
                        <option value="مشتري">مشتري</option>
                        <option value="مستأجر">مستأجر</option>
                        <option value="مكتب">مكتب</option>
                        <option value="وسيط">وسيط</option>
                        <option value="وكيل">وكيل</option>
                        </select>
                    </div> --}}

                    <div class="col-lg-12 col-sm-12">
                        <label>رقم الهاتف :</label>
                        <div class="phone-sys">
                        <input placeholder="رقم الهاتف" class="form-control" type="text" name="phone" id="phone" value="{{old('phone')}}" required>
                        <input class="form-control" type="text" name="phonecode" id="phonecode" value="+966" disabled required>
                    </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 mt-4">
                        <label>الملاحظات :</label>
                        <textarea placeholder="ملاحظة حول العميل" class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div></div>
        </div>
    </div>
</div>
</form>

@endsection
@push('js-page')
<script  src="{{asset('assets/js/choices.min.js')}}"></script>
<script>
const type = new Choices($('#choices-type')[0], {
    removeItemButton: true,shouldSort: false,
    searchEnabled: false,
});
const firstOption = type.getValue(true);
if (firstOption) {
    type.removeActiveItemsByValue(firstOption); 
}
</script>
@endpush