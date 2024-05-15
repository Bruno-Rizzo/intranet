@extends('layouts.dashboard.app')

@section('title')
    SIP | Administrativo
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
                            <span style="font-size: 14px">Relatórios</span>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">

                                    <div class="card">

                                        <div class="card-body">

                                            <div id="accordion" class="custom-accordion">

                                                {{-- SERVIDORES SSISPEN GERAL ATIVOS --}}

                                                <div class="card mb-1 shadow-none">

                                                    <a href="#collapseOne" class="text-dark collapsed"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                        <div class="card-header" id="headingOne">
                                                            <h6 class="m-0">
                                                                Servidores SSISPEN Geral ( Ativos )
                                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                        data-bs-parent="#accordion">

                                                        <div class="card-body">

                                                            <form action="{{ route('report.administrative_show_all') }}"
                                                                target="_blank" method="get">
                                                                @csrf

                                                                <div class="row mb-1">
                                                                    <div class="col-sm-2">
                                                                        <button type="submit" class="btn btn-sm btn-info">
                                                                            <i class="ri-printer-line me-2"></i> Gerar
                                                                            Relatório
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                                {{-- FIM - SERVIDORES SSISPEN GERAL ATIVOS --}}


                                                <div id="accordion" class="custom-accordion">

                                                    {{-- SERVIDORES SSISPEN GERAL INATIVOS --}}

                                                    <div class="card mb-1 shadow-none">

                                                        <a href="#collapseTwo" class="text-dark collapsed"
                                                            data-bs-toggle="collapse" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            <div class="card-header" id="headingTwo">
                                                                <h6 class="m-0">
                                                                    Servidores SSISPEN Geral ( Inativos )
                                                                    <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                                </h6>
                                                            </div>
                                                        </a>

                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                            data-bs-parent="#accordion">

                                                            <div class="card-body">

                                                                <form
                                                                    action="{{ route('report.administrative_inactives') }}"
                                                                    target="_blank" method="get">
                                                                    @csrf

                                                                    <div class="row mb-1">
                                                                        <div class="col-sm-2">
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-info">
                                                                                <i class="ri-printer-line me-2"></i> Gerar
                                                                                Relatório
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                </form>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    {{-- FIM - SERVIDORES SSISPEN GERAL ATIVOS --}}

                                                </div>
                                                {{-- SERVIDORES SSISPEN POR SETOR --}}

                                                <div class="card mb-1 shadow-none">

                                                    <a href="#collapseThree" class="text-dark collapsed"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        aria-controls="collapseThree">
                                                        <div class="card-header" id="headingThree">
                                                            <h6 class="m-0">
                                                                Servidores SSISPEN por Setor
                                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                        data-bs-parent="#accordion">

                                                        <div class="card-body">

                                                            <form action="{{ route('report.administrative_for_sector') }}"
                                                                target="_blank" method="post">
                                                                @csrf

                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <select class="form-select" name="division_id">
                                                                            <option value="">Selecione um setor
                                                                            </option>
                                                                            @foreach ($divisions as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    @selected(old('division_id') == $item->id)>
                                                                                    {{ $item->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('division_id')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-1">
                                                                    <div class="col-sm-2">
                                                                        <button type="submit" class="btn btn-sm btn-info">
                                                                            <i class="ri-printer-line me-2"></i> Gerar
                                                                            Relatório
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                                {{-- FIM -  SERVIDORES SSISPEN POR SETOR --}}


                                                {{-- DADOS DO SERVIDOR --}}

                                                <div class="card mb-1 shadow-none">

                                                    <a href="#collapseFour"
                                                        class="text-dark @if (isset($search)) @else collapsed @endif"
                                                        data-bs-toggle="collapse"
                                                        aria-expanded="@if (isset($search)) true @else false @endif"
                                                        aria-controls="collapseFour">
                                                        <div class="card-header" id="headingFour">
                                                            <h6 class="m-0">
                                                                Dados do Servidor
                                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                        data-bs-parent="#accordion">

                                                        <div class="card-body">

                                                            <form action="{{ route('report.administrative_search') }}"
                                                                method="post">
                                                                @csrf

                                                                <div class="row">

                                                                    <div class="col-4">
                                                                        <input class="form-control" type="text"
                                                                            placeholder="Digite um nome para pesquisar"
                                                                            name="name">
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

                                                                <table
                                                                    class="table table-bordered table-hover dataTables-example">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nome</th>
                                                                            <th>ID Funcional</th>
                                                                            <th>Setor</th>
                                                                            <th>Função</th>
                                                                            <th class="text-center">Ativo</th>
                                                                            <th class="text-center">Dados do Servidor</th>
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
                                                                                        <i class="fa fa-check"
                                                                                            style="color: green"></i>
                                                                                    @else
                                                                                        <i class="fa fa-times"
                                                                                            style="color: red"></i>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <a href="{{ route('report.administrative_info', $item->id) }}"
                                                                                        class="btn btn-sm btn-info"
                                                                                        target="_blank">
                                                                                        <i class="ri-printer-line me-2"></i>
                                                                                        Gerar Relatório
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

                                                {{-- FIM -  DADOS DO SERVIDOR --}}


                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
