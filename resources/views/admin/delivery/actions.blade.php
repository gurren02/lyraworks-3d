<div class="flex space-x-3 justify-center">
    <form action="{{ route('admin.delivery.finish', $delivery) }}" method="POST" onsubmit="return confirm('¿Marcar como entregado?')">
        @csrf
        <button type="submit" class="text-green-600 hover:text-green-800 transition duration-150" title="Entregado">
            <i class="fa-solid fa-truck-ramp-box"></i>
        </button>
    </form>
    <a href="{{ route('admin.delivery.edit', $delivery) }}" class="text-blue-600 hover:text-blue-800 transition duration-150" title="Editar">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button wire:click="deleteDelivery({{ $delivery->id }})" 
            wire:confirm="¿Estás seguro de eliminar este envío?"
            class="text-red-600 hover:text-red-800 transition duration-150" title="Eliminar">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</div>
