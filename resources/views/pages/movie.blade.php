@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="page-title">
                    <h2>{{ $movie->title }}</h2>
                    <p>{{ $movie->name_eng }}</p>
                </div>
                <div class="content">
                    <div class="movie-info">
                        <div class="movie-poster">
                            <img src="{{ asset('uploads/movie/' . $movie->image) }}" alt="{{ $movie->title }}" width="20%">
                        </div>
                        <div class="movie-details ">
                            <ul>
                                <li><strong>Môn học:</strong>
                                    @foreach ($movie->movie_genre as $key => $gen)
                                        <a href="{{ route('genre', $gen->slug) }}">{{ $gen->title }}</a>
                                        @if ($key < count($movie->movie_genre) - 1),@endif
                                    @endforeach
                                </li>
                                <li><strong>Danh mục bài học:</strong>
                                    <a href="{{ route('category', $movie->category->slug) }}">{{ $movie->category->title }}</a>
                                </li>
                                <li><strong>Tài liệu nâng cao:</strong>
                                    <a href="{{ route('country', $movie->country->slug) }}">{{ $movie->country->title }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="movie-description">
                        <h3 style="color: red">Nội dung bài học :</h3>
                        <br>
                        <p>{{ $movie->description }}</p>
                        <div class="movie-poster">
                            <embed src="{{ asset('uploads/pdf/' . $movie->file_sach) }}" type="application/pdf" width="100%" height="600px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
