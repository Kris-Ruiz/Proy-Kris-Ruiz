<x-layouts.app :title="__('Detalles del Participante')">
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Detalles del Participante</h1>
            
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="p-6 space-y-4">
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Usuario</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $participanteAdmin->user->name }}</p>
                        <p class="mt-1 text-xs text-gray-500">{{ $participanteAdmin->user->email }}</p>
                    </div>
                    
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Taller</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $participanteAdmin->taller->nombre }}</p>
                    </div>

                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado</h3>
                        <span class="mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $participanteAdmin->estado === 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($participanteAdmin->estado) }}
                        </span>
                    </div>

                    <div class="pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de inscripción</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $participanteAdmin->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4">
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('participantes.admin.edit', $participanteAdmin) }}" 
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700">
                            Editar Estado
                        </a>
                        <a href="{{ route('participantes.admin.index') }}" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
