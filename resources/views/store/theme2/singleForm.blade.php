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
<div class="full-h" >
  @include('store.theme2.header')
   <div class="container container-requst" style="
   min-height: 100vh!important;    max-width: 550px;
   ">
    <div class="title-requst">
      <h1 class="title-rq">{{$estate->name}}</h1>
    </div>
    <div class="card-rp">
<form action="{{route('products.store',$estate->id)}}" method="POST">
    @csrf
    <div class="col-lg-12 col-md-12 mt-3 px-0">
        <input class="form-control mb-2 mt-2" type="text" name="name" id="name" placeholder="الاسم الكامل">
        <div class="phone-flex mb-4">
            <input class="form-control mb-2 mt-2" type="number" name="phone" id="phone" placeholder="رقم الهاتف" required>
            <input class="form-control mb-2 mt-2" type="text" name="prif" id="prif" value="+966" disabled>
           </div>
           <div class="sell-action">
            <input class="btn  btn-main bg-gradient-primary btn-sm mb-0" type="submit" value="طلب الأن">
        </div>
        </div>
   </form></div></div>
   @endsection
   @push('js-main')
   @endpush