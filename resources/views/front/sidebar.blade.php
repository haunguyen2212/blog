<div class="sidebar">
  <div class="row">
    <div class="col-lg-12">
      <div class="sidebar-item search">
        <form id="search_form" name="gs" method="GET" action="#">
          <input type="text" name="q" class="searchText" placeholder="Nhập để tìm kiếm..." autocomplete="on">
        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="sidebar-item recent-posts">
        <div class="sidebar-heading">
          <h2>Bài viết gần đây</h2>
        </div>
        <div class="content">
          <ul>
            @foreach ($recent_post as $post)
              <li><a href="post-details.html">
                <h5>{{ $post->title }}</h5>
                <span>{{ \Carbon\Carbon::parse($post->public_date)->format('F d, Y') }}</span>
              </a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="sidebar-item categories">
        <div class="sidebar-heading">
          <h2>Danh mục</h2>
        </div>
        <div class="content">
          <ul>
            <li><a href="#">- Cấu trúc dữ liệu & Giải thuật</a></li>
            <li><a href="#">- PHP cơ bản</a></li>
            <li><a href="#">- Laravel framework</a></li>
            <li><a href="#">- Responsive Templates</a></li>
            <li><a href="#">- HTML5 / CSS3 Templates</a></li>
            <li><a href="#">- Creative &amp; Unique</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="sidebar-item tags">
        <div class="sidebar-heading">
          <h2>Tag Clouds</h2>
        </div>
        <div class="content">
          <ul>
            @foreach ($tags as $tag)
              <li><a href="#">{{ $tag->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>