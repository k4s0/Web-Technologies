/*each product is an array with this pattern:
 name producer_id qnt prize image product_id companyName */
$(function () {

     var products = [];
     var firstExecution = true;

     if(firstExecution){
        recoverChart();
        firstExecution = false;
     }

    $(".view-link").click(function (ev) {
        if ($(event.target).attr("class") === "view-link shutter") {
            var parent = $(ev.target).parent();
            var src = parent.find("img").attr("src");
            var name = parent.find("h4").text();
            var price = parent.find("p").text().replace('€','');
            var producer = parent.find("#producer_id").attr("value");
            var product_id = parent.find("#product_id").attr("value")
            var companyName = parent.find("h7").text();
            var match = false;

            products.forEach(function (p) {
                if (p[0] === name && p[1] === producer) {
                    p[2] = p[2] + 1;
                    console.log(p[2]);
                    match = true;
                }
            });

            if (match === false) {
                var array = [name, producer, 1, price, src, product_id, companyName];
                products.push(array);
            }
        }
        updateChart();
    });

    function updateChart() {
        var children = $(".media-list").children();
        children.each(function () {
            $(this).remove();
        });
        products.forEach(function (p) {

            var newElem = '<li class="media"><img class="pull-left" src="' + p[4] +
                '" alt=""><div class="media-body"><h6 class="name">' + p[0] +
                '</h6><h6><span>' + p[3] + '</span> <span  class = "badge">' + p[2] + '</span><h6><a> <i class="fas fa-trash-alt"></i></a></div></li>'
            $(".media-list").append(newElem);
        });

        $("a").on("click", ".fa-trash-alt", function (ev) {
            var elem = $(ev.target).parentsUntil("ul");
            var name = elem.find("h6.name").text();
            for (i = 0; i < products.length; i++) {
                if (products[i][0] === name) {
                    products.splice(i, 1);
                }
            }
            updateChart();
        });

        chartChanged();
    }

    function chartChanged(){
        $.ajax({
            type: 'POST',
            data: {products: products},
            url: '/Shop/updateCart',
            dataType: 'json',
            success: function(msg){
            }
        });
    }

    function recoverChart(){
        console.log("First Execution");
        $.ajax({
            type: 'POST',
            url: '/Shop/requestChart',
            dataType: 'json',
            success: function(array){
                products = array;
                products.forEach(function (p) {
                    p[2] = parseInt(p[2]);
                })
                updateChart();
            }
        });
    }

});
