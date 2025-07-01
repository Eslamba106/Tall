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
    <style>
        .action-circle {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #fff;
            border-radius: 50px;
            padding: 10px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }

        .cancel-btn {
            background-color: #eee;
            color: #333;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .action-label {
            font-size: 14px;
            margin-top: 5px;
            text-align: center;
            color: #555;
        }
    </style>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="d-lg-flex mt-4 mb-4">
                <div>
                    <h2 class="mb-0">{{ __('كل الاعلانات') }}</h2>
                </div>
                <div class="me-auto my-auto mt-lg-0 mb-0">
                    <div class="ms-auto my-auto">
                        <a href="{{ route('estate.create') }}"
                            class="btn bg-gradient-primary btn-sm mb-0">{{ __('اضافة اعلان') }} +&nbsp; </a>
                    </div>
                </div>
            </div>
            <form action="{{ url()->current() }}" method="get">
                <div class="table-responsive">
                    <table id="datatable" style="text-align: {{ Session::get('locale') === 'ar' ? 'right' : 'left' }};"
                        class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                            <tr>
                                <th class="text-center"><input id="bulk_check_all" class="bulk_check_all" type="checkbox" />
                                    ID</th>
                                <th class="text-center">الاعلان</th>
                                <th class="text-center">النوع</th>
                                <th class="text-center">المعاملة</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">متوفر / غير متوفر</th>
                                <th class="text-center">تاريخ النشر</th>
                                <th class="text-center">الاجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estates as $key => $estate)
                                <tr>
                                    <th scope="row">
                                        <input class="check_bulk_item" name="bulk_ids[]" type="checkbox"
                                            value="{{ $estate->id }}" />
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="text-center" style="display:flex;"><img class="estate-img-small"
                                            src="{{ getAsset($estate->thumbnail_image, 'sd') }}" alt="{{ $estate->name }}">
                                        <h6 class="mr-2 ms-3 my-auto">{{ $estate->name }}</h6>
                                    </td>
                                    <td class="text-center">{{ $estate->type }}</td>
                                    <td class="text-center">{{ $estate->goal }}</td>
                                    <td class="text-center">{{ $estate->city }} / {{ $estate->statetxt }} </td>
                                    <td class="text-center">
                                        <div class="form-check form-switch">
                                            <input @if ($estate->status == 1) checked @endif type="checkbox"
                                                onchange="updatePublishedStatus(this)" class="form-check-input"
                                                value="{{ $estate->id }}">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mr-2 ms-3 my-auto">
                                            {{ date('d-m-Y', strtotime($estate->created_at)) }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('estate.edit', $estate->id) }}" class="editer">تعديل</a>
                                        <a href="" class="deleter ">
                                            <form class="form-delete" style="display: none"
                                                action="{{ route('estate.destroy', $estate->id) }}" method="post">
                                                @csrf
                                            </form>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z">
                                                </path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($estates->count() != 0) 
                    <div style="text-align:center;">
                        <div class="action-circle">
                            <button class="delete-btn" type="submit" name="bulk_action_btn" value="delete"><i class="fas fa-trash-alt"></i></button>
                            {{-- <button class="cancel-btn"><i class="fas fa-times"></i></button> --}}
                        </div>
                        {{-- <div class="action-label">حذف</div> --}}
                    </div>
                    @endif
                    <!--pagination start-->
                    <div class="d-flex align-items-center justify-content-between py-3 px-4">
                        <span class="smaller">يتم عرض
                            {{ $estates->firstItem() }} {{ __('الى') }} {{ $estates->lastItem() }}
                            {{ __('من') }}
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
    </form>
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
    <script src="{{ asset('assets/js/datatables.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).on('change', '.bulk_check_all', function() {
            $('input.check_bulk_item:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
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
                            toastr.success("تم تفعيل الاعلان", 'نجاح');
                        } else {
                            toastr.warning("تم تعطيل الاعلان", 'نجاح');
                        }
                    } else {
                        toastr.error(data.msg, "حدث خطأ ما");
                    }
                });
        }

        /*
         *   Delete items
         */
        $('.deleter').click(function(event) {
            event.preventDefault();
            $('.delete-row-thumb').removeClass('d-none');
            $('.delete-row').removeClass('d-none');
            var main = $(this);
            $('.icon-st.claen').click(function() {
                $('.delete-row-thumb').addClass('d-none');
                $('.delete-row').addClass('d-none');
            });
            $('.deleter-conf').click(function() {
                main.children('.form-delete').submit();
            });
        });
    </script>
@endpush
