<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Dia de Consulta</th>
            <th>Dni</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>link</th>
            <th>Puntaje</th>
            <th>Puesto</th>
            <th>Grupo</th>
            <th>Fecha vencimiento de cuota</th>
            <th>Situacion de cuota</th>
        </tr>
        </thead>
        <tbody>
        @foreach($asistencias as $asistencia)
            <tr>
                <td>{{ $asistencia->created_at}}</td>
                <td>{{ $asistencia->dni }}</td>
                <td>{{ $asistencia->nombres }}</td>
                <td>{{ $asistencia->apellidos }}</td>
                <td>{{ $asistencia->link }}</td>
                <td>{{ $asistencia->puntaje }}</td>
                <td>{{ $asistencia->puesto }}</td>
                <td>{{ $asistencia->grupo }}</td>
                <td>{{ $asistencia->fechavencimientocuota }}</td>
                <td>{{ $asistencia->situacioncuota }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
