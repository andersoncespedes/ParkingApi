<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Direccion extends Model
{
    use HasFactory;
    protected $table = "direccion";
    protected $fillable = ["descripcion"];
    public function oficio(): HasMany
    {
        return $this->hasMany(Oficio::class, "id_direccion");
    }
}
