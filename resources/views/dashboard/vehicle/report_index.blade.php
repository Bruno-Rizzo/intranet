@extends('layouts.dashboard.app')

@section('title')
    SIP | Viaturas
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <span style="font-size: 18px"><b>Viaturas</b></span>
                            <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                            <span style="font-size: 14px">Relatórios</span>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">
                                    
                                    <div class="card">

                                        <div class="card-body">

                                            {{-- VIATURAS POR CONDUTOR --}}

                                            <div id="accordion" class="custom-accordion">


                                                <div class="card mb-1 shadow-none">

                                                    <a href="#collapseOne" class="text-dark collapsed"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                        <div class="card-header" id="headingOne">
                                                            <h6 class="m-0">
                                                                Relação de Viaturas ( Ordenados por Condutor )
                                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                        data-bs-parent="#accordion">

                                                        <div class="card-body">

                                                            <form action="{{ route('report.vehicle.server') }}"
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
                                                
                                            </div>

                                                {{-- FIM - VIATURAS POR CONDUTOR --}}



                                                {{-- VIATURAS POR SETOR --}}

                                                <div id="accordion" class="custom-accordion">

                                                <div class="card mb-1 shadow-none">

                                                    <a href="#collapseFour" class="text-dark collapsed"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        aria-controls="collapseFour">
                                                        <div class="card-header" id="headingFour">
                                                            <h6 class="m-0">
                                                                Viaturas por Setor
                                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                        data-bs-parent="#accordion">

                                                        <div class="card-body">

                                                            <form action="{{ route('report.vehicle.division') }}"
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

                                            </div>

                                            {{-- FIM -  VIATURAS POR SETOR --}}


                                            {{-- DADOS DA VIATURA --}}

                                            <div class="custom-accordion">

                                                <div class="card mb-1 shadow-none">

                                                    <a href="#collapseFive"
                                                        class="text-dark @if (isset($search)) @else collapsed @endif"
                                                        data-bs-toggle="collapse"
                                                        aria-expanded="@if (isset($search)) true @else false @endif"
                                                        aria-controls="collapseFive">
                                                        <div class="card-header" id="headingFive">
                                                            <h6 class="m-0">
                                                                Dados da Viatura
                                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div id="collapseFive" class="collapse @if(isset($search)) show @endif" aria-labelledby="headingFive"
                                                        data-bs-parent="#accordion">

                                                        <div class="card-body">

                                                            <form action="{{ route('report.vehicle.search') }}"
                                                                method="post">
                                                                @csrf

                                                                <div class="row">

                                                                    <div class="col-4">
                                                                        <input class="form-control" type="text"
                                                                            placeholder="Digite uma placa para pesquisar"
                                                                            name="plate">
                                                                        @error('plate')
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
                                                                            <th>Marca</th>
                                                                            <th>Modelo</th>
                                                                            <th>Placa Original</th>
                                                                            <th>Placa Reservada</th>
                                                                            <th class="text-center">Ativa</th>
                                                                            <th class="text-center">Dados da Viatura</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach ($search as $item)
                                                                            <tr>
                                                                                <td>{{ $item->brand }}</td>
                                                                                <td>{{ $item->model }}</td>
                                                                                <td>{{ $item->original_plate }}</td>
                                                                                <td>{{ $item->reserved_plate }}</td>
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
                                                                                    <a href="{{ route('report.vehicle.info', $item->id) }}"
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

                                                </div>

                                                {{-- FIM -  DADOS DA VIATURA --}}


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
