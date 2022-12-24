@include('components.alerts')
<div class="form-group">
	<label for="name">Empresa:</label>
	<input type="text" name="name" id="name" class="form-control" placeholder="Empresa"
		   value="{{ $tenant->name?? old('name') }}">
</div>
<div class="form-group">
	<label for="logo">Logo Empresa:</label>
	<input type="file" name="logo" id="logo" class="form-control">
</div>
<div class="form-group">
	<label for="email">Email:</label>
	<input type="email" name="email" id="email" class="form-control" placeholder="Email"
		   value="{{ $tenant->email?? old('email') }}">
</div>
<div class="form-group">
	<label for="cnpj">CNPJ:</label>
	<input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ"
		   value="{{ $tenant->cnpj?? old('cnpj') }}">
</div>
<div class="form-group">
	<label for="active">Ativo:</label>
	<select name="active" id="active" class="form-control">
		<option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selected @endif>Sim</option>
		<option value="N" @if(isset($tenant) && $tenant->active == 'N') selected @endif>Não</option>
	</select>
</div>

<hr>
<h5>Assinatura</h5>

<div class="form-group">
	<label for="subscription">Data Assinatura:</label>
	<input type="date" name="subscription" id="subscription" class="form-control"
		   value="{{ $tenant->subscription?? old('subscription') }}">
</div>
<div class="form-group">
	<label for="expires_at">Data Expira:</label>
	<input type="date" name="expires_at" id="expires_at" class="form-control"
		   value="{{ $tenant->expires_at?? old('expires_at') }}">
</div>
<div class="form-group">
	<label for="subscription_id">Identificador:</label>
	<input type="text" name="subscription_id" id="subscription_id" class="form-control"
		   value="{{ $tenant->subscription_id?? old('subscription_id') }}">
</div>
<div class="form-group">
	<label for="subscription_active">Ativo:</label>
	<select name="subscription_active" id="subscription_active" class="form-control">
		<option value="1" @if(isset($tenant) && $tenant->subscription_active == '1') selected @endif>Sim</option>
		<option value="0" @if(isset($tenant) && $tenant->subscription_active == '0') selected @endif>Não</option>
	</select>
</div>
<div class="form-group">
	<label for="subscription_suspended">Cancelou:</label>
	<select name="subscription_suspended" id="subscription_suspended" class="form-control">
		<option value="1" @if(isset($tenant) && $tenant->subscription_suspended == '1') selected @endif>Sim</option>
		<option value="0" @if(isset($tenant) && $tenant->subscription_suspended == '0') selected @endif>Não</option>
	</select>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-dark">Enviar</button>
</div>
