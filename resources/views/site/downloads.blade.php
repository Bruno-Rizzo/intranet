@extends('layouts.site.app')

@section('title')
    Intranet | Downloads
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row text-center">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" style="color: #0097A7">Downloads</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Downloads</li>
                            </ol>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            <table class="table table-lg table-hover">

                                <tr>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Logotipo SSISPEN</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="{{route('download.file')}}" 
                                            class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Clique para Baixar
                                        </a>
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection