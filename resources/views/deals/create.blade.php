@extends('layouts.admin')
@section('page-title')
    {{ __('صفقة جديدة') }}
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
ul.diver-list.hidden-list li.data-row-div {
    pointer-events: none;
    opacity: 0.6;
}span.add-customer svg {
    width: 27px;
    height: 27px;
    float: left;
    margin-bottom: -1px;
    cursor: pointer;
}
.row-hidden{
    display: none;
}.row.active {
    display: flex
;
}
</style>
@endpush
@section('content')
@php
    $theme = getSetting('theme');
@endphp
<div class="loadinder-thumb"></div>
<div class="loadinder"><span>جار التعديل ...</span></div>


<form action="{{route('deals.store')}}" method="POST" enctype="multipart/form-data" class="addProducts" id="form_post">
@csrf
    <div class="row">
        <div class="col-lg-6">
            <h3>اضافة صفقة جديدة</h3>
        </div>
        <div class="col-lg-6 text-right d-flex  justify-content-end align-items-center">
      
            <button type="button" id="publisher" class="btn bg-gradient-primary mb-0">التالي</button>
        </div>
    </div>


<div class="row mt-4">
    <div class="col-lg-12 mt-lg-0 mt-4">
        <div class="card card-diver-main diver-props active">
            <div class="card-body">
                <h5 class="font-weight-bolder">المعلومات الأساسية:</h5>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 mb-3">
                        <label>العميل :</label>
                        <span class="add-customer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="#32a466"/>
                            </svg>
                        </span>    
                        <select
                        value="{{old('user')}}"
                        class="form-control"
                        data-trigger
                        name="user"
                        placeholder="العميل"
                        id="choices-customer"
                        required
                        >
                        @foreach ($customers as $customer)
                           <option value="{{$customer->id}}">{{$customer->name}}</option> 
                        @endforeach
                    </select>
                    </div>
                    @if ($theme == 'theme1')
                    <div class="col-lg-3 col-sm-12">
                        <label>نوع العقار :</label>
                        <select
                        value="{{old('type')}}"
                        class="form-control"
                        data-trigger
                        name="type"
                        id="choices-type"
                        required
                        >
                        <option value="تجاري" selected>تجاري</option>
                        <option value="سكني">سكني</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label>المعاملة :</label>
                        <select
                        value="{{old('goal')}}"
                        class="form-control"
                        data-trigger
                        name="goal"
                        id="choices-goal"
                        required
                        >
                        <option value="ايجار" selected>ايجار</option>
                        <option value="بيع">بيع</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label>المنتج :</label>
                        <select
                        value="{{old('estate')}}"
                        class="form-control"
                        data-trigger
                        name="estate"
                        id="choices-multiple-estate"
                        required
                        >
                        @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    @else
                    <div class="col-lg-3 col-sm-12">
                        <label>الماركة :</label>
                        <select
                        value="{{old('estate')}}"
                        class="form-control"
                        data-trigger
                        name="estate"
                        id="choices-multiple-estate"
                        required
                        >
                        @foreach ($types as $type)
                            <option value="{{$type->name}}">{{$type->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label>نوع السيارة :</label>
                        <select
                        value="{{old('type')}}"
                        class="form-control"
                        data-trigger
                        name="type"
                        id="choices-type"
                        required
                        >
                        <option value="">نوع السيارة</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label>الموديل :</label>
                        <input type="text" required name="goal" class="form-control hidden-r" placeholder="موديل السيارة">
                </div>

                    @endif

                </div>
                <div class="row row-hidden">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="title-cust">اضافة عميل جديد</h4>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                            <label>اسم العميل :</label>
                            <input type="text" name="newcustomer" class="form-control hidden-r" placeholder="اسم العميل">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <label>رقم هاتف العميل :</label>
                        <input type="text" name="newnumber" class="form-control hidden-r" placeholder="رقم هاتف العميل">
                    </div>
                </div>
            </div></div>
        </div>
    </div>
</div>
</form>

@endsection
@push('js-page')
<script  src="{{asset('assets/js/choices.min.js')}}"></script>
<script src="{{asset('assets/js/summernote-lite.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>

<script>
        const customer = new Choices($('#choices-customer')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
      });
      const firstOption = customer.getValue(true);
        if (firstOption) {
            customer.removeActiveItemsByValue(firstOption); 
        }
        const type = new Choices($('#choices-type')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: false,
      });
      const goal = new Choices($('#choices-goal')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: false,
      });
      const estate = new Choices($('#choices-multiple-estate')[0], {
        removeItemButton: true,shouldSort: false,
        searchEnabled: true,
        noChoicesText: 'لا توجد أنواع أخرى',
      });
      estate.removeActiveItems();

    $('.data-row-div').click(function() {
        var dataId = $(this).attr('data-type');
        console.log(dataId);
        $('.data-row-div').removeClass('active');
        $('.card-diver-main').removeClass('active');
        $(this).addClass('active');
        $('.'+dataId).addClass('active')
    });
      $('#edit-deschiption-edit').summernote({
        placeholder: 'أضف وصف المنتج هنا...',
        height: 300,
        disableDragAndDrop: true,
        callbacks: {
            onImageUpload: function (image) {
                console.log(image[0]);
                uploadImage(image[0]);
            }
        }

      });
      function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);

            $.ajax({
                url: "{{route('estate.imagesUpload')}}",
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function (url) {
                    console.log(url);
                    if (url.status == 1) {
                       // $('#edit-deschiption-edit').summernote("insertImage", '{{route("index")}}/uploads/content/'+url.path,url.path);
                        var img = $('<img loading="lazy">').attr({
                                'src': '{{route("index")}}/uploads/content/'+url.path,  
                                'alt': url.path 
                            });
                            $('#edit-deschiption-edit').summernote('insertNode', img[0]); 
                    }else{
                        toastr.error('الصورة غير مناسبة','حدث خطأ',{timeOut: 5000});  
                    }
                },
                error: function (data) {
                    toastr.error('الصورة غير مناسبة','حدث خطأ',{timeOut: 5000});  
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
    function cleanHtml(html) {
  return DOMPurify.sanitize(html, {
    ALLOWED_TAGS: ['b', 'i', 'u', 'a', 'p', 'br', 'strong', 'em', 'ul', 'ol', 'li','h2','h3','h4','h5','h6','img','div'],
    ALLOWED_ATTR: ['href', 'target','src','class'],
  });
}

    var files = files_img;
    $.each(files, function (key, file) {
        fd.append('multiple_files[' + key + ']', file);
    });

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
                url: "{{route('deals.store')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                    if (data.status) {
                        toastr.success(data.msg,"تم انشاء المنتج");
                        window.location.href = "{{route('dashboard.index')}}/deals/edit/"+data.id;
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

$('.add-customer').click(function () {
    $('.hidden-r').val('');
    $(".row-hidden").toggleClass('active');
});

</script>
@if ($theme == 'theme2')
    <script>
        $('#choices-multiple-estate').change(function(){
    const selectedWilayaId = $('#choices-multiple-estate').val();
    console.log(selectedWilayaId);
    
     $.post("{{ route('estate.model') }}", {
      _token: "{{ csrf_token() }}",
      state: selectedWilayaId 
    }, function(response) {
        console.log(response);
        $('#choices-type').html('');
        type.clearStore();

response[0].forEach(el => {
    type.setChoices([{ value: el, label: el }], 'value', 'label', false);
});
    });
});

    </script>
@endif
@endpush