<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            color-scheme: dark;
            --bg: #0f1224;
            --panel: #181c35;
            --panel-2: #1f2444;
            --line: #2b3160;
            --text: #eceffd;
            --muted: #9aa3cc;
            --coral: #ff5d73;
            --cyan: #3dd9eb;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: var(--bg); color: var(--text); font-family: 'Inter', system-ui, sans-serif; line-height: 1.6; min-height: 100vh; }
        a { color: inherit; text-decoration: none; }
        a:focus-visible { outline: 3px solid var(--cyan); outline-offset: 3px; }
        .wrap { width: min(1080px, 100% - 2.5rem); margin-inline: auto; }

        .topbar { display: flex; justify-content: space-between; align-items: center; padding: 1.5rem 0; }
        .brand { font-family: 'Chakra Petch', sans-serif; font-weight: 700; font-size: 1.3rem; letter-spacing: .01em; }
        .brand b { color: var(--coral); }
        .nav { display: flex; gap: .25rem; flex-wrap: wrap; font-size: .95rem; }
        .nav a { padding: .45rem .85rem; border-radius: 6px; color: var(--muted); }
        .nav a:hover { color: var(--text); background: var(--panel); }
        .nav a.outline { border: 1px solid var(--line); color: var(--text); }

        .hero { display: grid; grid-template-columns: 1.1fr .9fr; gap: 3.5rem; align-items: center; padding: 3.5rem 0 5rem; }
        h1 { font-family: 'Chakra Petch', sans-serif; font-size: clamp(2.3rem, 5vw, 3.7rem); line-height: 1.05; font-weight: 700; margin-bottom: 1.25rem; }
        .lead { color: var(--muted); font-size: 1.1rem; max-width: 46ch; margin-bottom: 2rem; }
        .actions { display: flex; gap: .75rem; flex-wrap: wrap; }
        .btn { display: inline-block; padding: .8rem 1.4rem; border-radius: 8px; font-weight: 500; border: 1px solid transparent; transition: background .15s, border-color .15s; }
        .btn-primary { background: var(--coral); color: #1a0a10; }
        .btn-primary:hover { background: #ff7b8d; }
        .btn-ghost { border-color: var(--line); background: var(--panel); }
        .btn-ghost:hover { border-color: var(--cyan); }

        /* Prévia da biblioteca */
        .library { background: var(--panel); border: 1px solid var(--line); border-radius: 14px; overflow: hidden; }
        .library-head { padding: 1rem 1.25rem; border-bottom: 1px solid var(--line); font-family: 'Chakra Petch', sans-serif; font-weight: 700; display: flex; justify-content: space-between; }
        .library-head span { color: var(--cyan); font-family: 'Inter', sans-serif; font-weight: 500; font-size: .85rem; }
        .game { display: grid; grid-template-columns: 2.8rem 1fr auto; gap: .9rem; align-items: center; padding: .85rem 1.25rem; border-bottom: 1px solid var(--line); }
        .game:last-child { border-bottom: 0; }
        .cover { width: 2.8rem; height: 2.8rem; border-radius: 8px; background: var(--panel-2); border: 1px solid var(--line); display: grid; place-items: center; font-family: 'Chakra Petch', sans-serif; font-weight: 700; color: var(--cyan); }
        .game:nth-child(3) .cover { color: var(--coral); }
        .game small { display: block; color: var(--muted); font-size: .8rem; }
        .tag { font-size: .75rem; padding: .15rem .6rem; border: 1px solid var(--line); border-radius: 4px; color: var(--muted); }

        /* Tabelas do projeto */
        .sections { border-top: 1px solid var(--line); padding: 3.5rem 0 4rem; }
        .sections h2 { font-family: 'Chakra Petch', sans-serif; font-size: 1.6rem; margin-bottom: 2rem; }
        .grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; }
        .card { display: block; background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 1.4rem; }
        .card h3 { font-family: 'Chakra Petch', sans-serif; font-size: 1.15rem; margin-bottom: .35rem; }
        .card p { color: var(--muted); font-size: .92rem; }

        footer { border-top: 1px solid var(--line); padding: 1.75rem 0; color: var(--muted); font-size: .88rem; }

        @media (max-width: 860px) {
            .hero { grid-template-columns: 1fr; gap: 2.5rem; padding-top: 2rem; }
            .grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 480px) { .grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="wrap">
        <header class="topbar">
            <a href="/" class="brand">Game<b>Vault</b></a>

            <nav class="nav">
                @if (Route::has('jogos.index'))<a href="{{ route('jogos.index') }}">Jogos</a>@endif
                @if (Route::has('plataformas.index'))<a href="{{ route('plataformas.index') }}">Plataformas</a>@endif
                @if (Route::has('desenvolvedoras.index'))<a href="{{ route('desenvolvedoras.index') }}">Desenvolvedoras</a>@endif

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="outline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="outline">Criar conta</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </header>

        <main>
            <section class="hero">
                <div>
                    <h1>Sua coleção de jogos, organizada.</h1>
                    <p class="lead">Registre seus jogos com categoria, plataforma e desenvolvedora, e encontre tudo em segundos.</p>
                    <div class="actions">
                        @if (Route::has('jogos.index'))
                            <a href="{{ route('jogos.index') }}" class="btn btn-primary">Ver jogos</a>
                        @endif
                        @if (Route::has('jogos.create'))
                            <a href="{{ route('jogos.create') }}" class="btn btn-ghost">Adicionar jogo</a>
                        @endif
                    </div>
                </div>

                <div class="library" aria-hidden="true">
                    <div class="library-head">Biblioteca <span>3 jogos</span></div>
                    <div class="game"><div class="cover">Z</div><div>Zelda<small>Aventura · Nintendo</small></div><span class="tag">Switch</span></div>
                    <div class="game"><div class="cover">F</div><div>FIFA<small>Esporte · EA Sports</small></div><span class="tag">PS5</span></div>
                    <div class="game"><div class="cover">C</div><div>Celeste<small>Plataforma · Maddy Makes Games</small></div><span class="tag">PC</span></div>
                </div>
            </section>

            <section class="sections">
                <h2>Gerencie seu catálogo</h2>
                <div class="grid">
                    <div class="card"><h3>Jogos</h3><p>Cadastre e edite os jogos da coleção.</p></div>
                    <div class="card"><h3>Categorias</h3><p>Aventura, RPG, esporte e outros gêneros.</p></div>
                    <div class="card"><h3>Plataformas</h3><p>PC, PlayStation, Xbox, Switch e mais.</p></div>
                    <div class="card"><h3>Desenvolvedoras</h3><p>Os estúdios por trás de cada jogo.</p></div>
                </div>
            </section>
        </main>

        <footer>&copy; {{ date('Y') }} GameVault. Feito com Laravel.</footer>
    </div>
</body>
</html>