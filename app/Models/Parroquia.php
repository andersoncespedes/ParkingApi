<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parroquia extends Model
{
    use HasFactory;
    protected $table = "parroquia";
    protected $fillable = ["descripcion"];
    public function Solicitantes() : HasMany {
        return $this->hasMany(Solicitante::class, "id_parroquia");
    }
}
