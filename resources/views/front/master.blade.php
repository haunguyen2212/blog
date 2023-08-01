<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{ asset('front') }}/">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="css/variables.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">

  @yield('style')

</head>

<body>

  @include('front.components.header')

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  @include('front.components.footer')

  <a href="javascript:void(0)" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="{{ asset('vendor/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/ajax_setup.js') }}"></script>
  <script src="{{ asset('front/js/search.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

  @yield('script')

</body>

</html>