<x-layouts::app title="Detalhes da desenvolvedora">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Detalhes da desenvolvedora</h1>
            <p class="gv-sub">Informações cadastradas.</p>
        </div>
    </div>

    <div class="gv-panel">
        <dl class="gv-detail">
            <dt>Código</dt>
            <dd>#{{ $desenvolvedora->id }}</dd>
            <dt>Nome</dt>
            <dd>{{ $desenvolvedora->nome }}</dd>
            <dt>País</dt>
            <dd>{{ $desenvolvedora->pais }}</dd>
            <dt>Ano de fundação</dt>
            <dd>{{ $desenvolvedora->ano_fundacao }}</dd>
        </dl>

        <div class="gv-form-actions">
            <a href="{{ route('desenvolvedoras.edit', $desenvolvedora) }}" class="gv-btn gv-btn-primary">Editar</a>
            <a href="{{ route('desenvolvedoras.index') }}" class="gv-btn gv-btn-ghost">Voltar</a>
        </div>
    </div>
</section>
</x-layouts::app>
