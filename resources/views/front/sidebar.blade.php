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
              <li><a href="{{ route('post_detail.index', $post->id) }}">
                <h5>{{ $post->title }}</h5>
                <span>{{ \Carbon\Carbon::parse($post->public_date)->diffForHumans() }}</span>
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
            @foreach ($categories as $category)
              <li><a href="#">- {{ $category->name }}</a></li>
            @endforeach
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