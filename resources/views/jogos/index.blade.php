<x-layouts::app title="Jogos">
<section class="gv gv-wide" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Jogos</h1>
            <p class="gv-sub">Todos os jogos da sua coleção.</p>
        </div>
        <a class="gv-btn gv-btn-primary" href="{{ route('jogos.create') }}">Novo jogo</a>
    </div>

    @if (session('sucesso'))
        <p class="gv-status" role="status">{{ session('sucesso') }}</p>
    @endif

    <div class="gv-box">
        <table>
            <caption>Lista de jogos cadastrados</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Título</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Plataforma</th>
                    <th scope="col">Desenvolvedora</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Lançamento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jogos as $jogo)
                    <tr>
                        <td class="gv-id">#{{ $jogo->id }}</td>
                        <td class="gv-name">{{ $jogo->titulo }}</td>
                        <td><span class="gv-badge">{{ $jogo->categoria?->nome ?? '—' }}</span></td>
                        <td class="gv-muted">{{ $jogo->plataforma?->nome ?? '—' }}</td>
                        <td class="gv-muted">{{ $jogo->desenvolvedora?->nome ?? '—' }}</td>
                        <td>R$ {{ number_format($jogo->preco, 2, ',', '.') }}</td>
                        <td class="gv-muted">{{ $jogo->data_lancamento?->format('d/m/Y') }}</td>
                        <td>
                            <div class="gv-actions">
                                <a href="{{ route('jogos.show', $jogo) }}">Ver</a>
                                <a href="{{ route('jogos.edit', $jogo) }}">Editar</a>
                                <form action="{{ route('jogos.destroy', $jogo) }}" method="POST"
                                      onsubmit="return confirm('Deseja excluir este jogo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td class="gv-empty" colspan="8">Nenhum jogo cadastrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
</x-layouts::app>
