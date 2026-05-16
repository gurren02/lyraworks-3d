<div>
    <div class="mb-4">
        <input wire:model.live="search" type="text" 
               placeholder="Buscar por empleado, cliente o impresora..." 
               class="w-full md:w-1/3 rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
    </div>

    <div class="relative overflow-x-auto shadow-xs rounded-base border border-gray-200">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
            <thead class="text-xs uppercase" style="background-color: #fcfaf5;">
                <tr>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Empleado
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Impresora
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold" style="background-color: #F9F3E9;">
                        Materiales
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold">
                        Inicio
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-center" style="background-color: #F9F3E9;">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($printJobs as $job)
                <tr class="border-b border-gray-100 transition duration-150">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" style="background-color: #F9F3E9;">
                        {{ $job->id }}
                    </th>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $job->employee->name }}
                    </td>
                    <td class="px-6 py-4 font-medium" style="background-color: #F9F3E9;">
                        {{ $job->customer->name }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $job->printer->name }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9F3E9;">
                        <div class="grid grid-cols-3 gap-2 w-full min-w-[250px]">
                            @foreach($job->materials as $material)
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-[10px] font-semibold rounded-base text-center border border-green-200">
                                    {{ $material->name }}
                                </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9FAFB;">
                        {{ $job->start_date->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4" style="background-color: #F9F3E9;">
                        @include('admin.printing.actions', ['job' => $job])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $printJobs->links() }}
    </div>
</div>
