$("#ggwp").click(function () {
    $.ajax({
        type: 'POST',
        data: {msg: ['primo','secondo','terzo']},
        url: '/Home/ajax',
        dataType: 'json',
        success: function (msg) {
            $("#ajax").append(msg);
        }
    });
});