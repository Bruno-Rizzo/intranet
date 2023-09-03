@extends('layouts.dashboard.app')

@section('title')
    SIP | Funções
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Funções</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Cadastro de Função</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="Nome" name="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-save me-1"></i> Cadastrar
                                </button>
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-redo me-1"></i> Voltar
                                </a>
                            </div>

                        </div>

                    </form>

                </div> 

            </div> 

        </div> 

    </div>
    
@endsection
