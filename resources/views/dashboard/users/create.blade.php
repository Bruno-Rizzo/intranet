@extends('layouts.dashboard.app')

@section('title')
    SIP | Usuários
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Usuários</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Cadastro de Usuário</span>
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

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Usuário</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="Usuário" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Senha</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" placeholder="Senha" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Função</label>
                                    <div class="col-sm-6">
                                        <select class="form-select" name="role_id">
                                            <option value="">Selecione uma função...</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info me-1">
                                    <i class="fa fa-save"></i> Cadastrar
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary ms-1">
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
