@extends('layouts.dashboard.app')

@section('title')
    SIP | Viaturas
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{route('vehicle.update', $vehicle->id)}}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Viaturas</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Editar Viaturas</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">

                                    
                                        <label class="col-sm-1 col-form-label">Nome</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" placeholder="Nome" name="name" value="{{$vehicle->name}}">
                                        </div>
                                    

                                    
                                        <label class="col-sm-1 col-form-label  text-end">ID</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" placeholder="ID" name="identify" value="{{$vehicle->identify}}">
                                        </div>
                                    

                                </div>

                                <div class="row mb-3">

                                    <label class="col-sm-1 col-form-label">Setor</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="division_id">
                                            <option value="">Selecione um setor...</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" @selected($division->id == $vehicle->division_id)>{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label class="col-sm-1 col-form-label  text-end">Tipo de Veículo</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="vehicle_type">
                                            <option value="">Selecione um tipo...</option>
                                                <option value="Carro"       @selected('Carro' == $vehicle->vehicle_type)>Carro</option>
                                                <option value="Moto"        @selected('Moto' == $vehicle->vehicle_type)>Moto</option>
                                                <option value="Utilitário"  @selected('Utilitário' == $vehicle->vehicle_type)>Utilitário</option>
                                        </select>
                                        @error('vehicle_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="row mb-3">

                                    <label class="col-sm-1 col-form-label">Patrimônio</label>
                                    <div class="col-sm-4 d-flex align-items-center gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patrimony_type" id="contrato" value="Contrato" @checked('Contrato' == $vehicle->patrimony_type)>
                                                <label class="form-check-label" for="contrato">
                                                    Contrato de Locação
                                                </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patrimony_type" id="proprio" value="Próprio" @checked('Próprio' == $vehicle->patrimony_type)>
                                                <label class="form-check-label" for="proprio">
                                                    Próprio
                                                </label>
                                        </div>
                                    </div>
                                
                                
                                    <label class="col-sm-1 col-form-label  text-end">Status</label>
                                    <div class="col-sm-4">
                                        <div class="form-check form-switch d-flex align-items-center h-100 mb-3">
                                            <input type="checkbox" class="form-check-input" id="{{$vehicle->id}}"
                                                   name="status" @checked($vehicle->status==1)>
                                            <label class="form-check-label ms-2"  for="{{$vehicle->id}}">Ativo</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row mb-3">

                                    <label class="col-sm-1 col-form-label">Marca</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Marca" name="brand" value="{{$vehicle->brand}}">
                                        @error('brand')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                

                                
                                    <label class="col-sm-1 col-form-label  text-end">Modelo</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Modelo" name="model" value="{{$vehicle->model}}">
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">

                                    <label class="col-sm-1 col-form-label">Placa Original</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Placa Original" name="original_plate" value="{{$vehicle->original_plate}}">
                                        @error('original_plate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                

                                
                                    <label class="col-sm-1 col-form-label  text-end">Placa Reservada</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Placa Reservada" name="reserved_plate" value="{{$vehicle->reserved_plate}}">
                                        @error('reserved_plate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">

                                    <label class="col-sm-1 col-form-label">Kilometragem</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Kilometragem" name="kilometer" value="{{$vehicle->kilometer}}">
                                        @error('kilometer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                               
                                    <label class="col-sm-1 col-form-label text-end">Nº Credencial</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="Número da Credencial" name="credential_number" value="{{$vehicle->credential_number}}">
                                        @error('credential_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">

                                    <label class="col-sm-1 col-form-label">Termo</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" accept="application/pdf"  name="disclaimer" value="{{$vehicle->disclaimer}}">
                                    </div>

                                     <label class="col-sm-1 col-form-label">Visualizar Termo</label>
                                    <div class="col-sm-4">
                                         <div class="d-flex align-items-center h-100 mb-3">
                                            @if($vehicle->disclaimer)
                                                 <a href="{{ asset('pdf/' . $vehicle->disclaimer) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="fa fa-file-pdf"></i> Visualizar PDF
                                                </a>
                                            @else
                                                <span class="text-muted fst-italic">Nenhum termo cadastrado</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Observações</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="4" name="observations">{{$vehicle->observations}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info me-1">
                                    <i class="fa fa-save"></i> Editar
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
