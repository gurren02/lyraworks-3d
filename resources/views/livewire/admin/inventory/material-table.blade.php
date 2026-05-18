<div>
    <div class="mb-4">
        <input wire:model.live="search" type="text" 
               placeholder="Buscar material..." 
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
                        Tipo/Color
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-center">
                        Stock (g)
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Precio/g
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                <tr class="border-b border-gray-100 transition duration-150">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" style="background-color: #F9F3E9;">
                        {{ $material->id }}
                    </th>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $material->name }}
                    </td>
                    <td class="px-6 py-4 font-medium" style="background-color: #F9F3E9;">
                        <span class="px-2 py-1 bg-gray-100 border border-gray-200 text-xs rounded-base">
                            {{ $material->type }} / {{ $material->color }}
                        </span>
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        <div class="relative flex items-center justify-center space-x-3">
                            <button type="button" wire:click="decrementStock({{ $material->id }})" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-gray-300 hover:bg-gray-200 focus:ring-4 focus:ring-gray-100 rounded-full text-sm focus:outline-none h-7 w-7 transition duration-200">
                                <svg class="w-3.5 h-3.5 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                            </button>
                            <div class="shrink-0 text-heading border-0 bg-transparent text-sm font-bold focus:outline-none focus:ring-0 min-w-[5rem] text-center">
                                @if($material->stock_grams <= $material->min_stock_alert)
                                    <span class="text-red-600"><i class="fa-solid fa-triangle-exclamation mr-1 text-[10px]"></i>{{ number_format($material->stock_grams, 2) }}g</span>
                                @else
                                    <span class="text-gray-900">{{ number_format($material->stock_grams, 2) }}g</span>
                                @endif
                            </div>
                            <button type="button" wire:click="incrementStock({{ $material->id }})" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-gray-300 hover:bg-gray-200 focus:ring-4 focus:ring-gray-100 rounded-full text-sm focus:outline-none h-7 w-7 transition duration-200">
                                <svg class="w-3.5 h-3.5 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-bold" style="background-color: #F9F3E9;">
                        ${{ number_format($material->price_per_gram, 2) }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        <div class="flex space-x-3 justify-center">
                            <a href="{{ route('admin.materials.edit', $material) }}" class="text-blue-600 hover:text-blue-800 transition duration-150">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button onclick="SwalCustom.fire({
                                        title: '¿Eliminar Material?',
                                        text: '¿Estás seguro de eliminar este material? Esta acción no se puede deshacer.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $wire.deleteMaterial({{ $material->id }});
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
        {{ $materials->links() }}
    </div>
</div>
