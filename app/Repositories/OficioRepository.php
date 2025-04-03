<?php

namespace App\Repositories;

use App\Interface\IOficio;
use App\Models\Oficio;

class OficioRepository extends GenericRepository implements IOficio
{
    private Oficio $_context;
    public function __construct(Oficio $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
    public function CountAllByDireccion()
    {

        $direcciones = $this->_context->with('Oficios')->get(); // Carga la relación 'Oficios'

        return $direcciones->map(function ($direccion) {
            return [
                'descripcion' => $direccion->descripcion,
                'cantidadOficios' => $direccion->Oficios->count(), // Cuenta los oficios relacionados
            ];
        });
    }
}
