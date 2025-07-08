 <div class="row">
     <div class="col-sm-6 mb-2">
         <label class="mt-2">نشر الاعلان في المتجر</label>
         <label class="switcher mx-auto">
             <input type="checkbox" onclick="sale_price_trans(this)" class="switcher_input" name="price_when_call"
                 value="1">
             <span class="switcher_control"></span>
         </label>
         {{-- <label class="mt-2">نشر الاعلان في المتجر</label>
         <div class="form-check form-switch my-auto d-flex align-items-center ml-2">
             <input class="form-check-input" type="checkbox" id="publish" name="publish">
         </div> --}}
     </div>
     <div class="col-sm-6 mb-2">
         <label class="mt-2">رقم مسؤال مبيعات</label>
         <input class="form-control" type="number" name="phone" id="phone3" placeholder="رقم هاتف ..."
             value="">
     </div>
     <div class="col-sm-6 mb-2">
         <label class="mt-2">رابط فيديو</label>
         <input class="form-control" type="text" name="video_link" id="video" placeholder="www.youtube.com">
     </div>


     <div class="col-lg-6 col-sm-12"> 
         <div class="file-upload-h mt-3">
             <span class="txt-h dz-button">حدد صورة</span>
             <input type="file" name="thumbnail" id="is_cover_image" class="form-control custom-input-file-h"
                 value="off" required>
         </div>

       
     </div>
     <div class="col-lg-6 col-sm-12 mb-3">
        
         <div class="form-group">
             <div class="file-upload-h mt-3">
                 @php
                     $images = App\Models\ProductImage::where('estate_id', 1)->get();
                 @endphp

                 <div id="fp" class="row"></div>
                 <span class="txt-h dz-button">تحديد صور المنتج</span>
                 <input type="file" id="FileDetails" name="images[]"
                     class="form-control custom-input-file-h FileDetails" multiple>
             </div>
         </div>
     </div>
 </div>
 
