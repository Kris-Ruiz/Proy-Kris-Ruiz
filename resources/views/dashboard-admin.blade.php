<x-layouts.app :title="__('Dashboard Administrador')">
    <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Dashboard Administrador</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Talleres</h2>
                <p class="mt-2 text-3xl font-bold text-indigo-600">{{ $talleresCount }}</p>
                <a href="{{ route('talleres.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-900">
                    Ver todos los talleres →
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Participantes</h2>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $participantesCount }}</p>
                <a href="{{ route('participantes.admin.index') }}" class="mt-4 inline-block text-green-600 hover:text-green-900">
                    Ver todos los participantes →
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Instructores</h2>
                <p class="mt-2 text-3xl font-bold text-yellow-600">{{ $instructoresCount }}</p>
                <a href="{{ route('instructores.index') }}" class="mt-4 inline-block text-yellow-600 hover:text-yellow-900">
                    Ver todos los instructores →
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Materiales</h2>
                <p class="mt-2 text-3xl font-bold text-purple-600">{{ $materialesCount }}</p>
                <a href="{{ route('materiales.index') }}" class="mt-4 inline-block text-purple-600 hover:text-purple-900">
                    Ver todos los materiales →
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
