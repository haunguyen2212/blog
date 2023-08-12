@extends('admin.master')

@section('content')
<div class="col-12">
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Bài viết mới</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownCard"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownCard">
                    <div class="dropdown-header">Tùy chọn:</div>
                    <a class="dropdown-item" href="#">Xem trước</a>
                    <a class="dropdown-item" href="#">Lưu</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            {!! Form::open(['url' => route('admin.post.store'), 'id' => 'form-create', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">     
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề:') !!}
                            {!! Form::text('title', '', ['id' => 'title', 'class' => 'form-control']) !!}
                            <div class="errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug:') !!}
                            {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control']) !!}
                            <div class="errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('category', 'Danh mục:') !!}
                            {!! Form::select('category', category_dropdown(), '', ['id' => 'category', 'class' => 'form-control']) !!}
                            <div class="errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('image', 'Hình ảnh:') !!}
                            {!! Form::file('image', ['id' => 'image', 'class' => 'form-control-file']) !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('introduction', 'Tóm tắt chung:') !!}
                            {!! Form::textarea('introduction', '', ['id' => 'introduction', 'class' => 'form-control', 'rows' => 5]) !!}
                            <div class="errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('content', 'Nội dung:') !!}
                            {!! Form::textarea('content', '', ['id' => 'content', 'class' => 'form-control tinymce', 'rows' => 40]) !!}
                            <div class="errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div>Tags:</div>
                        @foreach(tag_checkbox() as $key => $tag)
                            <div class="form-check form-check-inline">
                                {!! Form::checkbox('tag[]', $key, false, ['class' => 'form-check-input', 'id' => 'tag_'.$key]) !!}
                                {!! Form::label('tag_'.$key, $tag, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach
                        <div class="errors text-danger"></div>
                    </div>
                    <div class="col-12 col-md-12 d-flex justify-content-center my-3">
                        {!! Form::button('Lưu bài viết', ['id' => 'btn-save', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdn.tiny.cloud/1/4gs2fhm0k0rdx6r634mhz96pu2mummji4u3omgqn2ca4ihn5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('vendor/tinymce_init.js') }}"></script>
    <script>
        $('#collapsePost').addClass('show');
    </script>
    <script src="{{ asset('admin/js/post/create.js?v='.config('constant.VERSION')) }}"></script>
@endsection