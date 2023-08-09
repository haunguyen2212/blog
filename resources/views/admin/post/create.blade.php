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
            {!! Form::open(['url' => route('admin.post.create')]) !!}
                <div class="row">     
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề:') !!}
                            {!! Form::text('title', '', ['id' => 'title', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug:') !!}
                            {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('category', 'Danh mục:') !!}
                            {!! Form::select('category', category_dropdown(), '', ['id' => 'category', 'class' => 'form-control']) !!}
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
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('contents', 'Nội dung:') !!}
                            {!! Form::textarea('content', '', ['id' => 'contents', 'class' => 'form-control', 'rows' => 40]) !!}
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
                    </div>
                    <div class="col-12 col-md-12 d-flex justify-content-center my-3">
                        {!! Form::button('Lưu bài viết', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#collapsePost').addClass('show');
    </script>
@endsection