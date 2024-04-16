<?php

namespace App\Livewire;

use Livewire\Component;

class SelectedUser extends Component
{
    public $selectedUsername;

    protected $listeners = ['selectUser'];

    public function selectUser($username)
    {
        $this->selectedUsername = $username;
    }

    public function render()
    {
        return view('livewire.selected-user');
    }
}
