<x-app-layout>
    @livewire('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md mt-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="font-bold text-sky-700 text-2xl uppercase p-2">Editar curso</h1>
                <a href="{{ route('project.subject.index') }}" class="px-4 py-2 bg-sky-400 rounded-lg font-bold text-gray-100 hover:bg-sky-800 transition duration-300">
                    Volver
                </a>
            </div>
            <form action="{{ route('project.subject.update', $subject->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')  <!-- Asegúrate de incluir este método para indicar que se trata de una actualización -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nombre del curso
                    </label>
                    <input type="text" name="nombre" id="nombre"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese el nombre del curso" value="{{ old('nombre', $subject->nombre) }}" required>
                </div>
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Descripción
                    </label>
                    <textarea name="descripcion" id="descripcion" rows="4"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ingrese una breve descripción del curso">{{ old('descripcion', $subject->descripcion) }}</textarea>
                </div>
                <div>
                    <label for="nivel" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nivel
                    </label>
                    <select name="nivel" id="nivel"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                        <option value="" disabled>Seleccione el nivel del curso</option>
                        <option value="1" {{ old('nivel', $subject->nivel) == '1' ? 'selected' : '' }}>Primer grado</option>
                        <option value="2" {{ old('nivel', $subject->nivel) == '2' ? 'selected' : '' }}>Segundo grado</option>
                        <option value="3" {{ old('nivel', $subject->nivel) == '3' ? 'selected' : '' }}>Tercer grado</option>
                        <option value="4" {{ old('nivel', $subject->nivel) == '4' ? 'selected' : '' }}>Cuarto grado</option>
                        <option value="5" {{ old('nivel', $subject->nivel) == '5' ? 'selected' : '' }}>Quinto grado</option>
                        <option value="6" {{ old('nivel', $subject->nivel) == '6' ? 'selected' : '' }}>Sexto grado</option>
                        <option value="7" {{ old('nivel', $subject->nivel) == '7' ? 'selected' : '' }}>Primer Año</option>
                        <option value="8" {{ old('nivel', $subject->nivel) == '8' ? 'selected' : '' }}>Segundo Año</option>
                        <option value="9" {{ old('nivel', $subject->nivel) == '9' ? 'selected' : '' }}>Tercer Año</option>
                        <option value="10" {{ old('nivel', $subject->nivel) == '10' ? 'selected' : '' }}>Cuarto Año</option>
                        <option value="11" {{ old('nivel', $subject->nivel) == '11' ? 'selected' : '' }}>Quinto Año</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                        Actualizar Curso
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
