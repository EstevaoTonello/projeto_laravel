<?php

namespace App\Http\Controllers;

use App\Models\Desenvolvedora;
use Illuminate\Http\Request;

class DesenvolvedoraController extends Controller
{
    private function validar(Request $request)
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'ano_fundacao' => ['required', 'integer', 'between:1800,'.date('Y')],
        ], [
            'nome.required' => 'Informe o nome da desenvolvedora.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.',
            'pais.required' => 'Informe o país.',
            'pais.max' => 'O país deve ter no máximo 255 caracteres.',
            'ano_fundacao.required' => 'Informe o ano de fundação.',
            'ano_fundacao.integer' => 'O ano deve ser um número inteiro.',
            'ano_fundacao.between' => 'Informe um ano entre 1800 e o ano atual.',
        ]);
    }

    public function index()
    {
        $desenvolvedoras = Desenvolvedora::orderBy('nome')->get();

        return view('desenvolvedoras.index', compact('desenvolvedoras'));
    }

    public function create()
    {
        return view('desenvolvedoras.create');
    }

    public function store(Request $request)
    {
        Desenvolvedora::create($this->validar($request));

        return redirect()->route('desenvolvedoras.index')
            ->with('sucesso', 'Desenvolvedora cadastrada com sucesso!');
    }

    public function show(Desenvolvedora $desenvolvedora)
    {
        return view('desenvolvedoras.show', compact('desenvolvedora'));
    }

    public function edit(Desenvolvedora $desenvolvedora)
    {
        return view('desenvolvedoras.edit', compact('desenvolvedora'));
    }

    public function update(Request $request, Desenvolvedora $desenvolvedora)
    {
        $desenvolvedora->update($this->validar($request));

        return redirect()->route('desenvolvedoras.index')
            ->with('sucesso', 'Desenvolvedora atualizada com sucesso!');
    }

    public function destroy(Desenvolvedora $desenvolvedora)
    {
        $desenvolvedora->delete();

        return redirect()->route('desenvolvedoras.index')
            ->with('sucesso', 'Desenvolvedora excluída com sucesso!');
    }
}
