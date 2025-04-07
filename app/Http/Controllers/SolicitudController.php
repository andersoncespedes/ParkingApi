<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interface\IUnitOfWork;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SolicitudController extends Controller
{
    private IUnitOfWork $_unitOfWork;
    public function __construct(IUnitOfWork $unitOfWork)
    {
        $this->_unitOfWork = $unitOfWork;
    }
    public function GetAllPaginate(): LengthAwarePaginator | JsonResponse
    {
        try {
            return $this->_unitOfWork->Solicitud()->GetAllPaginate();
        } catch (QueryException $e) {
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function Save(Request $request): JsonResponse
    {
        try {
            $this->_unitOfWork->Solicitud()->SaveOne($request->all());
            return response()->json([
                'Mensaje' => $request->all()
            ], 201); // Status code here
        } catch (QueryException $e) {
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function GetOne(int $id): JsonResponse
    {
        try {
            $data = $this->_unitOfWork->Solicitud()->FindOne($id);
            return response()->json($data, 200); // Status code here
        } catch (QueryException $e) {
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function RemoveOne(int $id): JsonResponse
    {
        try {
            $data = $this->_unitOfWork->Solicitud()->delete($id);
            return response()->json($data, 203); // Status code here
        } catch (QueryException $e) {
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function UpdateOne(int $id, Request $request): JsonResponse
    {
        try {
            $data = $this->_unitOfWork->Solicitud()->UpdateOne($id, $request->all());
            return response()->json($data, 201); // Status code here
        } catch (QueryException $e) {
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function GetAllRelation(): JsonResponse
    {
        try {
            $data = $this->_unitOfWork->Solicitud()->GetAllForSolicitud();
            return response()->json($data, 201); // Status code here
        } catch (QueryException $e) {
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function GetAllStats(): JsonResponse
    {
        try {
            $data = $this->_unitOfWork->Solicitud()->GetAllStats();
            return response()->json($data, 201); // Status code here
        } catch (QueryException $e) {
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function SaveDataRelation(Request $request): JsonResponse
    {
        try {
            $data = $this->_unitOfWork->Solicitud()->SaveRelation($request->all());

            // Check if SaveRelation returned an id or data that can be used.
            if ($data) {
                return response()->json([
                    "respuesta" => "Solicitud creada exitosamente",
                    "solicitud_id" => is_array($data) && isset($data['id']) ? $data['id'] : $data, //if data is an array, get the ID, else use the data returned.
                ], 201);
            } else {
                return response()->json(["error" => "No se pudo crear la solicitud"], 500);
            }
        } catch (QueryException $e) {
            Log::error('Error de consulta al crear solicitud: ' . $e->getMessage());
            return response()->json(["error" => "Error de base de datos: " . $e->getMessage()], 400);
        } catch (Exception $e) {
            Log::error('Error al crear solicitud: ' . $e->getMessage());
            return response()->json(["error" => "Error interno del servidor: " . $e->getMessage()], 500);
        }
    }
}
