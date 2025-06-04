@extends('layouts.admin')
@section('page-title')
    {{ __('عقار جديد') }}
@endsection
@push('css-page')
<link rel="stylesheet" href="{{asset('assets/css/choices.min.css')}}">
<link href="{{asset('assets/css/summernote-lite.css')}}" rel="stylesheet">
<style>
.modal-ai .modal-content.act:after {content: 'جار انشاء الاعلان';padding: 0.3em 2em;position: absolute;top: 50%;left: 50%;background: #ffffff;transform: translate(-50%, -50%);border-radius: 50px;z-index: 9999;font-size: 0.9em;}
li.data-row-div {
    list-style: none;
    display: inline-block;
    padding: 10px 20px;
    margin: 0 10px;
    font-weight: 600;
    background: #ffffff;
    border-radius: 10px;    cursor: pointer;
}
ul.diver-list {
    padding: 0;
}
li.data-row-div.active {
    color: #03a9f4;
    background: hsl(199deg 98% 48% / 22%);
    outline: 2px solid #03a9f4;
}
li.data-row-div p {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
}

.card-diver-main {
    display: none;
    position: relative;
    margin-top: 30px;
    transition: 0.3s easy;
    opacity: 0;
}.card-diver-main.active {
    display: flex;
    top: 0;
    opacity: 1;
}
div#map {
    height: 300px;
}
ul.status-row {
    display: flex;
    align-items: center;
    justify-content: space-around;padding: 0;
    margin: 0;
}
li.status {
    border: 1px solid #ebebeb;
    padding: 6px 30px;
    border-radius: 36px;cursor: pointer;
    font-size: 0.9em;
    list-style: none;
}li.status.active {
    background: #32a466;
    color: #fff;
}p.deals-info {
    font-size: 0.9em;
    color: #999;
    display: inline-block;
    padding: 0 11px;
    margin: 0;
}
li.status-changer {
    list-style: none;
    display: block;
    padding: 12px 2px;
    margin: 10px 0;
    border-bottom: 1px solid #ebebeb;
}
span.date-s {
    background: #ebebeb;
    padding: 4px 9px;
    display: inline-block;
    font-size: 0.8em;
    border-radius: 10px;
    color: #ababab;
    margin-bottom: 5px;
}span.title-s {
    display: block;
    font-size: 0.8em;
    color: #999;
}ul.status-change {
    padding: 0;
    max-height: 400px;
    overflow: scroll;
}span.date-s {
    background: #32a466;
    padding: 4px 9px;
    display: inline-block;
    font-size: 0.6em;
    border-radius: 10px;
    color: #ffffff;
    margin-bottom: 5px;
}
</style>
@endpush
@section('content')

<div class="loadinder-thumb"></div>
<div class="loadinder"><span>جار التعديل ...</span></div>


<form action="" method="POST" enctype="multipart/form-data" class="addProducts" id="form_post">
@csrf
    <div class="row">
        <div class="col-lg-6">
            <h3>التفاصيل</h3>
            <p class="deals-info">معرف الصفقة : #{{$order->id}}</p>
            <p class="deals-info">تاريخ الاضافة : {{ date('d-m-Y', strtotime($order->created_at)) }}</p>
        </div>
        <div class="col-lg-6 text-right d-flex  justify-content-end align-items-center">
      
            <button type="button" id="publisher" class="btn bg-gradient-primary mb-0">تعديل</button>
        </div>
    </div>


<div class="row mt-4">
    <div class="col-lg-8 mt-lg-0 mt-4">
        <div class="card card-diver-main diver-props active">
            <div class="card-body">
                <h5 class="font-weight-bolder">المرحلة:</h5>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <ul class="status-row">
                            <li class="status @if ($order->status ==1)
                                active
                            @endif" data-status="1"><span class="status-txt">صفقة جديدة</span></li>
                            <li class="status @if ($order->status ==2)
                                active
                            @endif" data-status="3"><span class="status-txt @if ($order->status ==1)
                                active
                            @endif">المفاوضات</span></li>
                            <li class="status @if ($order->status ==4)
                                active
                            @endif" data-status="4"><span class="status-txt">تمت الصفقة</span></li>
                            <li class="status @if ($order->status ==5)
                                active
                            @endif" data-status="4"><span class="status-txt">الغاء الصفقة</span></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="card card-diver-main diver-props active">
            <div class="card-body">
                <h5 class="font-weight-bolder">المعلومات الأساسية:</h5>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <label>اسم العميل :</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$customer->name}}" required>
                        <input name="customerid" type="hidden" value="{{$customer->id}}" required>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <label>رقم الهاتف :</label>
                        <input dir="ltr" class="form-control" type="text" name="phone" id="phone" value="{{$customer->phone}}" required>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label>نوع العقار :</label>
                        <input class="form-control" type="text" name="type" id="type" value="{{$estatess->type}}" disabled>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label>المعاملة :</label>
                        <input class="form-control" type="text" name="goal" id="goal" value="{{$estatess->goal}}" disabled>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label>المنتج العقاري :</label>
                        <input class="form-control" type="text" name="estate" id="estate" value="{{$estatess->estate}}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-diver-main diver-props active">
            <div class="card-body">
                <h5 class="font-weight-bolder">التفاصيل:</h5>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <label>قيمة الصفقة :</label>
                        <input class="form-control" type="nomber" name="price" id="price" value="{{$order->price}}" min="0" required>
                    </div>    
                    <div class="col-lg-12 col-sm-12">
                        <label>المنتج العقاري :</label>
                        <input class="form-control" type="text" id="estate" value="{{$estatess->name}}" disabled>
                    </div>
                </div>
            </div>
        </div>
            <div class="card card-diver-main diver-props active">
                <div class="card-body">
                    <h5 class="font-weight-bolder">الخصائص:</h5>
                <div class="row">
                    @foreach ($dealProps as $estateProp)
                    @php
                    $props = $dealProps->where('props',$estateProp->id)->first();
                    @endphp
                    <div class="col-lg-3 col-sm-12">
                        <label class="mt-4">{{$estateProp->name}}</label>
                        <input type="hidden" name="names[{{$estateProp->id}}]" value="{{$estateProp->name}}" required>
                        <input type="hidden" name="ids[{{$estateProp->id}}]" value="{{$estateProp->id}}" required>
                        <input min="0" class="form-control" type="number" value="{{$props ? $props->value:0}}"  placeholder="تحديد {{$estateProp->name}} "  name="props[{{$estateProp->id}}]" id="props-{{$estateProp->name}}" required> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <label class="mt-2">الملاحظات:</label>
                        <div class="form-check form-switch my-auto d-flex align-items-center ml-2">
                            <textarea name="note" class="form-control" cols="30" rows="10" placeholder="ملاحظات داخلية حول الصفقة">{{$order->notes}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="mt-2">المدينة</label>
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
                    <div class="col-sm-12">
                        <label class="mt-4">التحديثات</label>
                        <ul class="status-change">
                        @forelse ($status as $sts)
                            <li class="status-changer">
                                <span class="date-s">{{date('d-m-Y', strtotime($sts->created_at)) }}</span>
                                <div class="content-s">
                                    <span class="title-s">
                                        {{$sts->title}}
                                    </span>
                                    <span class="content-s">
                                        {{$sts->content}}
                                    </span>
                                </div>
                            </li>
                        @empty
                            <li class="empty">لا توجد اي تحديثات</li>
                        @endforelse
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

@endsection
@push('js-page')
<script  src="{{asset('assets/js/choices.min.js')}}"></script>
<script src="{{asset('assets/js/summernote-lite.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpHUfhJm-iMzab-nUflkl3YkeLOMqFGfM&libraries=places&callback=initMap&language=ar"></script>
<script>
    const city = new Choices($('#choices-city')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
      });
      $('#choices-city').change(function(){
    const selectedWilayaId = parseInt($('#choices-city').val());

     $.post("{{ route('estate.state') }}", {
      _token: "{{ csrf_token() }}",
      state: selectedWilayaId // Send the selected wilaya ID in an array
    }, function(response) {
        $('#choices-state').html('');
        response.forEach(el => {
            $('#choices-state').append('<option value="'+el['name_ar']+'">'+el['name_ar']+'</option>');
        });
    console.log(response);
    const state = new Choices($('#choices-state')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
      });
    });
});
      const est = new Choices($('#choices-est')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
      });

    $('.data-row-div').click(function() {
        var dataId = $(this).attr('data-type');
        console.log(dataId);
        $('.data-row-div').removeClass('active');
        $('.card-diver-main').removeClass('active');
        $(this).addClass('active');
        $('.'+dataId).addClass('active')
    });

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
//       @if(isset($project) && $project->document)
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
jQuery(function($)
    {

$('.FileDetails').change(function () {


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
        var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
        var fsize = fi.files.item(i).size/ (1024 ** 2);      // THE SIZE OF THE FILE.
        var fimage = URL.createObjectURL(fi.files.item(i));

        // SHOW THE EXTRACTED DETAILS OF THE FILE.
        document.getElementById('fp').innerHTML =
            document.getElementById('fp').innerHTML + '<div class="col-lg-2 col-md-4 ol-sm-12 closer_img" data-r="'+i+'"><div class="over-img"><h6>' +
                fname + '</h6><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#ffffff" d="m12 10.586l4.95-4.95l1.415 1.415l-4.95 4.95l4.95 4.95l-1.415 1.414l-4.95-4.95l-4.95 4.95l-1.413-1.415l4.95-4.95l-4.95-4.95L7.05 5.638l4.95 4.95Z"></path></svg>' + fsize.toFixed(2) + ' Mb</span> <div><img  src="'+fimage+'" /></div></div></div>';

    $('.closer_img').click(function () {
        $(this).remove();
        var si = $(this).attr('data-r');
        files_img.splice(si,1);
    });
    }else{
        toastr.error('الحجم الأقصى للصور 5M','صور غير مناسبة',{timeOut: 5000});
    }
}

}
else { 
    toastr.error('قم بتحديد صور للمنتج','صور المنتج',{timeOut: 5000});
}
});
    });


    // dinamic
  $('.name-pr').change(function(){
    if ($(this).val().length > 0) {
    var vl = $(this).val().trim();
    var avl = vl.replace(/ /gi,"-");
        $('.code-pr').val(avl);
    }else{
        $('.code-pr').val('');
    }
});
$(document).ready(function(){
    var date =  new Date();
    var sku = Math.floor(Math.random() * 5e5);
    var allCode = date.getDate() + '-' + date.getMonth() + '-' +sku;
    $('.code-pr').val(allCode);
    $('.sku-pr').val(allCode);
});

  $('#publisher').click(function() {
    var err = '';
    var fd = new FormData();
    var price = $('#price').val();
    var estates = $('#choices-est').val();
    $.each(estates, function (key, estate) {
        fd.append('multiple_estates[' + key + ']', estate);
    });
    if (price =='') {
        err = 'حدد قيمة الصفقة :'; 
    }

    var other_data = $('#form_post').serializeArray();
    $.each(other_data, function (key, input) {
        fd.append(input.name, input.value);
    });
    if (err) {
        //toastr.success('Successfully Created.');
        toastr.error(err,'معلومات المنتج ناقصة',{timeOut: 5000});
        err = '';
    }else{

        $.ajax({
                url: "{{route('orders.upgrade',$order->id)}}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                beforeSend: function () {
                    $('.loadinder-thumb').addClass('active');
                    $('.loadinder').addClass('active');
                },
                success: function (data) {
                    console.log(data);
                    
                    $('.loadinder-thumb').removeClass('active');
                    $('.loadinder').removeClass('active');
                    if (data.flag == "success") {
                        toastr.success(data.msg,"تم انشاء المنتج");
                        window.location.href = "{{route('estate.index')}}";
                    } else {
                        toastr.error(data.msg,"حدث خطأ في حفظ المعلومات");
                    }
                },
                error: function (data) {
                    $('.loadinder-thumb').removeClass('active');
                    $('.loadinder').removeClass('active');
                    if (data.error) {
                        toastr.error(data.error,"حدث خطأ ما");
                    } else {
                        toastr.error(data);
                    }
                },
            });  
    }
  });



$('input#is_cover_image').click(function() {
    $('#upcoverImg').attr('src','');
});


$('.status').on('click', function() {
    var status = $(this).attr('data-status');
    $('.status').removeClass('active');
    $(this).addClass('active');
    $.post('{{ route('orders.update') }}', {
        _token: '{{ @csrf_token() }}',
        id: {{$order->id}},
        status: status
    }, function(data) {
        toastr.success("تم تحديث حالة التوصيل","تمت العملية بنجاح");
    });
});
</script>
@endpush
