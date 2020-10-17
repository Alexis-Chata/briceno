@extends('adminlte::page')

@section('title', 'Lista de ALumnos')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Lista de Alumno</h1>
    </div>
@stop

@section('content')
<div class="border overflow-auto" style="height: 75vh;">
    <table class="table m-0 table-bordered table-hover table-head-fixed border-top-0">
        <thead>
            <tr>
                <th class="border-top-0 align-middle text-center">Nro</th>
                <th class="border-top-0 align-middle text-center" style="background: #fff; position: sticky; left: -1px; z-index: 11;">Dni</th>
                <th class="border-top-0 align-middle text-center" style="background: #fff; position: sticky; left: 87px; z-index: 11;">Nombres y Apellidos</th>
                <th class="border-top-0 align-middle text-center">Link</th>
                <th class="border-top-0 align-middle text-center">Codigo</th>
                <th class="border-top-0 align-middle text-center">Contraseña</th>
                <th class="border-top-0 align-middle text-center">Puntaje</th>
                <th class="border-top-0 align-middle text-center">Puesto</th>
                <th class="border-top-0 align-middle text-center">Grupo</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($alumnos as $alumno)
                <tr>
                    @if ($i)
                        <td>{{ $i++ }}</td>
                    @endif
                    <td style="background: #f4f6f9; position: sticky; left: -1px;">{{ $alumno->dni }}</td>
                    <td style="background: #f4f6f9; position: sticky; left: 87px;">{{ $alumno->nombres." ".$alumno->apellidos }}</td>
                    <td><a href="{{ $alumno->link }}">{{ $alumno->link }}</a></td>
                    <td>{{ $alumno->codigo }}</td>
                    <td>{{ $alumno->contrasena }}</td>
                    <td>{{ $alumno->puntaje }}</td>
                    <td>{{ $alumno->puesto }}</td>
                    <td>{{ $alumno->grupo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
