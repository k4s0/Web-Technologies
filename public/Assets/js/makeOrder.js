$(function () {
    $("#completeOrder").click(function () {
        $.ajax({
            type: 'POST',
            url: '/Order/makeOrder',
            dataType: 'json',
            success: function(msg) {
                console.log(msg);
            }

        });
    })
})