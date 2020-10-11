
@extends('layouts.app')

@section('content')

    @include('partials.navbar')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Mis tareas</h1>
            <p><a href="{{route('tareas.index')}}">Regresar</a></p>
            <section class="content">
                <h4>Actualizar Tarea</h4>
                @include('tareas._form')
            </section>
        </div>
    </main>
    @include('partials.footer')

@endsection
