<div class="flex space-x-2">
    <a href="{{ route('admin.roles.edit', $role) }}" class="text-blue-600 hover:text-blue-800 transition duration-150">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este rol?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-800 transition duration-150">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</div>
