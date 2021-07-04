@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Campo Nuevo</h1>
    <form action="/camposAdicionales/store2" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre Corto</label>
            <input id="shortname" name="shortname" type="text" class="form-control" tabindex="9" value="{{old('shortname')}}">
            @error('shortname')
            <small>*{{$message}}</small>
        @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre Largo</label>
            <input id="name" name="name" type="text" class="form-control" tabindex="9" value="{{old('name')}}">
        </div>
        @error('name')
                <small>*{{$message}}</small>
            @enderror
        <div class="form-floating mb-3">
            <label for="floatingTextarea">Descripción Largo</label>
            <textarea class="form-control" placeholder="escriba aqui" name='descripcion' id="descripcion" >{{old('descripcion')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">¿Es este campo necesario?</label>
            <select class="form-select form-control" name='required' id="required">
            <option value="0">No</option>
            <option value="1">Si</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">¿Está este campo bloqueado?</label>
            <select class="form-select form-control" name='locked' id="locked">
            <option value="0">No</option>
            <option value="1">Si</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">¿Deberían ser únicos los datos?</label>
            <select class="form-select form-control" name='forceunique' id="forceunique">
            <option value="0">No</option>
            <option value="1">Si</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">¿Mostrar en la página para inscribirse?</label>
            <select class="form-select form-control" name='signup' id="signup">
            <option value="1">No</option>
            <option value="2">Si</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">¿Quién puede ver este campo?</label>
            <select class="form-select form-control" name='visible' id="visible">
            <option value="0">No Visible</option>
            <option value="1">Visible por el Usuario</option>
            <option value="2">Visible por el Usuario, teachers and admins</option>
            <option value="3">Todos pueden verlo</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">Categorias</label>
            <select class="form-select form-control" name='alumno_info_category_id' id="alumno_info_category_id">
                @foreach ($categorias as $categorias)
                @if ($scategoria->id == $categorias->id)
                <option value="{{$categorias->id}}" selected >{{$categorias->nombre}}</option>
                @else
                <option value="{{$categorias->id}}">{{$categorias->nombre}}</option>
                @endif
                @endforeach
          </select>
        </div>
        <h2>Ajustes Especificas</h2><hr>
        <div class="mb-3">
            <label for="" class="form-label">Valor por Defecto</label>
            <input id="defaultdata" name="defaultdata" type="text" class="form-control" tabindex="9" value="{{old('defaultdata')}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mostrar tamaño</label>
            <input id="mtamaño" name="mtamaño" type="text" class="form-control" tabindex="9" value="{{old('mtamaño')}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Longitud máxima</label>
            <input id="ltexto" name="ltexto" type="text" class="form-control" tabindex="9" value="{{old('ltexto')}}">
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">¿Es éste un campo de contraseña?</label>
            <select class="form-select form-control" name='password' id="password">
            <option value="0">No</option>
            <option value="1">Si</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Enlace</label>
            <input id="tenlace" name="enlace" type="text" class="form-control" tabindex="9" value="{{old('enlace')}}">
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">Enlazar objetivo</label>
            <select class="form-select form-control" name='tenlace' id="tenlace">
            <option value="_blank">Ninguno</option>
            <option value="_blank">Nueva Ventana</option>
            <option value="_blank">El mismo Macro</option>
            <option value="_blank">La misma Ventana</option>
          </select>
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
