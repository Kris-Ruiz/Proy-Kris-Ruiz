<x-layouts.app :title="__('Nuevo Material')">
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Nuevo Material</h1>
            
            <form action="{{ route('materiales.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required value="{{ old('nombre') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion') }}</textarea>
                </div>

                <div>
                    <label for="cantidad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" required value="{{ old('cantidad') }}" min="0"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="taller_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Taller</label>
                    <select name="taller_id" id="taller_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Seleccione un taller</option>
                        @foreach($talleres as $taller)
                            <option value="{{ $taller->id }}" {{ old('taller_id') == $taller->id ? 'selected' : '' }}>
                                {{ $taller->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('materiales.index') }}" 
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        Cancelar
                    </a>
                    <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
