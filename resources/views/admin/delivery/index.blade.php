<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Envíos',
        'href' => route('admin.delivery.index')
    ]
]">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Gestión de Envíos</h2>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-base">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-base text-sm">
        <i class="fa-solid fa-circle-info mr-2"></i> Los envíos se generan automáticamente cuando una impresión es marcada como finalizada.
    </div>

    @livewire('admin.delivery.delivery-table')
</x-admin-layout>
