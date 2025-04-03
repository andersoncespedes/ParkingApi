<?php

namespace App\Interface;

interface IParroquia extends IGenericRepository{
    public function GetByParroquiaStats();
    public function GetByParroquiaByYear();
}
