<?php

namespace App\Repositories;

use App\Interface\IDireccion;
use App\Models\Direccion;

class DireccionRepository extends GenericRepository implements IDireccion
{
    private Direccion $_context;
    public function __construct(Direccion $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
    public function CountAllByDireccion()
    {   

        $oficios = $this->_context->with('oficio')->get();
        return $oficios->groupBy(function ($parroquia) {
            return $parroquia->descripcion; // Agrupa por año y mes
        })->map(function ($direccion) {
            return $direccion->map(function ($oficio) {
                return [
                    "Cantidad" => $oficio->count(),
                ];
            })->sum('Cantidad');
        });
    }
}
