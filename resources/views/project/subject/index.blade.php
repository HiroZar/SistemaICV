<x-app-layout>
    @livewire('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4  bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md  mt-14">
            <div id="accordion-open" data-accordion="open">
                <h2 id="accordion-open-heading-1">
                    <div class="flex items-center justify-between w-full px-5 pt-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-sky-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-sky-50 dark:hover:bg-gray-800 shadow-md transition-all duration-300 gap-3"
                        data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                        aria-controls="accordion-open-body-1">
                        <h1
                            class="font-serif text-sky-700 text-3xl uppercase tracking-wide mb-6 mt-3 shadow-sm ">
                            CURSOS REGISTRADOS:
                        </h1>
                        <a href="{{ route('project.subject.create') }}"
                            class="px-6 py-3 bg-gradient-to-r from-sky-400 to-sky-600 rounded-xl font-semibold text-white hover:from-sky-600 hover:to-sky-800 transition-all duration-300 shadow-lg">
                            Nuevo
                        </a>
                    </div>
                </h2>
                <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                </div>
                <h2 id="accordion-open-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-sky-500 border border-b-0 focus:ring-sky-200 dark:focus:ring-sky-800 dark:border-sky-700 dark:text-sky-400 hover:bg-sky-100 dark:hover:bg-sky-800 gap-3"
                        data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                        aria-controls="accordion-open-body-2">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                            PRIMARIA</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                    <div class=" border-x border-gray-200 dark:border-gray-700">
                        <ul class="pt-2 px-2 flex flex-wrap -mb-px text-sm font-medium text-center "
                            id="default-styled-tab" data-tabs-toggle="#contenedor-secundaria"
                            data-tabs-active-classes="text-sky-600 hover:text-sky-600 dark:text-sky-500 dark:hover:text-sky-500 border-sky-600 dark:border-sky-500 bg-sky-100"
                            data-tabs-inactive-classes="border-none bg-gray-200 dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                            role="tablist">
                            @foreach ($grades as $grade)
                                @if ($grade->id <= 6)
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 bg-none"
                                            id="{{ $grade->id }}-styled-tab"
                                            data-tabs-target="#styled-{{ $grade->id }}" type="button" role="tab"
                                            aria-controls="{{ $grade->id }}"
                                            aria-selected="false">{{ $grade->nombre }}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div id="contenedor-primaria" class=" border-gray-400">
                        @foreach ($grades as $grade)
                            @if ($grade->id <= 6)
                                <div class="hidden p-4 rounded-b-lg shadow-lg bg-gray-50   dark:bg-gray-800"
                                    id="styled-{{ $grade->id }}" role="tabpanel"
                                    aria-labelledby="{{ $grade->id }}-tab">
                                    <h1
                                        class="font-serif text-sky-700 text-3xl uppercase tracking-wide mb-6 mt-3 leading-tight shadow-sm border-b-2 border-sky-500">
                                        CURSOS {{ $grade->nombre }}
                                    </h1>

                                    <table
                                        class="w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm overflow-hidden">
                                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">Nombre</th>
                                                <th scope="col" class="px-6 py-3">Docente</th>
                                                <th scope="col" class="px-6 py-3">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                @if ($subject->grade->id == $grade->id)
                                                    <tr
                                                        class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-200">
                                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                            {{ $subject->nombre }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @if ($subject->teacher)
                                                                <div id="modal{{ $subject->id }}{{ $subject->teacher }}"
                                                                    tabindex="-1" aria-hidden="true"
                                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div
                                                                        class="relative p-4 w-full max-w-2xl max-h-full">
                                                                        <div
                                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                            <div
                                                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                                <h3
                                                                                    class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                                    Cambiar docente de:
                                                                                    {{ $subject->nombre }} /
                                                                                    {{ $subject->grade->nombre }}
                                                                                </h3>
                                                                                <button type="button"
                                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                    data-modal-hide="modal{{ $subject->id }}{{ $subject->teacher }}">
                                                                                    <svg class="w-3 h-3"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none"
                                                                                        viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                    </svg>
                                                                                    <span class="sr-only">Close
                                                                                        modal</span>
                                                                                </button>
                                                                            </div>
                                                                            <form
                                                                                action="{{ route('project.teacher.assingteacher', $subject->id) }}"
                                                                                method="POST" class="space-y-2">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="px-4 space-y-4">
                                                                                    <div>
                                                                                        <select name="teacher_id"
                                                                                            id="teacher_id"
                                                                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                            required>
                                                                                            <option value=""
                                                                                                selected disabled>
                                                                                                Seleccione al docente
                                                                                            </option>
                                                                                            @foreach ($teachers as $teacher)
                                                                                                <option
                                                                                                    value="{{ $teacher->id }}"
                                                                                                    {{ $teacher->id == $subject->teacher->id ? 'selected' : '' }}>
                                                                                                    {{ $teacher->apellidos }}
                                                                                                    {{ $teacher->nombres }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                                    <button type="submit"
                                                                                        class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                                                                        Actualizar Docente
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex">
                                                                    <button
                                                                        id="opcionesteacher{{ $subject->id }}-{{ $subject->teacher->id }}"
                                                                        data-dropdown-toggle="oteacher{{ $subject->id }}-{{ $subject->teacher->id }}"
                                                                        data-dropdown-trigger="hover"
                                                                        class="text-center inline-flex items-center text-sky-600 hover:text-gray-900"
                                                                        type="button">
                                                                        <svg class="w-6 h-6" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="2" d="m19 9-7 7-7-7" />
                                                                        </svg>
                                                                    </button>
                                                                    {{ $subject->teacher->apellidos }}
                                                                    {{ $subject->teacher->nombres }}
                                                                </div>
                                                                <div id="oteacher{{ $subject->id }}-{{ $subject->teacher->id }}"
                                                                    class="z-10 hidden border bg-gray-100 divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
                                                                    <ul class="py-2 text-sm text-sky-600 dark:text-gray-200"
                                                                        aria-labelledby="opcionesteacher{{ $subject->id }}-{{ $subject->teacher->id }}">
                                                                        <li class="hover:text-gray-100">
                                                                            <a href="{{ route('project.teacher.show', $subject->teacher->id) }}"
                                                                                class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                                <svg class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>

                                                                                <span class="ml-2">Ver Docente</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="hover:text-gray-100">
                                                                            <button
                                                                                data-modal-target="modal{{ $subject->id }}{{ $subject->teacher }}"
                                                                                data-modal-toggle="modal{{ $subject->id }}{{ $subject->teacher }}"
                                                                                class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700"
                                                                                type="button">
                                                                                <svg class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="none"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4" />
                                                                                </svg>
                                                                                <span class="ml-2">Cambiar
                                                                                    Docente</span>
                                                                            </button>

                                                                        </li>
                                                                        <li class="hover:text-gray-100">
                                                                            <form
                                                                                action="{{ route('project.teacher.removeteacher', $subject->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit"
                                                                                    class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                                    <svg class="w-6 h-6"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        fill="none"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M16 12h4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                                    </svg>
                                                                                    <span class="ml-2">Retirar
                                                                                        Docente</span>
                                                                                </button>
                                                                            </form>

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @else
                                                                <div class="text-center">
                                                                    <div class="text-center">
                                                                        <button
                                                                            data-modal-target="modal{{ $subject->id }}"
                                                                            data-modal-toggle="modal{{ $subject->id }}"
                                                                            class="flex items-center text-sky-600 w-full px-4 py-2 transition duration-75 group hover:text-sky-800  dark:text-white dark:hover:bg-gray-700"
                                                                            type="button">
                                                                            <svg class="w-6 h-6 " aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            <span class="ml-2 underline">Asignar
                                                                                Docente</span>
                                                                        </button>
                                                                        <div id="modal{{ $subject->id }}"
                                                                            tabindex="-1" aria-hidden="true"
                                                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                            <div
                                                                                class="relative p-4 w-full max-w-2xl max-h-full">
                                                                                <div
                                                                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                                    <div
                                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                                        <h3
                                                                                            class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                                            Asignar docente a:
                                                                                            {{ $subject->nombre }} /
                                                                                            {{ $subject->grade->nombre }}
                                                                                        </h3>
                                                                                        <button type="button"
                                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                            data-modal-hide="modal{{ $subject->id }}">
                                                                                            <svg class="w-3 h-3"
                                                                                                aria-hidden="true"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                fill="none"
                                                                                                viewBox="0 0 14 14">
                                                                                                <path
                                                                                                    stroke="currentColor"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                            </svg>
                                                                                            <span class="sr-only">Close
                                                                                                modal</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form
                                                                                        action="{{ route('project.teacher.assingteacher', $subject->id) }}"
                                                                                        method="POST"
                                                                                        class="space-y-2">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="px-4 space-y-4">
                                                                                            <div>
                                                                                                <select
                                                                                                    name="teacher_id"
                                                                                                    id="teacher_id"
                                                                                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value=""
                                                                                                        selected
                                                                                                        disabled>
                                                                                                        Seleccione el
                                                                                                        Profesor
                                                                                                    </option>
                                                                                                    @foreach ($teachers as $teacher)
                                                                                                        <option
                                                                                                            value="{{ $teacher->id }}">
                                                                                                            {{ $teacher->apellidos }}
                                                                                                            {{ $teacher->nombres }}

                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                                            <button type="submit"
                                                                                                class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                                                                                Actualizar Curso
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button id="opcionesBoton{{ $loop->iteration }}"
                                                                data-dropdown-toggle="opcion{{ $loop->iteration }}"
                                                                data-dropdown-trigger="hover"
                                                                class="text-center inline-flex items-center text-sky-600 hover:text-gray-900"
                                                                type="button">
                                                                <svg class="w-6 h-6 " aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-width="2"
                                                                        d="M12 6h.01M12 12h.01M12 18h.01" />
                                                                </svg>
                                                            </button>
                                                            <div id="opcion{{ $loop->iteration }}"
                                                                class="z-10 hidden border bg-gray-100 divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
                                                                <ul class="py-2 text-sm text-sky-600 dark:text-gray-200"
                                                                    aria-labelledby="opcionesBoton{{ $loop->iteration }}">
                                                                    <li class="hover:text-gray-100">
                                                                        <a href="#"
                                                                            class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                            <svg class="w-6 h-6 " aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            <span class="ml-2">Ver</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="hover:text-gray-100">
                                                                        <a href="{{ route('project.subject.edit', $subject->id) }}"
                                                                            class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                            <svg class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                fill="none" viewBox="0 0 24 24">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                                            </svg>
                                                                            <span class="ml-2">Editar</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="hover:text-gray-100">
                                                                        <form id="delete-form-{{ $subject->id }}"
                                                                            action="{{ route('project.subject.destroy', $subject->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button"
                                                                                class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700"
                                                                                onclick="confirmDelete({{ $subject->id }})">
                                                                                <svg class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="none"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                                                </svg>
                                                                                <span class="ml-2">Borrar</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <h2 id="accordion-open-heading-3">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-sky-500 border border-b-0 focus:ring-sky-200 dark:focus:ring-sky-800 dark:border-sky-700 dark:text-sky-400 hover:bg-sky-100 dark:hover:bg-sky-800 gap-3"
                        data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                        aria-controls="accordion-open-body-3">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>SECUNDARIA</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                    <div class=" border-x border-gray-200 dark:border-gray-700">
                        <ul class="p-2 flex flex-wrap -mb-px text-sm font-medium text-center " id="default-styled-tab"
                            data-tabs-toggle="#contenedor-secundaria"
                            data-tabs-active-classes="text-sky-600 hover:text-sky-600 dark:text-sky-500 dark:hover:text-sky-500 border-sky-600 dark:border-sky-500 bg-sky-100"
                            data-tabs-inactive-classes="border-transparent bg-gray-200 dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                            role="tablist">
                            @foreach ($grades as $grade)
                                @if ($grade->id >= 7)
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 bg-none"
                                            id="{{ $grade->id }}-styled-tab"
                                            data-tabs-target="#styled-{{ $grade->id }}" type="button"
                                            role="tab" aria-controls="{{ $grade->id }}"
                                            aria-selected="false">{{ $grade->nombre }}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div id="contenedor-secundaria">
                        @foreach ($grades as $grade)
                            @if ($grade->id >= 7)
                                <div class="hidden p-4 rounded-b-lg shadow-lg bg-gray-50 dark:bg-gray-800"
                                    id="styled-{{ $grade->id }}" role="tabpanel"
                                    aria-labelledby="{{ $grade->id }}-tab">
                                    <h1
                                        class="font-serif text-sky-700 text-3xl uppercase tracking-wide mb-6 mt-3 leading-tight shadow-sm border-b-2 border-sky-500">
                                        CURSOS {{ $grade->nombre }}
                                    </h1>

                                    <table
                                        class="w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm overflow-hidden">
                                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">Nombre</th>
                                                <th scope="col" class="px-6 py-3">Docente</th>
                                                <th scope="col" class="px-6 py-3">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                @if ($subject->grade->id == $grade->id)
                                                    <tr
                                                        class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-200">
                                                        <td
                                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                            {{ $subject->nombre }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @if ($subject->teacher)
                                                                <div id="modal{{ $subject->id }}{{ $subject->teacher }}"
                                                                    tabindex="-1" aria-hidden="true"
                                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div
                                                                        class="relative p-4 w-full max-w-2xl max-h-full">
                                                                        <div
                                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                            <div
                                                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                                <h3
                                                                                    class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                                    Cambiar docente de:
                                                                                    {{ $subject->nombre }} /
                                                                                    {{ $subject->grade->nombre }}
                                                                                </h3>
                                                                                <button type="button"
                                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                    data-modal-hide="modal{{ $subject->id }}{{ $subject->teacher }}">
                                                                                    <svg class="w-3 h-3"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none"
                                                                                        viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                    </svg>
                                                                                    <span class="sr-only">Close
                                                                                        modal</span>
                                                                                </button>
                                                                            </div>
                                                                            <form
                                                                                action="{{ route('project.teacher.assingteacher', $subject->id) }}"
                                                                                method="POST" class="space-y-2">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="px-4 space-y-4">
                                                                                    <div>
                                                                                        <select name="teacher_id"
                                                                                            id="teacher_id"
                                                                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                            required>
                                                                                            <option value=""
                                                                                                selected disabled>
                                                                                                Seleccione al docente
                                                                                            </option>
                                                                                            @foreach ($teachers as $teacher)
                                                                                                <option
                                                                                                    value="{{ $teacher->id }}"
                                                                                                    {{ $teacher->id == $subject->teacher->id ? 'selected' : '' }}>
                                                                                                    {{ $teacher->apellidos }}
                                                                                                    {{ $teacher->nombres }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                                    <button type="submit"
                                                                                        class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                                                                        Actualizar Docente
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex">
                                                                    <button
                                                                        id="opcionesteacher{{ $subject->id }}-{{ $subject->teacher->id }}"
                                                                        data-dropdown-toggle="oteacher{{ $subject->id }}-{{ $subject->teacher->id }}"
                                                                        data-dropdown-trigger="hover"
                                                                        class="text-center inline-flex items-center text-sky-600 hover:text-gray-900"
                                                                        type="button">
                                                                        <svg class="w-6 h-6" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="2" d="m19 9-7 7-7-7" />
                                                                        </svg>
                                                                    </button>
                                                                    {{ $subject->teacher->apellidos }}
                                                                    {{ $subject->teacher->nombres }}
                                                                </div>
                                                                <div id="oteacher{{ $subject->id }}-{{ $subject->teacher->id }}"
                                                                    class="z-10 hidden border bg-gray-100 divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
                                                                    <ul class="py-2 text-sm text-sky-600 dark:text-gray-200"
                                                                        aria-labelledby="opcionesteacher{{ $subject->id }}-{{ $subject->teacher->id }}">
                                                                        <li class="hover:text-gray-100">
                                                                            <a href="{{ route('project.teacher.show', $subject->teacher->id) }}"
                                                                                class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                                <svg class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>

                                                                                <span class="ml-2">Ver Docente</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="hover:text-gray-100">
                                                                            <button
                                                                                data-modal-target="modal{{ $subject->id }}{{ $subject->teacher }}"
                                                                                data-modal-toggle="modal{{ $subject->id }}{{ $subject->teacher }}"
                                                                                class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700"
                                                                                type="button">
                                                                                <svg class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="none"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4" />
                                                                                </svg>
                                                                                <span class="ml-2">Cambiar
                                                                                    Docente</span>
                                                                            </button>

                                                                        </li>
                                                                        <li class="hover:text-gray-100">
                                                                            <form
                                                                                action="{{ route('project.teacher.removeteacher', $subject->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit"
                                                                                    class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                                    <svg class="w-6 h-6"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        fill="none"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M16 12h4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                                    </svg>
                                                                                    <span class="ml-2">Retirar
                                                                                        Docente</span>
                                                                                </button>
                                                                            </form>

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @else
                                                                <div class="text-center">
                                                                    <div class="text-center">
                                                                        <button
                                                                            data-modal-target="modal{{ $subject->id }}"
                                                                            data-modal-toggle="modal{{ $subject->id }}"
                                                                            class="flex items-center text-sky-600 w-full px-4 py-2 transition duration-75 group hover:text-sky-800  dark:text-white dark:hover:bg-gray-700"
                                                                            type="button">
                                                                            <svg class="w-6 h-6 " aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            <span class="ml-2 underline">Asignar
                                                                                Docente</span>
                                                                        </button>
                                                                        <div id="modal{{ $subject->id }}"
                                                                            tabindex="-1" aria-hidden="true"
                                                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                            <div
                                                                                class="relative p-4 w-full max-w-2xl max-h-full">
                                                                                <div
                                                                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                                    <div
                                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                                        <h3
                                                                                            class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                                            Asignar docente a:
                                                                                            {{ $subject->nombre }} /
                                                                                            {{ $subject->grade->nombre }}
                                                                                        </h3>
                                                                                        <button type="button"
                                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                            data-modal-hide="modal{{ $subject->id }}">
                                                                                            <svg class="w-3 h-3"
                                                                                                aria-hidden="true"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                fill="none"
                                                                                                viewBox="0 0 14 14">
                                                                                                <path
                                                                                                    stroke="currentColor"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-width="2"
                                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                            </svg>
                                                                                            <span class="sr-only">Close
                                                                                                modal</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form
                                                                                        action="{{ route('project.teacher.assingteacher', $subject->id) }}"
                                                                                        method="POST"
                                                                                        class="space-y-2">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="px-4 space-y-4">
                                                                                            <div>
                                                                                                <select
                                                                                                    name="teacher_id"
                                                                                                    id="teacher_id"
                                                                                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value=""
                                                                                                        selected
                                                                                                        disabled>
                                                                                                        Seleccione el
                                                                                                        Profesor
                                                                                                    </option>
                                                                                                    @foreach ($teachers as $teacher)
                                                                                                        <option
                                                                                                            value="{{ $teacher->id }}">
                                                                                                            {{ $teacher->apellidos }}
                                                                                                            {{ $teacher->nombres }}

                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                                            <button type="submit"
                                                                                                class="px-4 py-2 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-700 focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                                                                                Actualizar Curso
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button id="opcionesBoton{{ $loop->iteration }}"
                                                                data-dropdown-toggle="opcion{{ $loop->iteration }}"
                                                                data-dropdown-trigger="hover"
                                                                class="text-center inline-flex items-center text-sky-600 hover:text-gray-900"
                                                                type="button">
                                                                <svg class="w-6 h-6 " aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-width="2"
                                                                        d="M12 6h.01M12 12h.01M12 18h.01" />
                                                                </svg>
                                                            </button>
                                                            <div id="opcion{{ $loop->iteration }}"
                                                                class="z-10 hidden border bg-gray-100 divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
                                                                <ul class="py-2 text-sm text-sky-600 dark:text-gray-200"
                                                                    aria-labelledby="opcionesBoton{{ $loop->iteration }}">
                                                                    <li class="hover:text-gray-100">
                                                                        <a href="#"
                                                                            class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                            <svg class="w-6 h-6 " aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            <span class="ml-2">Ver</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="hover:text-gray-100">
                                                                        <a href="{{ route('project.subject.edit', $subject->id) }}"
                                                                            class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700">
                                                                            <svg class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                fill="none" viewBox="0 0 24 24">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                                            </svg>
                                                                            <span class="ml-2">Editar</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="hover:text-gray-100">
                                                                        <form id="delete-form-{{ $subject->id }}"
                                                                            action="{{ route('project.subject.destroy', $subject->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button"
                                                                                class="flex items-center w-full px-4 py-2 transition duration-75 group hover:text-gray-100 hover:bg-sky-300 dark:text-white dark:hover:bg-gray-700"
                                                                                onclick="confirmDelete({{ $subject->id }})">
                                                                                <svg class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="none"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                                                </svg>
                                                                                <span class="ml-2">Borrar</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

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

        function AssingTeacher() {
            const div = document.getElementById('page-assign-teacher');

            if (div.classList.contains('hidden')) {
                div.classList.remove('hidden');
            } else {
                div.classList.add('hidden');
            }
        }

        function hideOnClick(event) {

            const div = document.getElementById('page-assign-teacher');
            if (event.target === div) {
                div.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
