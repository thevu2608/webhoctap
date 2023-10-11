@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content">
            <a href="{{ route('movie.create') }}" class="btn btn-primary float-left">Thêm phim</a>
            <div class="col-md-12">
                <table class="table table-responsive" id="table-movie">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Thêm tập phim</th>
                            <th scope="col">Số tập</th>
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
                                <td>{{ $cate->title }}</td>
                                <td><a href="{{ route('add-episode', $cate->id) }}" class="btn btn-danger btn-sm">Thêm link
                                        phim</a></td>
                                <td>{{ $cate->episode_count }}/{{ $cate->sotap }} Tập</td>
                                <td>{{ $cate->tags }}</td>
                                <td>{{ $cate->time_movie }}</td>
                                <td>
                                    <img width="100 " src="{{ asset('uploads/movie/' . $cate->image) }}">
                                    <input type="file" data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}"
                                        class="form-control-file file-image" accept="image/*">
                                    <span id="success-image"></span>
                                </td>
                                <td>
                                    <select name="" id="{{ $cate->id }}" class="phimhot_choose">
                                        @if ($cate->phim_hot == 0)
                                            <option value="1">Hot</option>
                                            <option selected value="0">Không</option>
                                        @else
                                            <option selected value="1">Hot</option>
                                            <option value="0">Không</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    @php
                                        $options = [
                                            '0' => 'HD',
                                            '1' => 'SD',
                                            '2' => 'HDR',
                                            '3' => 'FullHD',
                                            '4' => 'Trailer',
                                        ];
                                    @endphp
                                    <select name="" id="{{ $cate->id }}" class="dinhdang_choose">
                                        @foreach ($options as $key => $value)
                                            <option {{ $cate->resolution == $key ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                        @endforeach

                                    </select>
                                </td>
                                <td>
                                    <select name="" id="{{ $cate->id }}" class="vietsub_choose">
                                        @if ($cate->vietsub == 0)
                                            <option selected value="0">vietsub</option>
                                            <option value="1">Thuyết minh</option>
                                        @else
                                            <option value="0">vietsub</option>
                                            <option selected value="1">Thuyết minh</option>
                                        @endif
                                    </select>
                                </td>
                                {{-- <td>{{$cate->description}}</td> --}}
                                <td>{{ $cate->slug }}</td>
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
                                    {!! Form::select('category_id', $category, isset($cate) ? $cate->category->id : '', [
                                        'class' => 'category_choose',
                                        'id' => $cate->id,
                                    ]) !!}
                                </td>
                                <td>
                                    <select name="" id="{{ $cate->id }}" class="thuocphim_choose">
                                        @if ($cate->thuocphim == 'phim le')
                                            <option selected value="phim le">Phim Lẻ</option>
                                            <option value="phim bo">Phim Bộ</option>
                                        @else
                                            <option value="phim le">Phim Lẻ</option>
                                            <option selected value="phim bo">Phim Bộ</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    @foreach ($cate->movie_genre as $gen)
                                        <span class="badge badge-dark">{{ $gen->title }}</span>
                                    @endforeach
                                </td>

                                <td>
                                    {!! Form::select('country_id', $country, isset($cate) ? $cate->country->id : '', [
                                        'class' => 'country_choose',
                                        'id' => $cate->id,
                                    ]) !!}
                                </td>
                                <td>{{ $cate->date_created }}</td>
                                <td>{{ $cate->date_update }}</td>
                                <td>

                                    {!! Form::selectYear('Year', 2010, 2023, isset($cate->year) ? $cate->year : '', [
                                        'class' => 'select-year',
                                        'id' => $cate->id,
                                        'placeholder' => '--Năm Phim--',
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
