<x-layouts::app title="Novo jogo">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Novo jogo</h1>
            <p class="gv-sub">Cadastre um jogo na sua coleção.</p>
        </div>
    </div>

    <div class="gv-panel gv-form gv-form-wide">
        <form action="{{ route('jogos.store') }}" method="POST">
            @include('jogos.form')
        </form>
    </div>
</section>
</x-layouts::app>
