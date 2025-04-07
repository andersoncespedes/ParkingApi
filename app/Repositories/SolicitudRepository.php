<?php

namespace App\Repositories;

use App\Interface\ISolicitud;
use App\Models\Direccion;
use App\Models\Oficio;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;

class SolicitudRepository extends GenericRepository implements ISolicitud
{
    private Solicitud $_context;
    public function __construct(Solicitud $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
    public function GetAllForSolicitud()
    {
        $data = $this->_context->with('oficio.direccion')->get();
        return $data;
    }
    public function SaveRelation(array $data)
    {
        DB::transaction(function () use ($data) {
            $solicitante = $this->_context->Solicitante()->create(
                [
                    "Correo_electronico" => $data["correo_electronico"],
                    "nombre" => $data["nombre"],
                    "telefono" => $data["telefono"],
                    "direccion" => $data["direccion"],
                    "id_parroquia" => 1,
                    "cedula" => $data["cedula"]
                ]
            );
            $direccion = Direccion::create(
                [
                    "descripcion" => $data["direccion"]
                ]
            );
            $oficio = $direccion->oficio()->create([
                "fecha" => date("Y-m-d"),
                "id_direccion" => $direccion->id,
            ]);

            echo $oficio;
            echo $solicitante->id;

            $solicitud = $this->_context->create(
                [
                    "fecha" => date("Y-m-d"),
                    "asunto" => $data["asunto"],
                    "estado" => $data["estado"],
                    "tipo_solicitud" => $data["tipo_solicitud"],
                    "id_oficio" => $oficio->id,
                    "id_solicitante" => $solicitante->id,
                    "id_funcionario" => 1
                ]
            );
        });
        return $data;
    }
    public function GetAllStats()
    {
        $data = $this->_context->selectRaw("count(*) as total, estado")
            ->groupBy('estado')
            ->get();
        return $data;
    }
}
