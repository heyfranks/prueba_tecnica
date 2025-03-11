$(document).ready(function () {
    tabla();
    $('#tabla_usuarios').on('click', ".editar", function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: `/usuario/${id}`,
            success: function (datos) {
                if (datos.success == 1) {
                    $.each(datos.message, function (input, valor) {
                        console.log(input + ' ' + valor);
                        $('#form_editar_usuario').find('[name="' + input + '"]').val(valor).end();
                    });
                    $('#editar_usuario').modal('show');
                }
                else {
                    error_api(datos, "Atención");
                }
            }
        });
    });
    function tabla() {
        $.ajax({
            type: "GET",
            url: `/usuarios`,
            success: function (data) {
                if (data.success == 1) {
                    tabla_usuarios(data);
                }
                else {
                    error_api(data, "Atención");
                }
            }
        });
    }
    function tabla_usuarios(datos) {
        var jsonString = datos.message;
        if ($.fn.dataTable.isDataTable('#tabla_usuarios')) {
            table = $('#tabla_usuarios').DataTable();
            table.destroy();
        }
        $('#tabla_usuarios').DataTable(
            {
                paging: true,
                searching: true,
                language: {
                    processing: "Procesando...",
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ usuarios",
                    info: "Mostrando desde _START_ al _END_ de _TOTAL_ usuarios",
                    infoEmpty: "No hay usuarios",
                    infoFiltered: "(Filtrando usuarios _MAX_ máximo total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando usuarios",
                    zeroRecords: "No existen usuarios para su búsqueda",
                    emptyTable: "Sin usuarios registrados",
                    paginate: {
                        first: "Primera",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "íltimo"
                    }
                },
                "iDisplayLength": 10,
                aoColumnDefs: [{
                    bSortable: true,
                    aTargets: [0]
                }],
                aaSorting: [
                    [0, 'asc']
                ],
                "data": jsonString,
                "columns": [
                    { "data": "id" },
                    {
                        "data": "id",
                        "mRender": function (data, type, row) {
                            return `
                                <a href="javascript:void(0)" class="btn btn-icon btn-outline-success editar" data-id="${row.id}" data-toggle="tooltip" data-placement="top" title="Editar título">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <a href="mailto:${row.email}" class="btn btn-icon btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Enviar email">
                                    <i class="feather icon-mail"></i>
                                </a>
                        `;
                        }
                    },
                    { "data": "name" },
                    { "data": "username" },
                    { "data": "email" },
                    { "data": "direccion" },
                    { "data": "phone" }
                ]
            }
        );
    }

    $("#form_editar_usuario").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            username: {
                required: true,
                minlength: 1,
                maxlength: 15
            },
            email: {
                required: true,
                email: true
            },
            direccion: {
                required: true,
                minlength: 1,
                maxlength: 55
            },
            phone: {
                required: true,
                minlength: 1,
                maxlength: 55
            }
        },
        messages: {
            name: {
                required: "Se requiere el nombre del usuario",
                minlength: "El nombre del usuario necesita un mínimo de 3 caracteres",
                maxlength: "El nombre del usuario tiene un máximo de 255 caracteres",
            },
            username: {
                required: "Se requiere el username",
                minlength: "El username necesita un mínimo de 1 caracteres",
                maxlength: "El username tiene un máximo de 15 caracteres",
            },
            email: {
                required: "Se requiere el email",
                email: "Ingrese un email válido",
            },
            direccion: {
                required: "Se requiere la dirección del usuario",
                minlength: "La dirección necesita un mínimo de 1 caracteres",
                maxlength: "La dirección tiene un máximo de 55 caracteres",
            },
            phone: {
                required: "Se requiere el teléfono",
                minlength: "El teléfono necesita un mínimo de 1 caracteres",
                maxlength: "El teléfono tiene un máximo de 55 caracteres",
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") == "activo_usuario") {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            var $el = $(element);
            var $parent = $el.parents(".form-group");

            $el.addClass("es-invalido");

            if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                $el.parent().addClass("es-invalido");
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "/usuario/actualizar",
                data: $("#form_editar_usuario").serialize(),
                success: function (data) {
                    if (data.success == 1) {
                        recargar();
                        $('#editar_usuario').modal('hide');
                    }
                    else {
                        error_api(data, "Atención");
                    }
                }
            });
        }
    });
});