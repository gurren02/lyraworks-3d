<div class="flex space-x-3 justify-center">
    <form action="{{ route('admin.delivery.finish', $delivery) }}" method="POST" class="confirm-action" data-confirm-title="¿Marcar como Entregado?" data-confirm-text="¿Deseas marcar este envío como completado y entregado?" data-confirm-btn="Sí, entregar">
        @csrf
        <button type="submit" class="text-green-600 hover:text-green-800 transition duration-150" title="Entregado">
            <i class="fa-solid fa-truck-ramp-box"></i>
        </button>
    </form>
    <a href="{{ route('admin.delivery.edit', $delivery) }}" class="text-blue-600 hover:text-blue-800 transition duration-150" title="Editar">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button onclick="SwalCustom.fire({
                title: '¿Eliminar Envío?',
                text: '¿Estás seguro de eliminar este envío? Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.deleteDelivery({{ $delivery->id }});
                }
            })"
            class="text-red-600 hover:text-red-800 transition duration-150" title="Eliminar">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</div>
