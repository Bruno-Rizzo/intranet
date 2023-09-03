@extends('layouts.site.app')

@section('title')
    Intranet | Helpdesk
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row text-center">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" style="color: #0097A7">Helpdesk</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Helpdesk</li>
                            </ol>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-12">

                    <form action="{{route('helpdesk.store')}}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Helpdesk</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Abertura de Chamado</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="Nome" name="name" value="{{old('name')}}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Whatsapp</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="Whatsapp" name="whatsapp" value="{{old('whatsapp')}}">
                                        @error('whatsapp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Divisão</label>
                                    <div class="col-sm-6">
                                        <select class="form-select" name="division_id">
                                            <option value="">Selecione uma divisão...</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" @selected(old('division_id') == $division->id)>
                                                    {{ $division->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Problema</label>
                                    <div class="col-sm-6">
                                        <select class="form-select" name="trouble_id">
                                            <option value="">Selecione um problema...</option>
                                            @foreach ($troubles as $trouble)
                                                <option value="{{ $trouble->id }}" @selected(old('trouble_id') == $trouble->id)>
                                                    {{ $trouble->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('trouble_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Descrição</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" placeholder="Digite uma breve descrição, caso necessário..." name="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-save me-1"></i> Cadastrar Chamado
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
