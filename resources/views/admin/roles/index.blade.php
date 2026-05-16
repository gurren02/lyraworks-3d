<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Administración de Roles</h2>
        <a href="{{ route('admin.roles.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold text-center text-white bg-black border border-black rounded-base hover:bg-white hover:text-black transition duration-200 shadow-sm">
            Nuevo <i class="fa-solid fa-plus ml-2"></i>
        </a>
    </div>

    @livewire('admin.roles.role-table')
</x-admin-layout>
