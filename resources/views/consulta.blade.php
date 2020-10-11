<x-guest-layout>
    <div class="medio-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <x-jet-authentication-card-logo />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif


            <form method="POST">
                @csrf
                <div>
                    <label class="block font-medium text-sm text-gray-700">Ingrese su Dni</label>
                    <input class="form-input rounded-md shadow-sm block mt-1 w-full" type="text" name="dni"
                        placeholder="Dni" required="required" autofocus="autofocus">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">Iniciar
                        Sesion</button>
                </div>

            </form>
        </div>
    </div>

    @if (!empty($alumnos))
        <div class="medio-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-min-content px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h2 class="mx-auto">Resultado...</h2>
                @foreach ($alumnos as $alumno)
                    <p>Nombre: {{ $alumno->nombres . ' ' . $alumno->apellidos }}</p>
                    <p>Correo: {{ $alumno->email }}</p>
                    <p>Campus: <a href="{{ $alumno->campus1 }}">{{ $alumno->campus1 }}</a></p>
                    @if ($alumno->campus2)
                        <p>Campus: <a href="{{ $alumno->campus2 }}">{{ $alumno->campus2 }}</a></p>
                    @endif

                    @if ($alumno->campus3)
                        <p>Campus: <a href="{{ $alumno->campus3 }}">{{ $alumno->campus3 }}</a></p>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</x-guest-layout>
