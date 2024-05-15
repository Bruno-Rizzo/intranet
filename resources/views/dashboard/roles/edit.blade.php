@extends('layouts.dashboard.app')

@section('title')
    SIP | Funções
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Funções</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Editar Função</span>
                            </div>

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="Nome" name="name" value="{{$role->name}}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit me-1"></i> Editar
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="row">

                <div class="col-12">

                    <form action="{{ route('roles.permissions',$role->id) }}" method="POST">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>Funções</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Associar Permissões</span>
                            </div>

                            <div class="card-body">

                                <div class="col-12">

                                    <div class="row">

                                        @foreach ($permissions as $permission)

                                        <div class="col-sm-3 mb-3">

                                            <div class="form-check form-switch mb-3">
                                                <input type="checkbox" class="form-check-input" id="{{$permission->id}}"
                                                    name="permissions[]" value="{{$permission->id}}"
                                                    @checked($role->hasPermission($permission->name))
                                                    >
                                                <label class="form-check-label"  for="{{$permission->id}}" >{{$permission->name}}</label>
                                            </div>

                                        </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info me-1">
                                    <i class=" fas fa-sync-alt"></i> Associar
                                </button>
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary ms-1">
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
