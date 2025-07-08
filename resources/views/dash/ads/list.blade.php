
@extends('dash.layouts.back-end.app')

@section('title', __('الاعلانات'))

@push('css_or_js')
 
    <style>
         

        .color_primary {
            background-color: #32a466;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img src="{{ asset(main_path() . 'back-end/img/inhouse-subscription-list.png') }}" alt="">
                {{ __('الاعلانات') }}
                <span class="badge badge-soft-dark radius-50 fz-14 ml-1">{{ $ads->total() }}</span>
            </h2>
        </div> 


        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            {{-- <div class="col-lg-4">
                                <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="{{ __('general.search_by_name') }}" aria-label="Search ads"
                                            value="{{ request('search') }}">
                                        <input type="hidden" value="{{ request('status') }}" name="status">
                                        <button type="submit" class="btn btn--primary">{{ __('general.search') }}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div> --}}
                            <div class=" m-2">
                            {{-- <div class="col-lg-4 mt-3 mt-lg-0 d-flex flex-wrap gap-3 justify-content-lg-end"> --}}

                                {{-- @can('create_tenant') --}}
                                    <a href="{{ route('ads.create') }}" class="btn color_primary">
                                        <i class="tio-add"></i>
                                        <span class="text">{{ __('اضافة طلب') }}</span>
                                    </a>
                               
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable" style="text-align: {{ Session::get('locale') === 'ar' ? 'right' : 'left' }};"
                            class="table table-hover table-badsless table-thead-badsed table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th>{{ __('م') }}</th>
                                    <th class="text-center">{{ __('اسم العميل') }}</th>
                                    <th class="text-center">{{ __('الاعلان') }}</th>
                                    <th class="text-center">{{ __('تاريخ الطلب') }}</th> 
                                    <th class="text-center">{{ __('العمليات') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads as $k => $item_ads)
                                    <tr>
                                        <th scope="row">{{ $ads->firstItem() + $k }}</th>

                                        <td class="text-center">
                                            {{   ($item_ads->customer->name ?? __('general.not_available'))  }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item_ads->name ?? __('general.not_available')}}
                                        </td>
                                        <td class="text-center">
                                            {{ $item_ads->created_at ?? __('general.not_available')}}
                                        </td>

                                         

                                      
                                        <td>
                                         

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            {{ $ads->links() }}
                        </div>
                    </div>

                    @if (count($ads) == 0)
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
