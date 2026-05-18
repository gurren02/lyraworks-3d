<div class="flex space-x-3 justify-center">
    <form action="{{ route('admin.printing.finish', $job) }}" method="POST" class="confirm-action" data-confirm-title="¿Finalizar Trabajo?" data-confirm-text="¿Deseas marcar este trabajo de impresión como finalizado? Se creará automáticamente un envío." data-confirm-btn="Sí, finalizar">
        @csrf
        <button type="submit" class="text-green-600 hover:text-green-800 transition duration-150" title="Finalizar">
            <i class="fa-solid fa-circle-check"></i>
        </button>
    </form>
    <a href="{{ route('admin.printing.edit', $job) }}" class="text-blue-600 hover:text-blue-800 transition duration-150" title="Editar">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button onclick="SwalCustom.fire({
                title: '¿Eliminar Impresión?',
                text: '¿Estás seguro de eliminar esta impresión? Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.deletePrintJob({{ $job->id }});
                }
            })"
            class="text-red-600 hover:text-red-800 transition duration-150" title="Eliminar">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</div>
