@extends('layouts.super')
@section('page-title')
    {{ __('الرئيسية') }}
@endsection

@section('content')
<style>.pu-s h4, .pu-s h3 {
    margin: 0;
}
    h4.title-pu {
    font-size: 0.75em;
    color: #999;
}h3.title-pu {
    FONT-SIZE: 2EM;
    COLOR: #000;
}
    .pusvg svg {
    width: 27px;
    height: 27px;
    fill: #2196F3;
}.pusvg {float: right;
    display: inline-block;
    border: 2px solid #ebf3f9;
    border-radius: 10px;
    padding: 10px;
}h4.title-pu {
    font-size: 0.75em;
    margin-right: 10px;
    color: #000000;
}.pu-s {
    display: flex;
    align-items: center;
}h3.title-pu {
    FONT-SIZE: 3.5EM;
    text-align: center;
    margin: 0;
    color: #4d4d4d;
    font-weight: 500;
}
.dff {
    display: flex;
    align-items: flex-end;
    justify-content: center;
}h4.sub-pu {
    font-size: 0.85em;
    font-weight: 500;
    color: #999;
    margin-right: 5px;
}h3.title-dash {
    color: #000;
    letter-spacing: -0.5px;
    font-size: 1em;
}span.wfdt {
    display: inline-block;
    width: 7px;
    border-radius: 10px;
    height: 7px;
}
/***********/
.pusvgs h4.title-pus {
    font-size: 0.85em;
    font-weight: 500;
    margin-top: 0;
}h3.title-pus {
    font-size: 2em;
    color: #000;
    margin-bottom: 0;
    margin-top: 0;
}h4.sub-pus {
    margin: 0;
    font-size: 0.75em;
    font-weight: 500;
}
/****/
li.dr {
    list-style: none;
    padding: 8px 0;
    position: relative;
}span.xd {
    font-weight: 600;
    font-size: 0.85em;
    color: #000;
    letter-spacing: -0.4px;
}li.dr:before {
    content: '';
    width: 11px;
    height: 11px;
    display: inline-block;
    background: #32a466;
    transform: rotate(45deg);
    margin-left: 7px;
}.active-s h4.title-pu {
    float: right;
    margin: 0;
    margin-top: 5px;
    margin-left: 15px;
}
</style>
<div class="container-fluid py-4">
    <div class="row mt-4">      
      <h5>لوحة تحكم : {{$tenant->username}}</h5>
            <div class="col-lg-8 col-md-4 col-sm-12 mt-4">
                <div class="card">
                  <div class="card-body p-3 position-relative">
                    <div class="card-body p-3">
                      <div class="active-s">
                      <h4 class="title-pu">حالة كود الاحالة:</h4>
                      @if ($affilate->active == 1)
                      <span class="badge-sm badge-success">
                       مفعل
                    </span>
                    @else
                    <span class="badge-sm badge-error">
                      المتجر غير مفعل
                  </span>
                      @endif
                      </div>
                      <input type="text" name="code" id="" class="form-control mt-3" disabled value="https://estate.test/register?aft={{$affilate->code}}">
                      <ul class="titiles-lsi mt-4">
                        <li class="dr"><span class="xd">اسم المستخدم: </span><span class="sdy">{{$user->name}}</span></li>
                        <li class="dr"><span class="xd">سعر الاشتراك الواحد: </span><span class="sdy">{{$affilate->price}} رس</span></li>
                        <li class="dr"><span class="xd">عدد المسجلين: </span><span class="sdy">{{$affilate->number1}}</span></li>
                        <li class="dr"><span class="xd">عدد المشترين: </span><span class="sdy">{{$affilate->number2}}</span></li>
                        <li class="dr"><span class="xd">الرصيد: </span><span class="sdy">{{$affilate->total}} رس</span></li>
                      </ul>
                    </div>
          
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
               <div class="col-lg-12 col-md-4 col-sm-12 ">
                <div class="card">
                  <div class="card-body p-3 position-relative">
                    <div class="card-body p-3">
                      <div>
                        <label for="name">تسجيل الدخول في المتجر:</label>
                        <a href="https://{{$tenantStor->name . '.'. env('HOST_URL')}}/autoLoginBase/{{encrypt($tenant->domain)}}" class="btn bg-gradient-primary btn-sm mb-0 me-2" target="_blanc">لوحة التحكم</a>
                    </div>
                    </div>
          
                  </div>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection

@push('js-page')
<script>// update publish status
  function updatePublishedStatus(el) {
  if (el.checked) {
      var status = 1;
  } else {
      var status = 0;
  }
  $.post('{{route('shopSetting.active',$tenantStor->id)}}', {
          _token: '{{ csrf_token() }}',
          status: status
      },
      function(data) {
          if (data == 1) {
              toastr.success("تم تحديث المتجر","نجاح");
              //window.location.reload();
            } else {
              toastr.error('جرب تحديث الصفحة و حاول مرة أخرى',"حدث خطأ ما");
          }
      });
  }</script>
@endpush