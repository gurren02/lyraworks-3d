<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Inventario',
        'href' => route('admin.inventory.index')
    ],
    [
        'name' => 'Editar Impresora',
        'href' => route('admin.printers.edit', $printer)
    ]
]">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Editar Impresora: {{ $printer->name }}</h2>
    </div>

    <form action="{{ route('admin.printers.update', $printer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-base shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $printer->name) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-2">Modelo</label>
                        <input type="text" name="model" id="model" value="{{ old('model', $printer->model) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('model')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="technology" class="block text-sm font-medium text-gray-700 mb-2">Tecnología</label>
                        <select name="technology" id="technology" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="FDM" {{ $printer->technology === 'FDM' ? 'selected' : '' }}>FDM (Filamento)</option>
                            <option value="SLA" {{ $printer->technology === 'SLA' ? 'selected' : '' }}>SLA (Resina)</option>
                            <option value="Resin" {{ $printer->technology === 'Resin' ? 'selected' : '' }}>Resin</option>
                        </select>
                        @error('technology')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                        <select name="status" id="status" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="available" {{ $printer->status === 'available' ? 'selected' : '' }}>Disponible</option>
                            <option value="maintenance" {{ $printer->status === 'maintenance' ? 'selected' : '' }}>Mantenimiento</option>
                            <option value="broken" {{ $printer->status === 'broken' ? 'selected' : '' }}>Averiada</option>
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
                    Actualizar Impresora
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
