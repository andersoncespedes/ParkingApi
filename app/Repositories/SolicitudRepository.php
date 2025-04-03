<?php

namespace App\Repositories;
use App\Interface\ISolicitud;
use App\Models\Solicitud;

class SolicitudRepository extends GenericRepository implements ISolicitud
{
    private Solicitud $_context;
    public function __construct(Solicitud $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
}
