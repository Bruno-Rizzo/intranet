@extends('layouts.dashboard.app')

@section('title')
    SIP | Administrativo
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{route('administrative.movement_store', $administrative->id)}}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Administrativo</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Cadastro de Movimentação</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Setor</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="division_id">
                                            <option value="">Selecione um setor...</option>
                                            @foreach ($divisions as $item)
                                                <option value="{{ $item->id }}"  @selected(old('division_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Função</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="position_id">
                                            <option value="">Selecione uma função...</option>
                                            @foreach ($positions as $item)
                                                <option value="{{ $item->id }}"  @selected(old('position_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('position_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Movimentação</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="movement_id">
                                            <option value="">Selecione um tipo...</option>
                                            @foreach ($movements as $item)
                                                <option value="{{ $item->id }}" @selected(old('movement_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('movement_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Data</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" value="{{old('date')}}">
                                        @error('date')
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
