<!-- ======= Sidebar ======= -->
<div class="aside-block">
    <ul
    class="nav nav-pills custom-tab-nav mb-4"
    id="pills-tab"
    role="tablist"
    >
    <li class="nav-item" role="presentation">
        <button
        class="nav-link active"
        id="pills-trending-tab"
        data-bs-toggle="pill"
        data-bs-target="#pills-trending"
        type="button"
        role="tab"
        aria-controls="pills-trending"
        aria-selected="true"
        >
        Phổ biến
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button
        class="nav-link"
        id="pills-latest-tab"
        data-bs-toggle="pill"
        data-bs-target="#pills-latest"
        type="button"
        role="tab"
        aria-controls="pills-latest"
        aria-selected="false"
        >
        Mới nhất
        </button>
    </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <!-- Trending -->
        <div
            class="tab-pane fade show active"
            id="pills-trending"
            role="tabpanel"
            aria-labelledby="pills-trending-tab"
        >
            @if (isset($trending_posts) && count($trending_posts) > 0)
                @foreach ($trending_posts as $post)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta">
                            <span class="date">{{ $post->category_name ?? '' }}</span>
                            <span class="mx-1">&bullet;</span> <span>{{ format_date($post->public_date) }}</span>
                        </div>
                        <h2 class="mb-2">
                            <a href="{{ route('post_detail.index', $post->slug) }}"
                            >{{ $post->title ?? '' }}</a
                            >
                        </h2>
                        <span class="author mb-3 d-block">{{ $post->author_name ?? '' }}</span>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- End Trending -->

        <!-- Latest -->
        <div
            class="tab-pane fade"
            id="pills-latest"
            role="tabpanel"
            aria-labelledby="pills-latest-tab"
        >
            @if(isset($latest_posts) && count($latest_posts) > 0)
                @foreach ($latest_posts as $post)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta">
                            <span class="date">{{ $post->category_name ?? '' }}</span>
                            <span class="mx-1">&bullet;</span> <span>{{ format_date($post->public_date) }}</span>
                        </div>
                        <h2 class="mb-2">
                            <a href="{{ route('post_detail.index', $post->slug) }}"
                            >{{ $post->title ?? '' }}</a
                            >
                        </h2>
                        <span class="author mb-3 d-block">{{ $post->author_name ?? '' }}</span>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- End Latest -->
    </div>
</div>

@if (isset($categories))
    <div class="aside-block">
        <h3 class="aside-title">Danh mục</h3>
        <ul class="aside-links list-unstyled">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category.show', $category->slug) }}"
                    ><i class="bi bi-chevron-right"></i> {{ $category->name ?? '' }}</a
                    >
                </li>
            @endforeach
        </ul>
    </div>
    <!-- End Categories --> 
@endif

@if (isset($tags))
    <div class="aside-block">
        <h3 class="aside-title">Tags</h3>
        <ul class="aside-tags list-unstyled">
            @foreach ($tags as $tag)
                <li><a href="{{ route('tag.index', $tag->slug) }}">{{ $tag->name ?? '' }}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- End Tags -->
@endif
