<?php

namespace App\Interface;

interface ISolicitud extends IGenericRepository{
    public function GetAllForSolicitud();
    public function SaveRelation(array $data);
    public function GetAllStats();

}
