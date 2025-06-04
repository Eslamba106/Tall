@extends('layouts.admin')
@section('page-title')
    {{ __('الاعدادات') }}
@endsection
<style>
    .form-control  {
    border-radius: 20px!important;
    margin-bottom: 15px!important;
}
.file-upload-h {
    background: #fff;
    border-radius: 20px;
    padding: 0.4375rem 0.875rem;
}
img#logo-show {
    max-width: 220px;
    margin: 0 auto;
    display: block;
}
</style>
@section('content')
<form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data" id="form_post">
    @csrf
<div class="row">
    <div class="col-12 mt-4">
      <div class="d-lg-flex mt-4 mb-4">
        <div>
        <h2 class="mb-0">{{__('الاعدادات')}}</h2>
        </div>
        <div class="me-auto my-auto mt-lg-0 mt-4">
            <div class="ms-auto my-auto">
            <input type="submit" value="تحديث" class="btn bg-gradient-primary btn-sm mb-0">
            </div>
        </div>
    </div>
    <div class="row mt-4">
                <div class="col-lg-12 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>اسم المتجر :</label>
                                    <input class="form-control " type="text" value="{{ getSetting('system_title') }}" placeholder="اسم المتجر" name="system_title" id="system_title" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>الوصف المتجر</label>
                                    <input class="form-control " type="text" value="{{ getSetting('global_meta_description') }}" placeholder="الوصف المتجر" name="global_meta_description" id="global_meta_description">
                                </div>
                                <div class="col-12 col-sm-6">
                                        <label>الكلمات المفتاحية</label>
                                        <input class="form-control " type="text" value="{{ getSetting('global_meta_keywords') }}" placeholder="الكلمات المفتاحية" name="global_meta_keywords" id="global_meta_keywords">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>لون القالب الأساسي :</label>
                                    <div class="form-check form-switch">
                                        <input class="form-control mb-2" type="color" id="main_color" name="main_color" value="{{getSetting('main_color')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>أطلب الأن :</label>
                                    <div class="form-check form-switch">
                                        <input class="form-control " type="text" value="{{ getSetting('global_txt_m') }}" placeholder="أطلب الأن" name="global_txt_m" id="global_txt_m">
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-6">
                                    <label>عرض صورة المنتج بالعرض الكامل :</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="slider" name="slider" @if (getSetting('slider') == '1') checked @endif>
                                    </div>
                                </div> --}}
                                <div class="col-12 col-sm-6">
                                    <label>حقوق الموقع :</label>
                                    <div class="form-check form-switch">
                                        <input class="form-control " type="text" value="{{ getSetting('global_copyright') }}" placeholder="حقوق الموقع" name="global_copyright" id="global_copyright">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 mt-2 logo-admin">
                                    <div class="row">
                                    <div class="col-lg-12 col-mg-12">
                                        <div class="col-lg-12 col-mg-12">
                                            <label class="mt-4">شعار الموقع</label>
                                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                                ( Logo )
                                            </p>
                                        </div>
                                    <div class="file-upload-h mt-3">
                                            <span class="txt-h button">حدد صورة</span>
                                            <input type="file" name="logo" id="logo" value="{{ getSetting('logo') }}" class="form-control custom-input-file-h" onchange="document.getElementById('logo-show').src = window.URL.createObjectURL(this.files[0])">
                                        </div></div>
                                        <div class="col-lg-12 col-mg-12">
                                            <img id="logo-show" src="{{ asset('uploads/settings/'.getSetting('logo')) }}" width="100%" class="mt-2">
                                        </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>
</form>
@endsection
@push('js-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endpush