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

                @can('view', App\Models\Administrative::class)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-folder-user-line"></i>
                        <span>Administrativo</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('create', App\Models\Administrative::class)
                        <li><a href="{{route('administrative.create')}}">Cadastrar</a></li>
                        @endcan
                        @can('search', App\Models\Administrative::class)
                        <li><a href="{{route('administrative.index')}}">Pesquisar</a></li>
                        @endcan
                        @can('report', App\Models\Administrative::class)
                        <li><a href="{{route('report.administrative.index')}}">Relatórios</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('view', App\Models\Seizure::class)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shield-star-line"></i>
                        <span>Apreensões</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('create', App\Models\Seizure::class)
                        <li><a href="{{route('seizure.index')}}">Cadastrar</a></li>
                        @endcan
                        @can('view', App\Models\Success::class)
                        <li><a href="{{route('success.index')}}">Êxitos</a></li>
                        @endcan
                        @can('search', App\Models\Seizure::class)
                        <li><a href="{{route('search.index')}}">Pesquisar</a></li>
                        @endcan
                        @can('export', App\Models\Seizure::class)
                        <li><a href="{{route('statistic.index')}}">Exportar</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

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


                @can('view', App\Models\Helpdesk::class)
                <li>
                    <a href="{{ route('helpdesk.index') }}" class="waves-effect">
                        <i class="ri-computer-line"></i>
                        <span>Helpdesk</span>
                    </a>
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
