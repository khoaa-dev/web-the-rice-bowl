
$(document).on('ready', function () {
    changeSessionValue();
});

function changeSessionValue() {
    //change session value when checkbox clicked
    $('.food_checkbox').on('click', function () {
        if (this.checked) {
            var _token = $('input[name="_token"]').val();
            var foodId = $(this).val();

            $.ajax({
                url: "http://localhost/the-rice-bowl/add-food",
                method: "POST", // phương thức gửi dữ liệu.
                data: { foodId: foodId, _token: _token },
                success: function (data) { //dữ liệu nhận về
                    console.log(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        } else {
            var _token = $('input[name="_token"]').val();
            var foodId = $(this).val();

            $.ajax({
                url: "http://localhost/the-rice-bowl/remove-food",
                method: "POST", // phương thức gửi dữ liệu.
                data: { foodId: foodId, _token: _token },
                success: function (data) { //dữ liệu nhận về
                    console.log(data);
                },
                error: function (data) {
                    alert('error');
                    console.log('Error:', data);
                }
            });
        }
    });
}

$(function () {
    //set header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //filter food when category option changed
    $('#categoryOption').on("change", function (e) {
        e.preventDefault();

        var foodName = $('#foodName').val();
        var category = $(this).val();
        var _token = $('input[name=_token]').val();

        $.ajax({
            // url: "http://localhost/the-rice-bowl/search",
            url: "route('search')",
            method: "POST", // phương thức gửi dữ liệu.
            data: { foodName: foodName, categoryId: category, _token: _token },
            success: function (data) { //dữ liệu nhận về
                $('.food-list').html(data);
                changeSessionValue();
            },
            error: function (data) {
                alert('error');
                console.log('Error:', data);
            }
        });
    });


    //filter food when food name input changed
    $('#foodName').on("keyup", function (e) {
        e.preventDefault();

        var foodName = $(this).val();
        var category = $('#categoryOption').val();
        var _token = $('input[name=_token]').val();

        $.ajax({
            // url: "http://localhost/the-rice-bowl/search",
            url: "route('search')",
            method: "POST", // phương thức gửi dữ liệu.
            data: { foodName: foodName, categoryId: category, _token: _token },
            success: function (data) { //dữ liệu nhận về
                $('.food-list').html(data);
                changeSessionValue();
            },
            error: function (data) {
                alert('error');
                console.log('Error:', data);
            }
        });
    });


    //create session when click to create new menu
    $(".create-menu").on("click", function () {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "http://localhost/the-rice-bowl/init-session",
            method: "POST",
            data: { _token: _token },
            success: function (data) { //dữ liệu nhận về
            },

        });
        $('input:checkbox').removeAttr('checked');

        $('.create-menu').hide();
        $('.custom-menu').show();

        $(".menu-select").append("<option value='-1'>Menu tự chọn</option>");

    });

    $("#btnUpdateMenu").on("click", function () {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "http://localhost/the-rice-bowl/update-menu",
            method: "GET",
            data: { _token: _token },

            success: function (data) { //dữ liệu nhận về
                $(".food-in-menu").html(data);
            },
            error: function (data) {
                alert('error');
                console.log('Error:', data);
            }
        });

    })


});



