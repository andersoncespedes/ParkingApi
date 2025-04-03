<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupApiController extends Controller
{
    public function crearBackup(Request $request)
    {
        Artisan::call('backup:run');
        return response()->json(['mensaje' => 'Copia de seguridad creada con éxito']);
    }
    public function obtenerListaBackups(Request $request)
    {
        $rutaBackups = config('backup.backup.destination.path');
        $archivos = Storage::disk(config('backup.backup.destination.disks')[0])->files($rutaBackups);
        return response()->json($archivos);
    }
}
