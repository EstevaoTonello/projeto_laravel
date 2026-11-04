@csrf
<div class="gv-field">
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome"
           value="{{ old('nome', $categoria->nome ?? '') }}" required maxlength="100">
    @error('nome')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-field">
    <label for="descricao">Descrição (opcional)</label>
    <textarea id="descricao" name="descricao" rows="4" maxlength="1000">{{ old('descricao', $categoria->descricao ?? '') }}</textarea>
    <p class="gv-hint">Até 1000 caracteres.</p>
    @error('descricao')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-form-actions">
    <button type="submit" class="gv-btn gv-btn-primary">Salvar</button>
    <a href="{{ route('categorias.index') }}" class="gv-btn gv-btn-ghost">Cancelar</a>
</div>
