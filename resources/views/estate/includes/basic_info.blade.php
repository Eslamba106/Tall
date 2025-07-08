@if ($theme == 'theme1')
    <div class="col-lg-4 col-sm-12">
        <label>المنتج العقاري :</label>
        <select value="{{ old('estate') }}" class="form-control" data-trigger name="estate_product_id" id="choices-multiple-estate"
            required>
            @foreach ($estate_products as $estate_product)
                <option value="{{ $estate_product->id }}">{{ $estate_product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 col-sm-12">
        <label>نوع العقار :</label>
        <select value="{{ old('type') }}" class="form-control" data-trigger name="type" id="choices-type" required>
            <option value="تجاري" selected>تجاري</option>
            <option value="سكني">سكني</option>
        </select>
    </div>
    <div class="col-lg-4 col-sm-12">
        <label>المعاملة :</label>
        <select value="{{ old('goal') }}" class="form-control" data-trigger name="goal" id="choices-goal" required>
            <option value="ايجار" selected>ايجار</option>
            <option value="بيع">بيع</option>
        </select>
    </div>
@else
    <div class="col-lg-4 col-sm-12">
        <label>الماركة:</label>
        <select value="{{ old('estate') }}" onchange="select_models(this)" class="form-control" data-trigger
            name="estate" id="choices-multiple-estate" required>
            <option value="">الماركة</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name ?? $type->name_ar }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 col-sm-12">
        <label>نوع السيارة :</label>
        <select value="{{ old('type') }}" class="form-control"   name="type"   required
            style="padding: 0.7375rem 0.875rem;">
            <option value="" selected>نوع السيارة</option>
        </select>
    </div>
    <div class="col-lg-4 col-sm-12">
        <label>الموديل :</label>
        <input class="form-control" style="
                        padding: 0.77rem 0.875rem;
                    "
            type="number" name="model" id="model" placeholder="موديل السيارة ...">
    </div>
@endif

<script>
function select_models(element) {
    var id = element.value;

    $.ajax({
        url: "{{ route('ads.get_models', ':id') }}".replace(':id', id),
        type: "GET",
        dataType: "json",
        success: function(data) {
            var unitTypeSelect = $("select[name='type']");
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
