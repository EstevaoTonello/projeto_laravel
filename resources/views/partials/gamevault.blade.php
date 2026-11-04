<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500;700&display=swap" rel="stylesheet">

<style>
    /* ===== GameVault: estilo compartilhado (dashboard e categorias) ===== */
    .gv {
        --gv-panel: #ffffff;
        --gv-head: #f3f4fa;
        --gv-line: #e1e4f0;
        --gv-text: #161a33;
        --gv-muted: #626a8f;
        --gv-coral: #ff5d73;
        --gv-cyan: #0e9fb3;
        --gv-danger: #d9304a;
        max-width: 1000px;
        margin-inline: auto;
        color: var(--gv-text);
    }
    .dark .gv {
        --gv-panel: #181c35;
        --gv-head: #1f2444;
        --gv-line: #2b3160;
        --gv-text: #eceffd;
        --gv-muted: #9aa3cc;
        --gv-cyan: #3dd9eb;
        --gv-danger: #ff7b8d;
    }
    .dark .gv-body { background: #0f1224; }
    .dark .gv-sidebar { background: #141831 !important; border-color: #2b3160 !important; }

    .gv a:focus-visible, .gv button:focus-visible, .gv input:focus-visible, .gv textarea:focus-visible {
        outline: 3px solid var(--gv-cyan); outline-offset: 2px;
    }
    .gv-top { display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
    .gv h1 { font-family: 'Chakra Petch', sans-serif; font-size: 1.85rem; font-weight: 700; line-height: 1.15; }
    .gv h2 { font-family: 'Chakra Petch', sans-serif; font-size: 1.15rem; font-weight: 700; }
    .gv-sub { color: var(--gv-muted); font-size: .93rem; margin-top: .2rem; }

    /* Botões */
    .gv-btn { display: inline-block; font: inherit; font-size: .93rem; font-weight: 500; cursor: pointer; text-decoration: none;
              padding: .65rem 1.2rem; border-radius: 8px; border: 1px solid transparent; transition: background .15s, border-color .15s; }
    .gv-btn-primary, a.gv-btn-primary { background: #ff5d73 !important; color: #1a0a10 !important; border-color: transparent !important; }
    .gv-btn-primary:hover, a.gv-btn-primary:hover { background: #ff7b8d !important; }
    .gv-btn-ghost { background: transparent; border-color: var(--gv-line); color: var(--gv-text); }
    .gv-btn-ghost:hover { border-color: var(--gv-cyan); }

    /* Aviso de sucesso */
    .gv-status { background: color-mix(in srgb, var(--gv-cyan) 14%, transparent); border: 1px solid var(--gv-cyan);
                 border-radius: 8px; padding: .7rem 1rem; margin-bottom: 1.25rem; font-size: .93rem; }

    /* Caixa / painel */
    .gv-box { background: var(--gv-panel); border: 1px solid var(--gv-line); border-radius: 12px; overflow-x: auto; }
    .gv-panel { background: var(--gv-panel); border: 1px solid var(--gv-line); border-radius: 12px; padding: 1.5rem; }

    /* Tabela */
    .gv table { width: 100%; border-collapse: collapse; min-width: 560px; }
    .gv caption { position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0); white-space: nowrap; }
    .gv th { background: var(--gv-head); text-align: left; font-size: .78rem; text-transform: uppercase; letter-spacing: .06em;
             color: var(--gv-muted); padding: .85rem 1.1rem; font-weight: 600; }
    .gv td { padding: .95rem 1.1rem; border-top: 1px solid var(--gv-line); vertical-align: middle; }
    .gv tbody tr:hover { background: color-mix(in srgb, var(--gv-head) 60%, transparent); }
    .gv-id { color: var(--gv-muted); font-variant-numeric: tabular-nums; width: 5rem; }
    .gv-name { font-weight: 600; }
    .gv-muted { color: var(--gv-muted); }
    .gv-empty { text-align: center; color: var(--gv-muted); padding: 2.5rem 1rem !important; }

    .gv-actions { display: flex; gap: .4rem; align-items: center; flex-wrap: wrap; }
    .gv-actions form { margin: 0; }
    .gv-actions a, .gv-actions button { font: inherit; font-size: .85rem; cursor: pointer; text-decoration: none; padding: .3rem .75rem;
        border-radius: 6px; border: 1px solid var(--gv-line); background: transparent; color: var(--gv-text); transition: border-color .15s; }
    .gv-actions a:hover { border-color: var(--gv-cyan); }
    .gv-actions button { color: var(--gv-danger); }
    .gv-actions button:hover { border-color: var(--gv-danger); }

    /* Formulário */
    .gv-form { max-width: 560px; }
    .gv-field { margin-bottom: 1.25rem; }
    .gv-field label { display: block; font-weight: 500; font-size: .93rem; margin-bottom: .4rem; }
    .gv-field input, .gv-field textarea { width: 100%; font: inherit; color: var(--gv-text); background: var(--gv-head);
        border: 1px solid var(--gv-line); border-radius: 8px; padding: .7rem .9rem; }
    .gv-field input:focus, .gv-field textarea:focus { border-color: var(--gv-cyan); }
    .gv-field textarea { resize: vertical; }
    .gv-hint { color: var(--gv-muted); font-size: .8rem; margin-top: .35rem; }
    .gv-error { color: var(--gv-danger); font-size: .85rem; margin-top: .4rem; }
    .gv-form-actions { display: flex; gap: .75rem; flex-wrap: wrap; margin-top: 1.5rem; }

    /* Detalhes */
    .gv-detail { display: grid; grid-template-columns: 9rem 1fr; gap: 0; max-width: 640px; }
    .gv-detail dt, .gv-detail dd { padding: .9rem 0; border-top: 1px solid var(--gv-line); }
    .gv-detail dt:first-of-type, .gv-detail dd:first-of-type { border-top: 0; }
    .gv-detail dt { color: var(--gv-muted); font-size: .85rem; text-transform: uppercase; letter-spacing: .05em; }
    .gv-detail dd { font-weight: 500; }

    /* Dashboard */
    .gv-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1.5rem; }
    .gv-stat { display: block; background: var(--gv-panel); border: 1px solid var(--gv-line); border-radius: 12px; padding: 1.25rem; text-decoration: none; color: inherit; transition: border-color .15s; }
    a.gv-stat:hover { border-color: var(--gv-cyan); }
    .gv-stat span { display: block; color: var(--gv-muted); font-size: .85rem; }
    .gv-stat strong { display: block; font-family: 'Chakra Petch', sans-serif; font-size: 2.4rem; line-height: 1.1; margin-top: .3rem; }
    .gv-stat:nth-child(1) strong { color: var(--gv-coral); }
    .gv-stat:nth-child(2) strong { color: var(--gv-cyan); }
    .gv-cols { display: grid; grid-template-columns: 1.4fr 1fr; gap: 1rem; }
    .gv-list { list-style: none; margin: 1rem 0 0; padding: 0; }
    .gv-list li { display: flex; justify-content: space-between; gap: 1rem; padding: .7rem 0; border-top: 1px solid var(--gv-line); }
    .gv-list li:first-child { border-top: 0; }
    .gv-list small { color: var(--gv-muted); }
    .gv-panel p.gv-muted { margin-top: .5rem; }

    @media (max-width: 860px) {
        .gv-stats { grid-template-columns: 1fr 1fr; }
        .gv-cols { grid-template-columns: 1fr; }
    }
    @media (max-width: 480px) {
        .gv-stats { grid-template-columns: 1fr; }
        .gv-detail { grid-template-columns: 1fr; }
        .gv-detail dt { border-top: 1px solid var(--gv-line); padding-bottom: 0; }
        .gv-detail dd { border-top: 0; padding-top: .2rem; }
    }

    /* Jogos e selects */
    .gv.gv-wide { max-width: 1200px; }
    .gv-wide table { min-width: 900px; }
    .gv-form-wide { max-width: 760px; }
    .gv-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .gv-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
    .gv-field select { width: 100%; font: inherit; color: var(--gv-text); background: var(--gv-head);
        border: 1px solid var(--gv-line); border-radius: 8px; padding: .7rem .9rem; }
    .gv-field select:focus { border-color: var(--gv-cyan); }
    .gv-field select option { background: var(--gv-head); color: var(--gv-text); }
    .dark .gv-field input, .dark .gv-field select, .dark .gv-field textarea { color-scheme: dark; }
    .gv-badge { display: inline-block; font-size: .78rem; padding: .15rem .6rem; border: 1px solid var(--gv-line);
        border-radius: 4px; color: var(--gv-muted); white-space: nowrap; }
    .gv-stat:nth-child(3) strong, .gv-stat:nth-child(4) strong { color: var(--gv-text); }
    a.gv-stat:hover { border-color: var(--gv-cyan); }
    @media (max-width: 760px) { .gv-grid-2, .gv-grid-3 { grid-template-columns: 1fr; } }
</style>
