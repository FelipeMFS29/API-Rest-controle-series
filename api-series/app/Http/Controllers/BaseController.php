<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//controller base para evitar repetição de código pois o controller de series e episodios é igual
abstract class BaseController
{
    protected $classe;
    
    public function index(Request $request)
    {
        //recurso de paginação do lumen
        //precisa definir no model quantos itens quer retornar por página
        //o padrão é 15
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json('', 204);
        }
        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json([
                'erro' =>  'Recurso não encontrado'
            ], 404);
        }
        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        return response()->json('', 204);
    }
}
