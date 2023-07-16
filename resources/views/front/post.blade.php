@extends('front.master')

@section('title', 'Bài viết')

@section('content')
<section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-6">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src="assets/images/{{ $post->image }}" alt="">
                      </div>
                      <div class="down-content" style="padding: 30px">
                        <span>{{ $post->category_name }}</span>
                        <a href="{{ route('post_detail.index', $post->id) }}"><h4>{{ $post->title }}</h4></a>
                        <ul class="post-info">
                          <li><a href="#">{{ $post->author_name }}</a></li>
                          <li><a href="#">{{ \Carbon\Carbon::parse($post->public_date)->format(config('constant.DATE_FORMAT_VIEW')) }}</a></li>
                          <li><a href="#">12 Comments</a></li>
                        </ul>
                        <p>{{ $post->introduction }}</p>
                        <div class="post-options">
                          <div class="row">
                            <div class="col-lg-12">
                              @if(count($post->tags) > 0)
                                <ul class="post-tags">
                                  <li><i class="fa fa-tags"></i></li>
                                  @foreach ($post->tags as $key => $tag)
                                    <li><a href="#">{{ $tag->name }}</a>{{ $key === $post->tags->keys()->last() ? '' : ', ' }}</li>
                                  @endforeach
                                </ul>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              <div class="col-lg-12">
                <ul class="page-numbers">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          @include('front.sidebar')
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
  <script>
      $('.nav-item.post').addClass('active');
  </script>
@endsection