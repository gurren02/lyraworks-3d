<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Usuarios',
        'href' => route('admin.users.index')
    ],
    [
        'name' => 'Editar Usuario',
        'href' => route('admin.users.edit', $user)
    ]
]">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Editar Usuario: {{ $user->name }}</h2>
    </div>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="rounded-base shadow-sm border border-gray-200 overflow-hidden" style="background-color: #F9FAFB;">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Juan Pérez">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="juan@ejemplo.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña (dejar en blanco para no cambiar)</label>
                        <input type="password" name="password" id="password" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Gestionar Roles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($roles as $role)
                            <label class="flex items-center space-x-3 cursor-pointer group p-2 rounded-base hover:bg-gray-100 transition duration-150">
                                <input type="checkbox" name="roles[]" value="{{ $role->name }}" 
                                       {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="text-gray-700 group-hover:text-blue-600 transition duration-150">{{ $role->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                <a href="{{ route('admin.users.index') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-base hover:bg-gray-50 transition duration-150">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-base hover:bg-blue-700 transition duration-150 font-bold">
                    Actualizar Usuario
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
