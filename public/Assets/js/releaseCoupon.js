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
                console.log(msg);
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