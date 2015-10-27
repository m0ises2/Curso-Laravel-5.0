@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>

				<div class="panel-body">
					<p>Actualmente hay: {{ $users->total() }} usuarios.</p>
					<p>Página actual: {{ $users->currentPage() }}</p>
					<p>{{ $users->count() }} usuarios de {{ $users->total() }}</p>
					<p> <a class="btn btn-info" href="{{ route('admin.users.create') }}"> Nuevo Usuario </a> </p>
					<table class="table table-striped">
				  		<tr>
				  			<th>#</th>
				  			<th>Nombre</th>
				  			<th>Email</th>
				  			<th>Tipo</th>
				  			<th>Acciones</th>
				  		</tr>
				  		@foreach ($users as $user)
				  		<tr>
				  			<td>{{ $user->id }}</td>
				  			<td>{{ $user->first_name }} {{ $user->last_name }} </td>
				  			<td>{{ $user->email }}</td>
				  			<td>{{ $user->type }}</td>
				  			<td>
				  				<a href="">Editar</a>
				  				<a href="">Eliminar</a>
				  			</td>
				  		</tr>
				  		@endforeach				  		
					</table>
					{!! $users->render() !!}
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
