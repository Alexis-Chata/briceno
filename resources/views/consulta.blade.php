<x-guest-layout>
    <div class="medio-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
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
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">Consultar</button>
                </div>

            </form>
        </div>
    </div>

    @if (!empty($alumnos))
        <div class="medio-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg text-center">
                <h2 class="mx-auto my-4"><b>Resultado...</b></h2>
                @if (isset($alumnos[0]->nombres))
                    @foreach ($alumnos as $alumno)
                        <p class="font-black">Nombre:</p>
                        <p>{{ $alumno->nombres . ' ' . $alumno->apellidos }}</p>
                        <p class="font-black">Correo:</p>
                        <p>{{ $alumno->email }}</p>
                        <p class="font-black">Campus:</p>
                        <a href="{{ $alumno->campus1 }}">{{ $alumno->campus1 }}</a></p>
                        @if ($alumno->campus2)
                            <p class="font-black">Campus:</p>
                            <a href="{{ $alumno->campus2 }}">{{ $alumno->campus2 }}</a></p>
                        @endif

                        @if ($alumno->campus3)
                            <p class="font-black">Campus:</p>
                            <a href="{{ $alumno->campus3 }}">{{ $alumno->campus3 }}</a></p>
                        @endif
                    @endforeach
                @else
                <p>No encontrado</p>
                @endif

            </div>
        </div>
    @endif
</x-guest-layout>
