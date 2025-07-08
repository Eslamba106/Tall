<div class="row   " >
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group"  >
            <label for="token" class="title-color">{{ translate('الاسم') }} <span class="text-danger"> *</span></label>
            <input type="text" class="form-control" name="customer_name"  value="{{  old('customer_name') }}">
        </div>
    </div>
 
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="token" class="title-color ">{{ __('رقم الجوال') }}</label>
            <input type="text" class="form-control " name="customer_phone" value="{{  old('customer_phone') }}"> 
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="token" class="title-color">{{ __('البريد الالكتروني') }}</label>
            <input type="email" class="form-control" name="customer_email" value="{{  old('customer_email') }}">
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="token" class="title-color">{{ __('ملاحظات') }}</label>
            <input type="text" class="form-control" name="customer_note" value="{{  old('customer_note') }}">
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="token" class="title-color">{{ __('المدينة') }}</label>
            <input type="text" class="form-control" name="customer_city" value="{{  old('customer_city') }}">
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="token" class="title-color">{{ __('الحي') }}</label>
            <input type="text" class="form-control" name="customer_district" value="{{  old('customer_district') }}">
        </div>
    </div>
   
 
</div>

