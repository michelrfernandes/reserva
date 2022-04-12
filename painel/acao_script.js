$(document).ready(function() {

    $('#formCad').submit(function(e) {
        e.preventDefault();

        var dados = $('#formCad').serialize();
        console.log(dados);

        $.ajax({
            type: 'POST',
            url: 'cad_reserva.php',
            data: dados,
            dataType: 'json',
            success: function(response) {
                if (response['status']) {
                    $('#message').html(response['msg']);
                } else {
                    $('#message').html(response['msg'] = 'error');
                }
            }
        });
    });

});