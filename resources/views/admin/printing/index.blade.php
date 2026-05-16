<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Impresiones en Proceso</h2>
        <a href="{{ route('admin.printing.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold text-center text-white bg-black border border-black rounded-base hover:bg-white hover:text-black transition duration-200 shadow-sm">
            Nuevo <i class="fa-solid fa-plus ml-2"></i>
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-base">
            {{ session('success') }}
        </div>
    @endif

    @livewire('admin.printing.printing-table')
</x-admin-layout>
