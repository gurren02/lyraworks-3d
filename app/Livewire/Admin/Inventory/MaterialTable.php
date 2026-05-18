<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithPagination;

class MaterialTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $materials = Material::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('type', 'like', '%' . $this->search . '%')
            ->orWhere('color', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.inventory.material-table', [
            'materials' => $materials
        ]);
    }

    public function incrementStock($id)
    {
        $material = Material::find($id);
        if ($material) {
            $material->increment('stock_grams', 50);
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Stock Incrementado',
                'text' => 'Se agregaron 50g al material ' . $material->name . '.'
            ]);
        }
    }

    public function decrementStock($id)
    {
        $material = Material::find($id);
        if ($material && $material->stock_grams >= 50) {
            $material->decrement('stock_grams', 50);
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Stock Reducido',
                'text' => 'Se descontaron 50g del material ' . $material->name . '.'
            ]);
        }
    }

    public function deleteMaterial($id)
    {
        $material = Material::find($id);
        if ($material) {
            $material->delete();
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Material Eliminado',
                'text' => 'El material ha sido eliminado correctamente.'
            ]);
        }
    }
}
