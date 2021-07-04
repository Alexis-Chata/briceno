@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Campos Adicionales del Usuario</h1>
@stop

@section('content')
    <p>Bienvenidos Campos Adicionales del Usuario</p>
    <a href="camposAdicionales/crear" class="btn btn-primary">Crear una Nueva Categoria de Perfiles</a>
    <div class="categorieslist">
        @php
            $a = 0;
            foreach ($categorias as $b){
                $a = $a +1;
            }
        @endphp
        @foreach ($categorias as $categorias)
        <div data-category-id="{{$categorias->id}}" id="category-{{$categorias->id}}" class="mt-2">
            <div>
                <div class="col-6 categoryinstance">
                <h3>
                    {{$categorias->nombre}}
                    <a href="/camposAdicionales/{{ $categorias->id}}/editar" data-action="editcategory" data-id="{{ $categorias->id}}" data-name="{{$categorias->nombre}}">
                    <i class="icon fa fa-cog fa-fw " title="Editar" aria-label="Editar"></i></a>
                    @if($a != 1)
                    <a href="#" onclick="document.getElementById('formulario-{{$categorias->id}}').submit();">
                    <i class="icon fa fa-trash fa-fw " title="Borrar" aria-label="Borrar"></i></a>
                    @endif
                    @if($categorias->orden != 1)
                    <a href="/camposAdicionales/{{ $categorias->id}}/-/mover" data-action="editcategory" data-id="{{ $categorias->id}}" data-name="{{$categorias->nombre}}">
                        <i class="icon fa fa-arrow-up fa-fw" title="Mover hacia arriba" aria-label="Mover hacia arriba"></i></a>
                    @endif
                    @if($categorias->orden != $numerofilas)
                    <a href="/camposAdicionales/{{ $categorias->id}}/+/mover" data-action="editcategory" data-id="{{ $categorias->id}}" data-name="{{$categorias->nombre}}">
                    <i class="icon fa fa-arrow-down fa-fw " title="Mover hacia abajo" aria-label="Mover hacia abajo"></i></a>
                    @endif
                    <form action="{{route('camposAdicionales.destroy',$categorias->id)}}" method="POST" name="formulario-{{$categorias->id}}" id="formulario-{{$categorias->id}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </h3>
                </div>
                <div class="col-auto text-right">
                    <a href="camposAdicionales/{{$categorias->id}}/crearcampo" class="btn btn-primary">crear un nuevo campo de perfil</a>
                </div>
            </div>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="col-8">Campo de perfil</th>
                        <th scope="col" class="col-3 text-right">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias2 as $cap)
                    @if($categorias->id == $cap->alumno_info_category_id)
                    @php
                        $a = 0;
                        for ($i=0; $i <$numerofilas2 ; $i++){
                            if ($categorias->id == $categorias2[$i]->alumno_info_category_id) {
                                $a = $a +1;
                            }
                        }
                    @endphp
                    <tr>
                            <td class="col-8">
                                {{ $cap->name}}
                            </td>
                            <td class="col-3 text-right">
                                <a href="/camposAdicionales/{{$cap->id}}/edit2">
                                <i class="icon fa fa-cog fa-fw " title="Editar" aria-label="Editar"></i></a>
                                <a href="#" onclick="document.getElementById('formulario2-{{$cap->id}}').submit();">
                                <i class="icon fa fa-trash fa-fw " title="Borrar" aria-label="Borrar"></i></a>
                                @if($cap->orden != 1)
                                    <a href="/camposAdicionales/{{$cap->id}}/{{$cap->alumno_info_category_id}}/-/mover2" data-action="editcategory" data-id="{{$cap->id}}" data-name="{{$cap->nombre}}">
                                    <i class="icon fa fa-arrow-up fa-fw" title="Mover hacia arriba" aria-label="Mover hacia arriba"></i></a>
                                @endif
                                @if($cap->orden != $a)
                                    <a href="/camposAdicionales/{{$cap->id}}/{{$cap->alumno_info_category_id}}/+/mover2" data-action="editcategory" data-id="{{$cap->id}}" data-name="{{$cap->nombre}}">
                                    <i class="icon fa fa-arrow-down fa-fw " title="Mover hacia abajo" aria-label="Mover hacia abajo"></i></a>
                                @endif
                                <form action="/camposAdicionales/{{$cap->id}}/destroy2" method="POST" name="formulario2-{{$cap->id}}" id="formulario2-{{$cap->id}}">
                                @csrf
                                </form>
                            </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
        </table>
        </div>
    @endforeach
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
