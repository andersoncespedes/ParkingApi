<?php

namespace App\Repositories;

use App\Interface\ICargo;
use App\Models\Cargo;

class CargoRepository extends GenericRepository implements ICargo
{
    private Cargo $_context;
    public function __construct(Cargo $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
}
