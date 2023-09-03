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

                        <div class="card-header">
                            <span style="font-size: 18px"><b>Dashboard</b></span>
                            <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                            <span style="font-size: 14px">Sistema de Inteligência Penitenciária</span>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-truncate font-size-14 mb-2">Chamados</p>
                                                    <h4 class="mb-2">{{$total}}</h4>
                                                    <p class="text-muted mb-0">Total de chamados solicitados</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-primary rounded-3">
                                                        <i class="ri-volume-up-fill font-size-24"></i>  
                                                    </span>
                                                </div>
                                            </div>                                            
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-truncate font-size-14 mb-2">Abertos</p>
                                                    <h4 class="mb-2">{{$opened}}</h4>
                                                    <p class="text-muted mb-0">Aguardando atendimento</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-danger rounded-3">
                                                        <i class="ri-spam-2-fill font-size-24"></i>  
                                                    </span>
                                                </div>
                                            </div>                                              
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-truncate font-size-14 mb-2">Finalizados</p>
                                                    <h4 class="mb-2">{{$closed}}</h4>
                                                    <p class="text-muted mb-0">Atendimentos realizados</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-success rounded-3">
                                                        <i class=" ri-checkbox-circle-fill font-size-24"></i>  
                                                    </span>
                                                </div>
                                            </div>                                              
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
