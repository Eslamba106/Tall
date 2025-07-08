<div class="row   ">
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label for="token" class="title-color ">{{ __('المدينة') }}</label>
            <select class="js-select2-custom form-control" name="city_id" onchange="select_district(this)" required>
                <option selected disabled>{{ __('اختر المدينة') }} </option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name ?? $city->name_ar }} </option>
                @endforeach

            </select>

        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label for="token" class="title-color ">{{ __('الحي') }}</label>
            <select class="js-select2-custom form-control" name="district_id" required>
                <option selected disabled>{{ __('اختر الحي') }} </option> 
            </select>

        </div>
    </div>
</div>
<script>
    function select_district(element) {
        var id = element.value;

        $.ajax({
            url: "{{ route('ads.get_districts', ':id') }}".replace(':id', id),
            type: "GET",
            dataType: "json",
            success: function(data) {
                var unitTypeSelect = $("select[name='district_id']");
                unitTypeSelect.empty();
                unitTypeSelect.append('<option value="">اختر الحي</option>');
                if (data && Array.isArray(data.districts) && data.districts.length > 0) {
                    console.log(data.districts);
                    data.districts.forEach(function(district) {
                        unitTypeSelect.append(
                            `<option value="${district.id}">${district.name_ar}</option>`
                        );
                    });
                } else {
                    console.warn("لم يتم العثور على بيانات districts بالشكل المتوقع", data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching districts:', error);
            }
        });
    }
</script>
