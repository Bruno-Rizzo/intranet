@extends('layouts.site.app')

@section('title')
    Intranet | Links
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row text-center">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" style="color: #0097A7">Links</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Links</li>
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
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/sispen.png') }}" height="45">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Cronos RJ - Difusão DIPEN</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="https://cronos.rj.depen.gov.br/login" target="_blank" class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/sipen.png') }}" height="45">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Sistema de Identificação Penitenciária - SIPEN
                                            Web</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="http://10.200.96.17:8080/sipen/acesso/index" target="_blank"
                                            class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/cadServidor.png') }}" height="45">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Sistema de Cadastro de Servidores -
                                            SEAP</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="http://10.200.96.177:8080/ServidorSipenWeb/acesso/index.html"
                                            target="_blank" class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/sinespjus.png') }}" height="45">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Sistema Nacional de Informações de Segurança Pública -
                                            SINESP</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="https://seguranca.sinesp.gov.br/sinesp-seguranca/login.jsf" target="_blank"
                                            class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/logo_rj.png') }}" height="45">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Portal de Segurança do Estado do Rio de Janeiro -
                                            Segurança RJ</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="https://10.200.96.20/portal/portal//" target="_blank"
                                            class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/logo_doerj.png') }}" height="45">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Imprensa Oficial do Estado do Rio de Janeiro -
                                            IOERJ</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="http://www.ioerj.com.br/portal/modules/conteudoonline/busca_do.php"
                                            target="_blank" class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/sei.png') }}" height="40">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Sistema Eletrônico de Informações - SEI</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="https://sei.fazenda.rj.gov.br/" target="_blank"
                                            class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:5%">
                                        <img src="{{ asset('assets/images/links/icone-email.png') }}" height="40">
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span style="font-size:16px">Webmail Administração Penitenciária</span>
                                    </td>
                                    <td class="text-end" style="vertical-align: middle">
                                        <a href="https://proderj.webmail.rj.gov.br/" target="_blank"
                                            class="btn btn-info btn-sm">
                                            <i class="far fa-hand-point-right me-1"></i> Acessar
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
