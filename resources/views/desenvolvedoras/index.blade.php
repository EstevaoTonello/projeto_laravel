<x-layouts::app title="Desenvolvedoras">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Desenvolvedoras</h1>
            <p class="gv-sub">Os estúdios por trás de cada jogo.</p>
        </div>
        <a class="gv-btn gv-btn-primary" href="{{ route('desenvolvedoras.create') }}">Nova desenvolvedora</a>
    </div>

    @if (session('sucesso'))
        <p class="gv-status" role="status">{{ session('sucesso') }}</p>
    @endif

    <div class="gv-box">
        <table>
            <caption>Lista de desenvolvedoras cadastradas</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">País</th>
                    <th scope="col">Ano de fundação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($desenvolvedoras as $desenvolvedora)
                    <tr>
                        <td class="gv-id">#{{ $desenvolvedora->id }}</td>
                        <td class="gv-name">{{ $desenvolvedora->nome }}</td>
                        <td class="gv-muted">{{ $desenvolvedora->pais }}</td>
                        <td class="gv-muted">{{ $desenvolvedora->ano_fundacao }}</td>
                        <td>
                            <div class="gv-actions">
                                <a href="{{ route('desenvolvedoras.show', $desenvolvedora) }}">Ver</a>
                                <a href="{{ route('desenvolvedoras.edit', $desenvolvedora) }}">Editar</a>
                                <form action="{{ route('desenvolvedoras.destroy', $desenvolvedora) }}" method="POST"
                                      onsubmit="return confirm('Deseja excluir esta desenvolvedora? Os jogos dela também serão excluídos.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td class="gv-empty" colspan="5">Nenhuma desenvolvedora cadastrada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
</x-layouts::app>
