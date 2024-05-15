@extends('layouts.dashboard.app')

@section('title')
    SIP | Administrativo
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

                    <div class="card">

                        <div class="card-header">
                            <span style="font-size: 18px"><b>Administrativo</b></span>
                            <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                            <span style="font-size: 14px">Pesquisa Servidor</span>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('administrative.search') }}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-5">
                                        <input class="form-control" type="text"
                                            placeholder="Digite um nome para pesquisar" name="name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success">
                                            <i class="ri-search-line"></i>
                                        </button>
                                    </div>

                                </div>

                            </form>

                            @isset($search)
                                <hr>

                                <table class="table table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>ID Funcional</th>
                                            <th>Setor</th>
                                            <th>Função</th>
                                            <th class="text-center">Ativo</th>
                                            <th class="text-center">Visualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($search as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->identify }}</td>
                                                <td>{{ $item->division->name }}</td>
                                                <td>{{ $item->position->name }}</td>
                                                <td class="text-center">
                                                    @if ($item->status == 1)
                                                        <i class="fa fa-check" style="color: green"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('administrative.edit',$item->id)}}">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endisset

                        </div>

                    </div>

                </div>

            </div>

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
    <script>
        $(document).ready(function() {
            $('.tb-user').DataTable({
                "order": [
                    [0, "desc"]
                ],
                'language': {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }

                }
            });
        });
    </script>
@endsection

@endsection
