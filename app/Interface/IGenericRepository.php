<?php
namespace App\Interface;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface IGenericRepository{
    public function GetAllPaginate();
    public function SaveOne(array $data): void;
    public function UpdateOne(int $id, array $data ): void;
    public function FindOne(int $id): object;
    public function delete(int $id): bool;
}
