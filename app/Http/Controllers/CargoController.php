<?php

namespace App\Http\Controllers;

use App\Interface\ICargo;
use App\Interface\IUnitOfWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//modelos
//responses
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

//excepciones
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response as HttpResponse;

class CargoController extends Controller
{
    private IUnitOfWork $_unitOfWork;
    public function __construct(IUnitOfWork $unitOfWork)
    {
        $this->_unitOfWork = $unitOfWork;
    }
    public function GetAllPaginate() : LengthAwarePaginator | JsonResponse{
        try{
            return $this->_unitOfWork->Cargo()->GetAllPaginate();
        }catch(QueryException $e){
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function Save(Request $request) : JsonResponse{
        try{
            $this->_unitOfWork->Cargo()->SaveOne($request->all());
            return response()->json([
                'Mensaje' => $request->all()
            ], 201); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function GetOne(int $id) : JsonResponse{
        try{
            $data = $this->_unitOfWork->Cargo()->FindOne($id);
            return response()->json($data, 200); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function RemoveOne(int $id) : JsonResponse{
        try{
            $data = $this->_unitOfWork->Cargo()->delete($id);
            return response()->json($data, 203); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function UpdateOne(int $id, Request $request) : JsonResponse{
        try{
            $data = $this->_unitOfWork->Cargo()->UpdateOne($id, $request->all());
            return response()->json($data, 201); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
}
