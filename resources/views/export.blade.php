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
        @foreach($pagos as $pago)
            <tr>
                @if ($i)
                <td>{{ $i++ }}</td>
                @endif
                <td>{{ $pago->dni }}</td>
                <td>{{ $pago->nombres }}</td>
                <td>{{ $pago->apellidos }}</td>
                <td>{{ $pago->campus1 }}</td>
                <td>{{ $pago->campus2 }}</td>
                <td>{{ $pago->campus3 }}</td>
                <td>{{ $pago->campus4 }}</td>
                <td>{{ $pago->campus5 }}</td>
                <td>{{ $pago->campus6 }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
