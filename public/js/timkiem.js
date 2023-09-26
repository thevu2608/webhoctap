$(document).ready(function () {
    $('#timkiem').keyup(function () {
        $('#result').html('');
        var search = $('#timkiem').val();
        if (search !== '') {
            $('#result').css('display', 'inherit');
            var expression = new RegExp(search, 'i');
            $.getJSON('/json_file/movies.json', function (data) {
                $.each(data, function (key, value) {
                    if (value.title.search(expression) !== -1) {
                        // Hiển thị thông tin về phim
                        $('#result').append(`<li class="list-group-item" style="cursor:pointer">
                        <img height= "60" width="60" src="/uploads/movie/${value.image}">${value.title}</li>`);
                    }
                })
            })
        }else{
            $('#result').css('display', 'none');
        }
    });
    $('#result').on('click', 'li', function(){
        var click_text = $(this).text();
        $('#timkiem').val($.trim(click_text));
        $('#result').html('');
        $('#result').css('display', 'none');
    });
});
