<x-layouts::app title="Detalhes do jogo">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>{{ $jogo->titulo }}</h1>
            <p class="gv-sub">Informações cadastradas.</p>
        </div>
    </div>

    <div class="gv-panel">
        <dl class="gv-detail">
            <dt>Código</dt>
            <dd>#{{ $jogo->id }}</dd>
            <dt>Título</dt>
            <dd>{{ $jogo->titulo }}</dd>
            <dt>Descrição</dt>
            <dd>{{ $jogo->descricao ?? 'Sem descrição' }}</dd>
            <dt>Preço</dt>
            <dd>R$ {{ number_format($jogo->preco, 2, ',', '.') }}</dd>
            <dt>Lançamento</dt>
            <dd>{{ $jogo->data_lancamento?->format('d/m/Y') }}</dd>
            <dt>Categoria</dt>
            <dd>{{ $jogo->categoria?->nome ?? '—' }}</dd>
            <dt>Plataforma</dt>
            <dd>{{ $jogo->plataforma?->nome ?? '—' }}</dd>
            <dt>Desenvolvedora</dt>
            <dd>{{ $jogo->desenvolvedora?->nome ?? '—' }}</dd>
        </dl>

        <div class="gv-form-actions">
            <a href="{{ route('jogos.edit', $jogo) }}" class="gv-btn gv-btn-primary">Editar</a>
            <a href="{{ route('jogos.index') }}" class="gv-btn gv-btn-ghost">Voltar</a>
        </div>
    </div>
</section>
</x-layouts::app>
