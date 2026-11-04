<x-layouts::app title="Detalhes da plataforma">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Detalhes da plataforma</h1>
            <p class="gv-sub">Informações cadastradas.</p>
        </div>
    </div>

    <div class="gv-panel">
        <dl class="gv-detail">
            <dt>Código</dt>
            <dd>#{{ $plataforma->id }}</dd>
            <dt>Nome</dt>
            <dd>{{ $plataforma->nome }}</dd>
            <dt>Fabricante</dt>
            <dd>{{ $plataforma->fabricante }}</dd>
        </dl>

        <div class="gv-form-actions">
            <a href="{{ route('plataformas.edit', $plataforma) }}" class="gv-btn gv-btn-primary">Editar</a>
            <a href="{{ route('plataformas.index') }}" class="gv-btn gv-btn-ghost">Voltar</a>
        </div>
    </div>
</section>
</x-layouts::app>
