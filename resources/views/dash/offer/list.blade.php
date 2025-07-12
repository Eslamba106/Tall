@extends('dash.layouts.back-end.app')

@section('title', __('استقبال العروض'))

@push('css_or_js')
    <style>
        .color_primary {
            background-color: #32a466;
            color: #fff;
        }
    </style>
    <style>
        .custom-check-wrap {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }

        .custom-check-input {
            display: none;
        }

        .custom-check-box {
            width: 30px;
            height: 30px;
            border: 2px solid #28a745;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .check-icon {
            display: none;
            color: #fff;
            font-size: 18px;
        }

        .custom-check-input:checked+.custom-check-box {
            background-color: #28a745;
            border-color: #28a745;
        }

        .custom-check-input:checked+.custom-check-box .check-icon {
            display: inline;
        }
    </style>
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img src="{{ asset(main_path() . 'back-end/img/inhouse-subscription-list.png') }}" alt="">
                {{ __('استقبال العروض') }}
                <span class="badge badge-soft-dark radius-50 fz-14 ml-1">{{ $offers->total() }}</span>
            </h2>
        </div>


        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="{{ __('بحث باسم العميل') }}" aria-label="Search ads"
                                            value="{{ request('search') }}">
                                        <input type="hidden" value="{{ request('status') }}" name="status">
                                        <button type="submit" class="btn btn--primary">{{ __('بحث') }}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                            <div class=" m-2">


                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable" style="text-align: {{ Session::get('locale') === 'ar' ? 'right' : 'left' }};"
                            class="table table-hover table-badsless table-thead-badsed table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th class="text-center"><input id="bulk_check_all" class="bulk_check_all "
                                            type="checkbox" /> {{ __('م') }}</th>

                                    <th class="text-center">{{ __('العميل') }}</th>
                                    <th class="text-center">{{ __('رقم الهاتف') }}</th>
                                    <th class="text-center">{{ __('العنوان') }}</th>
                                    <th class="text-center">{{ __('تاريخ العرض') }}</th>
                                    {{-- <th class="text-center">{{ __('العمليات') }}</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $k => $item_offers)
                                    <tr>
                                        {{-- <th scope="row " class="check_bulk_item text-center ">
                                            <label class="custom-check-wrap">
                                                <input type="checkbox" name="bulk_ids[]" value="{{ $item_offers->id }}"
                                                    class="custom-check-input" />
                                                <span class="custom-check-box">
                                                    <i class="check-icon">&#10003;</i>
                                                </span>
                                            </label>
                                        </th> --}}
                                        <th scope="row " class="check_bulk_item text-center " >
                                            <input class="check_bulk_item custom-checkbox " name="bulk_ids[]"
                                                    type="checkbox" value="{{ $item_offers->id }}" />
                                            {{ $offers->firstItem() + $k }}</th>

                                        <td class="text-center">
                                            {{ $item_offers->customer_name ?? __('general.not_available') }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item_offers->city->name ?? $item_offers->city->name_ar }} ..
                                            {{ $item_offers->district->name ?? $item_offers->district->name_ar }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item_offers->customer_phone ?? __('general.not_available') }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item_offers->created_at->shortAbsoluteDiffForHumans() ?? __('general.not_available') }}
                                        </td>




                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            {{ $offers->links() }}
                        </div>
                    </div>

                    @if (count($offers) == 0)
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="{{ asset(main_path() . 'back-end') }}/svg/illustrations/sorry.svg"
                                alt="Image Description">
                            <p class="mb-0">{{ __('general.no_data_to_show') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset(main_path() . 'back-end') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset(main_path() . 'back-end') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        $('.subscription_status_form').on('submit', function(event) {
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: " ",
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    if (data.success == true) {
                        toastr.success('{{ __('general.updated_successfully') }}');
                    } else if (data.success == false) {
                        toastr.error(
                            '{{ __('Status_updated_failed.') }} {{ __('Product_must_be_approved') }}'
                        );
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr("id");
            Swal.fire({
                title: "{{ __('general.are_you_sure_delete_this') }}",
                text: "{{ __('general.you_will_not_be_able_to_revert_this') }}!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('general.yes_delete_it') }}!",
                cancelButtonText: "{{ __('general.cancel') }}",
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: " ",
                        method: 'get',
                        data: {
                            id: id
                        },
                        success: function() {
                            toastr.success("{{ __('general.deleted_successfully') }}");
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
@endpush
