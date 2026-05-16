<x-admin-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Nuevo Material</h2>
    </div>

    <form action="{{ route('admin.materials.store') }}" method="POST">
        @csrf
        <div class="bg-white rounded-base shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Ej: PLA Basic">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Tipo</label>
                        <input type="text" name="type" id="type" value="{{ old('type') }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Ej: PLA, PETG, ABS...">
                        @error('type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color') }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Ej: Blanco, Neon Green...">
                        @error('color')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="stock_grams" class="block text-sm font-medium text-gray-700 mb-2">Stock Inicial (gramos)</label>
                        <input type="number" name="stock_grams" id="stock_grams" value="{{ old('stock_grams', 1000) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('stock_grams')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price_per_gram" class="block text-sm font-medium text-gray-700 mb-2">Precio por Gramo ($)</label>
                        <input type="number" step="0.01" name="price_per_gram" id="price_per_gram" value="{{ old('price_per_gram', 0.50) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('price_per_gram')
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
                    Guardar Material
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
