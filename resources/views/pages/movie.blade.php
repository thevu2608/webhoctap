@extends('welcome')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span>
                                    <a
                                        href="{{ route('category', $movie->category->slug) }}">{{ $movie->category->title }}</a>
                                    »
                                    <span>
                                        <a
                                            href="{{ route('country', $movie->country->slug) }}">{{ $movie->country->title }}</a>
                                        »
                                        <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                                    </span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('uploads/movie/' . $movie->image) }}"
                                    alt="{{ $movie->title }}">

                                @if ($movie->resolution != 4)
                                    @if ($episode_count > 0)
                                        <div class="bwa-content">
                                            <div class="loader"></div>
                                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $episode_first->episode) }}"
                                                class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <a href="#xem-trailer" style="display: block" class="btn btn-primary xem-trailer">Xem
                                        Trailer</a>
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                            @if ($movie->resolution == 0)
                                                HD
                                            @elseif($movie->resolution == 1)
                                                SD
                                            @elseif($movie->resolution == 2)
                                                HDR
                                            @elseif($movie->resolution == 3)
                                                FullHD
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                        @if ($movie->resolution != 4)
                                            <span class="episode">
                                                @if ($movie->vietsub == 0)
                                                    VietSub
                                                    @if ($movie->season != 0)
                                                        - Season : {{ $movie->season }}
                                                    @endif
                                                @else
                                                    Thuyết minh
                                                    @if ($movie->season != 0)
                                                        - Season : {{ $movie->season }}
                                                    @endif
                                                @endif
                                            </span>
                                        @endif
                                    </li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> : {{ $movie->time_movie }}
                                    </li>
                                    @if ($movie->thuocphim == 'phim bo')
                                        <li class="list-info-group-item"><span>Tập phim</span> :
                                            {{ $episode_count }}/{{ $movie->sotap }} -
                                            @if ($episode_count == $movie->sotap)
                                                Hoàn thành
                                            @else
                                                Đang cập nhật
                                            @endif

                                        </li>
                                    @else
                                        <li class="list-info-group-item"><span>Phim Lẻ</span>
                                    @endif
                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        @foreach ($movie->movie_genre as $key => $gen)
                                            <a href="{{ route('genre', $gen->slug) }}"
                                                rel="category tag">{{ $gen->title }}</a>
                                            @if ($key < count($movie->movie_genre) - 1)
                                                ,
                                            @endif
                                        @endforeach
                                    </li>

                                    <li class="list-info-group-item"><span>Danh mục phim</span> : <a
                                            href="{{ route('category', $movie->category->slug) }}"
                                            rel="category tag">{{ $movie->category->title }}</a></li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                            href="{{ route('country', $movie->country->slug) }}"
                                            rel="tag">{{ $movie->country->title }}</a></li>
                                    @if ($episode_count > 0)
                                        @if ($movie->thuocphim == 'phim bo')
                                            <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                                                @foreach ($episode as $key => $ep)
                                                    <a href="{{ url('xem-phim/' . $ep->movie->slug . '/tap-' . $ep->episode) }}"
                                                        rel="tag">Tập
                                                        {{ $ep->episode }}</a>
                                                @endforeach
                                            </li>
                                        @elseif($movie->thuocphim == 'phim le')
                                            <a href="" rel="tag">HD</a>
                                            <a href="" rel="tag">Full HD</a>
                                        @endif
                                    @else
                                        Đang cập nhật
                                    @endif
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{ $movie->description }}
                            </article>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div id="halim_trailer"></div>
                <div class="clearfix"></div>
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">tags phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                            @if ($movie->tags != null)
                                <?php
                                $tags = [];
                                $tags = explode(',', $movie->tags);
                                ?>
                                @foreach ($tags as $key => $tag)
                                    <a href="{{ url('tag/' . $tag) }}">{{ $tag }}</a>
                                @endforeach
                            @else
                                {{ $movie->title }}
                            @endif
                        </article>
                    </div>
                </div>
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <?php
                        $url_phim = Request::url();
                        ?>
                        <article id="post-38424" class="item-content">
                            <div class="fb-comments" data-href="{{ $url_phim }}" data-width="100%"
                                data-numposts="50" color="white"></div>
                        </article>
                    </div>
                </div>
                @if ($movie->resolution == 4)
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer Phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="xem-trailer" class="item-content">
                                <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </article>
                        </div>
                    </div>
                @endif
    </div>
    </section>
    <section class="related-movies">
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($movie_related as $key => $hot)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}" title="{{ $hot->title }}">
                                <figure><img class="lazy img-responsive"
                                        src="{{ asset('uploads/movie/' . $hot->image) }}" alt="{{ $hot->title }}"
                                        title="{{ $hot->title }}"></figure>
                                <span class="status">
                                    @if ($hot->resolution == 0)
                                        HD
                                    @elseif($hot->resolution == 1)
                                        SD
                                    @elseif($hot->resolution == 2)
                                        HDR
                                    @elseif($hot->resolution == 3)
                                        FullHD
                                    @endif
                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if ($hot->vietsub == 0)
                                        VietSub
                                        @if ($hot->season != 0)
                                            - Season : {{ $hot->season }}
                                        @endif
                                    @else
                                        Thuyết minh
                                        @if ($hot->season != 0)
                                            - Season : {{ $hot->season }}
                                        @endif
                                    @endif
                                </span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{ $hot->title }}</p>
                                        <p class="original_title">{{ $hot->name_eng }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            <script>
                jQuery(document).ready(function($) {
                    var owl = $('#halim_related_movies-2');
                    owl.owlCarousel({
                        loop: true,
                        margin: 4,
                        autoplay: true,
                        autoplayTimeout: 4000,
                        autoplayHoverPause: true,
                        nav: true,
                        navText: ['<i class="hl-down-open rotate-left"></i>',
                            '<i class="hl-down-open rotate-right"></i>'
                        ],
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 3
                            },
                            600: {
                                items: 4
                            },
                            1000: {
                                items: 4
                            }
                        }
                    })
                });
            </script>
        </div>
    </section>
    </main>
    @include('pages.include.slidebar')
    </div>
@endsection
