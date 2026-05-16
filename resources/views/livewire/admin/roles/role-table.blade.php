<div>

    <div class="relative overflow-x-auto shadow-xs rounded-base border border-gray-200">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
            <thead class="text-xs uppercase" style="background-color: #fcfaf5;">
                <tr>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Nombre del Rol
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Guard
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Fecha Creación
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr class="border-b border-gray-100 transition duration-150">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" style="background-color: #F9F3E9;">
                        {{ $role->id }}
                    </th>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $role->name }}
                    </td>
                    <td class="px-6 py-4 font-medium" style="background-color: #F9F3E9;">
                        <span class="px-2 py-1 bg-white/50 border border-gray-200 text-gray-800 text-xs font-semibold rounded-base uppercase">
                            {{ $role->guard_name }}
                        </span>
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $role->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9F3E9;">
                        <div class="flex space-x-3 justify-center">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="text-blue-600 hover:text-blue-800 transition duration-150">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button wire:click="deleteRole({{ $role->id }})" 
                                    wire:confirm="¿Estás seguro de eliminar este rol?"
                                    class="text-red-600 hover:text-red-800 transition duration-150">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $roles->links() }}
    </div>
</div>
