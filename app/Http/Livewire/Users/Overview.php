<?php

namespace App\Http\Livewire\Users;

use App\Enums\UserTypeEnum;
use App\Http\Requests\DeleteUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Overview extends Component
{
    public $users = null;
    public $adminOptions = false;

    public function getAllUsers()
    {
        $this->users = User::all();
    }

    public function toggleAdminOptions()
    {
        if (Auth::user()->can('update a company')) {
            $this->adminOptions = true;
        }
    }

    public function deleteUser(DeleteUserRequest $request, User $user)
    {
        $user->delete();
        $this->getAllUsers();
    }

    public function mount()
    {
        $this->getAllUsers();
        $this->toggleAdminOptions();
    }

    public function render()
    {
        return view('livewire.users.overview');
    }
}
