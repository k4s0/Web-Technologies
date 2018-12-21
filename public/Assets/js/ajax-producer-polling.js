function showNewStatus() {
    $.ajax({
        type: 'POST',
        data: {msg: '1'},
        url: '/Dashboard/showProducerOrder',
        success: function (msg) {
            var status_string = '';
            var json = $.parseJSON(msg);
            var table = '<table class ="table table-hover" >' +
                '<thead>' +
                '<th>Order Id</th><th>Data</th><th>Descrizione</th><th>Azioni</th> </thead><tbody>';

            for (var i = 0; i < json.length; ++i) {
                var status = json[i].state;
                switch (status) {
                    case '0':
                        status_string = 'Accetta Ordine';
                        break;
                    case '1':
                        status_string = 'Spedisci';
                        break;
                }
                if (status != '2') {
                    table += '<tr><td>' + json[i].order_id + '</td><td>' + json[i].date + '</td><td>' + json[i].description + '</td><th><button id="producerChange" class="btn btn-primary" value="' + json[i].order_id + '">' + status_string + '</button></th></tr>';

                }
            }
            table += '</tbody></table>';
            $('#producer-table').html(table);
            $('#producer-btn-dash').show()

            $('th').on('click', 'button#producerChange', function () {
                //Ajax call to change the status order from producer dashboard
                var order_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    data: {msg: order_id},
                    url: '/Dashboard/changeOrderStatus',
                    dataType: 'json',
                    success: function (msg) {
                        console.log("showNewStatus return" + msg);
                        showNewStatus();
                    }
                });
            });

        }
    });
}

setInterval(function () {
    $.ajax({
        type: 'POST',
        data: {msg: '1'},
        url: '/Dashboard/showProducerOrder',
        success: function (msg) {
            $("#bt-producer").remove();
            var status_string = '';
            var json = $.parseJSON(msg);
            var table = '<table class ="table table-hover" >' +
                '<thead>' +
                '<th>MakeOrder Id</th><th>Data</th><th>Descrizione</th><th>Azioni</th> </thead><tbody>';

            for (var i = 0; i < json.length; ++i) {
                var status = json[i].state;
                switch (status) {
                    case '0':
                        status_string = 'Accetta Ordine';
                        break;
                    case '1':
                        status_string = 'Spedisci';
                        break;
                }
                if (status != '2') {
                    table += '<tr><td>' + json[i].order_id + '</td><td>' + json[i].date + '</td><td>' + json[i].description + '</td><th><button id="producerChange" class="btn btn-primary" value="' + json[i].order_id + '">' + status_string + '</button></th></tr>';

                }
            }
            table += '</tbody></table>';
            $('#producer-table').html(table);
            $('th').on('click', 'button#producerChange', function () {
                //Ajax call to change the status order from producer dashboard
                var order_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    data: {msg: order_id},
                    url: '/Dashboard/changeOrderStatus',
                    dataType: 'json',
                    success: function (msg) {
                        console.log(msg);
                        showNewStatus();
                    }
                });
            });
            $('#producer-btn-dash').show();

        }
    });
}, 10000);
