<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solicitante extends Model
{
    use HasFactory;
    protected $table = "solicitantes";
    protected $fillable = ["cedula", "nombre", "direccion", "telefono"];
    protected $hidden = ["created_at", "updated_at"];
    public function Parroquia() : BelongsTo {
        return $this->belongsTo(Parroquia::class, "id_parroquia");
    }
    public function Solicitudes() : HasMany {
        return $this->hasMany(Solicitud::class, "id_solicitante");
    }

}
