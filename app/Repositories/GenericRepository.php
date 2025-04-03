<?php

namespace App\Repositories;

use App\Interface\IGenericRepository;
use Illuminate\Http\Request;

class GenericRepository implements IGenericRepository
{
    private object $_context;
    public function __construct(object $data)
    {
        $this->_context = $data;
    }
    public function GetAllPaginate()
    {
        return $this->_context->paginate(15);
    }
    public function SaveOne(array $data): void
    {
        $this->_context->create($data);
    }
    public function UpdateOne(int $id, array $data): void
    {
        $this->_context->where("id", $id)->update($data);
    }
    public function FindOne(int $id): object
    {
        return $this->_context->findOrFail($id);
    }
    public function delete(int $id): bool
    {
        $entity = $this->_context->findOrFail($id);
        if (is_null($entity)) {
            return false;
        }
        $entity->delete();
        return true;
    }
}
