<?php

namespace App\Livewire;

use Livewire\Component;

class Footer extends Component
{

    public function redirectToSupport()
    {
        return redirect()->to('https://google.com');
    }

    public function render()
    {
        return view('livewire.footer');
    }
}
