@extends('layouts.admin')
@section('page-title')
    {{ __('الطلبات') }}
@endsection
@section('content')
<style>
  ul.status-row.status-row-main {
    display: flex;
    width: 100%;
    padding: 0 20px;
    justify-content: space-between;
    margin-top: 10px;
}li.status {
  list-style: none;
    display: flex;
    transition: 0.3s;
    flex: 1;
    justify-content: space-around;
    background: #f3f5f7;
    margin: 5px;
    border-radius: 14px;
    padding: 20px 0;
    color: #000000;
    font-size: 0.9em;
    cursor: pointer;
    flex-direction: column;
    border-radius: 35px;
    box-shadow: -2px 2px 5px 0px #00000017;
}li.status span.nump {
    font-weight: 600;
    font-size: 1.5em;
    transition: 0.3s;
}li.status.active {
    background: #32a466;
    color: #fff;
}li.status.active span.nump {
    background: #fff;
    color: #000;
    padding: 0 15px;
    border-radius: 23px;
}span.svg-deals svg {
    width: 50px;
    height: 50px;
    fill: #32a466;
}span.svg-deals {
    text-align: center;
    margin-bottom: 10px;
}
span.ccontent-d {
    display: flex
;
    align-items: center;
    justify-content: space-around;
    flex: 1;
}li.status.active span.svg-deals svg path {
    stroke: #ffffff !important;
}input#search {
    flex: 1;
    background: none;
    color: #000 !important;
}.content-csa {
    width: 100%;
    background: #f3f5f7;
    border-radius: 15px;
    display: flex
;
    align-items: center;
    justify-content: space-between;
}button.btn.btn-primary {
    margin: 0;
    background: #fff;
    border-radius: 15px;
}li.status.status-inv.active span.svg-deals svg path {
    fill: #ffffff;
    stroke: none !important;
}li.status.status-ft svg {
    background: none;
    fill: none;
    stroke: #32a466;
}
</style>
<div class="row">
    <div class="col-12 mt-4">
      <div class="d-lg-flex mt-4 mb-4">

      <div>
        <h2 class="mb-0">{{__('كل الطلبات')}}</h2>
        </div>
        <div class="me-auto my-auto mt-lg-0 mt-4">
        <div class="ms-auto my-auto">
        <a href="{{route('deals.create')}}" class="btn bg-gradient-primary btn-sm mb-0">{{__('طلب جديد')}} +&nbsp; </a>
     
        </div>
        </div>
        </div>
    <div class="card">
    
    <div class="card-header pb-0">

    <div class="card-body px-0 pb-0">
    <div class="table-responsive">
      <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
        <div class="card-header border-bottom-0 p-0">
            <div class="row g-3">
              <div class="col-lg-12 col-sm-12">
                <div class="input-group" style="padding: 0 30px;">
                  <div class="content-csa">
                    <input type="text" id="search" class="form-control rounded-start w-100" placeholder="اسم أو رقم الهاتف"
                        name="search"
                        @isset($searchKey)
                        value="{{ $searchKey }}"
                        @endisset>
                        <button type="submit" class="btn btn-primary">
                          بحث
                      </button>
                    </div>
                </div>
            </div>     
              <div class="col-lg-12 col-sm-12">
                <ul class="status-row status-row-main">
                  <li class="status status-ft active" data-status="1"><span class="svg-deals"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 7.75V14.5C18 13.4 17.1 12.5 16 12.5H8C6.9 12.5 6 13.4 6 14.5V7.75C6 6.65 6.9 5.75 8 5.75H16C17.1 5.75 18 6.65 18 7.75Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19 15.75H18"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 15.75H5"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 14V11C18 9.9 17.1 9 16 9H8C6.9 9 6 9.9 6 11V14"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 14.5V15.75H14.5C14.5 17.13 13.38 18.25 12 18.25C10.62 18.25 9.5 17.13 9.5 15.75H6V14.5C6 13.4 6.9 12.5 8 12.5H16C17.1 12.5 18 13.4 18 14.5Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></span><span class="ccontent-d"><span class="status-txt">كل الطلبات</span><span class="nump">{{$estates0}}</span></span></li>
                  <li class="status" data-status="1"><span class="svg-deals"><svg style="fill: none;stroke: #32a466;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M7.99995 22H15.9999C20.0199 22 20.7399 20.39 20.9499 18.43L21.6999 10.43C21.9699 7.99 21.2699 6 16.9999 6H6.99995C2.72995 6 2.02995 7.99 2.29995 10.43L3.04995 18.43C3.25995 20.39 3.97995 22 7.99995 22Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 6V5.2C8 3.43 8 2 11.2 2H12.8C16 2 16 3.43 16 5.2V6"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 13V14C14 14.01 14 14.01 14 14.02C14 15.11 13.99 16 12 16C10.02 16 10 15.12 10 14.03V13C10 12 10 12 11 12H13C14 12 14 12 14 13Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.65 11C19.34 12.68 16.7 13.68 14 14.02"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2.62 11.27C4.87 12.81 7.41 13.74 10 14.03"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></span><span class="ccontent-d"><span class="status-txt">طلب جديد</span><span class="nump">{{$estates1}}</span></span></li>
                  <li class="status status-inv" data-status="3"><span class="svg-deals"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" data-name="Layer 1" id="Layer_1"><title/><path class="cls-1" d="M30.68,19.05l-1.9.64-1.65-9.06,4.24-1.7a1,1,0,1,0-.74-1.86l-5,2A1,1,0,0,0,25,10.18l0,.18-2.39,1.19a1,1,0,0,1-1.05-.09L19.13,9.6a3,3,0,0,0-1.8-.6H14.62a2,2,0,0,0-1.78,1.09L11.05,10a1,1,0,0,0-.5.11l-1.67.83L6,10.22l0-.13a1,1,0,0,0-.55-1l-4-2a1,1,0,0,0-.9,1.78l3.39,1.7-.82,9.06-1.8-.6A1,1,0,1,0,.68,21l3,1A1.19,1.19,0,0,0,4,22a1.1,1.1,0,0,0,.55-.16A1,1,0,0,0,5,21.09l.08-.93,1.29.64a3.07,3.07,0,0,0,1.09,1.89l5.77,4.14a2,2,0,0,0,2.84-.3,2.91,2.91,0,0,0,2.36-.13l5.41-2.7A2.31,2.31,0,0,0,25.08,22a1.71,1.71,0,0,0,0-.32l1.9-.63,0,.12a1,1,0,0,0,.47.68A1,1,0,0,0,28,22a1.19,1.19,0,0,0,.32-.05l3-1a1,1,0,1,0-.64-1.9Zm-22,2.06A1,1,0,0,1,8.38,20a.2.2,0,0,1,.15-.14c.06,0,.14,0,.26.08l6.05,4.37-.33,1,0,0Zm14.26.8-5.41,2.7a1,1,0,0,1-.76.06,2,2,0,0,0-.72-1.92l-6-4.37A2.22,2.22,0,0,0,8,18a2.19,2.19,0,0,0-1.18.84l-1.36-.68a.61.61,0,0,0-.18-.05l.53-5.83,3,.74L9,13a1,1,0,0,0,.45-.11L11.21,12l.65,0-.75,1.51a1,1,0,0,0,.44,1.34l.21.11a3,3,0,0,0,3.83-1h1l6.38,7.29a1.19,1.19,0,0,0,.09.15.26.26,0,0,1,.08.25A.27.27,0,0,1,23,21.91Zm1.36-2.07-6.56-7.5A1,1,0,0,0,17,12H15a1,1,0,0,0-.89.55l-.11.21a1,1,0,0,1-.5.47L14.62,11h2.71a1,1,0,0,1,.6.2l2.48,1.86a3,3,0,0,0,3.14.28l1.87-.93,1.21,6.66Z"/></svg></span><span class="ccontent-d"><span class="status-txt">المفاوضات</span><span class="nump">{{$estates3}}</span></span></li>
                  <li class="status" data-status="4"><span class="svg-deals"><svg style="fill: none;stroke: #32a466;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M12 18.2C14.2091 18.2 16 16.4091 16 14.2C16 11.9908 14.2091 10.2 12 10.2C9.79086 10.2 8 11.9908 8 14.2C8 16.4091 9.79086 18.2 12 18.2Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.4399 14.2999L11.0899 14.9499C11.2799 15.1399 11.5899 15.1399 11.7799 14.9599L13.5599 13.3199"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.99995 22H15.9999C20.0199 22 20.7399 20.39 20.9499 18.43L21.6999 10.43C21.9699 7.99 21.2699 6 16.9999 6H6.99995C2.72995 6 2.02995 7.99 2.29995 10.43L3.04995 18.43C3.25995 20.39 3.97995 22 7.99995 22Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 6V5.2C8 3.43 8 2 11.2 2H12.8C16 2 16 3.43 16 5.2V6"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.65 11C19.92 12.26 18 13.14 16.01 13.64"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2.62 11.27C4.29 12.41 6.11 13.22 8 13.68"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></span><span class="ccontent-d"><span class="status-txt">تمت البيعة</span><span class="nump">{{$estates4}}</span></span></li>
                  <li class="status" data-status="5"><span class="svg-deals"><svg style="fill: none;stroke: #32a466;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M12 18.2C14.2091 18.2 16 16.4091 16 14.2C16 11.9908 14.2091 10.2 12 10.2C9.79086 10.2 8 11.9908 8 14.2C8 16.4091 9.79086 18.2 12 18.2Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.07 15.31L10.95 13.2"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.0501 13.22L10.9301 15.34"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.99995 22H15.9999C20.0199 22 20.7399 20.39 20.9499 18.43L21.6999 10.43C21.9699 7.99 21.2699 6 16.9999 6H6.99995C2.72995 6 2.02995 7.99 2.29995 10.43L3.04995 18.43C3.25995 20.39 3.97995 22 7.99995 22Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 6V5.2C8 3.43 8 2 11.2 2H12.8C16 2 16 3.43 16 5.2V6"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.65 11C19.92 12.26 18 13.14 16.01 13.64"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2.62 11.27C4.29 12.41 6.11 13.22 8 13.68"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></span><span class="ccontent-d"><span class="status-txt">الغية البيعة</span><span class="nump">{{$estates5}}</span></span></li>
              </ul>
                </div>
                               
            </div>
        </div>
    </form>
    <table class="table table-flush" id="products-list">
    <thead class="thead-light">
    <tr>
    <th>اسم العميل</th>
    <th>المرحلة</th>
    <th>الموقع</th>
    <th>تاريخ الاجراء</th>
    <th>الاجرائات</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($deals as $key => $deal)
      @php
        $user = App\Models\Customer::find($deal->user);
      @endphp
      <tr>
          <td>
            {{$user->name}}
            </td>  
            <td>
              @php
          $content = 'صفقة جديدة';
        if ($deal->status == 2) {
            $content = 'زيارة العقار';
        }elseif ($deal->status == 3) {
            $content = 'المفاوضات';
        }elseif ($deal->status == 4) {
            $content = 'تمت الصفقة';
        }elseif ($deal->status == 5) {
            $content = 'خسارة الصفقة';
        }
              @endphp
             <span class="status-main"> {{$content}}</span>
              </td>    
              <td>
              {{$deal->city}}
            </td>  
          <td>
            <h6 class="mr-2 ms-3 my-auto">{{ date('d-m-Y', strtotime($deal->created_at)) }}</h6>
        </td>
        <td>
         <a href="{{route('deals.edit',$deal->id)}}" class="editer">تعديل</a>
      </td>  
        </tr>
        @endforeach
    </tbody>
    </table>

<!--pagination start-->
<div class="d-flex align-items-center justify-content-between py-3 px-4">
  <span class="smaller">يتم عرض 
      {{ $deals->firstItem() }} {{ __('الى') }} {{ $deals->lastItem() }} {{ __('من') }}
      {{ $deals->total() }} {{ __('الصفقات') }}</span>
  <nav class="paginate">
      {{ $deals->links() }}
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
    $('.status-row-main .status').click(function() {
      $('.status').removeClass('active');
      $(this).addClass('active');
      $.post('{{ route('deals.change') }}', {
                    _token: '{{ csrf_token() }}',
                    status: $(this).attr('data-status')
                },
                function(data) {
                  console.log(data);
                  $('#products-list').html(data.data);
                });
    });
  </script>

@endpush