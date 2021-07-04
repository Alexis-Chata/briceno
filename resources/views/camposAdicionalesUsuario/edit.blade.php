@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Categoria  Nuevo</h1>
    <form action="/camposAdicionales/{{$campos->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre de la categoria</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$campos->nombre}}">
            <input id="orden" name="orden" type="hidden" value="{{$campos->orden}}">
        </div>
        <a href="/camposAdicionales" class="btn btn-primary" tabindex="2">Cancelar</a>
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