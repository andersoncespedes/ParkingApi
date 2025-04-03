<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interface\IUnitOfWork;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    private IUnitOfWork $_unitOfWork;
    public function __construct(IUnitOfWork $unitOfWork)
    {
        $this->_unitOfWork = $unitOfWork;
    }
    public function GetAllPaginate() : LengthAwarePaginator | JsonResponse{
        try{
            return $this->_unitOfWork->Parroquia()->GetAllPaginate();
        }catch(QueryException $e){
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function GetAllPaginateByStats() : Collection | JsonResponse{
        try{
            return response()->json($this->_unitOfWork->Parroquia()->GetByParroquiaStats(),200);
        }catch(QueryException $e){
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function GetAllPaginateByYear() : Collection | JsonResponse{
        try{
            return response()->json($this->_unitOfWork->Parroquia()->GetByParroquiaByYear(),200);
        }catch(QueryException $e){
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function Save(Request $request) : JsonResponse{
        try{
            $this->_unitOfWork->Parroquia()->SaveOne($request->all());
            return response()->json([
                'Mensaje' => $request->all()
            ], 201); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al cargar los datos"], 400);
        }
    }
    public function GetOne(int $id) : JsonResponse{
        try{
            $data = $this->_unitOfWork->Parroquia()->FindOne($id);
            return response()->json($data, 200); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function RemoveOne(int $id) : JsonResponse{
        try{
            $data = $this->_unitOfWork->Parroquia()->delete($id);
            return response()->json($data, 203); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
    public function UpdateOne(int $id, Request $request) : JsonResponse{
        try{
            $data = $this->_unitOfWork->Parroquia()->UpdateOne($id, $request->all());
            return response()->json($data, 201); // Status code here
        }catch(QueryException $e){
            return response()->json(["error" => "error al buscar los datos"], 404);
        }
    }
}
