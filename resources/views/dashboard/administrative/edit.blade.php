@extends('layouts.dashboard.app')

@section('title')
    SIP | Administrativo
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
                            <span style="font-size: 18px"><b>Administrativo</b></span>
                            <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                            <span style="font-size: 14px">Informações do Servidor</span>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#servidor" role="tab">
                                    <span class="d-none d-sm-block">Dados Servidor</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#movimentação" role="tab">
                                    <span class="d-none d-sm-block">Movimentações</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#acautelamento" role="tab">
                                    <span class="d-none d-sm-block">Acautelamentos</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <!-- Dados Servidor -->
                        <div class="tab-content p-3 text-muted">

                            <div class="tab-pane active" id="servidor" role="tabpanel">

                                <form action="{{ route('administrative.update', $administrative->id) }}" method="post">
                                    @csrf

                                    <div class="card-body">

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Nome</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $administrative->name }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">ID Funcional</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="identify"
                                                    value="{{ $administrative->identify }}">
                                                @error('identify')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Setor</label>
                                            <div class="col-sm-4">
                                                <select class="form-select" name="division_id">
                                                    <option value="">Selecione um setor</option>
                                                    @foreach ($divisions as $item)
                                                        <option value="{{ $item->id }}" @selected($administrative->division_id == $item->id)>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('division_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">Função</label>
                                            <div class="col-sm-4">
                                                <select class="form-select" name="position_id">
                                                    <option value="">Selecione uma função</option>
                                                    @foreach ($positions as $item)
                                                        <option value="{{ $item->id }}" @selected($administrative->position_id == $item->id)>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('position_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Endereço</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $administrative->address }}">
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">Complemento</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="complement"
                                                    value="{{ $administrative->complement }}">
                                                @error('complement')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Bairro</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="county"
                                                    value="{{ $administrative->county }}">
                                                @error('county')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">Cidade</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="city"
                                                    value="{{ $administrative->city }}">
                                                @error('city')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Celular</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $administrative->phone }}">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">Email</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ $administrative->email }}">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">CPF</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="cpf"
                                                    value="{{ $administrative->cpf }}">
                                                @error('cpf')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">RG</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="rg"
                                                    value="{{ $administrative->rg }}">
                                                @error('rg')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Dt.Nascimento</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="birth"
                                                    value="{{ $administrative->birth }}">
                                                @error('birth')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">Dt.Admissão</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="entry"
                                                    value="{{ $administrative->entry }}">
                                                @error('entry')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Status</label>
                                            <div class="col-sm-4">
                                                <div class="form-check form-switch mb-3">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="{{ $administrative->id }}" name="status"
                                                        @checked($administrative->status == 1)>
                                                    <label class="form-check-label"
                                                        for="{{ $administrative->id }}">Ativo</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 col-form-label text-end">Estado Civil</label>
                                            <div class="col-sm-4">
                                                <select class="form-select" name="matrial_id">
                                                    <option value="">Selecione um item</option>
                                                    @foreach ($matrials as $item)
                                                        <option value="{{ $item->id }}" @selected($administrative->matrial_id == $item->id)>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('division_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-1 col-form-label">Observações</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="4" name="observations">{{ $administrative->observations }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    @can('update', App\Models\Administrative::class)
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-info me-1">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>
                                        <a href="{{ route('administrative.index') }}"
                                            class="btn btn-sm btn-primary ms-1">
                                            <i class="fa fa-redo"></i> Voltar
                                        </a>
                                    </div>
                                    @endcan

                                </form>

                            </div>

                            <!-- Tab panes -->
                            <!-- Movimentações -->
                            <div class="tab-pane" id="movimentação" role="tabpanel">

                                <div class="card-body">

                                    @can('movement', App\Models\Administrative::class)
                                    <div class="mb-4">
                                        <a href="{{ route('administrative.movement_create', $administrative->id) }}"
                                            class="btn btn-sm btn-info">
                                            + Nova Movimentação
                                        </a>
                                    </div>
                                    @endcan

                                    <table class="table table-bordered dt-responsive nowrap tb-user"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Setor</th>
                                                <th>Função</th>
                                                <th class="text-center">Data</th>
                                                <th class="text-center">Movimentação</th>
                                                @can('delete', App\Models\Administrative::class)
                                                <th class="text-center">Ações</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movements as $item)
                                                <tr>
                                                    <td>{{ $item->division->name }}</td>
                                                    <td>{{ $item->position->name }}</td>
                                                    <td class="text-center">
                                                        {{ Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                                    <td class="text-center">
                                                        @if ($item->movement_id == 1)
                                                            <span
                                                                class="badge rounded-pill bg-success">{{ 'Ingresso' }}</span>
                                                        @elseif ($item->movement_id == 2)
                                                            <span
                                                                class="badge rounded-pill bg-danger">{{ 'Saída' }}</span>
                                                        @else
                                                        <span
                                                        class="badge rounded-pill bg-warning">{{ 'Função' }}</span>
                                                        @endif
                                                    </td>
                                                    @can('delete', App\Models\Administrative::class)
                                                    <td class="text-center">
                                                        <a href="{{ route('administrative.movement_confirm', $item->id) }}"
                                                            class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                    </table>

                                </div>

                            </div>


                            <!-- Tab panes -->
                            <!-- Acautelamentos -->
                            <div class="tab-pane" id="acautelamento" role="tabpanel">

                                <div class="card-body">

                                    @can('acaution', App\Models\Administrative::class)
                                    <div class="mb-4">
                                        <a href="{{ route('administrative.acaution_create', $administrative->id) }}"
                                            class="btn btn-sm btn-info">
                                            + Novo Item
                                        </a>
                                    </div>
                                    @endcan

                                    <table class="table table-bordered dt-responsive nowrap tb-user"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Espécie</th>
                                                <th class="text-center">Marca</th>
                                                <th class="text-center">Modelo</th>
                                                <th class="text-center">Calibre</th>
                                                <th class="text-center">Nº Cautela / CRAF</th>
                                                <th class="text-center">Nº Arma</th>
                                                @can('delete', App\Models\Administrative::class)
                                                <th class="text-center">Ações</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($acautions as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->type->name }}</td>
                                                    <td class="text-center">{{ $item->brand }}</td>
                                                    <td class="text-center">{{ $item->model }}</td>
                                                    <td class="text-center">{{ $item->brand }}</td>
                                                    <td class="text-center">{{ $item->acaution_number }}</td>
                                                    <td class="text-center">{{ $item->gun_number }}</td>
                                                    @can('delete', App\Models\Administrative::class)
                                                    <td class="text-center">
                                                        <a href="{{ route('administrative.acaution_confirm', $item->id) }}"
                                                            class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                    </table>

                                </div>

                            </div>

                        </div>

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
