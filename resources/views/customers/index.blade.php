@extends('layouts.admin')
@section('page-title')
    {{ __('العملاء') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12 mt-4">
      <div class="d-lg-flex mt-4 mb-4" >
      <div>
      <h2 class="mb-0">{{__('كل العملاء')}}</h2>
      </div>
      <div class="me-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
      <a href="{{route('customers.create')}}" class="btn bg-gradient-primary btn-sm mb-0">{{__('إضافة عميل')}} +&nbsp; </a>
   
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
    <th>الاسم الكريم</th>
    <th>رقم الجوال</th>
    <th>نوع العميل</th>
    <th>تاريخ الاضافة</th>
    <th>الاجرائات</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($customers as $key => $customer)
      <tr>
          <td>
          <h6 class="mr-2 ms-3 my-auto">{{$customer->name}}</h6>
          </td>
          <td dir="ltr" style="text-align: right">
            +966 {{ $customer->phone }}
        </td>  
        <td dir="ltr" style="text-align: right">
          {{ $customer->type }}
      </td>  
          <td>
            {{ date('d-m-Y', strtotime($customer->created_at)) }}
        </td>  
        <td>
          <a href="{{route('customers.edit',$customer->id)}}" class="editer">تعديل</a>
       </td>          </tr>

        @endforeach
    </tbody>
    </table>

<!--pagination start-->
<div class="d-flex align-items-center justify-content-between py-3 px-4">
  <span class="smaller">يتم عرض 
      {{ $customers->firstItem() }} {{ __('الى') }} {{ $customers->lastItem() }} {{ __('من') }}
      {{ $customers->total() }} {{ __('العملاء') }}</span>
  <nav class="paginate">
      {{ $customers->links() }}
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
  </script>

@endpush