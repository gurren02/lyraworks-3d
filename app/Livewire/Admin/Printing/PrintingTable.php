<?php

namespace App\Livewire\Admin\Printing;

use Livewire\Component;
use App\Models\PrintJob;
use Livewire\WithPagination;

class PrintingTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $printJobs = PrintJob::with(['employee', 'customer', 'printer', 'materials'])
            ->where('status', 'in_progress')
            ->where(function($query) {
                $query->whereHas('employee', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('customer', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('printer', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10);

        return view('livewire.admin.printing.printing-table', [
            'printJobs' => $printJobs
        ]);
    }

    public function deletePrintJob($id)
    {
        $printJob = PrintJob::find($id);
        if ($printJob) {
            $printJob->delete();
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Impresión Eliminada',
                'text' => 'El trabajo de impresión ha sido eliminado correctamente.'
            ]);
        }
    }
}
