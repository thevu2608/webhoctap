@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('episode.index') }}" class="btn btn-primary">Liệt kê Danh Sách Tập phim</a>
                    <div class="card-header">Quản Lý Tập Phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open([
                                'route' => ['episode.update', $episode->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                        @endif
                        <div
                            class="form-group>
                            {!! Form::label('Phim', 'Chọn Phim', []) !!}
                            {!! Form::select(
                                'movie_id',
                                ['0' => 'Chọn Phim', 'Danh sách phim' => $list_movie],
                                isset($episode) ? $episode->movie_id : '',
                                [
                                    'class' => 'form-control select-movie'
                                ]
                            ) !!}
                        </div>
                        <br>
                        <div
                            class="form-group>
                            {!! Form::label('link', 'Link Phim', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => '...'
                            ]) !!}
                        </div>
                        <br>
                        @if(isset($episode))
                        <div
                            class="form-group>
                            {!! Form::label('episode', 'Tập Phim', []) !!}
                            {!! Form::text('episode', isset($episode) ? $episode->episode : '', [
                                'class' => 'form-control',
                                'placeholder' => '...', isset($episode) ? 'readonly': ''
                            ]) !!}
                        </div>
                        <br>
                        @else
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập Phim', []) !!}
                            <select name="episode" class="form-control" id="episode"></select>
                        </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::submit('Thêm Tập Phim', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật Tập Phim', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
