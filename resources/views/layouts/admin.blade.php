<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('layouts.head')

<body class="g-sidenav-show rtl bg-gray-100">
    <!-- [ navigation menu ] start -->
    @include('layouts.menu')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps__rtl ps--active-y">

        <!-- [ Nav ] start -->
        @include('layouts.nav')

        <div class="container-fluid py-4 pe-0 pe-md-3 px-3 m-0">
            <!-- [ Main Content ] start -->
            @yield('content')
        </div>
        <!-- [ Footer ] start -->
        @include('layouts.footer')
    </main>

    <script>
        $(document).on('change', '.bulk_check_all', function() {
            $('input.check_bulk_item:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
</body>

</html>
