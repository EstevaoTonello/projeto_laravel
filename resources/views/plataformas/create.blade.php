<x-layouts::app title="Nova plataforma">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Nova plataforma</h1>
            <p class="gv-sub">Cadastre uma nova plataforma.</p>
        </div>
    </div>

    <div class="gv-panel gv-form">
        <form action="{{ route('plataformas.store') }}" method="POST">
            @include('plataformas.form')
        </form>
    </div>
</section>
</x-layouts::app>
