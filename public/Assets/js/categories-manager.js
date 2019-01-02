$(function(){

    $(".deleteCategory").click(function (ev) {
        var parent = $(ev.target).parent();
        var id = parent.find(".category_id").val();

        console.log("categories-manager.js "+parent.find(".category_id").val());
        $.ajax({
            type: 'POST',
            data: {toDelete: id},
            url: '/Dashboard/deleteCategory',
            dataType: 'json',
            success: function(value) {
                console.log(value);
                if(value != "DB problems"){
                    location.reload();
                } else {
                    alert("Problemi nel DB");
                }
            }
        });
    })

    $("#addCategory").click(function () {
        var value = document.getElementById("cat_name_input").value
        console.log(value);
        $.ajax({
            type: 'POST',
            data: {toAdd: value},
            url: '/Dashboard/addCategory',
            dataType: 'json',
            success: function(msg) {
                console.log(msg);
                location.reload();
            }
        });
    })
})