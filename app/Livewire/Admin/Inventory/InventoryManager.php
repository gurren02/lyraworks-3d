<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;

class InventoryManager extends Component
{
    public $activeTab = 'printers';

    public function mount()
    {
        if (request()->has('tab')) {
            $this->activeTab = request()->get('tab');
        }
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.admin.inventory.inventory-manager');
    }
}
