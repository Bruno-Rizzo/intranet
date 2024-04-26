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
                            <span style="font-size: 14px">Cadastro de Apreensões</span>
                        </div>

                        <form action="{{ route('seizure.store') }}" method="post">
                            @csrf

                            <div class="card-body">

                                <table class="table" id="table">
                                    <tr>
                                        <td>Unidade Prisional</td>
                                        <td>Coordenação</td>
                                        <td>Data</td>
                                        <td>Tipo de Apreensão</td>
                                        <td>Unds / Gramas</td>
                                        <td class="text-center">Ação</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="prisional_unity_id[]" class="form-select">
                                                <option value="">Selecione uma unidade</option>
                                                @foreach ($prisionalUnities as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('prisional_unity_id.*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <select name="coordination_id[]" class="form-select">
                                                <option value="">Selecione uma coordenação</option>
                                                @foreach ($coordinations as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('coordination_id.*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input class="form-control" type="date" name="date[]">
                                            @error('date.*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <select name="seizure_type_id[]" class="form-select">
                                                <option value="">Selecione um tipo</option>
                                                @foreach ($seizureTypes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('seizure_type_id.*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="amount[]" placeholder="digite a quantidade"
                                                class="form-control">
                                            @error('amount.*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td class="text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success">
                                                <i class="ri-add-circle-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>

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

    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                `<tr>
                    <td>
                        <select name="prisional_unity_id[]"  class="form-select">
                            <option value="">Selecione uma unidade</option>
                            @foreach ($prisionalUnities as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                             @endforeach
                        </select>
                        @error('prisional_unity_id.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <select name="coordination_id[]"  class="form-select">
                            <option value="">Selecione uma coordenação</option>
                            @foreach ($coordinations as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('coordination_id.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <input class="form-control" type="date" name="date[]">
                        @error('date.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <select name="seizure_type_id[]"  class="form-select">
                            <option value="">Selecione um tipo</option>
                            @foreach ($seizureTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('seizure_type_id.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <input type="number" name="amount[]" placeholder="digite a quantidade" class="form-control">
                        @error('amount.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td class="text-center">
                        <button type="button" name="add" id="add" class="btn btn-danger remove-table-row">
                         <i class="ri-indeterminate-circle-line"></i>
                        </button>
                    </td>
                </tr>
                `);
        });

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection

@endsection
