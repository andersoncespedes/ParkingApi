<?php

namespace App\Repositories;
use App\Interface\IUser;
use App\Models\Solicitud;
use App\Models\User;

class UserRepository extends GenericRepository implements IUser
{
    private User $_context;
    public function __construct(User $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
}
