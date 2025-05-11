<?php

namespace App\Livewire\Login;

use Livewire\Component;

class ProcesarOrden extends Component
{
    public $pasoActual = 1; //maximo 4 minimo 1

    public $orden, $placa;
    public $vista = "actuales";
    public $estado = "En Proceso"; 
    public $nombreCliente = "GRUPO LOS TRES GUATEMALA, S.A";
    public $nitCliente = "4651658-1";
    public $direccionCliente = "BOULEVARD LIBERACIÒN 1-87 ZONA 9";
    public $tipoVehiculo = "Camioneta";
    public $lineaVehiculo = "XC60 T5";
    public $marcaVehiculo = "VOLVO";
    public $colorVehiculo = "GRIS";

    public $pasos = [
        ['titulo' => 'En Asignación', 'icono' => 'Group 9.png'],
        ['titulo' => 'Presupuesto y Autorización', 'icono' => 'Group 10.png'],
        ['titulo' => 'Autorizado, esperando Ingreso', 'icono' => 'Group 11.png'],
        ['titulo' => 'En Proceso de Reparación', 'icono' => 'Group 12.png'],
        ['titulo' => 'Finalizado, listo para Entrega', 'icono' => 'Group 13.png'],
    ];


    public function setPaso($paso)
    {
        $this->pasoActual = $paso;
    }

    public function mount(){
        $this->orden = session('orden');
        $this->placa = session('placa');
    }

    public function changeVista($vista = 'actuales'){
        $this->vista = $vista;
    }

    public function render()
    {
        return view('livewire.login.procesar-orden');
    }
}
