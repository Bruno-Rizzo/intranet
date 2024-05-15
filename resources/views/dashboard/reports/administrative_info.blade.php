<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados do Servidor</title>

    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-left: 1cm;
            margin-right: 1cm;
            margin-top: 4.5cm;
            margin-bottom: 3.5cm;
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
            color: #505050;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4cm;

            background-color: #EEE;
            border-bottom: 1px solid grey;
            text-align: center;
            color: #505050;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            background-color: #EEE;
            border-top: 1px solid grey;
            text-align: center;
            color: #505050;
        }

        .logo_topo {
            margin-top: 15px;
        }

        tr:nth-child(even) {
            background-color: #DDD;
        }

        .table {
            border-collapse: collapse;
        }

        thead th {
            background-color: #366092;
            color: #EEE;
            font-weight: 400;
        }

        .table td {
            border: 1px solid grey;
            padding-left: 4px;
            padding-right: 4px;
        }

        .table th {
            border: 1px solid grey;
            font-size: 15px;
            padding-left: 4px;
        }
    </style>

</head>

<body>

    <header>

        <img class="logo_topo" src="{{ public_path('/assets/images/logo_pdf_pp.png') }}" alt="" srcset="">

        <p>
            Governo do Estado do Rio de Janeiro<br>
            Subsecretaria de Inteligência Penitenciária<br>
            Polícia Penal - RJ
        </p>

    </header>

    <footer>

        <p>
            Polícia Penal - Praça Cristiano Ottoni, s/n Edifício D.Pedro II - 4º andar - Centro - Rio de Janeiro<br>
            Email: s1.ssispen@seap.rj.gov
        </p>

    </footer>


    <main>

        <h3>Dados do Servidor</h3>
        <hr>

        <table width="100%" style="margin-top:15px; font-size:15px">
            <tbody>

                <tr>
                    <td>Nome: </td>
                    <td>{{ $administrative->name }}</td>
                </tr>
                <tr>
                    <td>ID Funcional: </td>
                    <td>{{ $administrative->identify }}</td>
                </tr>
                <tr>
                    <td>Setor: </td>
                    <td>{{ $administrative->division->name }}</td>
                </tr>
                <tr>
                    <td>Função: </td>
                    <td>{{ $administrative->position->name }}</td>
                </tr>
                <tr>
                    <td>Endereço: </td>
                    <td>{{ $administrative->address }}</td>
                </tr>
                <tr>
                    <td>Complemento: </td>
                    <td>{{ $administrative->complement }}</td>
                </tr>
                <tr>
                    <td>Bairro: </td>
                    <td>{{ $administrative->county }}</td>
                </tr>
                <tr>
                    <td>Cidade: </td>
                    <td>{{ $administrative->city }}</td>
                </tr>
                <tr>
                    <td>Celular: </td>
                    <td>{{ $administrative->phone }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $administrative->email }}</td>
                </tr>
                <tr>
                    <td>CPF: </td>
                    <td>{{ $administrative->cpf }}</td>
                </tr>
                <tr>
                    <td>RG: </td>
                    <td>{{ $administrative->rg }}</td>
                </tr>
                <tr>
                    <td>Data de Nascimento: </td>
                    <td>{{ Carbon\Carbon::parse($administrative->birth)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Data de Adminssão: </td>
                    <td>{{ Carbon\Carbon::parse($administrative->entry)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        @if ($administrative->status == 1)
                            {{ 'Ativo' }}
                        @else
                            {{ 'Inativo' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Estado Civil: </td>
                    <td>{{ $administrative->matrial->name }}</td>
                </tr>
                <tr>
                    <td>Observações: </td>
                    <td>{{ $administrative->observations }}</td>
                </tr>

            </tbody>
        </table>


        <h3 style="margin-top:20px">Movimentações</h3>
        <hr>

        <table class="table table-bordered dt-responsive nowrap tb-user"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;margin-top:15px">
            <thead>
                <tr>
                    <th>Setor</th>
                    <th>Função</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Movimentação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adm_movements as $item)
                    <tr>
                        <td>{{ $item->division->name }}</td>
                        <td>{{ $item->position->name }}</td>
                        <td class="text-center">
                            {{ Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            @if ($item->movement_id == 1)
                                <span class="badge rounded-pill bg-success">{{ 'Ingresso' }}</span>
                            @elseif ($item->movement_id == 1)
                                <span class="badge rounded-pill bg-danger">{{ 'Saída' }}</span>
                            @else
                                <span class="badge rounded-pill bg-warning">{{ 'Função' }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </table>

        <h3 style="margin-top:20px">Acautelamentos</h3>
        <hr>

        <table class="table table-bordered dt-responsive nowrap tb-user"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;margin-top:15px">
            <thead>
                <tr>
                    <th class="text-center">Espécie</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Calibre</th>
                    <th class="text-center">Nº Cautela / CRAF</th>
                    <th class="text-center">Nº Arma</th>
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
                    </tr>
                @endforeach
        </table>


    </main>

    <script type="text/php">
        if(isset($pdf)){
            $pdf->page_text(525,820,"Página {PAGE_NUM} de {PAGE_COUNT}",'arial',9,array(0,0,0));
        }
    </script>

</body>

</html>
