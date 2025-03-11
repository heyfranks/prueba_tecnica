<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usuarios</title>
    <!--[if lt IE 11]>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="AIEP" />
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="">

    <nav class="pcoded-navbar <!--theme-horizontal--> menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menú</label>
                    </li>
                    <li class="nav-item " id="Iniciobf89f6756d11a04ddc3bbac67a272020">
                        <a href="/" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="pcoded-mtext">Inicio</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <img src="assets/images/logo.svg" alt="" class="logo w-75 mx-auto">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
    </header>

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header breadcumb-sticky">
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                Usuarios
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table data-tipo="tabla_usuarios" id="tabla_usuarios" class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>Acciones</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="editar_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_usuario_label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered header-primary" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editar_usuario_label">Editar identificador ítem</span></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form_editar_usuario" class="reset">
                            <div class="modal-body">
                                <input type="hidden" id="id" name="id">
                                <div class="row my-3">
                                    <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label for="direccion" class="col-sm-3 col-form-label">Dirección</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="direccion" name="direccion">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label for="phone" class="col-sm-3 col-form-label">Teléfono</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Advertencia</h1>
            <p>Estás usando una versión desactualizada de Internet explorer, por favor actualiza
            <br/> a cualquiera de los siguientes navegadores para acceder a este sitio web.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.microsoft.com/es-es/edge">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (Edge)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Disculpa las molestias</p>
        </div>
    <![endif]-->

    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/plugins/sweetalert.ultimo.min.js"></script>
    <script src="assets/js/mensajes.js?v=<?=time()?>"></script>

    <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/app.js?v=<?=time()?>"></script>
    <link rel="stylesheet" href="assets/css/plugins/dataTables.bootstrap4.min.css">
    <script>
        $(document).ready(function() {
            $("#Iniciobf89f6756d11a04ddc3bbac67a272020").addClass('active');
            $("#Iniciobf89f6756d11a04ddc3bbac67a272020").addClass('pcoded-trigger');
        });
    </script>
</body>

</html>