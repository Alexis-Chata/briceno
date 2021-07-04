@extends('adminlte::page')

@section('title', 'Eliminar Alumnos')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Eliminar Alumnos</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{ route('alumnos.index') }}">Regresar</a></p>
            <section class="content">
                <form method="post" action="{{ route('alumnos.truncate') }}" class="col-md-12 col-12">
                    @csrf


                    <div class="form-row">
                        <div class="form-group col-md-7">
                            @if ($msj)
                                <p class="alert alert-danger">{{ $msj }}</p>
                            @endif
                            <p>Elimina a los estudiantes de forma permanente.</p>
                            <p>Una vez eliminado, todos los datos se borran de forma permanente.
                                Antes de eliminar, guarde los datos o la información que desee conservar.</p>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </section>
        </div>
    </main>

@endsection
