<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    private function validar(Request $request)
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'fabricante' => ['required', 'string', 'max:255'],
        ], [
            'nome.required' => 'Informe o nome da plataforma.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.',
            'fabricante.required' => 'Informe o fabricante.',
            'fabricante.max' => 'O fabricante deve ter no máximo 255 caracteres.',
        ]);
    }

    public function index()
    {
        $plataformas = Plataforma::orderBy('nome')->get();

        return view('plataformas.index', compact('plataformas'));
    }

    public function create()
    {
        return view('plataformas.create');
    }

    public function store(Request $request)
    {
        Plataforma::create($this->validar($request));

        return redirect()->route('plataformas.index')
            ->with('sucesso', 'Plataforma cadastrada com sucesso!');
    }

    public function show(Plataforma $plataforma)
    {
        return view('plataformas.show', compact('plataforma'));
    }

    public function edit(Plataforma $plataforma)
    {
        return view('plataformas.edit', compact('plataforma'));
    }

    public function update(Request $request, Plataforma $plataforma)
    {
        $plataforma->update($this->validar($request));

        return redirect()->route('plataformas.index')
            ->with('sucesso', 'Plataforma atualizada com sucesso!');
    }

    public function destroy(Plataforma $plataforma)
    {
        $plataforma->delete();

        return redirect()->route('plataformas.index')
            ->with('sucesso', 'Plataforma excluída com sucesso!');
    }
}
