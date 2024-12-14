@use('Illuminate\Support\Facades\Vite')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog - Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ Vite::asset('resources/admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ Vite::asset('resources/admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ Vite::asset('resources/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ Vite::asset('resources/admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ Vite::asset('resources/admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS & JS Files -->
    @vite(['resources/admin/assets/css/style.css', 'resources/admin/assets/js/main.js'])

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('admin.layouts.navigation')

    @include('admin._partials.aside')

    <main id="main" class="main">
        {{ $slot }}
    </main><!-- End #main -->

    @include('admin.layouts.footer')

    <!-- Vendor JS Files -->
    <script src="{{ Vite::asset('resources/admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/admin/assets/vendor/php-email-form/validate.js') }}"></script>

</body>

</html>