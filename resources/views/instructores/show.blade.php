<x-layouts.app :title="__('Detalle Instructor')">
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Detalle del Instructor</h1>
            
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="p-6 space-y-4">
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $instructor->id }}</p>
                    </div>
                    
                    <div class="border-b dark:border-gray-700 pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $instructor->nombre }}</p>
                    </div>
                    
                    <div class="pb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</h3>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $instructor->email }}</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4">
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('instructores.index') }}" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                            Volver
                        </a>
                        <a href="{{ route('instructores.edit', $instructor) }}" 
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
