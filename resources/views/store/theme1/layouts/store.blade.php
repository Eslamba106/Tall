<!DOCTYPE html>
<html lang="ar" dir="rtl" class="white-mode">
@include('store.theme1.layouts.head')

<body class="main-content">

@yield('content')


@include('store.theme1.layouts.footer')

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/main-theme.js')}}"></script>
<script>
    $(".homelengo-box .content-top h6").text(function(a,t){return t.substr(0,50) + "..."});
    $('.menu-main-controlle').click(function() {
      $('.header-fixed-cov').toggleClass('active');
      $('.header-fixed').toggleClass('active');
    });
    $('.header-fixed-cov').click(function() {
      $('.header-fixed-cov').toggleClass('active');
      $('.header-fixed').toggleClass('active');
    });
    $('.close-fx').click(function() {
      $('.header-fixed-cov').toggleClass('active');
      $('.header-fixed').toggleClass('active');
    });

  <<script src="{{asset('assets/back-end')}}/js/toastr.js"></script>
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
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif
   
@stack('js-main')
</body>
</html>