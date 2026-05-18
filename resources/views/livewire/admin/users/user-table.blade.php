<div>
    <div class="mb-4">
        <input wire:model.live="search" type="text" 
               placeholder="Buscar por nombre o email..." 
               class="w-full md:w-1/3 rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
    </div>

    <div class="relative overflow-x-auto rounded-base border-2 border-black">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
            <thead class="text-xs uppercase" style="background-color: #fcfaf5;">
                <tr>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Roles
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-gray-100 transition duration-150">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" style="background-color: #F9F3E9;">
                        {{ $user->id }}
                    </th>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-8 w-8">
                                <img class="h-8 w-8 rounded-full border border-gray-200" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-medium" style="background-color: #F9F3E9;">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        @forelse($user->roles as $role)
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-base uppercase mr-1">
                                {{ $role->name }}
                            </span>
                        @empty
                            <span class="text-gray-400 italic text-xs">Sin rol</span>
                        @endforelse
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9F3E9;">
                        <div class="flex space-x-3 justify-center">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 transition duration-150">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                            <button onclick="SwalCustom.fire({
                                        title: '¿Eliminar Usuario?',
                                        text: '¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $wire.deleteUser({{ $user->id }});
                                        }
                                    })"
                                    class="text-red-600 hover:text-red-800 transition duration-150">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
