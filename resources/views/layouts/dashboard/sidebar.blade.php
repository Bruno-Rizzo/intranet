<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div id="sidebar-menu">


            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-pie-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('helpdesk.index') }}" class="waves-effect">
                        <i class="ri-computer-line"></i>
                        <span>Helpdesk</span>
                    </a>
                </li>

                @can('admin')

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class=" ri-user-settings-line"></i>
                        <span>Configurações</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('users.index') }}">Usuários</a></li>
                        <li><a href="{{ route('roles.index') }}">Funções</a></li>
                        <li><a href="{{ route('users.find') }}">Senhas</a></li>
                    </ul>
                </li>

                @endcan

                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class=" ri-home-3-line"></i>
                        <span>Intranet</span>
                    </a>
                </li>

            </ul>

        </div>

    </div>

</div>
