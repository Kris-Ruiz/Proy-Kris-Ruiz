<x-layouts.app :title="__('Editar Instructor')">
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Editar Instructor</h1>
            
            <form action="{{ route('instructores.update', $instructor) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required value="{{ old('nombre', $instructor->nombre) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                    <input type="email" name="email" id="email" required value="{{ old('email', $instructor->email) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('instructores.index') }}" 
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        Cancelar
                    </a>
                    <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
