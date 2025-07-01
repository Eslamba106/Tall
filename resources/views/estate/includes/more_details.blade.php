        
            <div class="card-body">
                <h5 class="font-weight-bolder">التفاصيل:</h5>
                <div class="row">
                    @if ($theme == 'theme2')
                        <div class="col-sm-12 mb-3">
                            <label class="mt-4">لون السيارة</label>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <input class="form-control" type="text" name="colortxt" id="colortxt"
                                placeholder="لون السيارة ...">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <input class="form-control" type="color" name="colorCode" id="colorCode">
                        </div>
                    @endif
                    @if ($theme == 'theme1')
                        <div class="col-sm-12 mb-2">
                            <label class="mt-2">نوع التعامل</label>
                            <div class="col-lg-12 col-sm-12">
                                <select value="{{ old('methode') }}" class="form-control" data-trigger name="methode"
                                    id="choices-methode" required>
                                    <option value="0" selected>سعر ثابت</option>
                                    <option value="1">قابل للتفاوض</option>
                                    <option value="2">خيار 3</option>
                                </select>
                            </div>

                        </div>
                    @endif



                    {{-- <div class="col-lg-4 col-sm-12 mb-3">
                        <label>سعر 2 :</label>
                        <input class="form-control" type="number" name="price2" id="price2" value="{{$estate->price2}}" min="0" required>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-3">
                        <label>سعر 3 :</label>
                        <input class="form-control" type="number" name="price3" id="price3" value="{{$estate->price3}}" min="0" required>
                    </div> --}}

                    @if ($theme == 'theme2')
                        <div class="col-sm-6 mb-3">
                            <label class="mt-4">الحالة</label>
                            <select value="{{ old('estate') }}" class="form-control" data-trigger name="newer"
                                id="choices-newer" required>
                                <option value="جديد">جديد</option>
                                <option value="مستعمل">مستعمل</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="mt-4">القير :</label>
                            <select value="{{ old('motor') }}" class="form-control" data-trigger name="motor"
                                id="choices-type" required>
                                <option value="يدوي">يدوي</option>
                                <option value="أوتوماتيكي">أوتوماتيكي</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="mt-4">الوقود</label>
                            <select value="{{ old('estate') }}" class="form-control" data-trigger name="gas"
                                id="choices-gas" required>
                                <option value="بنزين">بنزين</option>
                                <option value="هايبرد">هايبرد</option>
                            </select>
                        </div>
                    @endif
                    {{--                     
                    <div class="col-lg-6 col-sm-12">
                        <label class="mt-4">{{$estateProp->name}}</label>
                        <input type="hidden" name="names[{{$estateProp->id}}]" value="{{$estateProp->name}}" required>
                        <input type="hidden" name="ids[{{$estateProp->id}}]" value="{{$estateProp->id}}" required>
                        <input min="0" class="form-control" type="number" value="{{$props ? $props->value:0}}"  placeholder="تحديد {{$estateProp->name}} "  name="props[{{$estateProp->id}}]" id="props-{{$estateProp->id}}" value="" required> 
                    </div>  --}}
                    {{-- @foreach ($estateProps as $estateProp)
                    @php
                    $props = $estateGroupe->where('props',$estateProp->id)->first();
                    @endphp
                    <div class="col-lg-6 col-sm-12">
                        <label class="mt-4">{{$estateProp->name}}</label>
                        <input type="hidden" name="names[{{$estateProp->id}}]" value="{{$estateProp->name}}" required>
                        <input type="hidden" name="ids[{{$estateProp->id}}]" value="{{$estateProp->id}}" required>
                        <input min="0" class="form-control" type="number" value="{{$props ? $props->value:0}}"  placeholder="تحديد {{$estateProp->name}} "  name="props[{{$estateProp->id}}]" id="props-{{$estateProp->id}}" value="" required> 
                    </div>
                    @endforeach --}}

                    @if ($theme == 'theme1')
                        {{-- @if ($estate->goal == 'بيع') --}}
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <label>سعر البيع :</label>
                            <input class="form-control" type="number" name="price" id="price" min="0"
                                required>
                        </div>
                        {{-- @else --}}
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <label>سعر الايجار :</label>
                            <input class="form-control" type="number" name="price" id="price" min="0"
                                required>
                        </div>
                        {{-- @endif --}}
                    @else
                        <div class="col-sm-12 mb-2">
                            <label class="mt-2">السعر عند الاتصال</label>
                            <div class="form-check form-switch my-auto d-flex align-items-center ml-2">
                                <input class="form-check-input show-ipr" type="checkbox" id="contactprice"
                                    name="contactprice">
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-3 ipr-main  ">
                        <label>سعر البيع :</label>
                        <input class="form-control form-ipr" type="number" name="price" id="price" min="0"
                            required>
                    </div>
                    {{-- <div class="col-lg-12 col-sm-12 mb-3">
                        <label>السعر عند الاتصال :</label>
                        <input class="form-control" type="number" name="price2" id="price2" value="{{$estate->price2}}" min="0" required>
                    </div> --}}
                    <div class="col-lg-6  col-sm-6 mb-3  ">
                        <label class="mt-4">التمويل</label>
                        <select value="{{ old('estate') }}" class="form-control" data-trigger name="trade"
                            id="choices-trade" required>
                            <option value="يقبل تمويل">يقبل تمويل</option>
                            <option value="لا يقبل تمويل">لا يقبل تمويل</option>
                        </select>
                    </div>
                    @endif
                    <div class="col-sm-12 mb-3">
                        <label class="mt-4">وصف الاعلان</label>
                        <textarea name="description" class="form-control" id="description" placeholder="وصف الاعلان" style="height: 200px"></textarea>
                    </div>
                </div>
            </div>
        </div>
