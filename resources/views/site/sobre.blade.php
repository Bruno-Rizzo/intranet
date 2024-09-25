@extends('layouts.site.app')

@section('title')
    Intranet | Sobre
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row text-center">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" style="color: #0097A7">Sobre</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sobre</li>
                            </ol>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            <div class="media text-muted mt-3">
                                <p class="pb-3 border-bottom border-gray">
                                    <strong class="d-block" style="font-size: 14px">MISSÃO</strong>
                                    <span style="font-size: 13px">
                                        Planejar, dirigir e executar as atividades de inteligência no âmbito da SEAP para
                                        produção de
                                        conhecimentos necessários à decisão, planejamento e xecução da política
                                        penitenciária.
                                    </span>
                                </p>
                            </div>

                            <div class="media text-muted mt-3">
                                <p class="pb-3 border-bottom border-gray">
                                    <strong class="d-block" style="font-size: 14px">VISÃO</strong>
                                    <span style="font-size: 13px">
                                        Obter o reconhecimento dos usuários pela excelência na produção de conhecimentos,
                                        com qualidade
                                        no atendimento das demandas.
                                    </span>
                                </p>
                            </div>

                            <div class="media text-muted mt-3">
                                <p class="pb-3 border-bottom border-gray">
                                    <strong class="d-block" style="font-size: 14px">VALORES</strong>
                                    Éticos e morais, estando compromissada com a vida, a verdade, a justiça, a honra, a
                                    integridade
                                    de caráter, a família, a solidariedade, o patriotismo, a democracia, a legislação e o
                                    respeito
                                    aos direitos humanos.Nunca poderá ser esquecido que a sociedade e as instituições
                                    deverão estar
                                    sempre acima do homem.E todos aqueles que trabalham nesta atividade de inteligência
                                    devem estar
                                    bem cientes e conscientes dessa assertiva.
                                </p>
                            </div>

                            <div class="media text-muted mt-3">
                                <p class="pb-3 border-bottom border-gray">
                                    <strong class="d-block" style="font-size: 14px">PRINCÍPIOS</strong>
                                    Precisão, imparcialidade, objetividade, simplicidade, oportunidade, interação,
                                    permanência,
                                    controle, compartimentação e sigilo.
                                </p>
                            </div>

                            <div class="media text-muted mt-3">
                                <p class="pb-3 border-bottom border-gray">
                                    <strong class="d-block" style="font-size: 14px">POLÍTICA DA SSISPEN</strong>
                                    Desenvolver continuamente as melhores práticas de gestão de produção de conhecimento,
                                    para que
                                    se cumpra sua missão e se alcance a visão estaber.
                                </p>
                            </div>

                            <div class="d-flex" style="align-items: center">
                                <div>
                                    <img src="{{ asset('assets/images/links/sispen.png') }}" width="80" height="80"
                                        class="img-circle float-left mt-4 mr-2">
                                </div>

                                <div class="mt-4 ms-3">
                                    <h5>Luiz Felipe de Oliveira Nogueira</h5>
                                    Subsecretário de Inteligência
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
