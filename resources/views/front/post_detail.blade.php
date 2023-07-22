@extends('front.master')

@section('title', 'Bài viết')

@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">
                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta">
                        <span class="date">{{ $post->category_name ?? '' }}</span>
                        <span class="mx-1">&bullet;</span> <span>{{ \Carbon\Carbon::parse($post->public_date)->format(config('constant.DATE_FORMAT_VIEW')) }}</span>
                        </div>
                        <h1 class="mb-5">
                        {{ $post->title ?? '' }}
                        </h1>
                        {!! $post->content ?? '' !!}
                    </div>
                    <!-- End Single Post Content -->
        
                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">{{ $number_comment ?? '' }} Bình Luận</h5>
                        @if (isset($comments) && count($comments) > 0)
                            @foreach ($comments as $comment)
                                <div class="comment d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                        <img
                                            class="avatar-img"
                                            src="{{ asset('front/img/person-5.jpg') }}"
                                            alt=""
                                            class="img-fluid"
                                        />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">{{ $comment->user_name ?? '' }}</h6>
                                        <span class="text-muted">{{ \Carbon\Carbon::parse($comment->updated_at)->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-body">
                                            {!! htmlspecialchars($comment->content ?? '') !!}
                                        </div>
                        
                                        @if (count($comment->node_comments) > 0)
                                            <div class="comment-replies bg-light p-3 mt-3 rounded">
                                                <h6
                                                    class="comment-replies-title mb-4 text-muted text-uppercase"
                                                >
                                                    {{ count($comment->node_comments) }} phản hồi
                                                </h6>
                            
                                                @foreach ($comment->node_comments as $reply_key => $reply)
                                                    <div class="reply d-flex {{ $reply_key === $comment->node_comments->keys()->last() ? '' : 'mb-4' }}">
                                                        <div class="flex-shrink-0">
                                                        <div class="avatar avatar-sm rounded-circle">
                                                            <img
                                                            class="avatar-img"
                                                            src="{{ asset('front/img/person-4.jpg') }}"
                                                            alt=""
                                                            class="img-fluid"
                                                            />
                                                        </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2 ms-sm-3">
                                                        <div class="reply-meta d-flex align-items-baseline">
                                                            <h6 class="mb-0 me-2">{{ $reply->user_name ?? '' }}</h6>
                                                            <span class="text-muted">{{ \Carbon\Carbon::parse($reply->updated_at)->diffForHumans() }}</span>
                                                        </div>
                                                        <div class="reply-body">
                                                            {!! htmlspecialchars($reply->content ?? '') !!}
                                                        </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            @endforeach
                            
                        @endif
                    </div>
                    <!-- End Comments -->
                    <hr>
                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-2">
                        <div class="col-lg-12">
                            <h5 class="comment-title">Viết bình luận</h5>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="comment-name">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="comment-name"
                                        placeholder="Enter your name"
                                    />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="comment-email">Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="comment-email"
                                        placeholder="Enter your email"
                                    />
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="comment-message">Message</label>
                    
                                    <textarea
                                        class="form-control"
                                        id="comment-message"
                                        placeholder="Enter your name"
                                        cols="30"
                                        rows="10"
                                    ></textarea>
                                </div>
                                <div class="col-12">
                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Post comment"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Comments Form -->
                </div>
                <div class="col-md-3">
                    @include('front.components.sidebar')
                </div>
                
            </div>
        </div>
    </section>
@endsection