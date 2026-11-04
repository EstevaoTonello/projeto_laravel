<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Desenvolvedora;
use App\Models\Jogo;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    private function validar(Request $request)
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'data_lancamento' => ['required', 'date'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'desenvolvedora_id' => ['required', 'exists:desenvolvedoras,id'],
            'plataforma_id' => ['required', 'exists:plataformas,id'],
        ], [
            'titulo.required' => 'Informe o título do jogo.',
            'titulo.max' => 'O título deve ter no máximo 255 caracteres.',
            'descricao.max' => 'A descrição deve ter no máximo 255 caracteres.',
            'preco.required' => 'Informe o preço.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço não pode ser negativo.',
            'data_lancamento.required' => 'Informe a data de lançamento.',
            'data_lancamento.date' => 'Informe uma data válida.',
            'categoria_id.required' => 'Selecione uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',
            'desenvolvedora_id.required' => 'Selecione uma desenvolvedora.',
            'desenvolvedora_id.exists' => 'A desenvolvedora selecionada não existe.',
            'plataforma_id.required' => 'Selecione uma plataforma.',
            'plataforma_id.exists' => 'A plataforma selecionada não existe.',
        ]);
    }

    private function listas(): array
    {
        return [
            'categorias' => Categoria::orderBy('nome')->get(),
            'desenvolvedoras' => Desenvolvedora::orderBy('nome')->get(),
            'plataformas' => Plataforma::orderBy('nome')->get(),
        ];
    }

    public function index()
    {
        $jogos = Jogo::with(['categoria', 'desenvolvedora', 'plataforma'])
            ->orderBy('titulo')
            ->get();

        return view('jogos.index', compact('jogos'));
    }

    public function create()
    {
        return view('jogos.create', $this->listas());
    }

    public function store(Request $request)
    {
        Jogo::create($this->validar($request));

        return redirect()->route('jogos.index')
            ->with('sucesso', 'Jogo cadastrado com sucesso!');
    }

    public function show(Jogo $jogo)
    {
        $jogo->load(['categoria', 'desenvolvedora', 'plataforma']);

        return view('jogos.show', compact('jogo'));
    }

    public function edit(Jogo $jogo)
    {
        return view('jogos.edit', array_merge(['jogo' => $jogo], $this->listas()));
    }

    public function update(Request $request, Jogo $jogo)
    {
        $jogo->update($this->validar($request));

        return redirect()->route('jogos.index')
            ->with('sucesso', 'Jogo atualizado com sucesso!');
    }

    public function destroy(Jogo $jogo)
    {
        $jogo->delete();

        return redirect()->route('jogos.index')
            ->with('sucesso', 'Jogo excluído com sucesso!');
    }
}
