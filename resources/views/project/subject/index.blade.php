<x-app-layout>
    @livewire('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4  bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md  mt-14">
            <div class="flex items-center justify-between mb-4 px-2">
                <h1 class="font-bold text-sky-700 text-2xl uppercase">Lista de Cursos</h1>
                <a href="{{ route('project.subject.create') }}" class="px-4 py-2 bg-sky-400 rounded-lg font-bold text-gray-100 hover:bg-sky-800 transition duration-300">
                    Nuevo
                </a>
            </div>
            <table class="w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nº</th>
                        <th scope="col" class="px-6 py-3">Nombre del Curso</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>
                        <th scope="col" class="px-6 py-3">Nivel</th>
                        <th scope="col" class="px-6 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($subjects as $subject)
                    <tr class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-200">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            @if ($subject->nombre)
                                {{ $subject->nombre }}
                            @else
                                nada
                            @endif
                        </td>
                            @if ($subject->descripcion)
                            <td class="px-6 py-4">
                            {{ $subject->descripcion}}
                        </td>
                        @else
                        <td class="px-6 py-4 text-gray-400">
                            Ninguna.
                        </td>
                        @endif
                        <td class="px-6 py-4">
                            @switch($subject->nivel)
                                @case(1)
                                <span class="text-green-500">
                                    Primer grado
                                </span>

                                    @break
                                @case(2)
                                <span class="text-green-500">
                                    Segundo grado
                                </span>
                                    @break
                                @case(3)
                                <span class="text-green-500">
                                    Tercer grado
                                </span>
                                    @break
                                @case(4)
                                <span class="text-green-500">
                                    Cuarto grado
                                </span>
                                    @break
                                @case(5)
                                <span class="text-green-500">
                                    Quinto grado
                                </span>
                                    @break
                                @case(6)
                                <span class="text-green-500">
                                    Sexto grado
                                </span>
                                    @break
                                @case(7)
                                <span class="text-blue-500">
                                    Primer Año
                                </span>
                                    @break
                                @case(8)
                                <span class="text-blue-500">
                                    Segundo Año
                                </span>
                                    @break
                                @case(9)
                                <span class="text-blue-500">
                                    Tercer Año
                                </span>
                                    @break
                                @case(10)
                                <span class="text-blue-500">
                                    Cuarto Año
                                </span>
                                    @break
                                @case(11)
                                <span class="text-blue-500">
                                    Quinto Año
                                </span>
                                    @break
                                @default
                                    Sin nivel
                            @endswitch
                        </td>
                        <td class="px-6 py-4">
                                <button id="opcionesBoton{{ $loop->iteration }}" data-dropdown-toggle="opcion{{ $loop->iteration }}" data-dropdown-trigger="hover"
                                    class="text-center inline-flex items-center text-sky-600 hover:text-gray-900" type="button">
                                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                      </svg>
                                </button>
                                <div id="opcion{{$loop->iteration}}" class="z-10 hidden border bg-gray-100 divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-sky-600 dark:text-gray-200" aria-labelledby="opcionesBoton{{ $loop->iteration }}">
                                        <li class="hover:text-gray-100">
                                            <a href="#" class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ml-2">Ver</span> <!-- Agregar un span para un mejor control de espacio -->
                                            </a>
                                        </li>
                                        <li class="hover:text-gray-100">
                                            <a href="{{ route('project.subject.edit', $subject->id) }}" class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                                <span class="ml-2">Editar</span> <!-- Agregar un span para un mejor control de espacio -->
                                            </a>
                                        </li>
                                        <li class="hover:text-gray-100">
                                            <form id="delete-form-{{ $subject->id }}" action="{{ route('project.subject.destroy', $subject->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700" onclick="confirmDelete({{ $subject->id }})">
                                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                    <span class="ml-2">Borrar</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                timer: 3000,
                timerProgressBar: true,
                background: '#ffffff',
                color: '#0369a1',
                iconColor: '#10b981',
                confirmButtonColor: '#0369a1',
            });
        });
    </script>
    @endif
    <script>
        function confirmDelete(subjectId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                color: '#0369a1',
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, borrar",
                confirmButtonColor: '#0369a1',
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + subjectId).submit();
                }
            });
        }
    </script>
</x-app-layout>
