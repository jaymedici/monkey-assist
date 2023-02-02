<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllUsers extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public bool $showEditUserModal = false;
    public array $userDetails = [];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function openModal(User $user)
    {
        $this->userDetails = $user->toArray();
        $this->showEditUserModal = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->showEditUserModal = false;
    }

    public function updateUser()
    {
        $this->validate($this->rules());

        $user = User::findOrFail($this->userDetails['id']);

        if ($this->userDetails['password'] !== null) {
            $this->userDetails['password'] = Hash::make(
                $this->userDetails['password']);
        }
        
        $user->update($this->userDetails);

        $this->closeModal();
        $this->dispatchBrowserEvent('user-updated', [
            'message' => 'User Updated'
        ]);
    }

    protected function rules()
    {
        return [
            'userDetails.name' => ['required', 'string', 'max:255'],
            'userDetails.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->userDetails['id']],
            'userDetails.password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function render()
    {
        $users = User::search($this->search)
                        ->orderBy($this->sortField, $this->sortDirection)
                        ->paginate(10);

        return view('livewire.admin.view-all-users', [
            'users' => $users,
        ]);
    }
}
