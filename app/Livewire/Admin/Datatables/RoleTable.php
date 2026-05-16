<?php

namespace App\Livewire\Admin\Datatables;

use Spatie\Permission\Models\Role;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RoleTable extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('roles-page');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Guard", "guard_name")
                ->sortable(),
            Column::make("Acciones")
                ->label(fn($row) => view('admin.roles.actions', ['role' => $row])),
        ];
    }
}
