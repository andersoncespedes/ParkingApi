<?php

namespace App\Repositories;
use App\Interface\IRol;
use App\Models\Rol;

class RolRepository extends GenericRepository implements IRol
{
    private Rol $_context;
    public function __construct(Rol $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
}
