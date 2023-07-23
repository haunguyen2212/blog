@extends('front.master')

@section('title', 'Danh sách bài viết')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Tất cả bài viết</h3>

                    @if (isset($posts) && count($posts) > 0)
                        @foreach ($posts as $post)
                        <div class="d-md-flex post-entry-2 small-img">
                            <a href="{{ route('post_detail.index', $post->slug) }}" class="me-4 thumbnail">
                                <img src="{{ asset('front/img/post-landscape-6.jpg') }}" alt="" class="img-fluid">
                            </a>
                            <div class="pe-md-3 pt-2 pt-md-0">
                                <div class="post-meta"><span class="date">{{ $post->category_name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h3><a href="{{ route('post_detail.index', $post->slug) }}">{{ $post->title ?? '' }}</a></h3>
                                <p>{{ $post->introduction ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach 
                    @endif

                    <div class="text-start py-4">
                        <div class="custom-pagination">
                        <a href="#" class="prev">Prevous</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#" class="next">Next</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    @include('front.components.sidebar')
                </div>

            </div>
        </div>
    </section>
@endsection