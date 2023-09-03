@extends('layouts.dashboard.app')

@section('title')
    SIP | Helpdesk
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
                            <span style="font-size: 18px"><b>Helpdesk</b></span>
                                <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                            <span style="font-size: 14px">Lista de Chamados</span>
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered dt-responsive nowrap tb-helpdesk"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class="text-center">Whatsapp</th>
                                        <th>Divisão</th>
                                        <th class="text-center">Data de Cadastro</th>

                                        @can('update', App\Models\Helpdesk::class)
                                        <th class="text-center">Visualizar</th>
                                        @endcan

                                        @can('delete', App\Models\Helpdesk::class)
                                        <th class="text-center">Excluir</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calls as $call)
                                        <tr>
                                            <td>{{ $call->name }}</td>
                                            <td class="text-center">{{ $call->whatsapp}}</td>
                                            <td>{{ $call->division->name }}</td>
                                            <td class="text-center">{{ $call->created_at->format('d/m/Y - H:i') }} hs</td>

                                            @can('update', App\Models\Helpdesk::class)
                                            <td class="text-center">
                                                <a href="{{ route('helpdesk.edit' , $call->id)}}" class="text-primary">
                                                    <i class="far fa-file-alt"></i>
                                                </a>
                                            </td>
                                            @endcan

                                            @can('delete', App\Models\Helpdesk::class)
                                            <td class="text-center">
                                                <a href="{{ route('helpdesk.confirm', $call->id) }}" class="text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                            </table>

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
            $('.tb-helpdesk').DataTable({
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
