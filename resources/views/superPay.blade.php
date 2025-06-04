@extends('layouts.super')
@section('page-title')
    {{ __('الطلبات') }}
@endsection
@section('content')
<style>
    .item-top {
    width: 25%;
    float: left;
    padding: 11px;
    text-align: center;
}span.tps {
    display: block;
}
</style>
<div class="container-fluid py-4 pe-0 pe-md-3 px-3 m-0">
<div class="row">
<div class="col-lg-12 col-sm-12 mt-2">
  <div class="card z-index-2">
    <div class="card-header pb-0 center">
      <h6>المتاجر</h6>
    </div>
    <div class="top-pay">
        <form action="{{route('super.subs',$user->id)}}" method="post">
            @csrf
        <div class="item-top">
            <span class="tpe">الاشتراكات</span>
            <span class="tps">
                <select class="form-control" name="subscription" id="subscription">
                    @foreach ($plans as $plan)
                    <option value="{{$plan->id}}" @if ($plan->id == $user->type)
                         selected
                          @endif>{{$plan->name}}</option>
                    @endforeach
                </select>
            </span>
        </div>
        <div class="item-top">
            <span class="tpe">عدد الطلبات</span>
            <span class="tps">
               <input class="form-control" type="number" name="orders" value="{{$user->store}}">
            </span>
        </div>
        <div class="item-top">
            <span class="tpe">عدد الطلبات الحالية</span>
            <span class="tps">
               <input class="form-control" type="number" name="store" value="{{$user->orders}}">
            </span>
        </div>
        <div class="item-top">
            <span class="tpe">مدة الاشتراك</span>
            <span class="tps">
                @php
                    if (isset($user->duration)) {
                        $start_date = date('Y-m-d', strtotime($user->duration));
                    } else {
                        $start_date = date('Y-m-d', strtotime('1 days ago')); 
                    }
                @endphp
                <input type="hidden" name="hideduration" value="{{ $start_date }}">
                <input class="form-control" type="date" name="duration" value="{{ $start_date }}">
            </span>
        </div>
        <input class="btn bg-gradient-primary mb-0 pe-4" type="submit" value="تحديث">
    </form>
    </div>
    <div class="table-responsive">
        <table class="table table-flush" id="products-list">
        <thead class="thead-light">
        <tr>
            <th>معرف الطلب</th>
            <th>المدة</th>
            <th>السعر</th>
            <th>الاشتراك</th>
            <th>تاريخ الانشاء</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tenents as $tenent)
        <tr>
            <td class="text-sm">{{$tenent->id}}</td>
            <td class="text-sm">{{ date('d-m-Y', strtotime($tenent->duration)) }}</td>
            <td class="text-sm">{{formatprice($tenent->price)}}</td>
            <td class="text-sm">
                @php
                    $subs = App\Models\PlanMain::find($tenent->plan_id);
                @endphp
                {{$subs->name}}
            </td>
            <td class="text-sm">{{ date('d-m-Y', strtotime($tenent->created_at)) }}
            </td>
        </tr>
   
        @endforeach
    </tbody>
</table>
<!--pagination start-->
<div class="d-flex align-items-center justify-content-between py-3 px-4">
<span class="smaller">يتم عرض
    {{ $tenents->firstItem() }} {{ __('الى') }} {{ $tenents->lastItem() }} {{ __('من') }}
    {{ $tenents->total() }} {{ __('الطلبات') }}</span>
<nav class="paginate">
    {{ $tenents->links() }}
</nav>
</div>

</div>
</div>






<div class="col-lg-12 col-sm-12 mt-2">
    <div class="card z-index-2">
      <div class="card-header pb-0 center">
        <h6>الاحالة</h6>
        <div class="top-pay">
            <form action="{{route('super.aftt',$user->id)}}" method="post">
            @csrf
            @php
                    $price = 0;
                    $code = '';
                    $afts =  App\Models\affiliateAdmin::where('user',$user->id)->first();
                   if ( $afts) {
                    $code = $afts->code;
                    $price = $afts->price;
                   }
                   @endphp
            <div class="item-top">
                <span class="tpe">كود الاحالة</span>
                <span class="tps">
                   <input class="form-control" type="text" name="aftt" value="{{$code}}">
                </span>
            </div>
            <div class="item-top">
                <span class="tpe">مبلغ الاشتراك</span>
                <span class="tps">
                    
                   <input class="form-control" type="text" name="price" value="{{$price}}">
                </span>
            </div>

            <input class="btn bg-gradient-primary mb-0 pe-4" type="submit" value="تفعيل">
        </form>
        </div>
      </div>
    </div></div>
  

  </div>
</div>
</div>
    </div>

@endsection
@push('js-page')
<script src="{{ asset('assets/js/datatables.js') }}"></script>
<script>
    if (document.getElementById('products-list')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
        searchable: true,
        fixedHeight: false,
        responsive: true
        });
    };

</script>


@endpush