<x-layouts::app title="Nova categoria">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Nova categoria</h1>
            <p class="gv-sub">Cadastre um novo gênero para seus jogos.</p>
        </div>
    </div>

    <div class="gv-panel gv-form">
        <form action="{{ route('categorias.store') }}" method="POST">
            @include('categorias.form')
        </form>
    </div>
</section>
</x-layouts::app>
