@extends ('app') 

@section ('content') 

<div class='container'>
	{!! Form::model($user,
		array('route'=>array('users.update', $user->id), 'method'=>'PUT', 'class'=>'form'))
	!!}
	<h2>Edit Profile for {{ $user->name }}</h2>

	<div class='form-group'>
		{!! Form::label('Name') !!} 
		{!! Form::text('name', null,
		array('required', 'class'=>'form-control', 'placeholder'=>'Name'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('Email') !!} 
		{!! Form::text('email', null,
		array('required', 'class'=>'form-control', 'placeholder'=>'Email'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::submit('Edit Profile', array('class'=>'btn btn-primary')) !!}
	</div>

	{!! Form::close() !!} 
</div>

@endsection