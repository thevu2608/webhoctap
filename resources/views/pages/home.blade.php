@extends('welcome')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main>
            <div class="sc-khYOSX eQVViE hoc10-slider pr p-0">
                <div class="slick-slider slider-home pr slick-initialized">
                    <div class="slick-list">
                        <div class="slick-track" style="width: 1296px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                            <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1"
                                aria-hidden="false" style="outline: none; width: 1296px;">
                            {{--ảnh bìa--}}
                                <div>
                                    <div class="sc-einZSS bWkxWx item flex" tabindex="-1"
                                        style="width: 95%; display: inline-block;"><img class="fit"
                                            src="{{ asset('uploads/book/BÌA3860.png') }}"
                                            alt="banner-canh-dieu">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hoc10-lesson-library">
                @foreach ($category_home as $key => $cate_home)
                    <div class="container">
                        <div class="filter filter-horizontal mt-3 mb-4 p-0">
                            <div class="filter__item d-none d-md-block filter__checkboxlist_horizontal">
                                <h4 class="filter__title_horizontal">Chuyên Đề Lớp</h4>
                                <div class="filter__item__list_horizontal">
                                    <a href="{{ route('category', $cate_home->slug) }}" title="{{ $cate_home->title }}">
                                        <span class="sc-coYmiO ezlAks">{{ $cate_home->title }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="filter">
                                    <div class="d-block d-md-none mt-0 pt-0 css-2b097c-container"><span aria-live="polite"
                                            aria-atomic="false" aria-relevant="additions text"
                                            class="css-7pg0cj-a11yText"></span>
                                        <div class=" css-yk16xz-control">
                                            <div class=" css-1hwfws3">
                                                <div class="css-1g6gooi">
                                                    <div class="" style="display: inline-block;"><input
                                                            autocapitalize="none" autocomplete="off" autocorrect="off"
                                                            id="react-select-8-input" spellcheck="false" tabindex="0"
                                                            type="text" aria-autocomplete="list" value=""
                                                            style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                        <div
                                                            style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 16px; font-family: SVN-GilroyRegular, sans-serif; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" css-1wy0on6"><span class=" css-1okebmr-indicatorSeparator"></span>
                                                <div class=" css-tlfecz-indicatorContainer" aria-hidden="true"><svg
                                                        height="20" width="20" viewBox="0 0 20 20" aria-hidden="true"
                                                        focusable="false" class="css-8mmkcg">
                                                        <path
                                                            d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__item d-none d-md-block">
                                        <h4 class="">{{ $cate_home->title }}</h4>
                                        @foreach ($cate_home->movie->take(12) as $key => $mov)
                                            <div class="filter__item__list"><label class="sc-tNXst gWYQCz flex-lc pr"><input
                                                        id="" type="checkbox" name="class" value="32"
                                                        checked=""><span class="checked"></span>
                                                    <p>{{ $mov->genre->title }}</p>
                                                </label></div>
                                        @endforeach
                                    </div>
                                    <div class="d-block d-md-none mt-2 pt-0 css-2b097c-container"><span aria-live="polite"
                                            aria-atomic="false" aria-relevant="additions text"
                                            class="css-7pg0cj-a11yText"></span>
                                        <div class=" css-yk16xz-control">
                                            <div class=" css-1hwfws3">
                                                <div class=" css-1uccc91-singleValue">Tiếng Việt</div>
                                                <div class="css-1g6gooi">
                                                    <div class="" style="display: inline-block;"><input
                                                            autocapitalize="none" autocomplete="off" autocorrect="off"
                                                            id="react-select-9-input" spellcheck="false" tabindex="0"
                                                            type="text" aria-autocomplete="list" value=""
                                                            style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                        <div
                                                            style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 16px; font-family: SVN-GilroyRegular, sans-serif; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" css-1wy0on6"><span
                                                    class=" css-1okebmr-indicatorSeparator"></span>
                                                <div class=" css-tlfecz-indicatorContainer" aria-hidden="true"><svg
                                                        height="20" width="20" viewBox="0 0 20 20"
                                                        aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                        <path
                                                            d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 result">
                                <div class="row">
                                    @foreach ($cate_home->movie->take(12) as $key => $mov)
                                        <div class="col-6 col-lg-4 mb-4">
                                            <article class="sc-kbdlSk hQPLlI post bg-sh pr"
                                                style="box-shadow: rgb(204, 204, 204) 5px 5px 10px 1px; border-radius: 10px; overflow: hidden;">
                                                <div class="postion-relative"><img class="w-100"
                                                        src="{{ asset('uploads/movie/' . $mov->image) }}"
                                                        style="width: 50%; height: auto" alt=""><img
                                                        class="sc-fFlnrN eBDayY position-absolute card-img-top icon-play cursor">
                                                </div>
                                                <div class="post__content d-flex justify-content-between"
                                                    style="padding: 16px 10px; border-top: 1px solid rgb(255, 119, 7); flex: 1 1 0%;">
                                                    <div
                                                        class="d-flex flex-column flex-sm-row justify-content-between w-100">
                                                        <div class="sc-camqpD kBgVYr text">
                                                            <h4 title="{{ $mov->title }}" class="sc-bOhtcR fppzCo">
                                                                {{ $mov->title }}
                                                            </h4>
                                                        </div>
                                                        <div><a class="halim-thumb"
                                                                href="{{ route('movie', $mov->slug) }}"><button
                                                                    class="btn-sub monkey-fz-12 p-2">Xem sách</button> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            @endforeach
        </main>
    </div>
@endsection
