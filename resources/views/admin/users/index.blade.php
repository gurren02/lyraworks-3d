<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Usuarios',
        'href' => route('admin.users.index')
    ]
]">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Administración de Usuarios</h2>
        <a href="{{ route('admin.users.create') }}" style="background-color: #F9F3E9;" class="inline-flex items-center px-4 py-2 text-sm font-bold text-center text-black border border-black rounded-base hover:bg-black hover:text-[#F9F3E9] transition duration-200 shadow-sm">
            Nuevo <i class="fa-solid fa-plus ml-2"></i>
        </a>
    </div>

    @livewire('admin.users.user-table')
</x-admin-layout>
