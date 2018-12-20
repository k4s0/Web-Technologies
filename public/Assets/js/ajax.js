$("#ggwp").click(function () {
    $.ajax({
        type: 'POST',
        data: {msg: ['primo', 'secondo', 'terzo']},
        url: '/Home/ajax',
        dataType: 'json',
        success: function (msg) {
            $("#ajax").append(msg);
        }
    });
});

$("#showOrder").click(function () {
    $.ajax({
        type: 'POST',
        data: {msg: '1'},
        url: '/Dashboard/showClientOrder',
        success: function (msg) {
            $("#bt-client").remove();
            var json = $.parseJSON(msg);
            var table = '<table class ="table table-hover" >' +
                '<thead>' +
                '<th>Order Id</th> <th>Data</th> <th>Stato</th> <th>Descrizione</th> </thead><tbody>';

            for (var i = 0; i < json.length; ++i) {
                table += '<tr><td>' + json[i].order_id + '</td><td>' + json[i].date + '</td><td>' + json[i].state + '</td><td>' + json[i].description + '</td></tr>';
            }
            table += '</tbody></table><script src="/Assets/js/ajax-client-polling.js" type="text/javascript"></script>';
            $('#client-table').html(table);
            $('#client-btn-dash').show();

        }
    });
});
$("#showProducerOrder").click(function () {
    $.ajax({
        type: 'POST',
        data: {msg: '1'},
        url: '/Dashboard/showProducerOrder',
        success: function (msg) {
            $("#bt-producer").remove();
            var json = $.parseJSON(msg);
            var table = '<table class ="table table-hover" >' +
                '<thead>' +
                '<th>Order Id</th><th>Data</th><th>Descrizione</th><th>Azioni</th> </thead><tbody>';

            for (var i = 0; i < json.length; ++i) {
                table += '<tr><td>' + json[i].order_id + '</td><td>' + json[i].date + '</td><td>' + json[i].description + '</td><th><button id="producerChange" class="btn btn-primary" value="'+json[i].order_id+'">Accetta Ordine</button></th></tr>';
            }
            table += '</tbody></table><script src="/Assets/js/ajax-producer-polling.js" type="text/javascript"></script>';
            $('#producer-table').html(table);
            $('th').on('click','button#producerChange',function () {
                alert($(this).val());
            });
            $('#producer-btn-dash').show();

        }
    });
});
$("#producerChange").click(function () {
    var btn = $(this).value;
    alert(btn);
});