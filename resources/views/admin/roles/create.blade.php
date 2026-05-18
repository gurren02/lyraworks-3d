<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles',
        'href' => route('admin.roles.index')
    ],
    [
        'name' => 'Crear Rol',
        'href' => route('admin.roles.create')
    ]
]">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Crear Nuevo Rol</h2>
    </div>

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div class="bg-white rounded-base shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Rol</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                           placeholder="Ej: Administrador, Operador...">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Permisos Disponibles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($permissions as $permission)
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="text-gray-700 group-hover:text-blue-600 transition duration-150">{{ $permission->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                <a href="{{ route('admin.roles.index') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-base hover:bg-gray-50 transition duration-150">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-base hover:bg-blue-700 transition duration-150 font-bold">
                    Guardar Rol
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
