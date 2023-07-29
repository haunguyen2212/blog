@extends('front.master')

@section('title', 'Trang chủ')

@section('content')

    @if(isset($top_post) && $top_post->isNotEmpty())
        <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">
                            <a href="{{ route('post_detail.index', $top_post->first()->slug) }}"><img src="{{ asset('front/img/post-landscape-1.jpg') }}" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">{{ $top_post->first()->category_name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>{{ format_date($top_post->first()->public_date) }}</span></div>
                            <h2><a href="{{ route('post_detail.index', $top_post->first()->slug) }}">{{ $top_post->first()->title ?? '' }}</a></h2>
                            <p class="mb-4 d-block">{{ $top_post->first()->introduction ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($top_post->skip(1)->take(ceil($top_post->count()) / 2) as $post)
                                    <div class="post-entry-1">
                                        <a href="{{ route('post_detail.index', $post->slug) }}"><img src="{{ asset('front/img/post-landscape-2.jpg') }}" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $post->category_name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>{{ format_date($post->public_date) }}</span></div>
                                        <h2><a href="{{ route('post_detail.index', $post->slug) }}">{{ $post->title ?? '' }}</a></h2>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($top_post->skip(ceil($top_post->count()) / 2 + 1) as $post)
                                    <div class="post-entry-1">
                                        <a href="{{ route('post_detail.index', $post->slug) }}"><img src="{{ asset('front/img/post-landscape-3.jpg') }}" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $post->category_name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>{{ format_date($post->public_date) }}</span></div>
                                        <h2><a href="{{ route('post_detail.index', $post->slug) }}">{{ $post->title ?? '' }}</a></h2>
                                    </div>
                                @endforeach
                            </div>
            
                            <!-- Trending Section -->
                            <div class="col-lg-4">
                            @if (isset($trending))
                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">           
                                        @foreach ($trending as $key => $post)
                                            <li>
                                                <a href="{{ route('post_detail.index', $post->slug) }}">
                                                <span class="number">{{ $key + 1 }}</span>
                                                <h3>{{ $post->title }}</h3>
                                                <span class="author">{{ $post->author_name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            </div> <!-- End Trending Section -->
                        </div>
                    </div>
        
                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->
    @endif
    
@endsection