@extends('welcome')
@section('content')
<br>
<br>
<br>
<br>
<br>
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="filter__item d-none d-md-block filter__checkboxlist_horizontal">
                        <h4 class="filter__title_horizontal">Chuyên Đề Lớp</h4>
                        <div class="filter__item__list_horizontal">
                            <a href="{{ route('category', $country_slug->slug) }}" title="{{ $country_slug->title }}">
                                <span class="sc-coYmiO ezlAks">{{ $country_slug->title }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-lg-9 col-md-8 result">
            <section>
                <div class="row">
                    @foreach ($movie->take(12) as $key => $mov)
                        <div class="col-6 col-lg-4 mb-4">
                            <article class="sc-kbdlSk hQPLlI post bg-sh pr"
                                style="box-shadow: rgb(204, 204, 204) 5px 5px 10px 1px; border-radius: 10px; overflow: hidden;">
                                <div class="postion-relative"><img class="w-100"
                                        src="{{ asset('uploads/movie/' . $mov->image) }}" style="width: 50%; height: auto"
                                        alt=""><img
                                        class="sc-fFlnrN eBDayY position-absolute card-img-top icon-play cursor">
                                </div>
                                <div class="post__content d-flex justify-content-between"
                                    style="padding: 16px 10px; border-top: 1px solid rgb(255, 119, 7); flex: 1 1 0%;">
                                    <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                                        <div class="sc-camqpD kBgVYr text">
                                            <h4 title="{{ $mov->title }}" class="sc-bOhtcR fppzCo">
                                                {{ $mov->title }}
                                            </h4>
                                        </div>
                                        <div><a class="halim-thumb" href="{{ route('movie', $mov->slug) }}"><button
                                                    class="btn-sub monkey-fz-12 p-2">Xem sách</button> </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection
