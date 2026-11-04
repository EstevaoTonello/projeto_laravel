@csrf
@if ($categorias->isEmpty() || $desenvolvedoras->isEmpty() || $plataformas->isEmpty())
    <p class="gv-status" role="status">
        Antes de cadastrar um jogo, é preciso ter pelo menos uma
        <a href="{{ route('categorias.create') }}"><u>categoria</u></a>,
        uma <a href="{{ route('plataformas.create') }}"><u>plataforma</u></a> e
        uma <a href="{{ route('desenvolvedoras.create') }}"><u>desenvolvedora</u></a>.
    </p>
@endif

<div class="gv-field">
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo"
           value="{{ old('titulo', $jogo->titulo ?? '') }}" required maxlength="255">
    @error('titulo')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-field">
    <label for="descricao">Descrição (opcional)</label>
    <textarea id="descricao" name="descricao" rows="3" maxlength="255">{{ old('descricao', $jogo->descricao ?? '') }}</textarea>
    @error('descricao')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-grid-2">
    <div class="gv-field">
        <label for="preco">Preço (R$)</label>
        <input type="number" id="preco" name="preco" step="0.01" min="0"
               value="{{ old('preco', $jogo->preco ?? '') }}" required>
        @error('preco')
            <p class="gv-error" role="alert">{{ $message }}</p>
        @enderror
    </div>
    <div class="gv-field">
        <label for="data_lancamento">Data de lançamento</label>
        <input type="date" id="data_lancamento" name="data_lancamento"
               value="{{ old('data_lancamento', isset($jogo) ? $jogo->data_lancamento?->format('Y-m-d') : '') }}" required>
        @error('data_lancamento')
            <p class="gv-error" role="alert">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="gv-grid-3">
    <div class="gv-field">
        <label for="categoria_id">Categoria</label>
        <select id="categoria_id" name="categoria_id" required>
            <option value="">Selecione…</option>
            @foreach ($categorias as $item)
                <option value="{{ $item->id }}" @selected(old('categoria_id', $jogo->categoria_id ?? '') == $item->id)>{{ $item->nome }}</option>
            @endforeach
        </select>
        @error('categoria_id')
            <p class="gv-error" role="alert">{{ $message }}</p>
        @enderror
    </div>
    <div class="gv-field">
        <label for="plataforma_id">Plataforma</label>
        <select id="plataforma_id" name="plataforma_id" required>
            <option value="">Selecione…</option>
            @foreach ($plataformas as $item)
                <option value="{{ $item->id }}" @selected(old('plataforma_id', $jogo->plataforma_id ?? '') == $item->id)>{{ $item->nome }}</option>
            @endforeach
        </select>
        @error('plataforma_id')
            <p class="gv-error" role="alert">{{ $message }}</p>
        @enderror
    </div>
    <div class="gv-field">
        <label for="desenvolvedora_id">Desenvolvedora</label>
        <select id="desenvolvedora_id" name="desenvolvedora_id" required>
            <option value="">Selecione…</option>
            @foreach ($desenvolvedoras as $item)
                <option value="{{ $item->id }}" @selected(old('desenvolvedora_id', $jogo->desenvolvedora_id ?? '') == $item->id)>{{ $item->nome }}</option>
            @endforeach
        </select>
        @error('desenvolvedora_id')
            <p class="gv-error" role="alert">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="gv-form-actions">
    <button type="submit" class="gv-btn gv-btn-primary">Salvar</button>
    <a href="{{ route('jogos.index') }}" class="gv-btn gv-btn-ghost">Cancelar</a>
</div>
