<x-layouts::app title="Editar desenvolvedora">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Editar desenvolvedora</h1>
            <p class="gv-sub">Altere os dados de {{ $desenvolvedora->nome }}.</p>
        </div>
    </div>

    <div class="gv-panel gv-form">
        <form action="{{ route('desenvolvedoras.update', $desenvolvedora) }}" method="POST">
            @method('PUT')
            @include('desenvolvedoras.form')
        </form>
    </div>
</section>
</x-layouts::app>
