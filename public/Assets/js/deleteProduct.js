$(function () {
    $("#del").click(function () {
        var value = $(this).val();
        $.ajax({
            type: 'POST',
            data: {msg: value},
            url: '/Dashboard/deleteProduct',
            dataType: 'json',
            success: function (msg) {
                console.log(msg);
                location.reload(true);
            }
        });
    });


})
