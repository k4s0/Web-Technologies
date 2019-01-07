$(function () {
    var value = 0;
    print();

    $("#sliderCoupon").change(function() {
        console.log("[releaseCoupon.js]" + $("#sliderCoupon").val());
        print();
    });

    $("#release").click(function () {
        console.log("click");
        $.ajax({
            type: 'POST',
            data: {amount: value},
            url: '/CouponManager/releaseCoupons',
            dataType: 'json',
            success: function(msg){
                elem = '<div class="alert alert-success alert-dismissible">'+
                        ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                        ' <strong>Coupon inserito con successo!</strong>  </div>';
                $("#alerts").append(elem);
            }
        });
    })

    function print() {
        value = $("#sliderCoupon").val();
        var newElem = '<h7 id="amount">'+ value + '€</h7>';
        $("#column").find("#amount").remove();
        $("#column").append(newElem);
    }
});