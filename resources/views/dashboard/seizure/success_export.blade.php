<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>êxitos</title>
</head>
<body>

    <h2>Êxitos</h2>

@foreach ($successes as $item)
<p>Data: <i>{{\Carbon\Carbon::parse($item->date)->format('d/m/Y')}}</i></p>
<p>Setor: <i>{{$item->sector->name}}</i></p>
<p><span style="margin-right: 10px">Chefe / Superintendente: <i>{{$item->boss_name}}</i></span> ID: <i>{{$item->boss_id}}</i></p>
<p>Coordenação de Área: <i> {{$item->coordination->name}}</i></p>
<p><span style="margin-right: 10px">Coordenador: <i>{{$item->coordination_boss_name}}</i></span> ID: <i>{{$item->coordination_boss_id}}</i></p>
<p>Unidade Prisional: <i> {{$item->prisionalUnity->name}}</i></p>
<p>Perfil: <i> {{$item->faction->name}}</i></p>
<p>Regime: <i> {{$item->regime->name}}</i></p>
<p><span style="margin-right: 10px">Diretor: <i>{{$item->director_name}}</i></span> ID: <i>{{$item->director_id}}</i></p>
<p><span style="margin-right: 10px">Subdiretor: <i>{{$item->subdirector_name}}</i></span> ID: <i>{{$item->subdirector_id}}</i></p>
<p><span style="margin-right: 10px">Chefe de Segurança: <i>{{$item->security_boss_name}}</i></span> ID: <i>{{$item->security_boss_id}}</i></p>
<p><span style="margin-right: 10px">Chefe de Turma: <i>{{$item->team_boss_name}}</i></span> ID: <i>{{$item->team_boss_id}}</i></p>
<p>Número do R.O.: <i> {{$item->ro_number}}</p>
<p>Número do Lacre: <i> {{$item->seal_number}}</p>
<p>Dinâmica do Fato: <i> {{$item->dynamics_of_fact}}</i></p>
<hr>
@endforeach

@php
    header('Content-Type: application/doc');
    header('Content-Disposition: attachement; filename=exitos.doc');
@endphp

</body>
</html>
