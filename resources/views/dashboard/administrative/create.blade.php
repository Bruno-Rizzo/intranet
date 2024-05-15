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
                            <span style="font-size: 14px">Cadastro de Servidor</span>
                        </div>

                        <form action="{{route('administrative.store')}}" method="post">
                            @csrf

                            <div class="card-body">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Nome</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">ID Funcional</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="identify" value="{{old('identify')}}">
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
                                                <option value="{{ $item->id }}" @selected(old('division_id') == $item->id)>
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
                                                <option value="{{ $item->id }}" @selected(old('position_id') == $item->id)>
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
                                        <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Complemento</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="complement" value="{{old('complement')}}">
                                        @error('complement')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Bairro</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="county" value="{{old('county')}}">
                                        @error('county')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Cidade</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Celular</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Email</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">CPF</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="cpf" value="{{old('cpf')}}">
                                        @error('cpf')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">RG</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="rg" value="{{old('rg')}}">
                                        @error('rg')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Dt.Nascimento</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="birth" value="{{old('birth')}}">
                                        @error('birth')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label text-end">Dt.Admissão</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="entry" value="{{old('entry')}}">
                                        @error('entry')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Estado Civil</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="matrial_id">
                                            <option value="">Selecione um item</option>
                                            @foreach ($matrials as $item)
                                                <option value="{{ $item->id }}" @selected(old('matrial_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('matrial_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Observações</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="4" name="observations"></textarea>
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
