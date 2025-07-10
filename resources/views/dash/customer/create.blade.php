@extends('dash.layouts.back-end.app')
@section('title', translate('category'))

@push('css_or_js')
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-10">
                <img src="{{ asset('/assets/back-end/img/brand-setup.png') }}" alt="">
                {{ __('اضافة عميل') }}
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                        <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="form-group ">
                                            <label class="title-color">{{ __('اسم العميل') }}<span
                                                    class="text-danger">*</span> </label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="{{ __('عميل جديد') }}" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div class="form-group ">
                                            <label class="title-color">{{ __('الهاتف') }}<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                class="form-control" placeholder="{{ __('ادخل الهاتف') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="title-color">{{ __('البريد الالكتروني') }}<span
                                                class="text-danger">*</span> </label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="{{ __('ادخل البريد الالكتروني') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="title-color">{{ __('المدينة') }}<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="city" value="{{ old('city') }}"
                                            class="form-control" placeholder="{{ __('ادخل المدينة') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="title-color">{{ __('الحي') }}<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="district" value="{{ old('district') }}"
                                            class="form-control" placeholder="{{ __('ادخل الحي') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="title-color">{{ __('ملاحظات') }}<span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" name="note" value="{{ old('note') }}" class="form-control"
                                            placeholder="{{ __('ادخل ملاحظات') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <button type="reset" id="reset"
                                    class="btn btn-secondary">{{ __('الغاء') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('حفظ') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
