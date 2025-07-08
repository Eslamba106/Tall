<div class="row">
     

    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="name" class="title-color">{{ __('العميل') }}<span class="text-danger"> *</span>
            </label>
            <select class="js-select2-custom form-control" name="customer_id" required>
                <option selected disabled>{{ __('اختر العميل') }} </option>
                @foreach ($customers as $customer)
                    
                <option value="{{ $customer->id }}"  >{{ $customer->name}} </option>
                @endforeach 

            </select>
        </div>
    </div>
    
</div>

