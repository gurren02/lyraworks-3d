<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use App\Models\Printer;
use Livewire\WithPagination;

class PrinterTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $printers = Printer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('model', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.inventory.printer-table', [
            'printers' => $printers
        ]);
    }

    public function deletePrinter($id)
    {
        $printer = Printer::find($id);
        if ($printer) {
            $printer->delete();
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Impresora Eliminada',
                'text' => 'La impresora ha sido eliminada correctamente.'
            ]);
        }
    }
}
