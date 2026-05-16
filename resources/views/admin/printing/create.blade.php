<x-admin-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Nueva Impresión</h2>
    </div>

    <form action="{{ route('admin.printing.store') }}" method="POST">
        @csrf
        <div class="bg-white rounded-base shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-2">Empleado Asignado</label>
                        <select name="employee_id" id="employee_id" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-2">Cliente (Usuario Customer)</label>
                        <select name="customer_id" id="customer_id" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="printer_id" class="block text-sm font-medium text-gray-700 mb-2">Impresora Asignada</label>
                        <select name="printer_id" id="printer_id" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            @foreach($printers as $printer)
                                <option value="{{ $printer->id }}" {{ old('printer_id') == $printer->id ? 'selected' : '' }}>{{ $printer->name }} ({{ $printer->model }})</option>
                            @endforeach
                        </select>
                        @error('printer_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Inicio</label>
                        <input type="datetime-local" name="start_date" id="start_date" value="{{ old('start_date', now()->format('Y-m-d\TH:i')) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('start_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Materiales</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($materials as $material)
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="materials[]" value="{{ $material->id }}" 
                                       {{ is_array(old('materials')) && in_array($material->id, old('materials')) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="text-gray-700 group-hover:text-blue-600 transition duration-150">{{ $material->name }} ({{ $material->color }})</span>
                            </label>
                        @endforeach
                    </div>
                    @error('materials')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                <a href="{{ route('admin.printing.index') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-base hover:bg-gray-50 transition duration-150">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-base hover:bg-blue-700 transition duration-150 font-bold">
                    Guardar Impresión
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
