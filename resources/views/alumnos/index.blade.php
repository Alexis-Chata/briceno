@extends('adminlte::page')

@section('title', 'Buscar')

@section('content_header')
    <div class="container">
        <h1 class="mt-5">Buscar Alumno</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('alumnos.create')}}">Nuevo Alumno</a></p>

            @if($errors->any())

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">* {{ $error}}</p>
                @endforeach

            @endif
            <form method="post" action="{{route('alumnos.index')}}" class="form-inline">
                @csrf
                <div class="form-group mb-2">
                  <label for="staticEmail2" class="sr-only">Alumno</label>
                  <input type="text" readonly class="form-control-plaintext" value="Dni del Alumno:">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Dni</label>
                  <input type="text" class="form-control" name="dni" placeholder="Ingrese el Dni" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
              </form>

              @if(!empty($alumnos))
                <div class="medio-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                    <div class="w-min-content px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <h2 class="mx-auto">Resultado...</h2>
                        @if (isset($alumnos[0]->nombres))
                        @foreach ($alumnos as $alumno)
                            <p><b>Nombre: </b>{{ $alumno->nombres ." ". $alumno->apellidos }}</p>
                            <p><b>Correo: </b>{{ $alumno->email }}</p>
                            <p><b>Campus: </b><a href="{{ $alumno->campus1 }}">{{ $alumno->campus1 }}</a></p>
                            @if ($alumno->campus2)
                                <p><b>Campus: </b><a href="{{ $alumno->campus2 }}">{{ $alumno->campus2 }}</a></p>
                            @endif

                            @if ($alumno->campus3)
                                <p><b>Campus: </b><a href="{{ $alumno->campus3 }}">{{ $alumno->campus3 }}</a></p>
                            @endif

                            <a class="btn btn-primary" href="{{ route('alumnos.edit', $alumno->id) }}">Editar</a>
                        @endforeach
                        @else
                <p>No encontrado</p>
                @endif
                    </div>
                </div>
            @endif

        </div>
    </main>

@endsection
