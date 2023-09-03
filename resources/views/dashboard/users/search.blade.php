@extends('layouts.dashboard.app')

@section('title')
    SIP | Usuários
@endsection

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{ route('users.find') }}" method="post">
                        @csrf
                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Senhas</b></span>
                                <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Pesquisar Usuário</span>
                            </div>

                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Nome" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-search me-1"></i> Pesquisar
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

            @isset($users)
                <div class="row">

                    <div class="col-md-12 mt-2">

                        <div class="card shadow mb-4">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Senhas</b></span>
                                <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Resultado da Pesquisa</span>
                            </div>

                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>

                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nome</th>
                                            <th>Usuário</th>
                                            <th>Função</th>
                                            <th class="text-center">Visualizar</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('users.show', $user->id) }}" class="text-primary"
                                                        style="text-decoration: none">
                                                        <i class="fa fa-user-check" style="font-size: 19px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>
            @endisset

        </div>

    </div>

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection

@endsection
