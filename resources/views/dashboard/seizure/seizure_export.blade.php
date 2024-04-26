<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apreensões</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Unidade Prisional</th>
                <th>Coordenação</th>
                <th>Data</th>
                <th>Tipo de Apreensão</th>
                <th>Unds / Gramas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seizures as $item)
                <tr>
                    <td>{{ $item->prisionalUnity->name }}</td>
                    <td>{{ $item->coordination->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                    <td>{{ $item->seizureType->name }}</td>
                    <td>{{ $item->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        header('Content-Type: application/xls');
        header('Content-Disposition: attachement; filename=apreensoes.xls');
    @endphp

</body>

</html>
