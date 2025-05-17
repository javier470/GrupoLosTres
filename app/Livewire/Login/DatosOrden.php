<?php

namespace App\Livewire\Login;

use Livewire\Component;

class DatosOrden extends Component
{

    public $orden, $placa;
    public $estado = "En Proceso"; 
    public $nombreCliente = "GRUPO LOS TRES GUATEMALA, S.A";
    public $nitCliente = "4651658-1";
    public $direccionCliente = "BOULEVARD LIBERACIÒN 1-87 ZONA 9";
    public $tipoVehiculo = "Camioneta";
    public $lineaVehiculo = "XC60 T5";
    public $marcaVehiculo = "VOLVO";
    public $colorVehiculo = "GRIS";
    public $total = 4520.99;

    public function mount(){
        $this->orden = session('orden');
        $this->placa = session('placa');
    }

    public function redirectCleanHome()
    {
        session()->forget(['orden', 'placa']);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.login.datos-orden');
    }
}
