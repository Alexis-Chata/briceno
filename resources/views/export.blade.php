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
            <th>email</th>
            <th>campus1</th>
            <th>campus2</th>
            <th>campus3</th>
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
                <td>{{ $pago->email }}</td>
                <td>{{ $pago->campus1 }}</td>
                <td>{{ $pago->campus2 }}</td>
                <td>{{ $pago->campus3 }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
