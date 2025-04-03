<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";
    protected $fillable = ["cedula", "nombre"];
    protected $hidden = ["created_at", "updated_at"];
    use HasFactory;
}
