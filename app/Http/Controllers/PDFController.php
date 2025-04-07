<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interface\IPdf;
use App\Interface\IUnitOfWork;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    private IPdf $_pdf;
    private IUnitOfWork $_unitOfWork;
    public function __construct(IPdf $pdf, IUnitOfWork $UnitOfWork)
    {
        $this->_pdf = $pdf;
        $this->_unitOfWork = $UnitOfWork;
    }
    public function GenerarPdf(Request $request, int $id)
    {
        $datos = $this->_unitOfWork->Solicitud()->FindOne($id);
        $data = $this->_pdf->Body($datos, $id);
        return response()->json($data);
    }
    public function GenerarPdfMemorandum(Request $request)
    {
        $data = $this->_pdf->BodyMemorandum($request->all(), $request->tipo);
        return response()->json($data);
    }
}
