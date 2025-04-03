<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = "solicitudes";
    protected $fillable = ["fecha", "asunto"];
    protected $hidden = ["created_at", "updated_at"];
    public function Solicitante() : BelongsTo {
        return $this->belongsTo(Parroquia::class, "id_solicitante");
    }
    public function Oficios() : BelongsTo {
        return $this->belongsTo(Oficio::class, "id_oficio");
    }

}
