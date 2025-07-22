<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('login.login') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/finexerp_logo.png') }}"> --}}

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    {{-- <link rel="stylesheet" htrf="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


</head>

<body>
   <div class=" "  style="background-color: black">
    <div class="row align-items-center">
        <!-- الفورم -->
        <div class="col-md-6  " >
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="tab-content" id="first_step">
                    <div class="tab-pane fade show active" id="step1">
                        @include('auth.includes.first_part')
                    </div>
{{-- 
                    <div class="form-group mt-4 m-2 ">
                        <button id="first_next_btn" class="btn btn-primary " type="button">التالي</button>
                    </div> --}}
                </div>

                <!-- Step 2 -->
                <div class="d-none" id="second_step">
                    @include('auth.includes.second_part')
                     <div class="col-12">


                     {{-- <div class="form-group fm-mg-top-40">
                         <div class="fm-forms__button">
                             <button class="btn btn-primary" type="button"  id="first_pre_btn">السابق</button>
                             <button class="btn btn-primary"  type="submit"  id="second_next_btn" >التالي</button>
                         </div>
                     </div> --}}
                 </div>
                </div>
            </form>
        </div>

        <!-- الصورة -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('assets/images/login.png') }}" alt="Team Meeting" >
        </div>
    </div>
</div>

    @if (Session::has('success'))
        <script>
            swal("Message", "{{ Session::get('success') }}", 'success', {
                button: true,
                button: "Ok",
                timer: 3000,
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            swal("Message", "{{ Session::get('error') }}", 'error', {
                button: true,
                button: "Ok",
                timer: 3000,
            })
        </script>
    @endif
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Handle the click event for the next button
            $("#first_next_btn").on('click', function(e) {
                e.preventDefault();

                // Hide the first step and show the second step
                $("#first_step").addClass('d-none');
                $("#second_step").removeClass('d-none');
            });
            $("#first_pre_btn").on('click', function(e) {
                e.preventDefault();

                // Hide the first step and show the second step
                $("#first_step").removeClass('d-none');
                $("#second_step").addClass('d-none');
            });
        });
        // $("#first_next_btn").on('click', function(e) {
        //     e.preventDefault();

        //     $("#first_step").addClass('d-none');
        //     $("#second_step").removeClass('d-none');
        // });
    </script>
      {!! Toastr::message() !!}

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            @endforeach
        </script>
    @endif
</body>

</html>
