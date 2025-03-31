@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('movie.index') }}" class="btn btn-primary">Liệt kê Chuyên Đề</a>
                    <div class="card-header">Quản Lý Chuyên Đề</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($movie))
                            {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif

                        <div
                            class="form-group>
                        {!! Form::label('title', 'Tiêu đề', []) !!}
                        {!! Form::text('title', isset($movie) ? $movie->title : '', [
                            'class' => 'form-control',
                            'placeholder' => 'Nhập vào dữ liệu ...',
                            'id' => 'slug',
                            'onkeyup' => 'ChangeToSlug()',
                            'required'
                        ]) !!}
                    </div>
                    <br>
                        <div
                            class="form-group>
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu ...',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>
                        <br>
                        <div
                            class="form-group>
                            {!! Form::label('description', 'Mô tả chuyên đề', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu ...',
                                'id' => 'description',
                                'required'
                            ]) !!}
                        </div>
                        <br>
                        <div
                            class="form-group>
                            {!! Form::label('Status', 'Hiển thị chuyên đề', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ? $movie->status : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <br>
                        <div
                            class="form-group>
                            {!! Form::label('Category', 'Danh mục bài học', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <br>
                        <div
                            class="form-group>
                            {!! Form::label('Country', 'Tài liệu nâng cao', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control']) !!}

                        </div>
                        <br>
                        <div
                            class="form-group>
                            {!! Form::label('Genre', 'Môn học', []) !!}<br>
                            @foreach($list_genre as $key => $gen )
                            @if (isset($movie))
                            {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre -> contains($gen->id) ? true: false) !!}
                            @else
                            {!! Form::checkbox('genre[]', $gen->id, '') !!}
                            @endif
                            {!!Form::label('genre', $gen->title)!!}
                            @endforeach
                        </div>
                        <br>
                        <div class="form-group>
                            {!! Form::label('Image', 'Hình ảnh', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file', 'required']) !!}
                            <br>
                            @if (isset($movie))
                            <img width="20%" src="{{ asset('uploads/movie/' . $movie->image_url) }}">
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('document', 'Tài liệu', []) !!}
                            {!! Form::file('document', ['class' => 'form-control-file', 'required']) !!}
                            <br>
                            @if (isset($movie))
                            <img width="100%" src="{{ asset('uploads/pdf/' . $movie->file_sach) }}">
                            @endif
                        </div>
                        <br>

                        @if (!isset($movie))
                            {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật dữ liệu', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
