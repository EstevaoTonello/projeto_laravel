<x-layouts::app title="Plataformas">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Plataformas</h1>
            <p class="gv-sub">Consoles e sistemas onde os jogos rodam.</p>
        </div>
        <a class="gv-btn gv-btn-primary" href="{{ route('plataformas.create') }}">Nova plataforma</a>
    </div>

    @if (session('sucesso'))
        <p class="gv-status" role="status">{{ session('sucesso') }}</p>
    @endif

    <div class="gv-box">
        <table>
            <caption>Lista de plataformas cadastradas</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plataformas as $plataforma)
                    <tr>
                        <td class="gv-id">#{{ $plataforma->id }}</td>
                        <td class="gv-name">{{ $plataforma->nome }}</td>
                        <td class="gv-muted">{{ $plataforma->fabricante }}</td>
                        <td>
                            <div class="gv-actions">
                                <a href="{{ route('plataformas.show', $plataforma) }}">Ver</a>
                                <a href="{{ route('plataformas.edit', $plataforma) }}">Editar</a>
                                <form action="{{ route('plataformas.destroy', $plataforma) }}" method="POST"
                                      onsubmit="return confirm('Deseja excluir esta plataforma? Os jogos dela também serão excluídos.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td class="gv-empty" colspan="4">Nenhuma plataforma cadastrada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
</x-layouts::app>
