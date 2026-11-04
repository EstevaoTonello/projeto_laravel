@csrf
<div class="gv-field">
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome"
           value="{{ old('nome', $plataforma->nome ?? '') }}" required maxlength="255">
    @error('nome')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-field">
    <label for="fabricante">Fabricante</label>
    <input type="text" id="fabricante" name="fabricante"
           value="{{ old('fabricante', $plataforma->fabricante ?? '') }}" required maxlength="255">
    @error('fabricante')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-form-actions">
    <button type="submit" class="gv-btn gv-btn-primary">Salvar</button>
    <a href="{{ route('plataformas.index') }}" class="gv-btn gv-btn-ghost">Cancelar</a>
</div>
