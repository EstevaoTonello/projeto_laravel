<x-layouts::app title="Detalhes da categoria">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Detalhes da categoria</h1>
            <p class="gv-sub">Informações cadastradas.</p>
        </div>
    </div>

    <div class="gv-panel">
        <dl class="gv-detail">
            <dt>Código</dt>
            <dd>#{{ $categoria->id }}</dd>
            <dt>Nome</dt>
            <dd>{{ $categoria->nome }}</dd>
            <dt>Descrição</dt>
            <dd>{{ $categoria->descricao ?? 'Sem descrição' }}</dd>
        </dl>

        <div class="gv-form-actions">
            <a href="{{ route('categorias.edit', $categoria) }}" class="gv-btn gv-btn-primary">Editar</a>
            <a href="{{ route('categorias.index') }}" class="gv-btn gv-btn-ghost">Voltar</a>
        </div>
    </div>
</section>
</x-layouts::app>
