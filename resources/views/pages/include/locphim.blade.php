<div class="row">
    <form action="{{ route('locphim') }}" method="GET">
        <style>
            .style-filter {
                border: 0;
                background: #12171b;
                color: #fff;
            }

            .btn-filter {
                border: 0;
                background: #12171b;
                color: #fff;
                padding: 9px;
            }
        </style>
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control style-filter" name="order" id="exampleFormControlSelect1">
                    <option value="">-Sắp xếp-</option>
                    <option value="date">Ngày đăng</option>
                    <option value="year_public">Năm sản xuất</option>
                    <option value="name_a_z">Tên Phim</option>
                    <option value="watch_view">Lượt xem</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control style-filter" name="genre" id="exampleFormControlSelect1">
                    <option value="">--Thể loại--</option>
                    @foreach ($genre_home as $key => $gens)
                        <option {{ isset($_GET['genre']) && $_GET['genre'] == $gens->id ? 'selected' : '' }}
                            value="{{ $gens->id }}">{{ $gens->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control style-filter" name="country" id="exampleFormControlSelect1">
                    <option value="">--Quốc gia--</option>
                    @foreach ($country_home as $key => $countrys)
                        <option {{ isset($_GET['country']) && $_GET['country'] == $countrys->id ? 'selected' : '' }}
                            value="{{ $countrys->id }}">{{ $countrys->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                @php
                if(isset($_GET['year'])){
                    $year = $_GET['year'];
                }else {
                    $year = null;
                }
                @endphp
                {!! Form::selectYear('year',2010,2023,$year,
                    [
                        'class' => 'form-control style-filter',
                        'placeholder' => '--Năm phim--',
                    ],
                ) !!}
            </div>
        </div>
        <div class="col-md-1">
            <input type="submit" name="locphim" class="btn btn-sm btn-default btn-filter" value="Lọc Phim">
        </div>
    </form>
</div>
