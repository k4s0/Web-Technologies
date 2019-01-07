$(function () {
    writeTotal();
    $(".coupon").click(function(ev) {
        var ckb = $(ev.target).is(':checked');
        if (ckb) {
            var parent = $(ev.target).parent().parent();
            var coupon_id = parent.find("#coupon_id").attr("value");
            var producer_id = parent.find("#producer_id").attr("value");
            var client_id = parent.find("#client_id").attr("value");
            var ammount = parent.find("#ammount").attr("value");
            var companyName = parent.find("#companyName").attr("value");

            $.ajax({
                type: 'POST',
                data: {
                    coupon_id: coupon_id,
                    producer_id: producer_id,
                    client_id: client_id,
                    ammount: ammount,
                    companyName: companyName
                },
                url: '/Shop/addCoupon',
                dataType: 'json',
                success: function (msg) {
                    console.log(msg);
                }
            });
        } else {
            var parent = $(ev.target).parent().parent();
            var coupon_id = parent.find("#coupon_id").attr("value");
            $.ajax({
                type: 'POST',
                data: {toDelete: coupon_id},
                url: '/Shop/deleteCoupon',
                dataType: 'json',
                success: function (msg) {
                    console.log(msg);
                }
            });
        }

        writeTotal();
    });

    function writeTotal() {
        $.ajax({
            type: 'POST',
            data: {msg: 'request'},
            url: '/Shop/getTotal',
            dataType: 'json',
            success: function (total) {
                var newElem =
                    '<tr id="total">' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td>'+ total +'€</td>' +
                    '</tr>'
                $("#total").remove();
                $("#tableCheckout").append(newElem);
                var newElem1='<div class="row" id="totalListProduct">'+
                    '<div class="col-xs-2"></div>'+
                    '<div class="col-xs-8">' +
                    '<div class="card">'+
                    '<div class="card-body">'+
                    '<ul class="list-group list-group-flush">'+
                        '<li class="list-group-item"><span class="productInfo">Totale: </span>'+total+'€</li>'+
                    '</ul>'+
                    '</div>'+
                     '</div>'+
                    '</div>'+
                    '<div class="col-xs-2"></div>'+
                    '</div>';
                $("#totalListProduct").remove();
                $("#listProduct").append(newElem1);
            }

        });
    }
})