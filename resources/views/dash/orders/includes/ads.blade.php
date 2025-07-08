<div class="row">
     

    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="name" class="title-color">{{ __('الاعلان') }}<span class="text-danger"> *</span>
            </label>
            <select class="js-select2-custom form-control" name="ads_id" required>
                <option selected disabled>{{ __('اختر الاعلان') }} </option>
                @foreach ($ads as $ads_item)
                    
                <option value="{{ $ads_item->id }}"  >{{ $ads_item->name}} </option>
                @endforeach 

            </select>
        </div>
    </div>
    
</div>

