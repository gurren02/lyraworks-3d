<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Inventario',
        'href' => route('admin.inventory.index')
    ]
]">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Gestión de Inventario</h2>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-base">
            {{ session('success') }}
        </div>
    @endif

    @livewire('admin.inventory.inventory-manager')
</x-admin-layout>
