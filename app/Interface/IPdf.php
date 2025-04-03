<?php
namespace App\Interface;
use Illuminate\Http\Response;

Interface IPdf{
    function Body($data, $tipo) : null;
    function BodyMemorandum($data, $tipo) : null;
}
