@extends('adminlte::page')

@section('title', 'Importar Alumno')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Importar Alumno</h1>
    </div>
@stop

@section('content')

    <form action="{{ route('alumnos.import.excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (Session::has('message'))
        <div class="form-group p-3 m-0">
            <p>{{ Session::get('message') }}</p>
            <p>{{ Session::get('horror') }}</p>
        </div>
        @endif
        <a class="p-3 m-0" target="_blank" href="https://docs.google.com/spreadsheets/d/1mGPNLLT2_DpFAlmJgkNzKVNQ_t3VrCKDz9EXgsDNRQ4/edit?usp=sharing">Plantilla de Importación</a>
        <div class="form-group p-3 m-0">
            <input type="file" name="file" required class="form-control-file">
        </div>
        <div class="p-3">
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
        </div>
    </form>

@endsection
