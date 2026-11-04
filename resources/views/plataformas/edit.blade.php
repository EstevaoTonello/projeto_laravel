<x-layouts::app title="Editar plataforma">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Editar plataforma</h1>
            <p class="gv-sub">Altere os dados de {{ $plataforma->nome }}.</p>
        </div>
    </div>

    <div class="gv-panel gv-form">
        <form action="{{ route('plataformas.update', $plataforma) }}" method="POST">
            @method('PUT')
            @include('plataformas.form')
        </form>
    </div>
</section>
</x-layouts::app>
