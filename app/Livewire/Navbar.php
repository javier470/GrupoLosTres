<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public function redirectToPage()
    {
        return redirect()->to('https://google.com');
    }

    public function redirectHome()
    {
        return redirect()->to('/');
    }

    public function redirectCleanHome()
    {
        session()->forget(['orden', 'placa']);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
