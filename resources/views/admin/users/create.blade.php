@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Usuario</div>

				<div class="panel-body">
					{!! Form::open(array('route' => 'admin.users.store', 'method' => 'POST')) !!}
						<div class="form-group">
							{!! Form::label('first_name', 'Nombre') !!}
							{!! Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'Nombre')) !!}
						</div>
						<div class="form-group">
							{!! Form::label('last_name', 'Apellido') !!}
							{!! Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Nombre')) !!}
						</div>
						<div class="form-group">
							{!! Form::label('email','Email') !!}
							{!! Form::email('email', '',array('class' => 'form-control', 'placeholder' => 'Email')) !!}							
						</div>
						<div class="form-group">
							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', array('required' => 'required','class' => 'form-control', 'placeholder' => 'Contraseña')) !!}
						</div>
						<div class="form-group">
							{!! Form::label('type', 'Tipo de Usuario') !!}
							{!! Form::select('type', array('admin' => 'Admin', 'user' => 'Común'), 'user', array('class' => 'form-control')) !!}
						</div>

						{!! Form::submit('Crear', array('class' => 'btn btn-success')) !!}

					{!! Form::close() !!}
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
