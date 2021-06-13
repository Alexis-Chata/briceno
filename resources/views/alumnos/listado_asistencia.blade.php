@extends('adminlte::page')

@section('title', 'Lista de ALumnos')

@section('content_header')
    <div class="container">
        <h1 class="mt-3" style="display: inline-block;">Lista de Consulta del Alumno</h1>
        <div class="m-2 text-right float-right" style="display: inline-block;">
            <a href="{{ route('asistencias.export.excel') }}" class="btn btn-primary">Exportar</a>
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
        <table id="asistencias" class="table table-striped" style="width:100%;font-size: 15px;">
            <thead>
                <tr>
                    <th>Dia de Consulta</th>
                    <th>Dni</th>
                    <th>Nombres y Apellidos</th>
                    <th>Link</th>
                    {{-- <th>Codigo</th>
                    <th>Contraseña</th> --}}
                    <th>Puntaje</th>
                    <th>Puesto</th>
                    <th>Grupo</th>
                    {{-- <th>Url</th> --}}
                    <th>Fecha vencimiento <br>(Y-M-D)</th>
                    <th>estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->created_at }}</td>
                        <td>{{ $alumno->dni }}</td>
                        <td>{{ $alumno->nombres." ".$alumno->apellidos }}</td>
                        <td><a href="{{ $alumno->link }}">{{ $alumno->link }}</a></td>
                        {{-- <td>{{ $alumno->codigo }}</td>
                        <td>{{ $alumno->contrasena }}</td> --}}
                        <td>{{ $alumno->puntaje }}</td>
                        <td>{{ $alumno->puesto }}</td>
                        <td>{{ $alumno->grupo }}</td>
                        {{-- <td><a href="{{ $alumno->url }}">{{ $alumno->url }}</a></td> --}}
                        <td>{{ $alumno->fechavencimientocuota }}</td>
                        <td>{{ $alumno->situacioncuota }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
     @section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap5.min.js"></script> --}}
    <script>
        $(document).ready(function() {

            $('#asistencias').DataTable({
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
                },
                "order": [[0, 'desc']]
            });

        } );
    </script>
@endsection

@endsection
