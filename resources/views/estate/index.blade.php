@extends('layouts.admin')
@section('page-title')
    {{ __('الاعلانات') }}
@endsection
@section('content')
<style>
img.estate-img-small {
    width: 70px;
    height: 70px;
    float: right;
    border-radius: 15px;
}
table#products-list * {
    font-size: 15px !important;
}
table#products-list a.editer {
    font-size: 13px !important;
}
</style>
<div class="row">
    <div class="col-12 mt-4">
      <div class="d-lg-flex mt-4 mb-4">
        <div>
        <h2 class="mb-0">{{__('كل الاعلانات')}}</h2>
        </div>
        <div class="me-auto my-auto mt-lg-0 mb-0">
        <div class="ms-auto my-auto">
        <a href="{{route('estate.create')}}" class="btn bg-gradient-primary btn-sm mb-0">{{__('اضافة اعلان')}} +&nbsp; </a>
        </div>
        </div>
        </div>
    <div class="card">
    
    <div class="card-header pb-0">

    <div class="card-body px-0 pb-0">
    <div class="table-responsive">
    <table class="table table-flush" id="products-list"  style="font-size: 16px!important;">
    <thead class="thead-light">
    <tr>
    <th>الاعلان</th>
    <th>النوع</th>
    <th>المعاملة</th>
    <th>العنوان</th>
    <th>متوفر / غير متوفر</th>
    <th>تاريخ النشر</th>
    <th>الاجرائات</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($estates as $key => $estate)
      <tr>
        <td style="display:flex;"><img class="estate-img-small" src="{{ getAsset($estate->thumbnail_image,'sd') }}" alt="{{$estate->name}}">
          <h6 class="mr-2 ms-3 my-auto">{{$estate->name}}</h6>
          </td>
        <td>{{$estate->type}}</td>
        <td>{{$estate->goal}}</td>
        <td>{{$estate->city}} / {{$estate->statetxt}} </td>
        <td>
          <div class="form-check form-switch" >
            <input  @if ($estate->status == 1) checked @endif type="checkbox" onchange="updatePublishedStatus(this)" class="form-check-input" value="{{$estate->id}}">
          </div>
        </td>
          <td>
            <h6 class="mr-2 ms-3 my-auto">{{ date('d-m-Y', strtotime($estate->created_at)) }}</h6>
        </td>
        <td>
          <a href="{{route('estate.edit',$estate->id)}}" class="editer">تعديل</a>
          <a href=""  class="deleter ">
            <form class="form-delete" style="display: none" action="{{route('estate.destroy',$estate->id)}}" method="post">
                @csrf
            </form>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"></path></svg>
            </a>
       </td>   
        </tr>
        @endforeach
    </tbody>
    </table>

<!--pagination start-->
<div class="d-flex align-items-center justify-content-between py-3 px-4">
  <span class="smaller">يتم عرض 
      {{ $estates->firstItem() }} {{ __('الى') }} {{ $estates->lastItem() }} {{ __('من') }}
      {{ $estates->total() }} {{ __('الاعلانات') }}</span>
  <nav class="paginate">
      {{ $estates->links() }}
  </nav>
</div>
<!--pagination end-->
  
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="delete-row-thumb d-none"></div>
    <div class="delete-row d-none">
        <div class="col-delete">
            <div class="icon-st">
                <div class="dlete-it">!</div>
            </div>
            <div class="content-delete">
                <h2 class="delete-title mb-2">تأكيد الحذف</h2>
                <h4 class="delete-desk mt-0">سيتم حذف هذا العنصر بشكل دائم</h4>
            </div>
            <div class="action-delete">
                <div class="icon-st claen">تراجع</div>
                <div class="icon-st deleter-conf">حذف</div>
            </div>
        </div>
    </div>
    
@endsection
@push('js-page')
<script src="{{asset('assets/js/datatables.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    if (document.getElementById('products-list')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
        searchable: false,
        fixedHeight: false,
        paging: false,
        perPage: 7
      });
    };


                // update publish status 
                function updatePublishedStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('estate.status') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data.flag == 1) {
                      if (data.status == 1) {
                        toastr.success("تم تفعيل الاعلان",'نجاح');
                      }else{
                        toastr.warning("تم تعطيل الاعلان",'نجاح');
                      }
                    } else {
                      toastr.error(data.msg,"حدث خطأ ما");
                    }
                });
        }

        /*
*   Delete items
*/
$('.deleter').click(function(event){
  event.preventDefault();
  $('.delete-row-thumb').removeClass('d-none');
  $('.delete-row').removeClass('d-none');
  var main = $(this);
  $('.icon-st.claen').click(function () {
  $('.delete-row-thumb').addClass('d-none');
  $('.delete-row').addClass('d-none');
  });
  $('.deleter-conf').click(function () {
    main.children('.form-delete').submit();
  });
});
  </script>

@endpush