$(function () {

    var selectedPlace = $("#placeSelectMenu").val();
    console.log(selectedPlace);


    $("#placeSelectMenu").change(function() {
        selectedPlace = $("#placeSelectMenu").val();
        console.log(selectedPlace);
    });


    $("#completeOrder").click(function () {
        $.ajax({
            type: 'POST',
            data: {selectedPlace: selectedPlace},
            url: '/Order/makeOrder',
            dataType: 'json',
            success: function(msg) {
                console.log(msg);
            }
        });
    })
})