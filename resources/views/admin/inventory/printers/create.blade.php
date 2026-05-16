<x-admin-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Nueva Impresora</h2>
    </div>

    <form action="{{ route('admin.printers.store') }}" method="POST">
        @csrf
        <div class="bg-white rounded-base shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Ej: Ender 3 V2 - 01">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-2">Modelo</label>
                        <input type="text" name="model" id="model" value="{{ old('model') }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Ej: Creality Ender 3">
                        @error('model')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="technology" class="block text-sm font-medium text-gray-700 mb-2">Tecnología</label>
                        <select name="technology" id="technology" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="FDM">FDM (Filamento)</option>
                            <option value="SLA">SLA (Resina)</option>
                            <option value="Resin">Resin</option>
                        </select>
                        @error('technology')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Estado Inicial</label>
                        <select name="status" id="status" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="available">Disponible</option>
                            <option value="maintenance">Mantenimiento</option>
                            <option value="broken">Averiada</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                <a href="{{ route('admin.inventory.index') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-base hover:bg-gray-50 transition duration-150">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-base hover:bg-blue-700 transition duration-150 font-bold">
                    Guardar Impresora
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
