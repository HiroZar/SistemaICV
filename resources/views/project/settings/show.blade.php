<x-app-layout>
    @livewire('components.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md mt-14">
            <nav class="flex " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('project.classroom.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-500">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3  text-gray-400 px-1 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('project.settings.show') }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Perfil</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex items-center justify-between my-4">
                <div class="flex items-center space-x-4">
                    <img src="{{ $teacher->user->profile_photo_url }}"
                        alt="{{ $teacher->nombres }} {{ $teacher->apellidos }}" class="w-16 h-16 rounded-full">
                    <div class="ml-2 py-2">
                        <h2 class="text-2xl font-bold">{{ $teacher->nombres }} {{ $teacher->apellidos }}</h2>
                        <p class="text-gray-700 font-bold">{{ $teacher->especialidad }}</p>
                    </div>
                </div>
                <a href="{{ route('profile.show') }}"
                    class="px-6 py-3 bg-gradient-to-r from-sky-400 to-sky-600 rounded-xl font-semibold text-white hover:from-sky-600 hover:to-sky-800 transition-all duration-300 shadow-lg">
                    Editar
                </a>
            </div>

            <div class="items-center space-x-4 p-4 my-4 border rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h2 class="text-lg font-bold ml-2 text-gray-500">Detalles de docente:</h2>
                        <div class="ml-2 py-2">
                            <label class="font-semibold text-sky-600">Nombre:</label>
                            <p class="text-gray-900 font-bold">{{ $teacher->nombres }} {{ $teacher->apellidos }}</p>
                        </div>
                        <div class="ml-2 py-2">
                            <label class="font-semibold text-sky-600">DNI:</label>
                            <p class="text-gray-900 font-bold">{{ $teacher->dni }}</p>
                        </div>
                        <div class="ml-2 py-2">
                            <label class="font-semibold text-sky-600">Email:</label>
                            <p class="text-gray-900 font-bold">{{ $teacher->user->email }}</p>
                        </div>
                        <div class="ml-2 py-2">
                            <label class="font-semibold text-sky-600">Fecha de Nacimiento:</label>
                            <p class="text-gray-900 font-bold">
                                {{ \Carbon\Carbon::parse($teacher->fecha_nacimiento)->format('d/m/Y') }}</p>
                        </div>
                        <div class="ml-2 py-2">
                            <label class="font-semibold text-sky-600">Dirección:</label>
                            <p class="text-gray-900 font-bold">{{ $teacher->direccion }}</p>
                        </div>
                        <div class="ml-2 py-2">
                            <label class="font-semibold text-sky-600">Teléfono:</label>
                            <p class="text-gray-900 font-bold">{{ $teacher->telefono }}</p>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-500">Cursos de docente:</h2>
                        @if (!empty($groupedSubjects['primaria']))
                            <h3 class="text-lg font-semibold text-gray-500 pt-4 dark:text-white">Primaria</h3>
                            <ol class="relative border-s border-gray-200 dark:border-gray-700">
                                @foreach ($groupedSubjects['primaria'] as $gradeId => $subjects)
                                    <li class="mb-1 ms-4">
                                        <div
                                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                        </div>
                                        <h3 class="text-lg font-semibold text-sky-600 dark:text-white">
                                            {{ $subjects[0]->grade->nombre }}</h3>
                                        @foreach ($subjects as $subject)
                                            <p class="text-base font-bold text-gray-900 dark:text-gray-400">
                                                {{ $subject->nombre }}</p>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                        @if (!empty($groupedSubjects['secundaria']))
                            <h3 class="text-lg font-semibold text-gray-500 pt-4 dark:text-white">Secundaria</h3>
                            <ol class="relative border-s border-gray-200 dark:border-gray-700">
                                @foreach ($groupedSubjects['secundaria'] as $gradeId => $subjects)
                                    <li class="mb-1 ms-4">
                                        <div
                                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                        </div>
                                        <h3 class="text-lg font-semibold text-sky-600 dark:text-white">
                                            {{ $subjects[0]->grade->nombre }}</h3>
                                        @foreach ($subjects as $subject)
                                            <p class="text-base font-bold text-gray-900 dark:text-gray-400">
                                                {{ $subject->nombre }}</p>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
