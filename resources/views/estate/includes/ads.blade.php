    <div class="col-lg-12 d-none" id="main_ads">
        <div class="card h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mb-2">
                        <label class="mt-2">نشر الاعلان في المتجر</label>
                        <div class="form-check form-switch my-auto d-flex align-items-center ml-2">
                            <input class="form-check-input" type="checkbox" id="publish" name="publish">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-2">
                        <label class="mt-2">رقم مسؤال مبيعات</label>
                        <input class="form-control" type="number" name="phone3" id="phone3"
                            placeholder="رقم هاتف ..." value="">
                    </div>
                    <div class="col-sm-12 mb-2">
                        <label class="mt-2">رابط فيديو</label>
                        <input class="form-control" type="text" name="video" id="video"
                            placeholder="www.youtube.com">
                    </div>

                    <div class="card-body px-2 pt-0">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <label class="mt-4">الصورة الرئيسية</label>
                                <div class="file-upload-h mt-3">
                                    <span class="txt-h dz-button">حدد صورة</span>
                                    <input type="file" name="is_cover_image" id="is_cover_image"
                                        class="form-control custom-input-file-h" value="off">
                                </div>

                                <img id="upcoverImg" {{-- class="@if (!$estate->thumbnail_image) hidden @endif" --}} width="100%" class="mt-2" />
                            </div>
                            <div class="col-lg-12 col-sm-12 mb-3">
                                <style>
                                    .over-img h6 {
                                        display: none;
                                    }
                                </style>
                                <label class="mt-4">صور المنتج</label>
                                <div class="form-group">
                                    <div class="file-upload-h mt-3">
                                        @php
                                            $images = App\Models\ProductImage::where('estate_id', 1)->get();
                                        @endphp

                                        <div id="fp" class="row"></div>
                                        <span class="txt-h dz-button">تحديد صور المنتج</span>
                                        <input type="file" id="FileDetails"
                                            class="form-control custom-input-file-h FileDetails" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
