<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados da Viatura</title>

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
            Subsecretaria de Inteligência da Polícia Penal<br> Rua Presidente Vargas, n 2555 - Edifício Presidente Business Center - 14º andar - Cidade Nova - Rio de Janeiro<br>
            e-mail: s1.ssispen@ppenal.rj.gov.br
        </p>

    </footer>


    <main>

        <h3>Dados do Viatura</h3>
        <hr>

        <table width="100%" style="margin-top:15px; font-size:15px">
            <tbody>

                <tr>
                    <td>Tipo de Viatura: </td>
                    <td>{{ $vehicle->vehicle_type}}</td>
                </tr>
                <tr>
                    <td>Marca: </td>
                    <td>{{ $vehicle->brand }}</td>
                </tr>
                <tr>
                    <td>Modelo: </td>
                    <td>{{ $vehicle->model }}</td>
                </tr>
                <tr>
                    <td>Kilometragem: </td>
                    <td>{{ $vehicle->kilometer }}</td>
                </tr>
                <tr>
                    <td>Tipo de Patrimônio: </td>
                    <td>{{ $vehicle->patrimony_type }}</td>
                </tr>
                <tr>
                    <td>Placa Original: </td>
                    <td>{{ $vehicle->original_plate }}</td>
                </tr>
                <tr>
                    <td>Placa Reservada: </td>
                    <td>{{ $vehicle->reserved_plate }}</td>
                </tr>
                <tr>
                    <td>Setro de Utilização: </td>
                    <td>{{ $vehicle->division->name }}</td>
                </tr>
                <tr>
                    <td width="35%">Nome do Condutor: </td>
                    <td>{{ $vehicle->name }}</td>
                </tr>
                <tr>
                    <td>ID do Condutor: </td>
                    <td>{{ $vehicle->identify }}</td>
                </tr>
                <tr>
                    <td>Nº Credencial do Condutor: </td>
                    <td>{{ $vehicle->credential_number }}</td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        @if ($vehicle->status == 1)
                            {{ 'Ativa' }}
                        @else
                            {{ 'Inativa' }}
                        @endif
                    </td>
                </tr>
                 <tr>
                    <td>Observações: </td>
                    <td>{{ $vehicle->observations }}</td>
                </tr>

            </tbody>
        </table>

    </main>

    <script type="text/php">
        if(isset($pdf)){
            $pdf->page_text(525,820,"Página {PAGE_NUM} de {PAGE_COUNT}",'arial',9,array(0,0,0));
        }
    </script>

</body>

</html>
