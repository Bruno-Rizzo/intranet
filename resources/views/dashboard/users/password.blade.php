@extends('layouts.dashboard.app')

@section('title')
    SIP | Usuários
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{route('users.password',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Senhas</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Alterar Senha</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{$user->name}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Usuário</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{$user->email}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Função</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{$user->role->name}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nova Senha</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" placeholder="Nova Senha" name="password">
                                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info me-1">
                                    <i class="fa fa-edit"></i> Alterar
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
