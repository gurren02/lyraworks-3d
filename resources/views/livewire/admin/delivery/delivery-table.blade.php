<div>
    <div class="mb-4">
        <input wire:model.live="search" type="text" 
               placeholder="Buscar por cliente, empleado o dirección..." 
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
                        Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Empleado Asignado
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Fecha Programada
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Dirección / CP
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveries as $delivery)
                <tr class="border-b border-gray-100 transition duration-150">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" style="background-color: #F9F3E9;">
                        {{ $delivery->id }}
                    </th>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $delivery->customer->name }}
                    </td>
                    <td class="px-6 py-4 font-medium" style="background-color: #F9F3E9;">
                        @if($delivery->employee)
                            <span class="text-gray-900 font-semibold">{{ $delivery->employee->name }}</span>
                        @else
                            <span class="text-red-500 italic font-medium">No asignado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $delivery->scheduled_date->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9F3E9;">
                        <div class="text-xs">
                            <p class="font-bold text-gray-800">{{ $delivery->address ?? 'Pendiente' }}</p>
                            <p class="text-gray-500">CP: {{ $delivery->postal_code ?? '---' }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        @include('admin.delivery.actions', ['delivery' => $delivery])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $deliveries->links() }}
    </div>
</div>
