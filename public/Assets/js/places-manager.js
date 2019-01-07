$(function () {

    $(".deletePlace").click(function (ev) {
        var parent = $(ev.target).parent();
        var id = parent.find(".place_id").val();

        console.log("places-manager.js "+parent.find(".place_id").val());
        $.ajax({
            type: 'POST',
            data: {toDelete: id},
            url: '/Dashboard/deletePlace',
            dataType: 'json',
            success: function(value) {
                console.log(value);
                console.log(value);
                if(value != "DB problems"){
                    location.reload();
                } else {
                    alert("Problemi nel DB");
                }
            }
        });
    })

    $("#addPlace").click(function () {
        var value = document.getElementById("place_name_input").value
        console.log(value);
        $.ajax({
            type: 'POST',
            data: {toAdd: value},
            url: '/Dashboard/addPlace',
            dataType: 'json',
            success: function(msg) {
                console.log(msg);
                location.reload();
            }
        });
    })

})