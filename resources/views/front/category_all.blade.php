@extends('front.master')

@section('title', 'Tất cả danh mục')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    @foreach ($categories as $category)
                        <h3 class="category-title"><a href="{{ route('category.show', $category->slug) }}">Danh mục: {{ $category->name ?? '' }}</a></h3>

                        @if (count($category->limited_posts) > 0)
                            @foreach ($category->limited_posts as $post)
                            <div class="d-md-flex post-entry-2 small-img">
                                <a href="{{ route('post_detail.index', $post->slug) }}" class="me-4 thumbnail">
                                    <img src="{{ asset('front/img/quick-sort-algorithm.png') }}" alt="" class="img-fluid">
                                </a>
                                <div class="pe-md-3 pt-2 pt-md-0">
                                    <div class="post-meta"><span class="date">{{ $category->name ?? '' }}</span> <span class="mx-1">&bullet;</span> <span>{{ format_date($post->public_date) }}</span></div>
                                    <h3><a href="{{ route('post_detail.index', $post->slug) }}">{{ $post->title ?? '' }}</a></h3>
                                    <p>{{ $post->introduction ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach 
                        @else
                            <div class="pb-5 fw-bold">CHƯA CÓ BÀI VIẾT</div>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-3">
                    @include('front.components.sidebar')
                </div>

            </div>
        </div>
    </section>
@endsection