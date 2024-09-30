<x-app-layout>
    @livewire('components.sidebar')

    @if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                html: '<ul style="list-style: none; padding: 0;">' +
                        '@foreach ($errors->all() as $error)' +
                            '<li>{{ $error }}</li>' +
                        '@endforeach' +
                        '</ul>',
                confirmButtonText: 'OK',
                background: '#ffffff',
                color: '#0369a1',
                iconColor: '#e3342f',
                confirmButtonColor: '#0369a1',
            });
        });
    </script>
    @endif

    <div class="p-4 sm:ml-64">
        <div class="p-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md mt-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="font-bold text-sky-700 text-2xl uppercase p-2">Editar docente</h1>
                <a href="{{ route('project.teacher.index') }}" class="px-4 py-2 bg-sky-400 rounded-lg font-bold text-gray-100 hover:bg-sky-800 transition duration-300">
                    Volver
                </a>
            </div>

            <!-- Cambia la ruta para actualizar al docente -->
            <form action="{{ route('project.teacher.update', ['id' => $teacher->id]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') <!-- Especifica el método PUT para la actualización -->

                <div>
                    <label for="nombres" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nombres
                    </label>
                    <!-- Carga los datos existentes en los campos del formulario -->
                    <input type="text" name="nombres" id="nombres"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese los nombres del docente" value="{{ old('nombres', $teacher->nombres) }}" required>
                </div>

                <div>
                    <label for="apellidos" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Apellidos
                    </label>
                    <input type="text" name="apellidos" id="apellidos"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese los apellidos del docente" value="{{ old('apellidos', $teacher->apellidos) }}" required>
                </div>

                <div>
                    <label for="dni" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        DNI
                    </label>
                    <input type="text" name="dni" id="dni"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese el DNI del docente" value="{{ old('dni', $teacher->dni) }}" readonly required>
                </div>

                <div>
                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Fecha de Nacimiento
                    </label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        value="{{ old('fecha_nacimiento', $teacher->fecha_nacimiento) }}" required>
                </div>

                <div>
                    <label for="direccion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Dirección
                    </label>
                    <input type="text" name="direccion" id="direccion"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese la dirección del docente" value="{{ old('direccion', $teacher->direccion) }}" required>
                </div>

                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Teléfono
                    </label>
                    <input type="text" name="telefono" id="telefono"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese el teléfono del docente" value="{{ old('telefono', $teacher->telefono) }}" required>
                </div>

                <div>
                    <label for="especialidad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Especialidad
                    </label>
                    <input type="text" name="especialidad" id="especialidad"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese la especialidad del docente" value="{{ old('especialidad', $teacher->especialidad) }}" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                        Actualizar Docente
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
