@extends('layouts.admin')
@section('page-title')
    {{ __('اعلان جديد') }}
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

        ul.diver-list.hidden-list li.data-row-div {
            pointer-events: none;
            opacity: 0.6;
        }

        .choices[data-type*=select-one] .choices__inner {
            padding-bottom: 7.5px;
            background: #fff;
        }
    </style>
@endpush
@section('content')
    @php
        $theme = getTheme(request());
    @endphp
    <div class="loadinder-thumb"></div>
    <div class="loadinder"><span>جار تجهيز الاعلان ...</span></div>


    <form action="{{ route('estate.store') }}" method="POST" enctype="multipart/form-data" class="addProducts" id="form_post">
        @csrf

        <div class="row">
            <div class="col-lg-6">
                <h3>اضافة اعلان جديد</h3>
            </div>
            <div class="col-lg-6 text-right d-flex  justify-content-end align-items-center">

                <button type="submit" id="publisher" class="btn bg-gradient-primary mb-0">التالي</button>
            </div>
        </div>
        <ul class="nav nav-tabs w-fit-content mb-4">
            {{-- <li class="nav-item">
                <a class="nav-link type_link main_active" href="#" id="personal-link">المعلومات الاساسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link type_link " href="#" id="company-link">التفاصيل</a>
            </li>
            <li class="nav-item">
                <a class="nav-link type_link " href="#" id="company-link">الموقع</a>
            </li>
            <li class="nav-item">
                <a class="nav-link type_link " href="#" id="company-link">نشر الاعلان في المتجر</a>
            </li> --}}
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
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card card-diver-main diver-props active">
                    <div class="card-body" id="main_info">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 mb-3">
                                <label>العنوان :</label>
                                <input placeholder="تسمية الاعلان" class="form-control" type="text" name="name"
                                    id="name" value="{{ old('name') }}" required>
                            </div>
                            @if ($theme == 'theme2')

                            @include('estate.includes.basic_info')
                            @else
                                <div class="col-lg-4 col-sm-12">
                                    <label>المنتج العقاري :</label>
                                    <input class="form-control" type="text" id="estate"  >
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>نوع العقار :</label>
                                    <input class="form-control" type="text" name="type" id="type"   >
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>المعاملة :</label>
                                    <input class="form-control" type="text" name="goal" id="goal"   >
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                {{-- @include('estate.includes.more_details') --}}
                {{-- <div class="card card-diver-main  diver-props active">
            <div class="card-body">
                <h5 class="font-weight-bolder">الموقع:</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="mt-2">المدينة</label>
                        <input type="hidden" name="statetxt" class="statetxt">
                        <select
                        class="form-control"
                        data-trigger
                        name="state"
                        id="choices-city"
                        required
                        >
                            <option value="3">الرياض</option>
                            <option value="5">الطائف</option>
                            <option value="6">مكة المكرمة</option>
                            <option value="10">حائل</option>
                            <option value="11">بريدة</option>
                            <option value="13">الدمام</option>
                            <option value="14">المدينة المنورة</option>
                            <option value="15">ابها</option>
                            <option value="17">جازان</option>
                            <option value="18">جدة</option>
                            <option value="24">المجمعة</option>
                            <option value="31">الخبر</option>
                            <option value="80">عنيزة</option>
                            <option value="168">الارطاوية</option>
                            <option value="227">الظهران</option>
                            <option value="243">بقيق</option>
                            <option value="253">صلاصل</option>
                            <option value="270">الزلفي</option>
                            <option value="306">الغاط</option>
                            <option value="377">رابغ</option>
                            <option value="443">ثادق</option>
                            <option value="444">الروبضة / رغبة</option>
                            <option value="796">ملهم</option>
                            <option value="828">الدرعية</option>
                            <option value="834">العمارية</option>
                            <option value="990">المزاحمية</option>
                            <option value="1061">الخرج</option>
                            <option value="1801">محايل</option>
                            <option value="2421">الرس</option>
                            <option value="2522">يدمة</option>
                            <option value="3417">نجران</option>
                            <option value="3479">صبيا</option>
                            <option value="3499">ضمد</option>
                            <option value="3525">ابو عريش</option>
                            <option value="3618">البديع والقرفي</option>
                            <option value="3652">احد المسارحة</option>
                            <option value="3677">الاحساء</option>
                            <option value="23695">مدينة الملك عبدالله الاقتصادية</option>
                        </select>
                    </div>     
                    <div class="col-sm-12">
                        <label class="mt-2">الحي</label>
                        <select
                        class="form-control"
                        data-trigger
                        name="city"
                        id="choices-state"
                        required
                        >
                            <option value="0" disabled>حدد المدينة أولا</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mt-4">
                    <label class="mt-2">الخريطة</label>
                    <input type="text" class="form-control mb-2" id="searchInput" placeholder="بحث عن المدينة">
                    <div id="map" style="height: 300px; width: 100%;"></div>
                    <input type="hidden" id="coordinates" name="map">
                    </div> 
                </div>

                </div>
            </div> --}}
            </div>

            <div class="card card-diver-main diver-props active    d-none" id="more-details">
                @include('estate.includes.more_details')
            </div>
            <div class="card card-diver-main diver-props active d-none" id="location">
                @include('estate.includes.location')
            </div>


            @php
                $images = App\Models\ProductImage::get();
            @endphp
            <div class="card card-diver-main diver-props active ">

                @include('estate.includes.ads')
            </div>
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
                        <input name="name" type="text" placeholder="اسم التصنيف الجديد..." class="form-control mb-3"
                            onfocus="focused(this)" onfocusout="defocused(this)" required="">
                        <p><strong>وصف التصنيف</strong></p>
                        <input name="desc" type="text" placeholder="وصف التصنيف الجديد..." class="form-control mb-3"
                            onfocus="focused(this)" onfocusout="defocused(this)">
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
        $('#basic_info').click(function() {
            $('#location').addClass('d-none');
            $('#basic_info').addClass('main_active');
            $('#details').removeClass('main_active');
            $('#more-details').addClass('d-none');
            $('#share_ads').removeClass('main_active');
            $('#main_ads').addClass('d-none');
            $('#main_info').removeClass('d-none');

        })
        $('#main_location').click(function() {
            $('#location').removeClass('d-none');
            $('#main_location').addClass('main_active');
            $('#details').removeClass('main_active');
            $('#more-details').addClass('d-none');
            $('#share_ads').removeClass('main_active');
            $('#main_ads').addClass('d-none');
            $('#basic_info').removeClass('main_active');
            $('#main_info').addClass('d-none');

        })
        $('#details').click(function() {
            $('#more-details').removeClass('d-none');
            $('#details').addClass('main_active');
            $('#location').removeClass('main_active');
            $('#location').addClass('d-none');
            $('#share_ads').removeClass('main_active');
            $('#main_ads').addClass('d-none');
            $('#basic_info').removeClass('main_active');
            $('#main_info').addClass('d-none');
        })
        $('#share_ads').click(function() {
            $('#main_ads').removeClass('d-none');
            $('#share_ads').addClass('main_active');
            $('#details').removeClass('main_active');
            $('#more-details').addClass('d-none');
            $('#main_location').removeClass('main_active');
            $('#location').addClass('d-none');
            $('#basic_info').removeClass('main_active');
            $('#main_info').addClass('d-none');
        })
    </script>
    <script>
        const type = new Choices($('#choices-type')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: false,
        });
        //   const goal = new Choices($('#choices-goal')[0], {
        //     removeItemButton: true,shouldSort: false,
        //     searchEnabled: false,
        //   });
        const estate = new Choices($('#choices-multiple-estate')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
            noChoicesText: 'لا توجد أنواع أخرى',
        });
        $('.data-row-div').click(function() {
            var dataId = $(this).attr('data-type');
            console.log(dataId);
            $('.data-row-div').removeClass('active');
            $('.card-diver-main').removeClass('active');
            $(this).addClass('active');
            $('.' + dataId).addClass('active')
        });
        $('#edit-deschiption-edit').summernote({
            placeholder: 'أضف وصف المنتج هنا...',
            height: 300,
            disableDragAndDrop: true,
            callbacks: {
                onImageUpload: function(image) {
                    console.log(image[0]);
                    uploadImage(image[0]);
                }
            }

        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);

            $.ajax({
                url: "{{ route('estate.imagesUpload') }}",
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(url) {
                    console.log(url);
                    if (url.status == 1) {
                        // $('#edit-deschiption-edit').summernote("insertImage", '{{ route('index') }}/uploads/content/'+url.path,url.path);
                        var img = $('<img loading="lazy">').attr({
                            'src': '{{ route('index') }}/uploads/content/' + url.path,
                            'alt': url.path
                        });
                        $('#edit-deschiption-edit').summernote('insertNode', img[0]);
                    } else {
                        toastr.error('الصورة غير مناسبة', 'حدث خطأ', {
                            timeOut: 5000
                        });
                    }
                },
                error: function(data) {
                    toastr.error('الصورة غير مناسبة', 'حدث خطأ', {
                        timeOut: 5000
                    });
                }
            });
        }

        //     if (document.getElementById('edit-deschiption-edit')) {
        //         var toolbarOptions = [
        //   ['bold', 'italic', 'underline', 'strike','link'],  
        //   [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        //   [{ 'align': [] }],
        //   [{ 'color': [] }],
        //   [{ 'background': [] }],
        //   [{ 'header': [1, 2, 3, false] }],
        //   ['clean']
        // ];
        //       var quill = new Quill('#edit-deschiption-edit', {
        //         theme: 'snow',
        //         placeholder: 'وصف المنتج',
        //         modules: {
        //             toolbar: toolbarOptions
        //         },
        //       });

        //     };



        var uploadedDocumentMap = {}
        //   Dropzone.options.documentDropzone = {
        // url:,
        //     maxFilesize: 2,
        //     maxFiles: 5,
        //     acceptedFiles: ".png,.svg,.gif,.jpg,.jpeg,.webp",
        //     addRemoveLinks: true,
        //     headers: {
        //       'X-CSRF-TOKEN': "{{ csrf_token() }}"
        //     },
        //     success: function (file, response) {
        //       $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
        //       uploadedDocumentMap[file.name] = response.name
        //     },
        //     removedfile: function (file) {
        //       file.previewElement.remove()
        //       var name = ''
        //       if (typeof file.file_name !== 'undefined') {
        //         name = file.file_name
        //       } else {
        //         name = uploadedDocumentMap[file.name]
        //       }
        //       $('form').find('input[name="document[]"][value="' + name + '"]').remove()
        //     },
        //     init: function () {
        //       @if (isset($project) && $project->document)
        //         var files =
        //           {!! json_encode($project->document) !!}
        //         for (var i in files) {
        //           var file = files[i]
        //           this.options.addedfile.call(this, file)
        //           file.previewElement.classList.add('dz-complete')
        //           $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        //         }
        //       @endif
        //     }
        //   }
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

            function cleanHtml(html) {
                return DOMPurify.sanitize(html, {
                    ALLOWED_TAGS: ['b', 'i', 'u', 'a', 'p', 'br', 'strong', 'em', 'ul', 'ol', 'li', 'h2',
                        'h3', 'h4', 'h5', 'h6', 'img', 'div'
                    ],
                    ALLOWED_ATTR: ['href', 'target', 'src', 'class'],
                });
            }

            var files = files_img;
            $.each(files, function(key, file) {
                fd.append('multiple_files[' + key + ']', file);
            });

            var other_data = $('#form_post').serializeArray();
            $.each(other_data, function(key, input) {
                fd.append(input.name, input.value);
            });
            if ($('#name').val() == '') {
                err = 'عنوان الاعلان ضروري'
            }
            if (err) {
                //toastr.success('Successfully Created.');
                toastr.error(err, 'معلومات المنتج ناقصة', {
                    timeOut: 5000
                });
                err = '';
            } else {

                $.ajax({
                    url: "{{ route('estate.store') }}",
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
                        console.log(data);

                        $('.loadinder-thumb').removeClass('active');
                        $('.loadinder').removeClass('active');
                        if (data.status) {
                            toastr.success(data.msg, "تم انشاء المنتج");
                            window.location.href = "{{ route('dashboard.index') }}/edit/" + data.id;
                        } else {
                            toastr.error(data.msg, "حدث خطأ في حفظ المعلومات");
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




        const city = new Choices($('#choices-city')[0], {
            removeItemButton: true,
            shouldSort: false,
            searchEnabled: true,
        });
        city.removeActiveItems();
        const firstOption = city.getValue(true);
        if (firstOption) {
            city.removeActiveItemsByValue(firstOption);
        }
        $('#choices-city').change(function() {
            $('.statetxt').val($(this).find(":selected").text())
            const selectedWilayaId = parseInt($('#choices-city').val());

            $.post("{{ route('estate.state') }}", {
                _token: "{{ csrf_token() }}",
                state: selectedWilayaId // Send the selected wilaya ID in an array
            }, function(response) {
                $('#choices-state').html('');
                response.forEach(el => {
                    $('#choices-state').append('<option value="' + el['name_ar'] + '">' + el[
                        'name_ar'] + '</option>');
                });
                console.log(response);
                const state = new Choices($('#choices-state')[0], {
                    removeItemButton: true,
                    shouldSort: false,
                    searchEnabled: true,
                });
            });
        });





        // $('#choices-multiple-estate').change(function() {
        //     const selectedWilayaId = $('#choices-multiple-estate').val();
        //     console.log(selectedWilayaId);

        //     $.post("{{ route('estate.model') }}", {
        //         _token: "{{ csrf_token() }}",
        //         state: selectedWilayaId
        //     }, function(response) {
        //         console.log(response[0]);

        //         type.clearStore();

        //         response[0].forEach(el => {
        //             type.setChoices([{
        //                 value: el,
        //                 label: el
        //             }], 'value', 'label', false);
        //         });

        //     });
        // });
    </script>
@endpush
