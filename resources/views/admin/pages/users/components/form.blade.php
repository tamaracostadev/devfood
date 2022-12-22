@include('components.alerts')
<div class="form-group">
	<label for="name">Nome:</label>
	<input type="text" name="name" placeholder="Nome" class="form-control" value="{{$user->name ?? old('name')}}">
</div>
<div class="form-group">
	<label for="email">Email:</label>
	<input type="email" name="email" placeholder="E-mail" class="form-control" value="{{$user->email ?? old('email')}}">
</div><div class="form-group">
	<label for="password">Senha:</label>
	<input type="password" name="password" placeholder="Senha" class="form-control">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-dark">Enviar</button>
</div>
