@extends('layouts.admin')
@section('page-title')
    {{ __('تعديل الاعلان') }}
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/css/choices.min.css') }}">
    <link href="{{ asset('assets/css/summernote-lite.css') }}" rel="stylesheet">
    <style>
        .modal-ai .modal-content.act:after {
            content: 'جار انشاء الاعلان';
            padding: 0.3em 2em;
            position: absolute;
            top: 50%;
            left: 50%;
            background: #ffffff;
            transform: translate(-50%, -50%);
            border-radius: 50px;
            z-index: 9999;
            font-size: 0.9em;
        }

        li.data-row-div {
            list-style: none;
            display: inline-block;
            padding: 10px 20px;
            margin: 0;
            font-weight: 600;
            background: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            width: auto;
            flex: 1;
            margin: 0 5px;
            text-align: center;
            color: #000;
        }

        ul.diver-list {
            padding: 0;
            display: flex;
        }

        li.data-row-div.active {
            color: #32a466;
            background: hsl(0deg 0% 100%);
            border-bottom: 4px solid #32a466;
            border-radius: 0;
        }

        li.data-row-div p {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
        }

        .card-diver-main {
            display: none;
            position: relative;
            margin-top: 10px;
            transition: 0.3s easy;
            opacity: 0;
        }

        .card-diver-main.active {
            display: flex;
            top: 0;
            opacity: 1;
        }

        div#map {
            height: 300px;
        }
    </style>
@endpush
@section('content')
    @php
        $theme = getSetting('theme');
    @endphp
    <div class="loadinder-thumb"></div>
    <div class="loadinder"><span>جار نشر الاعلان ...</span></div>


    <form action="{{ route('estate.update' , $estate->id)  }}" method="POST" enctype="multipart/form-data" class="addProducts" id="form_post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <h3>تعديل اعلان</h3>
            </div>
            <div class="col-lg-6 text-right d-flex  justify-content-end align-items-center">

                <button type="button" id="publisher" class="btn bg-gradient-primary mb-0">نشر</button>
            </div>
        </div>
        <ul class="nav nav-tabs w-fit-content mb-4">
            <li class="nav-item">
                <a class="nav-link type_link main_active" href="#" id="basic_info">المعلومات الاساسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link type_link " href="#" id="details">التفاصيل</a>
            </li>
            <li class="nav-item">
                <a class="nav-link type_link " href="#" id="main_location">الموقع</a>
            </li>
            <li class="nav-item">
                <a class="nav-link type_link " href="#" id="share_ads">نشر الاعلان في المتجر</a>
            </li>
        </ul>

        <div class="row mt-4">
            <div class="col-lg-8 mt-lg-0">
                <div class="diver-change">
                </div>
                {{-- <div class="card card-diver-main diver-props active">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">المعلومات الأساسية:</h5>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 mb-3">
                                <label>العنوان :</label>

                                <input disabled class="form-control" type="text" name="name" id="name"
                                    value="{{ $estate->name }}" required>
                            </div>
                            @if ($theme == 'theme2')
                                <div class="col-lg-4 col-sm-12">
                                    <label>الماركة :</label>
                                    <input class="form-control" type="text" id="estate" value="{{ $types->name }}"
                                        disabled>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>نوع السيارة :</label>
                                    <input class="form-control" type="text" name="type" id="type"
                                        value="{{ $estate->type }}" disabled>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>الموديل :</label>
                                    <input class="form-control" type="text" name="model" id="model"
                                        value="{{ $estate->model }}" disabled>
                                </div>
                            @else
                                <div class="col-lg-4 col-sm-12">
                                    <label>المنتج العقاري :</label>
                                    <input class="form-control" type="text" id="estate" value="{{ $types->name }}"
                                        disabled>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>نوع العقار :</label>
                                    <input class="form-control" type="text" name="type" id="type"
                                        value="{{ $estate->type }}" disabled>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>المعاملة :</label>
                                    <input class="form-control" type="text" name="goal" id="goal"
                                        value="{{ $estate->goal }}" disabled>
                                </div>
                            @endif
                            <div class="card-body pt-0">

                            </div>
                        </div>
                    </div>

                </div> --}}
                <!-- <div class="card card-diver-main diver-props active">
                                        <div class="card-body">
                                            <h5 class="font-weight-bolder">التفاصيل:</h5>
                                            <div class="row">
                                                @if ($theme == 'theme2')
    <div class="col-sm-12 mb-3">
                                                        <label class="mt-4">لون السيارة</label>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <input class="form-control" type="text" name="colortxt" id="colortxt"
                                                            value="{{ $estate->colortxt }}" placeholder="لون السيارة ...">
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <input class="form-control" type="color" name="colorCode" id="colorCode"
                                                            value="{{ $estate->color }}">
                                                    </div>
    @endif
                                                                                        @if ($theme == 'theme1')
    <div class="col-sm-12 mb-2">
                                                        <label class="mt-2">نوع التعامل</label>
                                                        <div class="col-lg-12 col-sm-12">
                                                            <select value="{{ old('methode') }}" class="form-control" data-trigger
                                                                name="methode" id="choices-methode" required>
                                                                <option value="0" selected>سعر ثابت</option>
                                                                <option value="1">قابل للتفاوض</option>
                                                                <option value="2">خيار 3</option>
                                                            </select>
                                                        </div>

                                                    </div>
    @endif



                                                 {{--  <div class="col-lg-4 col-sm-12 mb-3">
                        <label>سعر 2 :</label>
                        <input class="form-control" type="number" name="price2" id="price2" value="{{$estate->price2}}" min="0" required>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-3">
                        <label>سعر 3 :</label>
                        <input class="form-control" type="number" name="price3" id="price3" value="{{$estate->price3}}" min="0" required>
                    </div>  --}}

                                                @if ($theme == 'theme2')
    <div class="col-sm-6 mb-3">
                                                        <label class="mt-4">الحالة</label>
                                                        <select value="{{ old('estate') }}" class="form-control" data-trigger name="newer"
                                                            id="choices-newer" required>
                                                            <option value="جديد" @if ($estate->newer == 'جديد') selected @endif>جديد
                                                            </option>
                                                            <option value="مستعمل" @if ($estate->newer == 'مستعمل') selected @endif>مستعمل
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="mt-4">القير :</label>
                                                        <select value="{{ old('motor') }}" class="form-control" data-trigger name="motor"
                                                            id="choices-type" required>
                                                            <option value="يدوي" @if ($estate->motor == 'يدوي') selected @endif>يدوي
                                                            </option>
                                                            <option value="أوتوماتيكي" @if ($estate->motor == 'أوتوماتيكي') selected @endif>
                                                                أوتوماتيكي</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="mt-4">الوقود</label>
                                                        <select value="{{ old('estate') }}" class="form-control" data-trigger name="gas"
                                                            id="choices-gas" required>
                                                            <option value="بنزين" @if ($estate->gas == 'بنزين') selected @endif>بنزين
                                                            </option>
                                                            <option value="هايبرد" @if ($estate->gas == 'هايبرد') selected @endif>هايبرد
                                                            </option>
                                                        </select>
                                                    </div>
    @endif
                                                @foreach ($estateProps as $estateProp)
    @php
        $props = $estateGroupe->where('props', $estateProp->id)->first();
    @endphp
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label class="mt-4">{{ $estateProp->name }}</label>
                                                        <input type="hidden" name="names[{{ $estateProp->id }}]"
                                                            value="{{ $estateProp->name }}" required>
                                                        <input type="hidden" name="ids[{{ $estateProp->id }}]" value="{{ $estateProp->id }}"
                                                            required>
                                                        <input min="0" class="form-control" type="number"
                                                            value="{{ $props ? $props->value : 0 }}"
                                                            placeholder="تحديد {{ $estateProp->name }} " name="props[{{ $estateProp->id }}]"
                                                            id="props-{{ $estateProp->id }}" value="" required>
                                                    </div>
    @endforeach

                                                @if ($theme == 'theme1')
    @if ($estate->goal == 'بيع')
    <div class="col-lg-12 col-sm-12 mb-3">
                                                            <label>سعر البيع :</label>
                                                            <input class="form-control" type="number" name="price" id="price"
                                                                value="{{ $estate->price }}" min="0" required>
                                                        </div>
@else
    <div class="col-lg-12 col-sm-12 mb-3">
                                                            <label>سعر الايجار :</label>
                                                            <input class="form-control" type="number" name="price" id="price"
                                                                value="{{ $estate->price }}" min="0" required>
                                                        </div>
    @endif
@else
    <div class="col-sm-12 mb-2">
                                                        <label class="mt-2">السعر عند الاتصال</label>
                                                        <div class="form-check form-switch my-auto d-flex align-items-center ml-2">
                                                            <input class="form-check-input show-ipr" type="checkbox" id="contactprice"
                                                                name="contactprice"@if ($estate->price == 0) checked @endif>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-lg-12 col-sm-12 mb-3 ipr-main @if ($estate->price == 0) d-none @endif ">
                                                        <label>سعر البيع :</label>
                                                        <input class="form-control form-ipr" type="number" name="price" id="price"
                                                            value="{{ $estate->price }}" min="0" required>
                                                    </div>
                                                    {{-- <div class="col-lg-12 col-sm-12 mb-3">
                        <label>السعر عند الاتصال :</label>
                        <input class="form-control" type="number" name="price2" id="price2" value="{{$estate->price2}}" min="0" required>
                    </div> --}}
                                                    <label class="mt-4">التمويل</label>
                                                    <select value="{{ old('estate') }}" class="form-control" data-trigger name="trade"
                                                        id="choices-trade" required>
                                                        <option value="يقبل تمويل" @if ($estate->trade == 'يقبل تمويل') selected @endif>يقبل
                                                            تمويل</option>
                                                        <option value="لا يقبل تمويل" @if ($estate->trade == 'لا يقبل تمويل') selected @endif>لا
                                                            يقبل تمويل</option>
                                                    </select>
    @endif
                                                <div class="col-sm-12 mb-3">
                                                    <label class="mt-4">وصف الاعلان</label>
                                                    <textarea name="description" class="form-control" id="description" placeholder="وصف الاعلان" style="height: 200px">{{ $estate->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                -->
                <div class="card card-diver-main diver-props active   " id="more-details">
                    @include('estate.includes.more_details')
                </div>
                <div class="card card-diver-main diver-props active d-none" id="location">
                    @include('estate.includes.location')
                </div>

            </div>
            @php
                $images = App\Models\ProductImage::where('estate_id', $estate->id)->get();
            @endphp
            @include('estate.includes.ads')
        </div>
    </form>

    <div class="modal fade show" id="create-model" tabindex="-1" aria-hidden="true">
        <div class="modal-bg" style=""></div>
        <div class="modal-dialog mt-lg-10">
            <div class="modal-content">
                <form action="https://app1.az.test/admin/Categorie/create" method="POST">
                    <input type="hidden" name="_token" value="PnhVIhYczp7nDuU8q3X5yuZa6gZsS1qESYt1v4Eo"
                        autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">اضافة تصنيف</h5>
                    </div>
                    <div class="modal-body">
                        <p><strong>اسم التصنيف</strong></p>
                        <input name="name" type="text" placeholder="اسم التصنيف الجديد..."
                            class="form-control mb-3" onfocus="focused(this)" onfocusout="defocused(this)"
                            required="">
                        <p><strong>وصف التصنيف</strong></p>
                        <input name="desc" type="text" placeholder="وصف التصنيف الجديد..."
                            class="form-control mb-3" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closer">تراجع</button>
                        <input type="submit" class="btn bg-gradient-primary btn-sm" value="انشاء">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js-page')
    <script src="{{ asset('assets/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote-lite.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpHUfhJm-iMzab-nUflkl3YkeLOMqFGfM&libraries=places&callback=initMap&language=ar">
    </script>
    <script>
        $('#main_location').click(function() {
            $('#location').removeClass('d-none');
            $('#main_location').addClass('main_active');
            $('#details').removeClass('main_active');
            $('#more-details').addClass('d-none');
            $('#share_ads').removeClass('main_active');
            $('#main_ads').addClass('d-none');
        })
        $('#details').click(function() {
            $('#more-details').removeClass('d-none');
            $('#details').addClass('main_active');
            $('#location').removeClass('main_active');
            $('#location').addClass('d-none');
            $('#share_ads').removeClass('main_active');
            $('#main_ads').addClass('d-none');
        })
        $('#share_ads').click(function() {
            $('#main_ads').removeClass('d-none');
            $('#share_ads').addClass('main_active');
            $('#details').removeClass('main_active');
            $('#more-details').addClass('d-none');
            $('#main_location').removeClass('main_active');
            $('#location').addClass('d-none');
        })
    </script>
    <script>
        const city = new Choices($('#choices-city')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });
        const trade = new Choices($('#choices-trade')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: false,
        });
        const type0 = new Choices($('#choices-type')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });
        const methode = new Choices($('#choices-methode')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });
        const gas = new Choices($('#choices-gas')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });
        const newer = new Choices($('#choices-newer')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });

        const selectedWilayaId = parseInt($('#choices-city').val());

        $.post("{{ route('estate.state') }}", {
            _token: "{{ csrf_token() }}",
            state: selectedWilayaId // Send the selected wilaya ID in an array
        }, function(response) {
            $('#choices-state').html('');
            response.forEach(el => {
                var scv = '';
                if (el['name_ar'] == "{{ $estate->city }}") {
                    scv = 'selected';
                    console.log('ffffffffffff');
                    console.log(el['name_ar']);

                    console.log('ccccccccccccccccc');

                }
                $('#choices-state').append('<option ' + scv + ' value="' + el['name_ar'] + '">' + el[
                    'name_ar'] + '</option>');
            });
            const state = new Choices($('#choices-state')[0], {
                removeItemButton: true,
                shouldSort: false,
                searchEnabled: true,
            });
        });

        $('#choices-city').change(function() {
            const selectedWilayaId = parseInt($('#choices-city').val());
            console.log(selectedWilayaId);

            $.post("{{ route('estate.state') }}", {
                _token: "{{ csrf_token() }}",
                state: selectedWilayaId // Send the selected wilaya ID in an array
            }, function(response) {

                $('#choices-state').html('');
                response.forEach(el => {
                    $('#choices-state').append('<option value="' + el['name_ar'] + '">' + el[
                        'name_ar'] + '</option>');
                });
                const state = new Choices($('#choices-state')[0], {
                    removeItemButton: true,
                    shouldSort: false,
                    searchEnabled: true,
                });
            });
        });

        var files_img = [];
        jQuery(function($) {

            $('.FileDetails').change(function() {


                // GET THE FILE INPUT.
                var fi = document.getElementById('FileDetails');

                // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
                if (fi.files.length > 0) {

                    // THE TOTAL FILE COUNT.
                    // document.getElementById('fp').innerHTML =
                    //     'Total Files: <b>' + fi.files.length + '</b></br >';

                    // RUN A LOOP TO CHECK EACH SELECTED FILE.
                    for (var i = 0; i <= fi.files.length - 1; i++) {
                        if (fi.files.item(i)['size'] <= 5000000) {
                            files_img.push(fi.files.item(i));
                            var fname = fi.files.item(i).name; // THE NAME OF THE FILE.
                            var fsize = fi.files.item(i).size / (1024 ** 2); // THE SIZE OF THE FILE.
                            var fimage = URL.createObjectURL(fi.files.item(i));

                            // SHOW THE EXTRACTED DETAILS OF THE FILE.
                            document.getElementById('fp').innerHTML =
                                document.getElementById('fp').innerHTML +
                                '<div class="col-lg-2 col-md-4 ol-sm-12 closer_img" data-r="' + i +
                                '"><div class="over-img"><h6>' +
                                fname +
                                '</h6><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#ffffff" d="m12 10.586l4.95-4.95l1.415 1.415l-4.95 4.95l4.95 4.95l-1.415 1.414l-4.95-4.95l-4.95 4.95l-1.413-1.415l4.95-4.95l-4.95-4.95L7.05 5.638l4.95 4.95Z"></path></svg>' +
                                fsize.toFixed(2) + ' Mb</span> <div><img  src="' + fimage +
                                '" /></div></div></div>';

                            $('.closer_img').click(function() {
                                $(this).remove();
                                var si = $(this).attr('data-r');
                                files_img.splice(si, 1);
                            });
                        } else {
                            toastr.error('الحجم الأقصى للصور 5M', 'صور غير مناسبة', {
                                timeOut: 5000
                            });
                        }
                    }

                } else {
                    toastr.error('قم بتحديد صور للمنتج', 'صور المنتج', {
                        timeOut: 5000
                    });
                }
            });


        });


        // dinamic
        $('.name-pr').change(function() {
            if ($(this).val().length > 0) {
                var vl = $(this).val().trim();
                var avl = vl.replace(/ /gi, "-");
                $('.code-pr').val(avl);
            } else {
                $('.code-pr').val('');
            }
        });
        $(document).ready(function() {
            var date = new Date();
            var sku = Math.floor(Math.random() * 5e5);
            var allCode = date.getDate() + '-' + date.getMonth() + '-' + sku;
            $('.code-pr').val(allCode);
            $('.sku-pr').val(allCode);
        });

        $('#publisher').click(function() {
            var err = '';
            var fd = new FormData();
            var file_mm = document.getElementById('upcoverImg').getAttribute('src');
            var file = document.getElementById('is_cover_image').files[0];

            function cleanHtml(html) {
                return DOMPurify.sanitize(html, {
                    ALLOWED_TAGS: ['b', 'i', 'u', 'a', 'p', 'br', 'strong', 'em', 'ul', 'ol', 'li', 'h2',
                        'h3', 'h4', 'h5', 'h6', 'img', 'div'
                    ],
                    ALLOWED_ATTR: ['href', 'target', 'src', 'class'],
                });
            }

            // var desc_prodcut = cleanHtml($('#edit-deschiption-edit').summernote('code').toString().trim());
            // console.log(file_mm);

            //     fd.append('description', desc_prodcut);
            if (file_mm != "{{ getAsset($estate->thumbnail_image, 'sd') }}") {
                fd.append('is_cover_image', file);
            } else {
                fd.append('is_cover_image_q', 'on');
            }
            if (file) {
                var fileSize = document.getElementById('is_cover_image').files[0]['size'];
                if (fileSize >= 5000000) {
                    err = 'صورة المنتج أكبر من الحجم المتاح 5M';
                }
                fd.append('is_cover_image', file);
            }

            if (price == '') {
                err = 'حدد سعرا للعقار';
            }
            var files = files_img;
            $.each(files, function(key, file) {
                fd.append('multiple_files[' + key + ']', file);
            });

            var other_data = $('#form_post').serializeArray();
            $.each(other_data, function(key, input) {
                fd.append(input.name, input.value);
            });
            if (err) {
                //toastr.success('Successfully Created.');
                toastr.error(err, 'معلومات المنتج ناقصة', {
                    timeOut: 5000
                });
                err = '';
            } else {

                $.ajax({
                    url: "{{ route('estate.update', $estate->id) }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    beforeSend: function() {
                        $('.loadinder-thumb').addClass('active');
                        $('.loadinder').addClass('active');
                    },
                    success: function(data) {

                        $('.loadinder-thumb').removeClass('active');
                        $('.loadinder').removeClass('active');
                        if (data.status == true) {
                            toastr.success('تم اجراء التغييرات', "نجاح");
                            window.location.href = "{{ route('estate.index') }}";
                        } else {
                            toastr.error('حدث خطأ في حفظ المعلومات', "خطأ");
                        }
                    },
                    error: function(data) {
                        $('.loadinder-thumb').removeClass('active');
                        $('.loadinder').removeClass('active');
                        if (data.error) {
                            toastr.error(data.error, "حدث خطأ ما");
                        } else {
                            toastr.error(data);
                        }
                    },
                });
            }
        });


        var descData = {!! json_encode($estate->description) !!};

        var cleanDesc = DOMPurify.sanitize(descData, {
            ALLOWED_TAGS: ['b', 'i', 'u', 'a', 'p', 'br', 'strong', 'em', 'ul', 'ol', 'li', 'h2', 'h3', 'h4', 'h5',
                'h6', 'img', 'div'
            ],
            ALLOWED_ATTR: ['href', 'target', 'src', 'class'],
        });

        $('#edit-deschiption-edit').summernote('code', cleanDesc);
        $('input#is_cover_image').click(function() {
            $('#upcoverImg').attr('src', '');
        });


        // Create a FormData object to store the form data
        const formData = new FormData();

        var images = [];
        var imgUrl = "{{ url('uploads/product_image/') . '/' . $estate->id }}";

        @foreach ($images as $image)
            //images.push("{{ $image->product_images }}");
            var url = imgUrl + '/hd_' + '{{ $image->product_images }}';
            console.log(url);

            var fileInput = $('#FileDetails')[0];
            var fileList = fileInput.files;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('لا يوجد اتصال');
                    }
                    return response.blob();
                })
                .then(blob => {
                    console.log('{{ $image->product_images }}');

                    // Extract filename from URL
                    var filename = '{{ $image->product_images }}';
                    // Create a new File object
                    var newFile = new File([blob], filename, {
                        type: blob.type,
                        size: blob.size
                    });
                    // Create a new FileList object
                    var newFileList = new DataTransfer();
                    for (var i = 0; i < fileList.length; i++) {
                        newFileList.items.add(fileList[i]);
                    }
                    newFileList.items.add(newFile);
                    // Update the file input's files property with the new FileList
                    fileInput.files = newFileList.files;
                    addImages();
                })
                .catch(error => {
                    console.log(error);
                    toastr.error('حدث خطأ في جلب الصور جرب اضافتها من جديد', "فشلت العملية");
                });
        @endforeach


        var iii = 0;

        function addImages() {

            // GET THE FILE INPUT.
            var fi = document.getElementById('FileDetails');

            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files.length > 0) {

                // THE TOTAL FILE COUNT.
                // document.getElementById('fp').innerHTML =
                //     'Total Files: <b>' + fi.files.length + '</b></br >';

                // RUN A LOOP TO CHECK EACH SELECTED FILE.
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    files_img.push(fi.files.item(i));
                    var fname = fi.files.item(i).name; // THE NAME OF THE FILE.
                    var fsize = fi.files.item(i).size / (1024 ** 2); // THE SIZE OF THE FILE.
                    var fimage = URL.createObjectURL(fi.files.item(i));
                    // SHOW THE EXTRACTED DETAILS OF THE FILE.
                    document.getElementById('fp').innerHTML =
                        document.getElementById('fp').innerHTML +
                        '<div class="col-lg-2 col-md-4 ol-sm-12 closer_img" data-r="' + iii +
                        '"><div class="over-img"><h6>' +
                        fname +
                        '</h6><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#ffffff" d="m12 10.586l4.95-4.95l1.415 1.415l-4.95 4.95l4.95 4.95l-1.415 1.414l-4.95-4.95l-4.95 4.95l-1.413-1.415l4.95-4.95l-4.95-4.95L7.05 5.638l4.95 4.95Z"></path></svg>' +
                        fsize.toFixed(2) + ' Mb</span> <div><img  src="' + fimage + '" /></div></div></div>';
                    $('.closer_img').click(function() {
                        $(this).remove();
                        var si = $(this).attr('data-r');
                        files_img.splice(si, 1);
                    });
                    iii++;
                }
            } else {
                alert('قم بتحديد الصور.')
            }
        }

        ////////////////
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 24.7135517,
                    lng: 46.6752957
                }, // Riyadh, Saudi Arabia
                zoom: 13,
                mapTypeControl: false,
                streetViewControl: false
            });

            const input = document.getElementById("coordinates");
            const searchInput = document.getElementById("searchInput");


            const marker = new google.maps.Marker({
                map: map,
                draggable: true, // Allow marker dragging
            });

            // Add a click listener to the map
            map.addListener("click", (event) => {
                marker.setPosition(event.latLng);
                marker.setVisible(true);
                input.value = event.latLng.lat() + ", " + event.latLng.lng();
            });

            // Update coordinates on marker dragend
            marker.addListener("dragend", () => {
                input.value = marker.getPosition().lat() + ", " + marker.getPosition().lng();
            });


            // Search functionality (if needed)
            const autocomplete = new google.maps.places.Autocomplete(searchInput);
            autocomplete.bindTo("bounds", map);

            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();

                if (!place.geometry || !place.geometry.location) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                input.value = place.geometry.location.lat() + ", " + place.geometry.location.lng();
            });
        }
        $('.data-row-div').click(function() {
            $('.data-row-div').removeClass('active');
            $('.card-diver-main').removeClass('active');
            $(this).addClass('active');
            $('.' + $(this).attr('data-type')).addClass('active');
        });
        $("#is_cover_image").change(function() {
            $('#upcoverImg').removeClass('hidden');
            document.getElementById('upcoverImg').src = window.URL.createObjectURL(this.files[0]);
        });
        $('.show-ipr').change(function() {
            if ($(this).is(':checked')) {
                $('.ipr-main').addClass('d-none');
                $('.form-ipr').val(0);
            } else {
                $('.ipr-main').removeClass('d-none');
            }
        });
    </script>
@endpush
