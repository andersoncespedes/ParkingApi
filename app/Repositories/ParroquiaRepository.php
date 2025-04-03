<?php

namespace App\Repositories;

use App\Interface\IParroquia;
use App\Models\Parroquia;
use Carbon\Carbon;
use DateTime;
use DateTimeInterface;

class ParroquiaRepository extends GenericRepository implements IParroquia
{
    private Parroquia $_context;
    public function __construct(Parroquia $model)
    {
        $this->_context = $model;
        parent::__construct($this->_context);
    }
    public function GetByParroquiaStats()
    {
        $solicitudes = $this->_context->with('solicitantes.solicitudes')->get();
        return $solicitudes->groupBy(function ($parroquia) {
            return Carbon::parse($parroquia->created_at)->format('Y-M'); // Agrupa por año y mes
        })->map(function ($parroquia) {
            return $parroquia->map(function($parroquiasen){
               return  [
                    "Nombre Parroquia" => $parroquiasen->descripcion,
                    "solicitudes" => $parroquiasen->Solicitantes->map(function ($solicitudes) {
                        return $solicitudes->count();
                    })->sum()
                ];
            });
        });
    }
    public function GetByParroquiaByYear()
    {
        $solicitudes = $this->_context->with('solicitantes.solicitudes')->get();
        return $solicitudes->groupBy(function ($parroquia) {
            return Carbon::parse($parroquia->created_at)->format('Y'); // Agrupa por año y mes
        })->map(function ($parroquia) {
            return $parroquia->map(function ($parroquiasen) {
                return [
                    "Año" => Carbon::parse($parroquiasen->created_at)->format('Y'),
                    "solicitudes" => $parroquiasen->Solicitantes->map(function ($solicitudes) {
                        return $solicitudes->count();
                    })->sum()
                ];
            });
        });
    }
}
