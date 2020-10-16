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
            <th>nro</th>
            <th>dni</th>
            <th>nombres</th>
            <th>apellidos</th>
            <th>link</th>
            <th>Codigo</th>
            <th>Contraseña</th>
            <th>Puntaje</th>
            <th>Puesto</th>
            <th>Grupo</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
        @foreach($alumnos as $alumno)
            <tr>
                @if ($i)
                <td>{{ $i++ }}</td>
                @endif
                <td>{{ $alumno->dni }}</td>
                <td>{{ $alumno->nombres }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->link }}</td>
                <td>{{ $alumno->codigo }}</td>
                <td>{{ $alumno->contrasena }}</td>
                <td>{{ $alumno->puntaje }}</td>
                <td>{{ $alumno->puesto }}</td>
                <td>{{ $alumno->grupo }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
