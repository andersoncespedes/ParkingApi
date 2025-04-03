<?php

namespace App\Repositories;
use App\Interface\ISolicitante;
use App\Models\Solicitante;

class SolicitanteRepository extends GenericRepository implements ISolicitante
{
    private Solicitante $_context;
    public function __construct(Solicitante $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
}
