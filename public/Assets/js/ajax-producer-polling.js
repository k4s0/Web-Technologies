setInterval(function () {
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
            table += '</tbody></table>';
            $('#producer-table').html(table);
            $('th').on('click','button#producerChange',function () {
                alert($(this).val());
            });
            $('#producer-btn-dash').show();

        }
    });
}, 10000);
