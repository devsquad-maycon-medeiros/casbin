<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    protected $listeners = [
        'roleSynced' => '$refresh',
    ];

    public $hideable = 'select';

    public $exportable = true;

    public function builder()
    {
        return User::query()->with('roles');
    }

    public function columns()
    {
        return [

            NumberColumn::name('id')
                ->label('ID'),

            Column::name('name')
                ->editable()
                ->label('Name'),

            Column::name('email')
                ->label('Email'),

            Column::name('roles.name')->label('Roles')
                ->filterable()
                ->view('livewire.users.data-table.roles'),

        ];
    }
}
