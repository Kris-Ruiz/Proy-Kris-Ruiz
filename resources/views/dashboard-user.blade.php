<x-layouts.app :title="__('Dashboard Usuario')">
    <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Dashboard Usuario</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Mis Inscripciones</h2>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $misInscripcionesCount }}</p>
                <a href="{{ route('participantes.inscripciones') }}" class="mt-4 inline-block text-green-600 hover:text-green-900">
                    Ver mis inscripciones →
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Talleres Disponibles</h2>
                <p class="mt-2 text-3xl font-bold text-indigo-600">{{ $talleresDisponiblesCount }}</p>
                <a href="{{ route('talleres.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-900">
                    Ver talleres disponibles →
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
