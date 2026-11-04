<x-layouts::app title="Editar categoria">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Editar categoria</h1>
            <p class="gv-sub">Altere os dados de {{ $categoria->nome }}.</p>
        </div>
    </div>

    <div class="gv-panel gv-form">
        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @method('PUT')
            @include('categorias.form')
        </form>
    </div>
</section>
</x-layouts::app>
