@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Categoria Nuevo</h1>
    <form action="/camposAdicionales" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre del Campo</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="9">
            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
        <a href="/camposAdicionales" class="btn btn-primary" tabindex="6">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
    </form>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop