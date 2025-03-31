<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('info.create') }}">Thông tin website</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.create') }}">Bài học</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('genre.create') }}">Chủ đề lớp<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('country.create') }}">Tài liệu nâng cao</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('movie.index') }}">Chuyên đề môn học</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm chuyên đề</button>
        </form>
    </div>
</nav>
