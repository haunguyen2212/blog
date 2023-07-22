<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
        <!-- <img src="img/logo.png" alt=""> -->
        <h1>HTR Blog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home.index') }}">Trang chủ</a></li>
          <li class="dropdown"><a href="category.html"><span>Danh mục</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            @if (isset($categories) && count($categories) > 0)
              <ul>
                @foreach ($categories as $category)
                    <li><a href="">{{ $category->name ?? '' }}</a></li> 
                @endforeach
              </ul>
            @endif
          </li>
          <li><a href="{{ route('post.index') }}">Bài viết</a></li>
          <li><a href="about.html">Thông tin</a></li>
          <li><a href="contact.html">Liên hệ</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="https://www.facebook.com/profile.php?id=100019248910993" class="mx-2" target="_blank"><span class="bi-facebook"></span></a>

        <a href="" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Tìm kiếm bài viết" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

</header><!-- End Header -->