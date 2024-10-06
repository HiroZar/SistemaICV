<div id="page-assign-teacher" class="fixed inset-0 items-center flex justify-center z-50 bg-black bg-opacity-50 hidden" onclick="hideOnClick(event)">
    <div class="bg-white p-6 rounded-lg shadow-lg z-10">
        <h1 class="font-bold text-sky-700 text-2xl uppercase p-2">Asignar docente</h1>
        <p>ID de la asignatura: {{$subject_id}}</p> <!-- Muestra el ID de la asignatura -->

        <form wire:submit.prevent="assignTeacher" class="space-y-6 mb-6">
            <select wire:model.live="teacher_id" id="teacher_id"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                required>
                <option value="" disabled selected>Seleccione el Profesor</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">
                        {{ $teacher->apellidos }} {{ $teacher->nombres }}
                    </option>
                @endforeach
            </select>
            <button type="submit"
                class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                Asignar Docente
            </button>
        </form>

        @if (session()->has('success'))
            <div class="mt-2 text-green-600">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
