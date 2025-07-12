@extends('layouts.super')
@section('page-title')
    {{ __('الطلبات') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="d-lg-flex mt-4 mb-4">
                <div>
                    <h2 class="mb-0">{{ __('خطط الاشتراك') }}</h2>
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
                                        <th>اسم المستخدم</th>
                                        <th>اسم المتجر</th>
                                        <th>الاحالة</th>
                                        <th>الاشتراك</th>
                                        <th>تاريخ التسجيل</th>
                                        <th>الاجرائات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $key => $subs)
                                        @php
                                            $tenant = App\Models\Tenant::where('user_id', $subs->id)->first();
                                            $tenantStor = App\Models\Store::where('tenant_id', $subs->id)->first();
                                            // $tenantStor = App\Models\TenantStor::where('user_id',$subs->id)->first();
                                            $Subscription = App\Models\Subscription::find($subs->subscription);
                                        @endphp
                                        @if ($tenantStor)
                                            <tr>
                                                <td>
                                                    <h6 class="mr-2 ms-3 my-auto">{{ $subs->name }}</h6>
                                                </td>
                                                <td><a
                                                        href="https://{{ $tenantStor->domains . '.' . env('HOST_URL') }}">{{ $tenant->nametxt }}</a>
                                                </td>
                                                <td>
                                                    @if ($subs->affiliate)
                                                        <span class="badge-sm badge-success">
                                                            تمت الاحالة
                                                        </span>
                                                    @else
                                                        <span class="badge-sm badge-info">
                                                            عادي
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ $Subscription->name ?? '' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($subs->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('super.single', $tenantStor->name) }}"
                                                        class="editer">المتجر</a>
                                                    <a href="{{ route('bay.profile', $subs->id) }}" class="editer">الحساب</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <!--pagination start-->
                            <div class="d-flex align-items-center justify-content-between py-3 px-4">
                                <span class="smaller">يتم عرض
                                    {{ $user->firstItem() }} {{ __('الى') }} {{ $user->lastItem() }}
                                    {{ __('من') }}
                                    {{ $user->total() }} {{ __('المستخدمين') }}</span>
                                <nav class="paginate">
                                    {{ $user->links() }}
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
        <script src="{{ asset('assets/js/datatables.js') }}"></script>
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
                                toastr.success("تم تفعيل العقار", 'نجاح');
                            } else {
                                toastr.warning("تم تعطيل العقار", 'نجاح');
                            }
                        } else {
                            toastr.error(data.msg, "حدث خطأ ما");
                        }
                    });
            }
        </script>
    @endpush
