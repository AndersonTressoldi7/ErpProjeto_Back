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

    public function buscarProdutoPeloId($id)
    {
        try {
            $produto = Produto::where('id', $id)->first();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar produto pelo id!'], 500);
        }
    
        return response()->json($produto, 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function AlteraProduto($id, Request $request)
    {
        try {
            $produto = Produto::findOrFail($id); 
            
            $produto->update($request->all());
    
            return response()->json(['sucess' => 'Sucesso ao cadastrar produto!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar produto!' . $e], 500);
        }
    }

    public function CadastrarProduto(Request $request){
        try
        {
            $produto = new Produto();
            $produto::create($request->all());
          return response()->json(['Sucesso' => 'Produto cadastrado com sucesso!'], 200);

        }   catch(\Exception $e){
            return response()->json(['error' => 'Erro ao cadastrar produto!' . $e], 500);
        }
    }
    public function retornaProximoId(){
        try {
            $ultimoProduto = Produto::orderBy('id', 'desc')->first();
            $proximoId = $ultimoProduto->id + 1;
            return response()->json($proximoId, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar último ID: ' . $e->getMessage()], 500);
        }
    }

    public function buscarProdutoPeloCodigo($codigo){
        try{
            $produto = Produto::where('codigoBarras', $codigo)->first();
            return response()->json($produto, 200, [], JSON_UNESCAPED_UNICODE);
        }
        catch (\Exception $e){
            return response()->json(['error' => 'Erro ao buscar produto: ' . $e->getMessage()], 500);
        }
    }
    
}    
