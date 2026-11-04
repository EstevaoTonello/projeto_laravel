@php
    use Illuminate\Support\Facades\Schema;

    // Contagens seguras: se a tabela ainda não foi migrada, mostra 0
    $conta = fn (string $tabela, string $model) => Schema::hasTable($tabela) ? $model::count() : 0;

    $totalJogos           = $conta('jogos', \App\Models\Jogo::class);
    $totalCategorias      = $conta('categorias', \App\Models\Categoria::class);
    $totalPlataformas     = $conta('plataformas', \App\Models\Plataforma::class);
    $totalDesenvolvedoras = $conta('desenvolvedoras', \App\Models\Desenvolvedora::class);

    $recentes = Schema::hasTable('jogos')
        ? \App\Models\Jogo::with('plataforma')->latest()->take(5)->get()
        : collect();
@endphp

<x-layouts::app :title="__('Dashboard')">
<section class="gv" lang="pt-BR">
    <div class="gv-top">
        <div>
            <h1>Olá, {{ auth()->user()->name }}</h1>
            <p class="gv-sub">Resumo do seu catálogo de jogos.</p>
        </div>
        <a class="gv-btn gv-btn-primary" href="{{ route('jogos.create') }}">Novo jogo</a>
    </div>

    <div class="gv-stats">
        <a class="gv-stat" href="{{ route('jogos.index') }}"><span>Jogos</span><strong>{{ $totalJogos }}</strong></a>
        <a class="gv-stat" href="{{ route('categorias.index') }}"><span>Categorias</span><strong>{{ $totalCategorias }}</strong></a>
        <a class="gv-stat" href="{{ route('plataformas.index') }}"><span>Plataformas</span><strong>{{ $totalPlataformas }}</strong></a>
        <a class="gv-stat" href="{{ route('desenvolvedoras.index') }}"><span>Desenvolvedoras</span><strong>{{ $totalDesenvolvedoras }}</strong></a>
    </div>

    <div class="gv-cols">
        <div class="gv-panel">
            <h2>Últimos jogos</h2>
            @if ($recentes->isEmpty())
                <p class="gv-muted">Nenhum jogo cadastrado ainda.</p>
            @else
                <ul class="gv-list">
                    @foreach ($recentes as $jogo)
                        <li>
                            <a href="{{ route('jogos.show', $jogo) }}" class="gv-name">{{ $jogo->titulo }}</a>
                            <small>{{ $jogo->plataforma?->nome }}</small>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="gv-panel">
            <h2>Cadastrar</h2>
            <p class="gv-muted">Cadastre primeiro categoria, plataforma e desenvolvedora; depois o jogo.</p>
            <div class="gv-form-actions">
                <a class="gv-btn gv-btn-ghost" href="{{ route('categorias.create') }}">Categoria</a>
                <a class="gv-btn gv-btn-ghost" href="{{ route('plataformas.create') }}">Plataforma</a>
                <a class="gv-btn gv-btn-ghost" href="{{ route('desenvolvedoras.create') }}">Desenvolvedora</a>
            </div>
        </div>
    </div>
</section>
</x-layouts::app>
