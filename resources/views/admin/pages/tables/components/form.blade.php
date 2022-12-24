@include('components.alerts')
<div class="form-group">
	<label for="identify">Identificador:</label>
	<input type="text" name="identify" id="identify" class="form-control" placeholder="Nome"
		   value="{{ $table->identify?? old('identify') }}">
</div>
<div class="form-group">
	<label for="status">Status:</label>
	<select name="status" id="status" class="form-control">
		<option
			value="available" {{ !isset($table->status)? 'selected' : $table->status == 'available' ? 'selected' : '' }}>
			Disponível
		</option>
		<option value="unavailable" {{ isset($table->status) && $table->status == 'unavailable' ? 'selected' : '' }}>
			Indisponível
		</option>
	</select>
</div>

<div class="form-group">
	<label for="description">Descrição:</label>
	<textarea name="description" id="description" class="form-control" placeholder="Descrição"
	>{{ $table->description?? old('description') }}</textarea>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-dark">Enviar</button>
</div>
