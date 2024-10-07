<x-app-layout>
    @livewire('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg shadow-md mt-14">
            <h1
            class="font-serif text-sky-700 text-3xl uppercase tracking-wide mb-6 mt-3 shadow-sm ">
            Mis áreas curriculares:
        </h1>
            <div class="max-w-6xl mx-auto"> <!-- Contenedor centralizado -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach ($subjects as $subject)
                        <div class="max-w-96 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $subject->nombre }}</h5>
                                    <p class="text-gray-700 dark:text-gray-400">{{ $subject->grade->nombre }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
