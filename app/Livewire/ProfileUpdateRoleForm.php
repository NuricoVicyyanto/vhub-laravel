<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRoleForm extends Component
{
    public $users;
    public $selectedUser;
    public $selectedRole;
    public $roles;

    public function mount()
    {
        // Hanya superadmin yang bisa melihat semua user
        if (Auth::user()->hasRole('superadmin')) {
            $this->users = User::all();
            $this->roles = Role::all();
        }
    }

    public function updateUserRole()
    {
        // Validasi hanya superadmin yang bisa
        if (!Auth::user()->hasRole('superadmin')) {
            session()->flash('error', 'Anda tidak memiliki izin.');
            return;
        }

        $this->validate([
            'selectedUser' => 'required|exists:users,id',
            'selectedRole' => 'required|exists:roles,name'
        ]);

        $user = User::findOrFail($this->selectedUser);
        
        // Hapus role sebelumnya
        $user->syncRoles([$this->selectedRole]);

        session()->flash('success', 'Role berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.profile-update-role-form');
    }
}