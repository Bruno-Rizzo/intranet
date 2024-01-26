@extends('layouts.site.app')

@section('title')
    Intranet | Autenticador
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row text-center">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" style="color: #0097A7">Autenticador</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">QrCode</li>
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
                                <span style="font-size: 18px"><b>QrCode</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Gerador de Código</span>
                            </div>

                            <div class="card-body">

                                {!!$qrcode!!}

                            </div>

                            <div class="card-footer">

                                <p>
                                    Copie o QrCode utilizando o comando Windos + Shift + S
                                </p>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
