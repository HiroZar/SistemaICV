<x-app-layout>
    @livewire('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md mt-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="font-bold text-sky-700 text-2xl uppercase p-2">Registrar nuevo curso</h1>
                <a href="{{ route('project.subject.index') }}" class="px-4 py-2 bg-sky-400 rounded-lg font-bold text-gray-100 hover:bg-sky-800 transition duration-300">
                    Volver
                </a>
            </div>
            <form action="{{ route('project.subject.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nombre del curso
                    </label>
                    <input type="text" name="nombre" id="nombre"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese el nombre del curso" value="{{ old('nombre') }}" required>
                </div>
                <div>
                    <label for="nivel" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nivel / Grado
                    </label>
                    <select name="nivel" id="nivel"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                        <option value="" selected>Seleccione el nivel del grado</option>
                        @foreach($grades as $grade)
                        <option value="{{ $grade->id }}">Nivel:
                            @switch($grade->nivel )
                                @case(1)
                                    PRIMARIO
                                    @break
                                @case(2)
                                    SECUNDARIO
                                    @break
                                @default
                                    Sin nivel
                            @endswitch
                            - {{ $grade->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                        Registrar Curso
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
