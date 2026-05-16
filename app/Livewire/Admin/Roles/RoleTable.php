<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RoleTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.roles.role-table', [
            'roles' => $roles
        ]);
    }

    public function deleteRole($roleId)
    {
        $role = Role::find($roleId);
        if ($role) {
            $role->delete();
            session()->flash('success', 'Rol eliminado correctamente.');
        }
    }
}
