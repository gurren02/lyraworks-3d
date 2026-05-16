<div class="flex space-x-3 justify-center">
    <form action="{{ route('admin.printing.finish', $job) }}" method="POST" onsubmit="return confirm('¿Finalizar este trabajo?')">
        @csrf
        <button type="submit" class="text-green-600 hover:text-green-800 transition duration-150" title="Finalizar">
            <i class="fa-solid fa-circle-check"></i>
        </button>
    </form>
    <a href="{{ route('admin.printing.edit', $job) }}" class="text-blue-600 hover:text-blue-800 transition duration-150" title="Editar">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button wire:click="deletePrintJob({{ $job->id }})" 
            wire:confirm="¿Estás seguro de eliminar esta impresión?"
            class="text-red-600 hover:text-red-800 transition duration-150" title="Eliminar">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</div>
