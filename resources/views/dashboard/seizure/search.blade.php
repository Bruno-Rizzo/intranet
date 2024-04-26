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
                            <span style="font-size: 14px">Pesquisa de Apreensões</span>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('search.result') }}" method="post">
                                @csrf

                                <div class="d-flex">

                                    <div class="col-5 me-4">
                                        <select name="prisional_unity_id" class="form-select">
                                            <option value="">Selecione uma unidade</option>
                                            @foreach ($prisionalUnities as $item)
                                                <option value="{{ $item->id }}" @selected(old('prisional_unity_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('prisional_unity_id')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-2 me-3">
                                        <input class="form-control" type="date" name="date" value="{{old('date')}}">
                                        @error('date')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-success">
                                            <i class="ri-search-line"></i>
                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                    @if (Route::is('search.result'))
                        <div class="card">
                            <div class="card-header">
                                <h6>Apreensões</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="table">
                                    <tr>
                                        <td>Unidade Prisional</td>
                                        <td>Coordenação</td>
                                        <td>Data</td>
                                        <td>Tipo de Apreensão</td>
                                        <td>Unds / Gramas</td>
                                    </tr>
                                    @foreach ($seizures as $item)
                                        <tr>

                                            <td>{{ $item->prisionalUnity->name }}</td>
                                            <td>{{ $item->coordination->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}
                                            </td>
                                            <td>{{ $item->seizureType->name }}</td>
                                            <td>{{ $item->amount }}</td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h6>Êxitos</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="table">
                                    <tr>
                                        <td>Unidade Prisional</td>
                                        <td>Coordenação</td>
                                        <td>Data</td>
                                        <td>Editar</td>
                                    </tr>
                                    @foreach ($successes as $item)
                                        <tr>

                                            <td>{{ $item->prisionalUnity->name }}</td>
                                            <td>{{ $item->coordination->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('success.edit', $item->id) }}">
                                                    <svg class="svg-icon" width="25" height="25"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path
                                                            d="M15.5 5C13.567 5 12 6.567 12 8.5C12 10.433 13.567 12 15.5 12C17.433 12 19 10.433 19 8.5C19 6.567 17.433 5 15.5 5ZM10 8.5C10 5.46243 12.4624 3 15.5 3C18.5376 3 21 5.46243 21 8.5C21 9.6575 20.6424 10.7315 20.0317 11.6175L22.7071 14.2929L21.2929 15.7071L18.6175 13.0317C17.7315 13.6424 16.6575 14 15.5 14C12.4624 14 10 11.5376 10 8.5ZM3 4H8V6H3V4ZM3 11H8V13H3V11ZM21 18V20H3V18H21Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    @endif

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
