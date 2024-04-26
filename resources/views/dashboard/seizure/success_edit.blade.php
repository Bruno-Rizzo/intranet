@extends('layouts.dashboard.app')

@section('title')
    SIP | Apreensões
@endsection

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <span style="font-size: 18px"><b>Apreensões</b></span>
                            <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                            <span style="font-size: 14px">Editar Êxito</span>
                        </div>

                        <form action="{{ route('success.update', $success->id) }}" method="post">
                            @method('PUT')
                            @csrf

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Data</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date"
                                            value="{{ $success->date }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Setor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="sector_id"
                                            value="{{ $success->sector->name }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Chefe / Superintendente</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="boss_name"
                                            value="{{ $success->boss_name }}" @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="boss_id"
                                            value="{{ $success->boss_id }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Coordenação de Área</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="coordination_id"
                                            value="{{ $success->coordination->name }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Coordenador</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="coordination_boss_name"
                                            value="{{ $success->coordination_boss_name }}" @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="coordination_boss_id"
                                            value="{{ $success->coordination_boss_id }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Unidade Prisional</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="prisional_unity_id"
                                            value="{{ $success->prisionalUnity->name }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Perfil</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="faction_id"
                                            value="{{ $success->faction->name }}" @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Regime</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="regime_id"
                                            value="{{ $success->regime->name }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Diretor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="director_name"
                                            value="{{ $success->director_name }}" @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="director_id"
                                            value="{{ $success->director_id }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Subdiretor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="subdirector_name"
                                            value="{{ $success->subdirector_name }}" @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="subdirector_id"
                                            value="{{ $success->subdirector_id }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Chefe de Segurança</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="security_boss_name"
                                            value={{ $success->security_boss_name }} @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="security_boss_id"
                                            value={{ $success->security_boss_id }} @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Chefe de Turma</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="team_boss_name"
                                            value="{{ $success->team_boss_name }}" @readonly(true)>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="team_boss_id"
                                            value="{{ $success->team_boss_id }}" @readonly(true)>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Número R.O.</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="ro_number"
                                            value="{{ $success->ro_number }}">
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Nº Lacre</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="seal_number"
                                            value="{{ $success->seal_number }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Dinâmica do Fato</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="4" name="dynamics_of_fact">{{ $success->dynamics_of_fact }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit me-1"></i> Editar
                                </button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection

@endsection
