$.ajaxSetup({
    //https://developer.mozilla.org/en-US/docs/Web/HTTP/Status#server_error_responses
    error: function (jqXHR, textStatus, errorThrown) {
        if (jqXHR.status === 0) {
            error_http('Sin conexión', 'Verifica tu conexión a internet');
        }
        else if (jqXHR.status == 401) {
            error_http('401', 'No autorizado');
        }
        else if (jqXHR.status == 404) {
            error_http('404', 'La url solicitada no existe');
        }
        else if (jqXHR.status == 500) {
            error_http('500', 'Ha ocurrido un error interno en el servidor');
        }
        else if (jqXHR.status == 501) {
            error_http('501', 'No implementado');
        }
        else if (jqXHR.status == 502) {
            error_http('502', 'Bad Gateway');
        }
        else if (jqXHR.status == 503) {
            error_http('En mantención', 'Volveremos prontamente, prueba en un par de minutos más.', 'info');
        }
        else if (jqXHR.status == 504) {
            error_http('504', 'Gateway Timeout');
        }
        else if (textStatus === 'parsererror') {
            error_http('Solicitud fallida', 'Ha ocurrido un error interno en el servidor [JSON]');
        }
        else if (textStatus === 'timeout') {
            error_http('Tiempo de espera agotado', 'Probablemente nuestros servicios se encuentran con intermitencia');
        }
        else if (textStatus === 'abort') {
            error_http('Error', 'La solicitud ha sido abortada');
        }
        else {
            error_http('Error', 'Ha ocurrido un error desconocido');
            //alert('Uncaught Error: ' + jqXHR.responseText);
        }
    }
});
$(document).ajaxStart(function () {
    $(".btn").attr("disabled", true);
});
$(document).ajaxComplete(function () {
    $(".btn").attr("disabled", false);
});

function makeUL(mensaje) {
    if (Array.isArray(mensaje)) {
        if (mensaje.length == 1) {
            return mensaje[0];
        }
        else {
            return "<lu><li>" + mensaje.join("</li><li>") + "</li></lu>";
        }
    }
    else {
        return mensaje
    }
}

function error_api(data, title = "Ha ocurrido un problema") {
    var message = makeUL(data.message);
    Swal.fire({
        title: title,
        icon: 'warning',
        html: message,
        confirmButtonColor: '#282b7a',
        confirmButtonText: 'Lo entiendo'
    })
    cerrar_modals();
}


function success_api(data, title = "Realizado") {
    var message = makeUL(data.message);
    Swal.fire({
        title: title,
        icon: 'success',
        html: message,
        confirmButtonColor: '#282b7a',
        confirmButtonText: 'Lo entiendo'
    })
}

function error_http(title, message, type_icon = 'error') {
    Swal.fire({
        title: title,
        icon: type_icon,
        html: message,
        confirmButtonColor: '#f27474',
        confirmButtonText: 'Continuar'
    })
    setTimeout(cerrar_modals, 500);
}
var decodeEntities = (function () {
    var doc = document.implementation.createHTMLDocument("");
    var element = doc.createElement('div');

    function getText(str) {
        element.innerHTML = str;
        str = element.textContent;
        element.textContent = '';
        return str;
    }

    function decodeHTMLEntities(str) {
        if (str && typeof str === 'string') {
            var x = getText(str);
            while (str !== x) {
                str = x;
                x = getText(x);
            }
            return x;
        }
    }
    return decodeHTMLEntities;
})();



function notify(type, titulo, mensaje) {
    $.notify({
        title: titulo + '<br>',
        message: mensaje,
        url: ''
    }, {
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: "top",
            align: "right"
        },
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 999999,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });
};
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
function cerrar_modals() {
    $(".modal").each(function () {
        $(this).modal("hide");
    });
    resetear_forms();
}
