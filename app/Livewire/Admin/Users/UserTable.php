<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.users.user-table', [
            'users' => $users
        ]);
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Usuario Eliminado',
                'text' => 'El usuario ha sido eliminado correctamente.'
            ]);
        }
    }
}
