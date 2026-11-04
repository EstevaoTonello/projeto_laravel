<x-layouts::app title="Nova desenvolvedora">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Nova desenvolvedora</h1>
            <p class="gv-sub">Cadastre um novo estúdio.</p>
        </div>
    </div>

    <div class="gv-panel gv-form">
        <form action="{{ route('desenvolvedoras.store') }}" method="POST">
            @include('desenvolvedoras.form')
        </form>
    </div>
</section>
</x-layouts::app>
