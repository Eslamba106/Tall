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

  </script>
@stack('js-main')
</body>
</html>