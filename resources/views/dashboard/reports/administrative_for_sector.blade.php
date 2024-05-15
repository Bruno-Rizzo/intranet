<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Servidores por Setor</title>

    <style>

        @page{
            margin: 0cm 0cm;
        }

        body{
            margin-left: 1cm;
            margin-right: 1cm;
            margin-top:4.5cm;
            margin-bottom:3.5cm;
            font-size: 12px;
            font-family:Arial, Helvetica, sans-serif;color:#505050;
        }

        header{
            position:fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4cm;

            background-color: #EEE;
            border-bottom: 1px solid grey;
            text-align: center;
            color: #505050;
        }

        footer{
            position:fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            background-color: #EEE;
            border-top: 1px solid grey;
            text-align: center;
            color: #505050;
        }

        .logo_topo{
            margin-top: 15px;
        }

        tr:nth-child(even){
            background-color: #DDD;
        }

        .table{
            border-collapse: collapse;
        }

        thead th{
            background-color: #366092;
            color: #EEE;
            font-weight: 400;
        }

        .table td{
            border:1px solid grey;
            padding-left: 4px;
            padding-right: 4px;
        }
        .table th{
            border:1px solid grey;
            font-size: 15px;
            padding-left: 4px;
        }

    </style>

</head>

<body>

    <header>

        <img class="logo_topo" src="{{public_path('/assets/images/logo_pdf_pp.png')}}" alt="" srcset="">

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

    <h3>Lista de Servidores por Setores</h3>
    <hr>

    <table width="100%" class="table" style="margin-top: 15px">
        <thead>
          <tr>
            <th style="text-align: left">Nome</th>
            <th style="text-align: left">ID Funcional</th>
            <th style="text-align: left">Função</th>
            <th style="text-align: left">Setor</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($administratives as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->identify}}</td>
                <td>{{$item->position->name}}</td>
                <td>{{$item->division->name}}</td>
            </tr>
          @endforeach
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
