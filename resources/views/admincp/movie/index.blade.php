@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content">
            <a href="{{ route('movie.create') }}" class="btn btn-primary float-left">Thêm phim</a>
            <div class="col-md-12">
                <table class="table" id="table-movie">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Thời lượng phim</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Phim hot</th>
                            <th scope="col">Định dạng</th>
                            <th scope="col">Phụ đề</th>
                            <th scope="col">Đường dẫn</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thuộc phim</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Quốc gia</th>
                            <th scope="col">Số tập</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Năm phim</th>
                            <th scope="col">Top view</th>
                            <th scope="col">Season</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title ?? 'N/A' }}</td>
                                <td>{{ $cate->tags ?? 'N/A' }}</td>
                                <td>{{ $cate->time_movie ?? 'N/A' }}</td>
                                <td><img width="60%" src="{{ asset('uploads/movie/' . $cate->image) }}"></td>
                                <td>
                                    @if ($cate->phim_hot == 0)
                                        Không phải phim hot
                                    @else
                                        Phim hot
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->resolution == 0)
                                        HD
                                    @elseif($cate->resolution == 1)
                                        SD
                                    @elseif($cate->resolution == 2)
                                        HDR
                                    @elseif($cate->resolution == 3)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->vietsub == 0)
                                        Vietsub
                                    @else
                                        Thuyết minh
                                    @endif
                                </td>
                                {{-- <td>{{$cate->description ?? 'N/A'}}</td> --}}
                                <td>{{ $cate->slug ?? 'N/A' }}</td>
                                <td>
                                    @if ($cate->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>{{ $cate->category->title ?? 'N/A' }}</td>
                                <td>{{ $cate->thuocphim}}</td>
                                <td>
                                    @foreach ($cate->movie_genre as $gen)
                                        <span class="badge badge-dark">{{ $gen->title ?? 'N/A' }}</span>
                                    @endforeach
                                </td>

                                <td>{{ $cate->country->title ?? 'N/A' }}</td>
                                <td>{{ $cate->sotap }}</td>
                                <td>{{ $cate->date_created ?? 'N/A' }}</td>
                                <td>{{ $cate->date_update ?? 'N/A' }}</td>
                                <td>

                                    {!! Form::selectYear('Year', 2000, 2023, isset($cate->year) ? $cate->year : '', [
                                        'class' => 'select-year',
                                        'id' => $cate->id,
                                    ]) !!}
                                </td>
                                <td>
                                    {!! Form::select(
                                        'topview',
                                        ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'],
                                        isset($cate->topview) ? $cate->topview : '',
                                        ['class' => 'select-topview', 'id' => $cate->id],
                                    ) !!}
                                </td>
                                <Td>
                                    {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', [
                                        'class' => 'select-season',
                                        'id' => $cate->id,
                                    ]) !!}
                                </Td>
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
