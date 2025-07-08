<div class="row   ">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label for="token" class="title-color">{{ translate('العنوان') }} <span class="text-danger">
                    *</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-4">
        <div class="form-group">
            <label for="token" class="title-color ">{{ __('الماركة') }}</label>
            <select class="js-select2-custom form-control" name="car_type_id" onchange="select_models(this)" required>
                <option selected disabled>{{ __('اختر العميل') }} </option>
                @foreach ($car_types as $car_type)
                    <option value="{{ $car_type->id }}">{{ $car_type->name ?? $car_type->name_ar }} </option>
                @endforeach

            </select>

        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-4">
        <div class="form-group">
            <label for="token" class="title-color">{{ __('نوع السيارة') }}</label>
            <select class="js-select2-custom form-control" name="car_model_id" required>
                <option selected disabled>{{ __('اختر نوع السيارة') }} </option>


            </select>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-4">
        <div class="form-group">
            <label for="token" class="title-color">{{ __('الموديل') }}</label>
            <input type="number" class="form-control" name="model_year" value="{{ old('model_year') }}">
        </div>
    </div>



</div>
<script>
    $
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
