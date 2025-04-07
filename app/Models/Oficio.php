<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Oficio extends Model
{
    use HasFactory;
    protected $table = "oficio";
    protected $fillable = ["fecha"];
    protected $hidden = ["created_at", "updated_at"];

    public function Solicitantes() : HasMany {
        return $this->hasMany(Solicitud::class, "id_oficio");
    }
    public function direccion(): BelongsTo {
        return $this->belongsTo(Direccion::class, "id_direccion");
    }
}
