
@extends('adminlte::page')

@section('title', 'Editar Alumno')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Editar Alumno</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('alumnos.index')}}">Regresar</a></p>
            <section class="content">
                @include('alumnos._form')
            </section>
        </div>
    </main>

@endsection
