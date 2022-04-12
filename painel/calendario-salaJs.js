document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarSalas');

    var calendar1 = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid', 'TimeGrid'],
        editable: true,
        eventLimit: true,
        initialView: 'timeGridWeek',
        events: 'result_reserva_salas.php',
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
            $("#modalCalendarSalas #id").text(info.event.id);
            $("#modalCalendarSalas #cod").val(info.event.id);
            $("#modalCalendarSalas #titulo").text(info.event.title);
            $("#modalCalendarSalas #reserva_start").text(info.event.start.toLocaleString());
            $("#modalCalendarSalas #reserva_end").text(info.event.end.toLocaleString());
            $("#modalCalendarSalas #duracao").text(info.event.extendedProps.duracao);
            $("#modalCalendarSalas #repeticao").text(info.event.extendedProps.repeticao);
            $("#modalCalendarSalas #sala").text(info.event.extendedProps.sala);
            $("#modalCalendarSalas #comentario").text(info.event.extendedProps.comentario);
            $("#modalCalendarSalas #situacao").text(info.event.extendedProps.situacao);
            $("#modalCalendarSalas #departamento").text(info.event.extendedProps.departamento);
            $("#modalCalendarSalas #uuid").val(info.event.extendedProps.id_users);
            $("#modalCalendarSalas").modal('show');
        },
        select: function(info) {
            const dataHoras = new Date();
            const newGateMonth = (dataHoras.getMonth() + 1);
            dataAtual = String(dataHoras.getFullYear() + '-' + (newGateMonth < 10 ? ('0' + newGateMonth) : newGateMonth) + '-' + (dataHoras.getDate() < 10 ? '0' + dataHoras.getDate() : dataHoras.getDate()));

            //dataAtual = String(dataHoras.getFullYear() + '-' + (dataHoras.getMonth() + 1) + '-' + (dataHoras.getDate() < 10 ? '0' + dataHoras.getDate() : dataHoras.getDate()));
            formDatas = String('T' + (dataHoras.getHours() < 10 ? '0' + dataHoras.getHours() : dataHoras.getHours()) + ':' + (dataHoras.getMinutes() < 10 ? '0' + dataHoras.getMinutes() : dataHoras.getMinutes()) + ':' + (dataHoras.getSeconds() < 10 ? '0' + dataHoras.getSeconds() : dataHoras.getSeconds()));
            //newDatas = String();
            //const timeControl = document.querySelector('input[type="datetime-local"]');
            // const timeControl = document.querySelector('#datime');
            const timeControl1 = document.getElementById("datime");
            timeControl1.value = info.startStr + '' + formDatas;
            //console.log(info.startStr + '' + formDatas);

            if (dataAtual > info.startStr) {
                $("#errorModal").modal('show');
                return;
            }

            //$("#modalCadastrar #data").val(info.startStr);
            $("#modalCadastrarSalas").modal('show');
        },

        selectable: true

    });

    calendar1.render();
});