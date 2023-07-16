@extends('front.master')

@section('title', 'Bài viết')

@section('content')
<section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="assets/images/{{ $post->image ?? '' }}" alt="">
                  </div>
                  <div class="down-content">
                    <span>Lifestyle</span>
                    <h4>{{ $post->title ?? '' }}</h4>
                    <ul class="post-info">
                      <li><a href="#">{{ $post->author_name ?? '' }}</a></li>
                      <li><a href="#">{{ \Carbon\Carbon::parse($post->public_date)->format(config('constant.DATE_FORMAT_VIEW')) }}</a></li>
                      <li><a href="#">{{ $number_comment ?? '0' }} bình luận</a></li>
                    </ul>
                    <div>{!! $post->content ?? '' !!}</div>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            @foreach ($post->tags as $key => $tag)
                              <li><a href="#">{{ $tag->name }}</a>{{ $key === $post->tags->keys()->last() ? '' : ', ' }}</li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item comments">
                  <div class="sidebar-heading">
                    <h2>{{ $number_comment }} bình luận</h2>
                  </div>
                  @if (isset($comments) && count($comments) > 0)
                    <div class="content">
                      <ul class="row">
                        @foreach ($comments as $comment)
                          <li class="col-12">
                            <div class="author-thumb">
                              <img src="assets/images/comment-author-01.jpg" alt="">
                            </div>
                            <div class="right-content">
                              <h4>{{ $comment->user_name ?? '' }}<span>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span></h4>
                              <p>{{ $comment->content ?? '' }}</p>
                            </div>
                          </li>
                          @foreach ($comment->node_comments as $node_comment)
                            <li class="col-12 replied">
                              <div class="author-thumb">
                                <img src="assets/images/comment-author-02.jpg" alt="">
                              </div>
                              <div class="right-content">
                                <h4>{{ $node_comment->user_name ?? '' }}<span>{{ \Carbon\Carbon::parse($node_comment->created_at)->diffForHumans() }}</span></h4>
                                <p>{{ $node_comment->content ?? '' }}</p>
                              </div>
                          </li>
                          @endforeach
                        @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item submit-comment">
                  <div class="sidebar-heading">
                    <h2>Viết bình luận</h2>
                  </div>
                  <div class="content">
                    <form id="comment" action="#" method="post">
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="name" type="text" id="name" placeholder="Tên của bạn" required="">
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="email" type="text" id="email" placeholder="Địa chỉ email" required="">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="message" rows="6" id="message" placeholder="Nội dung" required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Bình luận</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
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