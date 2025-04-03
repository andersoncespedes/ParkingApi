<?php

namespace App\Repositories;
use App\Interface\IFuncionario;
use App\Models\Funcionario;

class FuncionarioRepository extends GenericRepository implements IFuncionario
{
    private Funcionario $_context;
    public function __construct(Funcionario $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
}
