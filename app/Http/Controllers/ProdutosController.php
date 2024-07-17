<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    
    public function index()
    {
        try{
        $produtos = Produto::all(); 
        } catch(\Exception $e){
            throw(['error' => 'Erro ao listar produtos!']);
        }
        return response()->json($produtos, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function indexProdutoEspecifico($id)
    {
        try {
            $produto = Produto::where('id', $id)->first();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar produto pelo id!'], 500);
        }
    
        return response()->json($produto, 200, [], JSON_UNESCAPED_UNICODE);
    }
}    
