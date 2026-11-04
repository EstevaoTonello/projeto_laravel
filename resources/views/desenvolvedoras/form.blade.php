@csrf
<div class="gv-field">
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome"
           value="{{ old('nome', $desenvolvedora->nome ?? '') }}" required maxlength="255">
    @error('nome')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-field">
    <label for="pais">País</label>
    <input type="text" id="pais" name="pais"
           value="{{ old('pais', $desenvolvedora->pais ?? '') }}" required maxlength="255">
    @error('pais')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-field">
    <label for="ano_fundacao">Ano de fundação</label>
    <input type="number" id="ano_fundacao" name="ano_fundacao"
           value="{{ old('ano_fundacao', $desenvolvedora->ano_fundacao ?? '') }}" required min="1800" max="{{ date('Y') }}">
    @error('ano_fundacao')
        <p class="gv-error" role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="gv-form-actions">
    <button type="submit" class="gv-btn gv-btn-primary">Salvar</button>
    <a href="{{ route('desenvolvedoras.index') }}" class="gv-btn gv-btn-ghost">Cancelar</a>
</div>
