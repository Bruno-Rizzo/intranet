@extends('layouts.site.app')

@section('title')
    Intranet | Autenticador
@endsection

@section('content')
    <div class="page-content">

        <div class="container-fluid">

            <div class="row text-center">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" style="color: #0097A7">Autenticador</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">QrCode</li>
                            </ol>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-12">

                    <form action="{{route('qrcode.store')}}" method="post">
                        @csrf

                        <div class="card">

                            <div class="card-header">
                                <span style="font-size: 18px"><b>QrCode</b></span>
                                    <i class=" ri-git-commit-line" style="vertical-align: middle"></i>
                                <span style="font-size: 14px">Gerador de Código</span>
                            </div>

                            <div class="card-body">

                               <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Origem</label>
                                    <div class="col-sm-6">
                                        <select class="form-select" name="origin">
                                            <option value="">Selecione uma origem...</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" @selected(old('origin') == $division->id)>
                                                    {{ $division->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('origin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Descrição</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" placeholder="Digite uma breve descrição do relatório..." name="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-qrcode me-1"></i> Gerar QrCode
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
