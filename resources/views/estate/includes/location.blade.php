
    <div class="card-body">
        <h5 class="font-weight-bolder">الموقع:</h5>
        <div class="row">
            <div class="col-sm-12">
                <label class="mt-2">المدينة</label>
                <select class="form-control" data-trigger name="state" id="choices-city" required>
                    <option {{ $estate->state == 3 ? 'selected' : '' }} value="3">الرياض</option>
                    <option {{ $estate->state == 5 ? 'selected' : '' }} value="5">الطائف</option>
                    <option {{ $estate->state == 6 ? 'selected' : '' }} value="6">مكة المكرمة
                    </option>
                    <option {{ $estate->state == 10 ? 'selected' : '' }} value="10">حائل</option>
                    <option {{ $estate->state == 11 ? 'selected' : '' }} value="11">بريدة</option>
                    <option {{ $estate->state == 13 ? 'selected' : '' }} value="13">الدمام</option>
                    <option {{ $estate->state == 14 ? 'selected' : '' }} value="14">المدينة المنورة
                    </option>
                    <option {{ $estate->state == 15 ? 'selected' : '' }} value="15">ابها</option>
                    <option {{ $estate->state == 17 ? 'selected' : '' }} value="17">جازان</option>
                    <option {{ $estate->state == 18 ? 'selected' : '' }} value="18">جدة</option>
                    <option {{ $estate->state == 24 ? 'selected' : '' }} value="24">المجمعة</option>
                    <option {{ $estate->state == 31 ? 'selected' : '' }} value="31">الخبر</option>
                    <option {{ $estate->state == 80 ? 'selected' : '' }} value="80">عنيزة</option>
                    <option {{ $estate->state == 168 ? 'selected' : '' }} value="168">الارطاوية
                    </option>
                    <option {{ $estate->state == 227 ? 'selected' : '' }} value="227">الظهران</option>
                    <option {{ $estate->state == 243 ? 'selected' : '' }} value="243">بقيق</option>
                    <option {{ $estate->state == 253 ? 'selected' : '' }} value="253">صلاصل</option>
                    <option {{ $estate->state == 270 ? 'selected' : '' }} value="270">الزلفي</option>
                    <option {{ $estate->state == 306 ? 'selected' : '' }} value="306">الغاط</option>
                    <option {{ $estate->state == 377 ? 'selected' : '' }} value="377">رابغ</option>
                    <option {{ $estate->state == 443 ? 'selected' : '' }} value="443">ثادق</option>
                    <option {{ $estate->state == 444 ? 'selected' : '' }} value="444">الروبضة / رغبة
                    </option>
                    <option {{ $estate->state == 796 ? 'selected' : '' }} value="796">ملهم</option>
                    <option {{ $estate->state == 828 ? 'selected' : '' }} value="828">الدرعية</option>
                    <option {{ $estate->state == 834 ? 'selected' : '' }} value="834">العمارية</option>
                    <option {{ $estate->state == 990 ? 'selected' : '' }} value="990">المزاحمية
                    </option>
                    <option {{ $estate->state == 1061 ? 'selected' : '' }} value="1061">الخرج</option>
                    <option {{ $estate->state == 1801 ? 'selected' : '' }} value="1801">محايل</option>
                    <option {{ $estate->state == 2421 ? 'selected' : '' }} value="2421">الرس</option>
                    <option {{ $estate->state == 2522 ? 'selected' : '' }} value="2522">يدمة</option>
                    <option {{ $estate->state == 3417 ? 'selected' : '' }} value="3417">نجران</option>
                    <option {{ $estate->state == 3479 ? 'selected' : '' }} value="3479">صبيا</option>
                    <option {{ $estate->state == 3499 ? 'selected' : '' }} value="3499">ضمد</option>
                    <option {{ $estate->state == 3525 ? 'selected' : '' }} value="3525">ابو عريش
                    </option>
                    <option {{ $estate->state == 3618 ? 'selected' : '' }} value="3618">البديع والقرفي
                    </option>
                    <option {{ $estate->state == 3652 ? 'selected' : '' }} value="3652">احد المسارحة
                    </option>
                    <option {{ $estate->state == 3677 ? 'selected' : '' }} value="3677">الاحساء</option>
                    <option {{ $estate->state == 23695 ? 'selected' : '' }} value="23695">مدينة الملك
                        عبدالله الاقتصادية</option>
                </select>
            </div>
            <div class="col-sm-12">
                <label class="mt-2">الحي</label>
                <select class="form-control" data-trigger name="city" id="choices-state" required>
                    <option value="0" disabled>حدد المدينة أولا</option>
                </select>
            </div>
            <div class="col-sm-12 mt-4">
                <label class="mt-2">الخريطة</label>
                <input type="text" class="form-control mb-2" id="searchInput" placeholder="بحث عن المدينة">
                <div id="map" style="height: 300px; width: 100%;"></div>
                <input type="hidden" id="coordinates" name="map">
            </div>
        </div>

    </div>
 