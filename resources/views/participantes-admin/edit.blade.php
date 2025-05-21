<x-layouts.app :title="__('Editar Estado del Participante')">
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Editar Estado del Participante</h1>
            
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="mb-6">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Usuario: <span class="font-medium text-gray-900 dark:text-white">{{ $participanteAdmin->user->name }}</span>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Taller: <span class="font-medium text-gray-900 dark:text-white">{{ $participanteAdmin->taller->nombre }}</span>
                        </p>
                    </div>

                    <form action="{{ route('participantes.admin.update', $participanteAdmin) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                            <select name="estado" id="estado" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="activo" {{ $participanteAdmin->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ $participanteAdmin->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('participantes.admin.index') }}" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                Cancelar
                            </a>
                            <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700">
                                Actualizar Estado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
