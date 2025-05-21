<x-layouts.app :title="__('Detalle Taller')">
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Detalle del Taller</h1>
            
            @if($tallere)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="p-6 space-y-4">
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $tallere->nombre }}</p>
                    </div>
                    
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Descripción</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $tallere->descripcion }}</p>
                    </div>

                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Instructor</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $tallere->instructor ? $tallere->instructor->nombre : 'No asignado' }}
                        </p>
                    </div>
                    
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Fechas</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                            Del {{ $tallere->fecha_inicio }} al {{ $tallere->fecha_fin }}
                        </p>
                    </div>

                    <div class="pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Cupo</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $tallere->cupo }}</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4">
                    <div class="flex justify-between space-x-3">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('talleres.edit', $tallere) }}" 
                               class="px-4 py-2 bg-green-600 text-white rounded-md text-sm font-medium hover:bg-green-700">
                                Editar
                            </a>
                        @endif
                        @if(auth()->user()->role === 'user')
                            <form action="{{ route('talleres.inscribirse', $tallere) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md text-sm font-medium hover:bg-green-700">
                                    Inscribirse
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('talleres.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500 dark:text-gray-400">No se encontró información del taller.</p>
                <a href="{{ route('talleres.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-700">
                    Volver a la lista de talleres
                </a>
            </div>
            @endif
        </div>
    </div>
</x-layouts.app>
