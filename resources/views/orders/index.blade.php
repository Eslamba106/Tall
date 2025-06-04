@extends('layouts.admin')
@section('page-title')
    {{ __('الطلبات') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12 mt-4">
      <div class="d-lg-flex mt-4 mb-4">
        <div>
        <h2 class="mb-0">{{__('كل الطلبات')}}</h2>
        </div>
        <div class="me-auto my-auto mt-lg-0 mb-0">
        <div class="ms-auto my-auto">
        </div>
        </div>
        </div>
    <div class="card">
    <div class="card-header pb-0">
    <div class="card-body px-0 pb-0">
    <div class="table-responsive">
    <table class="table table-flush" id="products-list">
    <thead class="thead-light">
    <tr>
    <th>العميل</th>
    <th>رقم الهاتف</th>
    <th>العنوان</th>
    <th>تاريخ النشر</th>
    <th>الاجرائات</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($estates as $key => $estate)
      <tr>
        <td>
          <h6 class="mr-2 ms-3 my-auto">{{$estate->name}}</h6>
          </td>
          @php
            $est = App\Models\Estate::find($estate->estate);
          @endphp
        <td>{{$estate->phone}} 966+</td>
        <td>{{$estate->price}} رس </td>
          <td>
            <h6 class="mr-2 ms-3 my-auto">{{ date('d-m-Y', strtotime($estate->created_at)) }}</h6>
        </td>
        <td>
          <a href="{{route('orders.edit',$estate->id)}}" class="editer">تعديل</a>
       </td>   
        </tr>
        @endforeach
    </tbody>
    </table>

<!--pagination start-->
<div class="d-flex align-items-center justify-content-between py-3 px-4">
  <span class="smaller">يتم عرض 
      {{ $estates->firstItem() }} {{ __('الى') }} {{ $estates->lastItem() }} {{ __('من') }}
      {{ $estates->total() }} {{ __('الطلبات') }}</span>
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
                        toastr.success("تم تفعيل العقار",'نجاح');
                      }else{
                        toastr.warning("تم تعطيل العقار",'نجاح');
                      }
                    } else {
                      toastr.error(data.msg,"حدث خطأ ما");
                    }
                });
        }
  </script>

@endpush