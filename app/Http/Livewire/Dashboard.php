<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $user_role;

    public function mount()
    {
        $auth = auth()->user();
        $this->user_role = $auth->ref_type;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function redirectTo($path)
    {
        return redirect()->to($path);
    }
}