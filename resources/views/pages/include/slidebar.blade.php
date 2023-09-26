<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Hot</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_slidebar as $key => $hot_slidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_slidebar->slug) }}" title="{{ $hot_slidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_slidebar->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_slidebar->title }}"
                                        title="{{ $hot_slidebar->title }}" />
                                    <span class="is_trailer">
                                        @if ($hot_slidebar->resolution == 0)
                                            HD
                                        @elseif($hot_slidebar->resolution == 1)
                                            SD
                                        @elseif($hot_slidebar->resolution == 2)
                                            HDR
                                        @elseif($hot_slidebar->resolution == 3)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $hot_slidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>
<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim sắp chiếu</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_trailer as $key => $hot_slidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_slidebar->slug) }}" title="{{ $hot_slidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_slidebar->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_slidebar->title }}"
                                        title="{{ $hot_slidebar->title }}" />
                                    <span class="is_trailer">
                                        @if ($hot_slidebar->resolution == 0)
                                            HD
                                        @elseif($hot_slidebar->resolution == 1)
                                            SD
                                        @elseif($hot_slidebar->resolution == 2)
                                            HDR
                                        @elseif($hot_slidebar->resolution == 3)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $hot_slidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>
<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top View</span>
            </div>
        </div>
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link filter-sidebar" href="#ngay" role="tab" data-toggle="tab">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" href="#tuan" role="tab" data-toggle="tab">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" href="#thang" role="tab" data-toggle="tab">Tháng</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="halim-ajax-popular-post-default" class="popular-post">
                <span id="show_data_default"></span>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tuan">
                <div id="halim-ajax-popular-post" class="popular-post">
                    <span id="show_data"></span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</aside>
