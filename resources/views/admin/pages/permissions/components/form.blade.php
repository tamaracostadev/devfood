@include('components.alerts')

<div class="form-group">
	<label for="name">Nome</label>
	<input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ $permission->name ?? old('name') }}">
</div>
<div class="form-group">
	<label for="description">Descrição</label>
	<input type="text" name="description" id="description" class="form-control" placeholder="Descrição" value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-dark">Enviar</button>
</div>
