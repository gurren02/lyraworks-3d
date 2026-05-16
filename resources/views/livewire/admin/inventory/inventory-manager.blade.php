<div>
    <div class="flex space-x-1 p-1 bg-gray-100 rounded-base mb-6 max-w-xs border border-gray-200">
        <button wire:click="setActiveTab('printers')" 
                class="flex-1 py-2 text-sm font-bold rounded-base transition duration-200 {{ $activeTab === 'printers' ? 'bg-black text-white' : 'text-gray-500 hover:text-black' }}">
            <i class="fa-solid fa-print mr-2"></i> Impresoras
        </button>
        <button wire:click="setActiveTab('materials')" 
                class="flex-1 py-2 text-sm font-bold rounded-base transition duration-200 {{ $activeTab === 'materials' ? 'bg-black text-white' : 'text-gray-500 hover:text-black' }}">
            <i class="fa-solid fa-box mr-2"></i> Materiales
        </button>
    </div>

    <div class="transition-all duration-300">
        @if($activeTab === 'printers')
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-700">Listado de Impresoras</h3>
                <a href="{{ route('admin.printers.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold text-center text-white bg-black border border-black rounded-base hover:bg-white hover:text-black transition duration-200">
                    Nueva Impresora <i class="fa-solid fa-plus ml-2"></i>
                </a>
            </div>
            @livewire('admin.inventory.printer-table')
        @else
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-700">Listado de Materiales</h3>
                <a href="{{ route('admin.materials.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold text-center text-white bg-black border border-black rounded-base hover:bg-white hover:text-black transition duration-200">
                    Nuevo Material <i class="fa-solid fa-plus ml-2"></i>
                </a>
            </div>
            @livewire('admin.inventory.material-table')
        @endif
    </div>
</div>
