setInterval(function () {
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
            table += '</tbody></table>';
            $('#pippo').html(table);
            $('#pippo2').show();

        }
    });
}, 10000);
