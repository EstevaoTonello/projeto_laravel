<x-layouts::app title="Editar jogo">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Editar jogo</h1>
            <p class="gv-sub">Altere os dados de {{ $jogo->titulo }}.</p>
        </div>
    </div>

    <div class="gv-panel gv-form gv-form-wide">
        <form action="{{ route('jogos.update', $jogo) }}" method="POST">
            @method('PUT')
            @include('jogos.form')
        </form>
    </div>
</section>
</x-layouts::app>
