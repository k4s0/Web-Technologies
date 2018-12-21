setInterval(function () {
    $.ajax({
        type: 'POST',
        data: {msg: '1'},
        url: '/Dashboard/showClientOrder',
        success: function (msg) {
            $("#bt-client").remove();
            var status_string = '';
            var json = $.parseJSON(msg);
            var table = '<table class ="table table-hover" >' +
                '<thead>' +
                '<th>MakeOrder Id</th> <th>Data</th> <th>Stato</th> <th>Descrizione</th> </thead><tbody>';

            for (var i = 0; i < json.length; ++i) {
                var status = json[i].state;
                switch (status) {
                    case '0':
                        status_string='Ordinato';
                        break;
                    case '1':
                        status_string='In Preparazione';
                        break;
                    case '2':
                        status_string='In Consegna';
                        break;
                }
                table += '<tr><td>' + json[i].order_id + '</td><td>' + json[i].date + '</td><td>' + status_string + '</td><td>' + json[i].description + '</td></tr>';
            }
            table += '</tbody></table>';
            $('#client-table').html(table);
            $('#client-btn-dash').show();

        }
    });
}, 10000);
