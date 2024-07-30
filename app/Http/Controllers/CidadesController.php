<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade; // Certifique-se de incluir o modelo Cidade

class CidadesController extends Controller
{
    public function buscarTodasAsCidades()
    {
        try {
            $cidades = Cidade::all();
            return response()->json($cidades); 
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
