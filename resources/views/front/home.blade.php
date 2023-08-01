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
                            <a href="{{ route('post_detail.index', $top_post->first()->slug) }}"><img src="{{ asset('front/img/quick-sort-algorithm.png') }}" alt="" class="img-fluid"></a>
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
                                        <a href="{{ route('post_detail.index', $post->slug) }}"><img src="{{ asset('front/img/quick-sort-algorithm.png') }}" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $post->category_name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>{{ format_date($post->public_date) }}</span></div>
                                        <h2><a href="{{ route('post_detail.index', $post->slug) }}">{{ $post->title ?? '' }}</a></h2>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($top_post->skip(ceil($top_post->count()) / 2 + 1) as $post)
                                    <div class="post-entry-1">
                                        <a href="{{ route('post_detail.index', $post->slug) }}"><img src="{{ asset('front/img/quick-sort-algorithm.png') }}" alt="" class="img-fluid"></a>
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

    @if(isset($categories) && count($categories) > 0)
        @foreach ($categories as $category)
            <!-- ======= Category Section ======= -->
            <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>{{ $category->name ?? '' }}</h2>
                <div><a href="{{ route('category.show', $category->slug) }}" class="more">Xem thêm</a></div>
                </div>

                <div class="row">
                <div class="col-md-9">

                    <div class="d-lg-flex post-entry-2">
                    <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                        <img src="img/post-landscape-6.jpg" alt="" class="img-fluid">
                    </a>
                    <div>
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                        <div class="d-flex align-items-center author">
                        <div class="photo"><img src="img/person-2.jpg" alt="" class="img-fluid"></div>
                        <div class="name">
                            <h3 class="m-0 p-0">Wade Warren</h3>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-4">
                        <div class="post-entry-1 border-bottom">
                        <a href="single-post.html"><img src="img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                        <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                        </div>

                        <div class="post-entry-1">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="post-entry-1">
                        <a href="single-post.html"><img src="img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                        <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                </div>
                </div>
            </div>
            </section><!-- End Culture Category Section -->
        @endforeach
    @endif
    
@endsection