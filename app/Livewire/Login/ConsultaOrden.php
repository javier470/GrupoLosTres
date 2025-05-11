<?php

namespace App\Livewire\Login;

use Livewire\Component;

class ConsultaOrden extends Component
{
    public $noOrden;
    public $noPlaca;
    public $aceptaTerminos = false;

    public function procesarOrden()
    {
        if ($this->aceptaTerminos && $this->noOrden && $this->noPlaca) {
            session([
                'orden' => $this->noOrden,
                'placa' => $this->noPlaca
            ]);

            return redirect()->to('/procesar-orden');
        }
    }

    public function render()
    {
        return view('livewire.login.consulta-orden');
    }
}
