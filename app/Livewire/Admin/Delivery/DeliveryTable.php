<?php

namespace App\Livewire\Admin\Delivery;

use Livewire\Component;
use App\Models\Delivery;
use Livewire\WithPagination;

class DeliveryTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $deliveries = Delivery::with(['customer', 'employee'])
            ->where('status', 'pending')
            ->where(function($query) {
                $query->whereHas('customer', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('employee', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('postal_code', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.delivery.delivery-table', [
            'deliveries' => $deliveries
        ]);
    }

    public function deleteDelivery($id)
    {
        $delivery = Delivery::find($id);
        if ($delivery) {
            $delivery->delete();
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Envío Eliminado',
                'text' => 'El envío ha sido eliminado correctamente.'
            ]);
        }
    }
}
