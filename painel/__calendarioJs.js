document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid', 'TimeGrid'],
        editable: true,
        eventLimit: true,
        initialView: 'timeGridWeek',
        events: 'result_reserva.php', 
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            meridiem: false 
        },        

        extraParams: function() {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function(info) {
            info.jsEvent.preventDefault();
            $("#modalCalendar #id").text(info.event.id);
            $("#modalCalendar #cod").val(info.event.id);
            $("#modalCalendar #titulo").text(info.event.title);
            $("#modalCalendar #reserva_start").text(info.event.start.toLocaleString());
            $("#modalCalendar #reserva_end").text(info.event.end.toLocaleString());
            $("#modalCalendar #duracao").text(info.event.extendedProps.duracao);
            $("#modalCalendar #repeticao").text(info.event.extendedProps.repeticao);
            $("#modalCalendar #kmInicial").text(info.event.extendedProps.kmInicial);
            $("#modalCalendar #kmFinal").text(info.event.extendedProps.kmFinal);
            $("#modalCalendar #nome").text(info.event.extendedProps.nome);
            $("#modalCalendar #comentario").text(info.event.extendedProps.comentario);
            $("#modalCalendar #situacao").text(info.event.extendedProps.situacao);
            $("#modalCalendar #situacao").attr('style','color: #fff; border-radius: 5px; margin:auto; padding: 10px 30px; text-transform: uppercase; background:'+(info.event.extendedProps.colors))+'';
            if(info.event.extendedProps.situacao == 'Finalizado'){
                $("#modalCalendar #btnDel").addClass('Finalizado');
                $("#modalCalendar #btnDel").removeClass('Reservado');
            } else {
                $("#modalCalendar #btnDel").removeClass('Finalizado');
                $("#modalCalendar #btnDel").addClass('Reservado');

            };
            
            $("#modalCalendar #uuid").val(info.event.extendedProps.id_users);
            $("#modalCalendar").modal('show');
        },
        select: function(info) {
            const dataHoras = new Date();
            dataAtual = String(dataHoras.getFullYear() + '-' + (dataHoras.getMonth() + 1) + '-' + (dataHoras.getDate() < 10 ? '0' + dataHoras.getDate() : dataHoras.getDate()));
            formDatas = String('T' + (dataHoras.getHours() < 10 ? '0' + dataHoras.getHours() : dataHoras.getHours()) + ':' + (dataHoras.getMinutes() < 10 ? '0' + dataHoras.getMinutes() : dataHoras.getMinutes()) + ':' + (dataHoras.getSeconds() < 10 ? '0' + dataHoras.getSeconds() : dataHoras.getSeconds()));
            //newDatas = String();            //newDatas = String();
            const timeControl = document.querySelector('input[type="datetime-local"]');
            timeControl.value = info.startStr + '' + formDatas;

            if (dataAtual > info.startStr) {
                $("#errorModal").modal('show');
                return;
            }

            //$("#modalCadastrar #data").val(info.startStr);
            $("#modalCadastrar").modal('show');
        },

        selectable: true

    });

    calendar.render();
});