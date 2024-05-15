@extends('layouts.dashboard.app')

@section('title')
    SIP | Administrativo
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{route('administrative.acaution_store',$administrative->id)}}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Administrativo</b></span>
                                <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Cadastro de Acautelamentos</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Espécie</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="type_id">
                                            <option value="">Selecione uma éspécie...</option>
                                            @foreach ($types as $item)
                                                <option value="{{ $item->id }}" @selected(old('type_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Marca</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="brand"
                                            value="{{ old('brand') }}">
                                        @error('brand')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Modelo</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="model"
                                            value="{{ old('model') }}">
                                        @error('model')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Calibre</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="caliber"
                                            value="{{ old('caliber') }}">
                                        @error('caliber')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Cautela/CRAF</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="acaution_number"
                                            value="{{ old('acaution_number') }}">
                                        @error('acaution_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nª Arma</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="gun_number"
                                            value="{{ old('gun_number') }}">
                                        @error('gun_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info me-1">
                                    <i class="fa fa-save"></i> Cadastrar
                                </button>
                                <a href="{{route('administrative.edit',$administrative->id)}}" class="btn btn-sm btn-primary ms-1">
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
