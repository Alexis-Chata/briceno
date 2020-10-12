@if ($errors->any())

    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">* {{ $error }}</p>
    @endforeach

@endif

<form method="post" action="{{ $action }}" class="col-md-12 col-12">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputEmail4">Nombres</label>
            <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="{{ $alumno->nombres }}">
        </div>
        <div class="form-group col-md-5">
            <label for="inputPassword4">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos"
                value="{{ $alumno->apellidos }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">dni</label>
            <input type="text" name="dni" class="form-control" placeholder="Dni" value="{{ $alumno->dni }}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Correo</label>
            <input type="email" name="email" class="form-control" placeholder="correo" value="{{ $alumno->email }}">
        </div>
    </div>
    <div class="form-group col-md-10 p-0">
        <label for="inputCity">Url campus</label>
        <input type="text" name="campus1" class="form-control" value="{{ $alumno->campus1 }}">
    </div>
    <div class="form-group col-md-10 p-0">
        <label for="inputCity">Url campus</label>
        <input type="text" name="campus2" class="form-control" value="{{ $alumno->campus2 }}">
    </div>
    <div class="form-group col-md-10 p-0">
        <label for="inputCity">Url campus</label>
        <input type="text" name="campus3" class="form-control" value="{{ $alumno->campus3 }}">
    </div>
    @if (!empty($put))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
<br />
<br />
