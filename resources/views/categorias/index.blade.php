<x-layouts::app title="Categorias">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Categorias</h1>
            <p class="gv-sub">Gêneros usados para organizar os jogos.</p>
        </div>
        <a class="gv-btn gv-btn-primary" href="{{ route('categorias.create') }}">Nova categoria</a>
    </div>

    @if (session('sucesso'))
        <p class="gv-status" role="status">{{ session('sucesso') }}</p>
    @endif

    <div class="gv-box">
        <table>
            <caption>Lista de categorias cadastradas</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td class="gv-id">#{{ $categoria->id }}</td>
                        <td class="gv-name">{{ $categoria->nome }}</td>
                        <td class="gv-muted">{{ $categoria->descricao ?? 'Sem descrição' }}</td>
                        <td>
                            <div class="gv-actions">
                                <a href="{{ route('categorias.show', $categoria) }}">Ver</a>
                                <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST"
                                      onsubmit="return confirm('Deseja excluir esta categoria?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td class="gv-empty" colspan="4">Nenhuma categoria cadastrada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
</x-layouts::app>
