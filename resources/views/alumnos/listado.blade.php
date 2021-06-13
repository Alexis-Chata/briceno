@extends('adminlte::page')

@section('title', 'Lista de ALumnos')

@section('content_header')
    <div class="container">
        <h1 class="mt-3" style="display: inline-block;">Lista de Alumno</h1>
        <div class="m-2 text-right float-right" style="display: inline-block;">
            <a href="{{ route('alumnos.export.excel') }}" class="btn btn-primary">Exportar</a>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

<main role="main" class="flex-shrink-0">
    <div class="container">
        <p><a href="{{ route('alumnos.create') }}">Nuevo Alumno</a></p>
    </div>
</main>
 <div class="card">
    <div class="card-body">
        <table id="usuarios" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Dni</th>
                    <th>Nombres y Apellidos</th>
                    <th>Link</th>
                    <th>Codigo</th>
                    <th>Contraseña</th>
                    <th>Puntaje</th>
                    <th>Puesto</th>
                    <th>Grupo</th>
                    <th>Url</th>
                    <th>Fecha vencimiento <br>(Y-M-D)</th>
                    <th>estado</th>
                    <th>Acciónes</th>
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
                        <td>{{ $alumno->dni }}</td>
                        <td>{{ $alumno->nombres." ".$alumno->apellidos }}</td>
                        <td><a href="{{ $alumno->link }}">{{ $alumno->link }}</a></td>
                        <td>{{ $alumno->codigo }}</td>
                        <td>{{ $alumno->contrasena }}</td>
                        <td>{{ $alumno->puntaje }}</td>
                        <td>{{ $alumno->puesto }}</td>
                        <td>{{ $alumno->grupo }}</td>
                        <td><a href="{{ $alumno->url }}">{{ $alumno->url }}</a></td>
                        <td>{{ $alumno->fechavencimientocuota }}</td>
                        <td>{{ $alumno->situacioncuota }}</td>
                        <td><form action="{{ route ('alumnos.destroy',$alumno->id)}}" method="POST">
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('js')
    <script>
        $(document).ready(function() {

            $('#usuarios').DataTable({
                responsive:true,
                autoWidth:false,
                "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado - lo sentimos",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registrados totales)",
                "search": "Buscar:",
                "paginate":{
                    "next": "Siguiente",
                    "previous": "Anterior"
                    }
                }
            });
        } );
    </script>
@endsection

@endsection
