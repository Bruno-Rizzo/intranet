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
                            <span style="font-size: 14px">Exportação de Estatísticas</span>
                        </div>

                        <div class="card-body">

                            @can('export', App\Models\Seizure::class)
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h6>Apreensões</h6>
                                </div>

                                <form action="{{ route('statistic.seizure') }}" method="post">
                                    @csrf

                                    <div class="card-body">

                                        <div class="row">
                                            <label class="col-form-label mr-3 mt-1">Data Inicial</label>
                                            <div class="col-2">
                                                <input type="date" name="date1" class="form-control" value="{{old('date1')}}">
                                                @error('date1')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <label class="col-form-label mr-3 mt-1">Data Final</label>
                                            <div class="col-2">
                                                <input type="date" name="date2" class="form-control" value="{{old('date2')}}">
                                                @error('date2')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <div>
                                            <button class="btn btn-success" type="submit" style="font-size: 13px">
                                                <i class="ri-file-excel-line"></i> Exportar Excel
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            @endcan

                            @can('export', App\Models\Success::class)
                            <div class="card">
                                <div class="card-header">
                                    <h6>Êxitos</h6>
                                </div>

                                <form action="{{ route('statistic.success') }}" method="post">
                                    @csrf

                                    <div class="card-body">


                                        <div class="row">
                                            <label class="col-form-label mr-3 mt-1">Data Inicial</label>
                                            <div class="col-2">
                                                <input type="date" name="date3" class="form-control" value="{{old('date3')}}">
                                                @error('date3')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <label class="col-form-label mr-3 mt-1">Data Final</label>
                                            <div class="col-2">
                                                <input type="date" name="date4" class="form-control" value="{{old('date4')}}">
                                                @error('date4')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>

                                    <div class="card-footer">
                                        <div>
                                            <button class="btn btn-primary" type="submit" style="font-size: 13px">
                                                <i class="ri-file-word-line"></i> Exportar Word
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            @endcan

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
