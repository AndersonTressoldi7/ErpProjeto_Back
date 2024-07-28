<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoasController extends Controller
{
    public function index()
    {
        try {
            $pessoas = Pessoa::all(); 
        } catch (\Exception $e) {
            throw(['error' => 'Erro ao listar pessoas!']);
        }
        return response()->json($pessoas, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function buscarPessoaPeloId($id)
    {
        try {
            $pessoa = Pessoa::where('id', $id)->first();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar pessoa pelo id!'], 500);
        }
    
        return response()->json($pessoa, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function alteraPessoa($id, Request $request)
    {
        try {
            $pessoa = Pessoa::findOrFail($id); 
            
            $pessoa->update($request->all());
    
            return response()->json(['success' => 'Sucesso ao atualizar pessoa!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar pessoa!' . $e], 500);
        }
    }

    public function cadastrarPessoa(Request $request)
    {
        try {
            $pessoa = new Pessoa();
            $pessoa::create($request->all());
            return response()->json(['success' => 'Pessoa cadastrada com sucesso!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao cadastrar pessoa!' . $e], 500);
        }
    }

    public function retornaProximoId()
    {
        try {
            $ultimaPessoa = Pessoa::orderBy('id', 'desc')->first();
            $proximoId = $ultimaPessoa->id + 1;
            return response()->json($proximoId, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar último ID: ' . $e->getMessage()], 500);
        }
    }

    public function buscarPessoaPeloCpfCnpj($cpfCnpj)
    {
        try {
            $pessoa = Pessoa::where('cpfCnpj', $cpfCnpj)->first();
            return response()->json($pessoa, 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar pessoa: ' . $e->getMessage()], 500);
        }
    }
}
