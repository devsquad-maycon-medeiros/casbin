<?php

namespace App\Http\Livewire\Users\DataTable;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class ChangeRoles extends Component
{
    public int $userId;

    public $roleNames;

    public bool $editing = false;

    protected $rules = [
        'roleNames.*' => 'required|exists:roles,name',
    ];

    public function mount(string $roles)
    {
        $this->roleNames = Str::of($roles)->explode(',')->map(fn ($role) => Str::of($role)->trim());
    }

    public function getRoleOptionsProperty()
    {
        return Role::pluck('name');
    }

    public function save()
    {
        $user = User::find($this->userId);

        $user->syncRoles($this->roleNames);

        $this->emit('roleSynced');
    }

    public function render()
    {
        return view('livewire.users.data-table.change-roles');
    }
}
