@extends('layouts.dashboard.app')

@section('title')
    SIP | Viaturas
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{route('vehicle.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Viaturas</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Cadastro de Viatura</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Nome" name="name">
                                   </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">ID</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="ID" name="identify">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Setor</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="division_id">
                                            <option value="">Selecione um setor...</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Patrimônio</label>
                                    <div class="col-sm-4 d-flex align-items-center gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patrimony_type" id="contrato" value="Contrato" checked>
                                                <label class="form-check-label" for="contrato">
                                                    Contrato de Locação
                                                </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patrimony_type" value="Próprio" id="proprio">
                                                <label class="form-check-label" for="proprio">
                                                    Próprio
                                                </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Tipo de Veículo</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="vehicle_type">
                                            <option value="">Selecione um tipo...</option>
                                                <option value="Carro">Carro</option>
                                                <option value="Moto">Moto</option>
                                                <option value="Utilitário">Utilitário</option>
                                        </select>
                                        @error('vehicle_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Marca</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Marca" name="brand">
                                        @error('brand')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Modelo</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Modelo" name="model">
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Placa Original</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Placa Original" name="original_plate">
                                        @error('original_plate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Placa Reservada</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Placa Reservada" name="reserved_plate">
                                   </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Kilometragem</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Kilometragem" name="kilometer">
                                        @error('kilometer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nº Credencial</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Número da Credencial" name="credential_number">
                                        @error('credential_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Termo</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" accept="application/pdf" name="disclaimer">
                                        <span class="text-danger">Somente arquivos .pdf</span>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info me-1">
                                    <i class="fa fa-save"></i> Cadastrar
                                </button>
                                <a href="{{ route('vehicle.index') }}" class="btn btn-sm btn-primary ms-1">
                                    <i class="fa fa-redo"></i> Voltar
                                </a>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
