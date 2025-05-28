<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use App\Models\TipoSolicitacao;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function formulario()
    {
        return view('formulario-declaracao');
    }

    public function gerarPDF(Estudante $estudante, $tipo)
    {
         // você pode passar dados do formulário aqui

         $tipo =TipoSolicitacao::find($tipo);
         if($tipo){

             $pdf = Pdf::loadView('pdf.declaracao', compact(['estudante','tipo']))->setPaper('a4', 'portrait');
             return $pdf->download('documento-'.$tipo->id.'.pdf');
         }


    }
}
