<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="وصفات طبخ شهية لأطباق رئيسية باللحم و الدجاج و أطباق جانبية ووصفات المكرونة و الارز و الخضار">
    <meta name="keywords" content="دابت, وجبات صحية, أطباق الأسماك وثمار البحر, وصفات دجاج, مكرونة وباستا, أطباق الخضار, أكلات اللحوم">
    <title>@yield('title','اكلات ماما')</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css')}}" rel="stylesheet">
   
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="/">
            <img class="logo-dark" src="{{ asset('img/logo.png') }}" alt="logo">
           
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            <li class="nav-item">
              <a class="nav-link" href="#">أطباق رئيسية </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"> أكلات صحية </a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="#">حلويات </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">مشروبات </a>
            </li>

         
          </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success" href="/register">Register</a>

      </div>
    </nav><!-- /.navbar -->


@yield('header')


<main class="main-content">
@yield('content')
</main>



<!-- Footer -->
<footer class="footer">
    <div class="container">
      <div class="row gap-y align-items-center">

        <div class="col-6 col-lg-3">
          <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
        </div>

        <div class="col-6 col-lg-3 text-right order-lg-last">
          <div class="social">
            <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
            <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
            <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
            <a class="nav-link" href="../uikit/index.html">Elements</a>
            <a class="nav-link" href="../block/index.html">Blocks</a>
            <a class="nav-link" href="../page/about-1.html">About</a>
            <a class="nav-link" href="../blog/grid.html">Blog</a>
            <a class="nav-link" href="../page/contact-1.html">Contact</a>
          </div>
        </div>

      </div>
    </div>
  </footer><!-- /.footer -->


  <!-- Scripts -->
  <script src="{{ asset('js/page.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script>
    $(document).ready(function () {
    $('.nav li a').click(function(e) {

        $('.nav li.active').removeClass('active');

        var $parent = $(this).parent();
        $parent.addClass('active');
        e.preventDefault();
    });
});
  </script>
  @yield('script')
</body>
</html>
