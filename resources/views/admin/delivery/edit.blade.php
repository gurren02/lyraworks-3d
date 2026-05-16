<x-admin-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Editar Envío #{{ $delivery->id }}</h2>
        <p class="text-sm text-gray-500">Vinculado a la impresión #{{ $delivery->print_job_id }}</p>
    </div>

    <form action="{{ route('admin.delivery.update', $delivery) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-base shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">Cliente</label>
                        <input type="text" id="customer_name" value="{{ $delivery->customer->name }}" disabled 
                               class="w-full rounded-base border-gray-300 bg-gray-50 text-gray-500 cursor-not-allowed">
                    </div>

                    <div class="mb-4">
                        <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-2">Empleado para Envío</label>
                        <select name="employee_id" id="employee_id" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="">Seleccionar Empleado...</option>
                            @foreach($shippers as $shipper)
                                <option value="{{ $shipper->id }}" {{ old('employee_id', $delivery->employee_id) == $shipper->id ? 'selected' : '' }}>{{ $shipper->name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="scheduled_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha Programada</label>
                        <input type="datetime-local" name="scheduled_date" id="scheduled_date" value="{{ old('scheduled_date', $delivery->scheduled_date->format('Y-m-d\TH:i')) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        @error('scheduled_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                        <select name="status" id="status" class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="pending" {{ old('status', $delivery->status) == 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="delivered" {{ old('status', $delivery->status) == 'delivered' ? 'selected' : '' }}>Entregado</option>
                            <option value="cancelled" {{ old('status', $delivery->status) == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Dirección de Entrega</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $delivery->address) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Calle, número, colonia...">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-2">Código Postal</label>
                        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $delivery->postal_code) }}" 
                               class="w-full rounded-base border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                               placeholder="Ej: 97000">
                        @error('postal_code')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                <a href="{{ route('admin.delivery.index') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-base hover:bg-gray-50 transition duration-150">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-base hover:bg-blue-700 transition duration-150 font-bold">
                    Actualizar Envío
                </button>
            </div>
        </div>
    </form>
</x-admin-layout>
