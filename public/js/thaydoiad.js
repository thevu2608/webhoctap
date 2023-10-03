$('.select-movie').change(function () {
    var id = $(this).val();
    $.ajax({
        url: "/select-movie",
        method: "GET",
        data: {
            id: id
        },
        success: function (data) {
            $('#episode').html(data)
        }
    });
});
$('.phimhot_choose').change(function () {
    var phimhot_val = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/phimhot-choose",
        method: "GET",
        data: {
            phimhot_val: phimhot_val,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi phim hot thành công');
        }
    })
});
$('.vietsub_choose').change(function () {
    var vietsub_val = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/vietsub-choose",
        method: "GET",
        data: {
            vietsub_val: vietsub_val,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi vietsub thành công');
        }
    })
});
$('.select-topview').change(function () {
    var topview = $(this).find(":selected").val();
    var id_phim = $(this).attr("id");
    if (topview == 0) {
        var text = 'Ngày';
    } else if (topview == 1) {
        var text = 'tuần';

    } else {
        var text = 'tháng';
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        url: "/update-topview-phim",
        method: "GET",
        data: {
            topview: topview,
            id_phim: id_phim
        },
        success: function () {
            alert('Thay đổi phim Top View theo ' + text + ' thành công !');
        }
    })
});
$('.category_choose').change(function () {
    var category_id = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/category-choose",
        method: "GET",
        data: {
            category_id: category_id,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi danh mục thành công');
        }
    })
});
$('.country_choose').change(function () {
    var country_id = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/country-choose",
        method: "GET",
        data: {
            country_id: country_id,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi quốc gia thành công');
        }
    })
});
$('.trangthai_choose').change(function () {
    var trangthai_id = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/trangthai-choose",
        method: "GET",
        data: {
            trangthai_id: trangthai_id,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi trạng thái thành công');
        }
    })
});
$('.thuocphim_choose').change(function () {
    var thuocphim_val = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/thuocphim-choose",
        method: "GET",
        data: {
            thuocphim_val: thuocphim_val,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi phim thành công');
        }
    })
});
$('.dinhdang_choose').change(function () {
    var resolution_val = $(this).val();
    var movie_id = $(this).attr('id');
    $.ajax({
        url: "/resolution-choose",
        method: "GET",
        data: {
            resolution_val: resolution_val,
            movie_id: movie_id
        },
        success: function (data) {
            alert('Thay đổi định dạng thành công');
        }
    })
});
