
<!-- Core JS Files -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/perfect-scrollbar.min.js')}}"></script>
<!-- Main javaScript -->
<script src="{{asset('assets/js/dashboard.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (session()->has('error'))
<script>
    toastr.error("{{ session('error') }}","فشلت العملية");
</script>
@endif
@if (session()->has('success'))
<script>
    toastr.success("{{ session('success') }}","تمت العملية بنجاح");
</script>
@endif
@stack('js-page')
