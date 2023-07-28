<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">Về HTR Blog</h3>
            <p>HTR Blog là nơi tôi chia sẻ và ghi lại những kiến thức, kinh nghiệm  trong lĩnh vực lập trình. Tại đây, bạn sẽ tìm thấy những bài viết, hướng dẫn và mẹo hữu ích để trở thành một lập trình viên xuất sắc.</p>
            <p><a href="{{ route('about.index') }}" class="footer-link-more">Xem thêm</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Điều hướng</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="{{ route('home.index') }}"><i class="bi bi-chevron-right"></i> Trang chủ</a></li>
              <li><a href="{{ route('category.index') }}"><i class="bi bi-chevron-right"></i> Danh mục</a></li>
              <li><a href="{{ route('post.index') }}"><i class="bi bi-chevron-right"></i> Bài viết</a></li>
              <li><a href="{{ route('about.index') }}"><i class="bi bi-chevron-right"></i> Thông tin</a></li>
              <li><a href="{{ route('contact.index') }}"><i class="bi bi-chevron-right"></i> Liên hệ</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Danh mục</h3>
            @if(isset($categories) && count($categories) > 0)
              <ul class="footer-links list-unstyled">
                @foreach ($categories as $category)
                  <li><a href="{{ route('category.show', $category->slug) }}"><i class="bi bi-chevron-right"></i> {{ $category->name ?? '' }}</a></li>
                @endforeach
              </ul>
            @endif
          </div>

          <div class="col-lg-4">
            <h3 class="footer-heading">Nổi bật</h3>

            @if (isset($top_posts) && count($top_posts) > 0)
            <ul class="footer-links footer-blog-entry list-unstyled">
              @foreach ($top_posts as $post)
                <li>
                  <a href="{{ route('post_detail.index', $post->slug) }}" class="d-flex align-items-center">
                    <img src="img/post-sq-1.jpg" alt="" class="img-fluid me-3">
                    <div>
                      <div class="post-meta d-block"><span class="date">{{ $post->category_name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>{{ \Carbon\Carbon::parse($post->public_date)->format(config('constant.DATE_FORMAT_VIEW')) }}</span></div>
                      <span>{{ $post->title ?? '' }}</span>
                    </div>
                  </a>
                </li>
              @endforeach
            </ul>
            @endif

          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright text-center">
              © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
            </div>

            <div class="credits text-center">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
          </div>

        </div>

      </div>
    </div>

  </footer>