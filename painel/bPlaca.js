$(document).ready(function() {

    $("input[name='rodagem']").val("0000");

    $('#vplaca').change(e => {
        var placas = $(e.target).val();
        var newPlaca = placas.split("-");
        var novaPlaca = newPlaca[4];

        if (typeof novaPlaca === 'undefined') {
            $("input[name='rodagem']").val("0000");
        }

        $.ajax({
            type: "GET",
            url: "bplacas.php",
            dataType: "json",
            data: { placa: novaPlaca },
            success: function(data) {

                //debug result console
                // console.log(data);

                //set input value
                $("input[name='rodagem']").val(data);
            }
        });

    })
})