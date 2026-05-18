<div>
    <div class="mb-4">
        <input wire:model.live="search" type="text" 
               placeholder="Buscar impresora..." 
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
                        Modelo
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Tecnología
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($printers as $printer)
                <tr class="border-b border-gray-100 transition duration-150">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" style="background-color: #F9F3E9;">
                        {{ $printer->id }}
                    </th>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $printer->name }}
                    </td>
                    <td class="px-6 py-4 font-medium" style="background-color: #F9F3E9;">
                        {{ $printer->model ?? '---' }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-base uppercase">
                            {{ $printer->technology }}
                        </span>
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9F3E9;">
                        @if($printer->status === 'available')
                            <span class="text-green-600 font-bold">Disponible</span>
                        @else
                            <span class="text-red-600 font-bold">{{ $printer->status }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        <div class="flex space-x-3 justify-center">
                            <a href="{{ route('admin.printers.edit', $printer) }}" class="text-blue-600 hover:text-blue-800 transition duration-150">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button onclick="SwalCustom.fire({
                                        title: '¿Eliminar Impresora?',
                                        text: '¿Estás seguro de eliminar esta impresora? Esta acción no se puede deshacer.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $wire.deletePrinter({{ $printer->id }});
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
        {{ $printers->links() }}
    </div>
</div>
