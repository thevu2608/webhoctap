@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content">
            <a href="{{ route('movie.create') }}" class="btn btn-primary float-left">Thêm chuyên đề</a>
            <div class="col-md-12">
                <table class="table table-responsive" id="table-movie">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tài liệu</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col">Bài học</th>
                            <th scope="col">Môn học</th>
                            <th scope="col">Tài liệu môn học</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>
                                    <img width="100 " src="{{ asset('uploads/movie/' . $cate->image) }}">
                                    <input type="file" data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}"
                                        class="form-control-file file-image" accept="image/*">
                                    <span id="success-image"></span>
                                </td>
                                {{-- <td>{{$cate->description}}</td> --}}
                                <td>
                                    <select name="" id="{{ $cate->id }}" class="trangthai_choose">
                                        @if ($cate->status == 0)
                                            <option selected value="0">Không hiển thị</option>
                                            <option value="1">Hiển thị</option>
                                        @else
                                            <option value="0">Không hiển thị</option>
                                            <option selected value="1">Hiển thị</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    {!! Form::select('category_id', $category, isset($cate) && $cate->category ? $cate->category->id : '', [
                                        'class' => 'category_choose',
                                        'id' => $cate->id,
                                    ]) !!}
                                </td>
                                <td>
                                    @foreach ($cate->movie_genre as $gen)
                                        <span class="badge badge-dark">{{ $gen->title }}</span>
                                    @endforeach
                                </td>

                                <td>
                                    {!! Form::select('country_id', $country, isset($cate) && $cate->country ? $cate->country->id : '', [
                                        'class' => 'country_choose',
                                        'id' => $cate->id,
                                    ]) !!}
                                </td>
                                <td>{{ $cate->date_created }}</td>
                                <td>{{ $cate->date_update }}</td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['movie.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Xoá?")',
                                    ]) !!}
                                    {!! Form::submit('xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
