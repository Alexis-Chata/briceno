@if ($errors->any())

    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">* {{ $error }}</p>
    @endforeach

@endif

<form method="post" action="{{ $action }}" class="col-md-12 col-12">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4">Nombres</label>
            <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="{{ $alumno->nombres }}">
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos"
                value="{{ $alumno->apellidos }}">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">dni</label>
            <input type="text" name="dni" class="form-control" placeholder="Dni" value="{{ $alumno->dni }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputCity">Link para la clase en vivo:</label>
            <input type="text" name="link" class="form-control" placeholder="Link" value="{{ $alumno->link }}">
        </div>
        <div class="form-group col-md-5">
            <label for="inputCity">Código:</label>
            <input type="text" name="codigo" class="form-control" placeholder="Codigo" value="{{ $alumno->codigo }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputCity">Contraseña:</label>
            <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="{{ $alumno->contrasena }}">
        </div>
        <div class="form-group col-md-5">
            <label for="inputCity">Puntaje en el examen:</label>
            <input type="text" name="puntaje" class="form-control" placeholder="Puntaje" value="{{ $alumno->puntaje }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputCity">Puesto en el ranking:</label>
            <input type="text" name="puesto" class="form-control" placeholder="Puesto" value="{{ $alumno->puesto }}">
        </div>
        <div class="form-group col-md-5">
            <label for="inputCity">Grupo que le corresponde:</label>
            <input type="text" name="grupo" class="form-control" placeholder="Grupo" value="{{ $alumno->grupo }}">
        </div>
    </div>
    @if (!empty($put))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
<br />
<br />
