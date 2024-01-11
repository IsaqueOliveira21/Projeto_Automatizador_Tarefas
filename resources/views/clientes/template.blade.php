<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Autotask - Dashboard</title>

    <meta name="description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset(('assets/js/plugins/highlightjs/styles/atom-one-dark.css')) }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cronogramaCreate.css') }}">

    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xmodern.min.css') }}">
    <!-- END Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
</head>
<body>

<div id="page-container"
     class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-boxed">
    <!-- Side Overlay-->
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
      Sidebar Mini Mode - Display Helper classes

      Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

      Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
      Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header (mini Sidebar mode) -->
        <div class="smini-visible-block">
            <div class="content-header bg-primary">
                <!-- Logo -->
                <a class="fw-semibold text-white tracking-wide" href="index.html">
                    D<span class="opacity-75">x</span>
                </a>
                <!-- END Logo -->
            </div>
        </div>
        <!-- END Side Header (mini Sidebar mode) -->

        <!-- Side Header (normal Sidebar mode) -->
        <div class="smini-hidden">
            <div class="content-header justify-content-lg-center bg-primary">
                <!-- Logo -->
                <a class="fw-semibold text-white tracking-wide" href="index.html">
                    Auto<span class="opacity-75">task</span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div class="d-lg-none">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                        <i class="fa fa-times-circle"></i>
                    </button>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header (normal Sidebar mode) -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- User Info -->
            <div class="smini-hidden">
                <div class="content-side content-side-full bg-black-10 d-flex align-items-center">
                    <a class="img-link d-inline-block" href="{{ Route('user.edit') }}">
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                             src="{{ asset('assets/media/avatars/avatar8.jpg') }}" alt="">
                    </a>
                    <div class="ms-3">
                        <a class="fw-semibold text-dual" href="{{ Route('user.edit') }}">{{ Auth::user()->name }}</a>
                    </div>
                </div>
            </div>
            <!-- END User Info -->
            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ Route::current()->getName() == 'dashboard.index' ? 'active' : '' }}" href="{{ Route('dashboard.index') }}">
                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                            <span class="nav-main-link-name">Atividades</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="#">
                            <i class="nav-main-link-icon fa fa-bell"></i>
                            <span class="nav-main-link-name">Notificações</span>
                            <span class="nav-main-link-badge badge rounded-pill bg-info">6</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Tarefas</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ Route::current()->getName() == 'tarefas.index' ? 'active' : '' }}" href="{{ Route('tarefas.index') }}">
                            <i class="nav-main-link-icon fa fa-tasks"></i>
                            <span class="nav-main-link-name">Ver Tarefas</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="#" data-bs-toggle="modal" data-bs-target="#modalCadastroTarefa"
                           data-item='
                           <form id="formCadastroTarefa" action="{{ Route('tarefas.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Título</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da tarefa">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="prazo">Prazo (Opcional)</label>
                                    <input type="date" class="js-flatpickr form-control" id="prazo" name="prazo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição da tarefa..."></textarea>
                                </div>
                            </form>
                           '>
                            <i class="nav-main-link-icon fa fa-plus"></i>
                            <span class="nav-main-link-name">Nova Tarefa</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Cronograma</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ Route::current()->getName() == 'cronograma.index' ? 'active' : '' }}" href="{{ Route('cronograma.index') }}">
                            <i class="nav-main-link-icon far fa-calendar-alt"></i>
                            <span class="nav-main-link-name">Meu Cronograma</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ Route::current()->getName() == 'cronograma.create' ? 'active' : '' }}" href="{{ Route('cronograma.create') }}">
                            <i class="nav-main-link-icon fa fa-plus"></i>
                            <span class="nav-main-link-name">Nova atividade</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->

                <!-- Notifications Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="badge bg-black-50 rounded-pill">6</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                            Notifications
                        </div>
                        <ul class="nav-items my-2">
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-user-plus text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">John Doe send you a friend request!</div>
                                        <div class="text-muted">6 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-user-plus text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">Elisa Doe send you a friend request!</div>
                                        <div class="text-muted">10 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-check-circle text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">Backup completed successfully!</div>
                                        <div class="text-muted">2 hours ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-user-plus text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">George Smith send you a friend request!</div>
                                        <div class="text-muted">3 hours ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-exclamation-circle text-warning"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">You are running out of space. Please consider upgrading
                                            your plan.
                                        </div>
                                        <div class="text-muted">1 day ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-envelope-open text-info"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">You have a new message!</div>
                                        <div class="text-muted">2 days ago</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="p-2 border-top">
                            <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                                <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Notifications Dropdown -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a href="{{ Route('user.logout') }}" type="button" class="btn btn-alt-secondary">
                    <i class="nav-main-link-icon si si-logout"></i>
                    Sair
                </a>
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo18@2x.jpg')}});">
            <div class="bg-black-50">
                <div class="content content-full content-top">
                    <div class="py-4 text-center">
                        <a class="img-link" href="javascript:void(0)">
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                 src="{{ asset('assets/media/avatars/avatar8.jpg') }}" alt="">
                        </a>
                        <h1 class="h2 fw-bold my-2 text-white">{{ Auth::user()->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h5 class="mb-0">@yield('titulo')</h5>
                        </div>
                        <div class="block-content">
                            @yield('conteudo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                                                                               href="https://1.envato.market/ydb"
                                                                               target="_blank">Isaque</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                    <a class="fw-semibold" href="#" target="_blank">Desde</a> &copy;
                    <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- MODAL DELETE -->
<div class="modal" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-danger">
                    <h3 class="block-title" id="title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p id="nomeItem"></p>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" id="btnModalDelete" class="btn btn-sm btn-danger">Remover</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL DELETE -->

<!-- MODAL DETALHES TAREFAS -->

<div class="modal" id="modalDetalhesTarefa" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Detalhes da Tarefa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div id="descricao"></div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL DETALHES TAREFAS -->

<!-- MODAL CADASTRO TAREFAS -->

<div class="modal" id="modalCadastroTarefa" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Criar Nova Tarefa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content" id="inputs"></div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" form="formCadastroTarefa" id="btnModalCadastroTarefa" class="btn btn-sm btn-primary">Criar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL CADASTRO TAREFAS -->

<!-- MODAL EDITAR/DELETAR ATIVIDADE CRONOGRAMA -->

<div class="modal" id="modalDadosCronograma" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"><i class="fa fa-1x fa-info-circle"></i> Informações da Atividade</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content mt-2 mb-4" id="dados"></div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="submit" form="formEditarAtividade" id="btnEditarAtividade" type="button" class="btn btn-sm btn-alt-primary" data-bs-dismiss="modal">Alterar</button>
                    <a href="#" id="btnDeleteAtividade" type="button" class="btn btn-sm btn-alt-danger">Excluir</a>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL EDITAR/DELETAR ATIVIDADE CRONOGRAMA -->

<!-- SCRIPTS -->
<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
<script>Dashmix.helpersOnLoad(['js-highlightjs', 'jq-magnific-popup']);</script>
<script>Dashmix.helpersOnLoad(['jq-notify', 'jq-select2', 'jq-datepicker', 'js-flatpickr']);</script>
<script>Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-colorpicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider', 'jq-masked-inputs', 'jq-pw-strength']);</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    $(document).ready(function () {
        $('#modalDelete').on('show.bs.modal', function (e) {
            let params = $(e.relatedTarget);
            let id = params.data('id');
            let title = params.data('title')
            let item = params.data('item');
            let url = params.data('url');
            let modal = $(this);
            modal.find('#title').html(title);
            modal.find('#nomeItem').html(item);
            if(id != null) {
                modal.find('#btnModalDelete').attr('href', url + '?id=' + id);
            } else {
                modal.find('#btnModalDelete').attr('href', url);
            }
        });
        $('#modalDetalhesTarefa').on('show.bs.modal', function (e) {
            let params = $(e.relatedTarget);
            let item = params.data('item');
            let modal = $(this);
            modal.find('#descricao').html(item);
        });
        $('#modalCadastroTarefa').on('show.bs.modal', function (e) {
           let params = $(e.relatedTarget);
           let item = params.data('item');
           //let url = params.data('url');
           let modal = $(this);
           modal.find('#inputs').html(item);
           //modal.find('#btnModalCadastroTarefa').attr('href', url);
        });
        $('#modalDadosCronograma').on('show.bs.modal', function(e) {
            let params = $(e.relatedTarget);
            let id = params.data('id');
            let item = params.data('item');
            let url = params.data('delete');
            let modal = $(this);
            modal.find('#dados').html(item);
            modal.find('#btnDeleteAtividade').attr('href', url + '?id=' + id);
        });
    });
</script>
@if(Route::currentRouteName() === 'dashboard.index')
    @include('clientes.dashboard.graficos.basicColumns')
@endif
</body>
</html>
