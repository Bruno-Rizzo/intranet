<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    @can('view', App\Models\Helpdesk::class)
    <meta http-equiv="refresh" content="300">
    @endcan
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @yield('styles')

    @livewireStyles

</head>

<body data-topbar="dark">

    <div id="layout-wrapper">

        <header id="page-topbar">

            <div class="navbar-header">

                <div class="d-flex">

                    <div class="navbar-brand-box">

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo_sip.png') }}" alt="logo-light" height="50">
                            </span>
                        </a>

                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">

                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                    <div class="dropdown d-inline-block user-dropdown">

                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/profile.png') }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">

                            <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                                    class="ri-user-line align-middle me-1"></i> Perfil</a>
                            <a class="dropdown-item" href="{{ route('profile.password') }}"><i
                                    class="ri-lock-unlock-line align-middle me-1"></i> Alterar Senha</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ 'logout' }}" method="post">
                                @csrf
                                <a class="dropdown-item text-danger" href="#"
                                    onclick="event.preventDefault(); this.closest('form').submit()">
                                    <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout
                                </a>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        @include('layouts.dashboard.sidebar')

        <div class="main-content">

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Subsecretaria de Inteligência.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Desenvolvido por <strong style="color: #038D9D">Inspetor Bruno Rizzo</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    @include('sweetalert::alert')

    @yield('scripts')

    @livewireScripts

</body>

</html>
