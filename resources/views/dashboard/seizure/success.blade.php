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
                            <span style="font-size: 14px">Cadastro de Êxitos</span>
                        </div>

                        <form action="{{route('success.store')}}" method="post">
                            @csrf

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Data</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" value="{{old('date')}}">
                                        @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Setor</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="sector_id">
                                            <option value="">Selecione um setor</option>
                                            @foreach ($sectors as $item)
                                                <option value="{{ $item->id }}" @selected(old('sector_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sector_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Chefe / Superintendente</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="boss_name" value="{{old('boss_name')}}">
                                        @error('boss_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="boss_id" value="{{old('boss_id')}}">
                                        @error('boss_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Coordenação de Área</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="coordination_id">
                                            <option value="">Selecione uma Coordenação</option>
                                            @foreach ($coordinations as $item)
                                                <option value={{ $item->id }} @selected(old('coordination_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('coordination_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Coordenador</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="coordination_boss_name" value="{{old('coordination_boss_name')}}">
                                        @error('coordination_boss_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="coordination_boss_id" value="{{old('coordination_boss_id')}}">
                                        @error('coordination_boss_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Unidade Prisional</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="prisional_unity_id">
                                            <option value="">Selecione uma up</option>
                                            @foreach ($prisionalUnities as $item)
                                                <option value="{{ $item->id }}" @selected(old('prisional_unity_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('prisional_unity_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Perfil</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="faction_id">
                                            <option value="">Selecione um perfil</option>
                                            @foreach ($factions as $item)
                                                <option value="{{ $item->id }}" @selected(old('faction_id') ==$item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('faction_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-1 col-form-label text-end">Regime</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="regime_id">
                                            <option value="">Selecione um regime</option>
                                            @foreach ($regimes as $item)
                                                <option value="{{ $item->id }}" @selected(old('regime_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('regime_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Diretor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="director_name" value="{{old('director_name')}}">
                                        @error('director_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="director_id" value="{{old('director_id')}}">
                                        @error('director_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Subdiretor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="subdirector_name" value="{{old('subdirector_name')}}">
                                        @error('subdirector_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="subdirector_id" value="{{old('subdirector_id')}}">
                                        @error('subdirector_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Chefe de Segurança</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="security_boss_name" value="{{old('security_boss_name')}}">
                                        @error('security_boss_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="security_boss_id" value="{{old('security_boss_id')}}">
                                        @error('security_boss_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Chefe de Turma</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="team_boss_name" value="{{old('team_boss_name')}}">
                                        @error('team_boss_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="team_boss_id" value="{{old('team_boss_id')}}">
                                        @error('team_boss_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Número R.O.</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="ro_number">
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Nº Lacre</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="seal_number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Dinâmica do Fato</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="4" name="dynamics_of_fact"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fa fa-save me-1"></i> Cadastrar
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
