@extends('layouts.dashboard.app')

@section('title')
    SIP | Helpdesk
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    

                    <form action="{{route('helpdesk.update', $call->id)}}" method="post">
                        @method('PUT')
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
                                    <div class="col-sm-6 mt-2">
                                        {{$call->name}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Whatsapp</label>
                                    <div class="col-sm-6 mt-2">
                                        {{$call->whatsapp}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Divisão</label>
                                    <div class="col-sm-6 mt-2">
                                        {{$call->division->name}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Problema</label>
                                    <div class="col-sm-6 mt-2">
                                        {{$call->trouble->name}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Descrição</label>
                                    <div class="col-sm-4 mt-2">
                                        {{$call->description}}
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-check me-1"></i> Finalizar Chamado
                                </button>
                                <a href="{{ route('helpdesk.index') }}" class="btn btn-sm btn-primary">
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