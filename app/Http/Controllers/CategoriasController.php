<?php

namespace App\Http\Controllers;

use App\Models\Categorias; // 
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    private function validar(Request $request) // 
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'descricao' => ['nullable', 'string', 'max:1000'], // estava faltando a regra em si
        ], [
            'nome.required' => 'Informe o nome da categoria.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres.',
            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max' => 'A descrição deve ter no máximo 1000 caracteres.',
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all(); // era "Categorias::all()"
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categoria::create($this->validar($request)); // era "categoria::create"

        return redirect()->route('categorias.index')
            ->with('sucesso', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria) // tipo e nome do parâmetro corrigidos
    {
        return view('categorias.show', compact('categoria')); // corrigido "categarias.creat"
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria) // era "categorias $categorias"
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria) // corrigido
    {
        $categoria->update($this->validar($request)); // faltava o "$"

        return redirect()->route('categorias.index')
            ->with('sucesso', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria) // corrigido
    {
        $categoria->delete(); // faltava o "$"

        return redirect()->route('categorias.index')
            ->with('sucesso', 'Categoria excluída com sucesso!');
    }
}