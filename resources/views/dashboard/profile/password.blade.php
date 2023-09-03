@extends('layouts.dashboard.app')

@section('title')
    SIP | Dashboard
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <form action="{{ route('profile.update.password', Auth::id()) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Alterar Senha</b></span>
                                <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Dados do Usuário</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Senha Atual</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" placeholder="Senha Atual"
                                            name="oldPassword">
                                        @error('oldPassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nova Senha</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" placeholder="Nova Senha"
                                            name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Confirma Senha</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" placeholder="Confirma Senha"
                                            name="confirmPassword">
                                        @error('confirmPassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit me-1"></i> Alterar Senha
                                </button>
                            </div>

                        </form>
                        
                    </div>

                </div>

            </div>

        </div>

    </div>
    
@endsection
