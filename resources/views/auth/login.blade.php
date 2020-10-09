@extends('app')

@section('content')

<div class="col-lg-3 col-md-2 col-sm-0"></div>
<div class="col-lg-6 col-md-8 col-sm-12">
	
	{!! Form::open(array('route' => 'postLogin', 'class' => 'form')) !!}

		<h1>Sign In to Your Account</h1>
		<h5>New User? <a href="{{ route('getRegister') }}">Create an Account</a>!</h5>

		@if (count($errors) > 0)

			<div class="alert alert-danger">
				There were some problems signing into your account:
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		
		@endif

		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'example@example.com')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Password') !!}
			{!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'********')) !!}
		</div>

		<div class="form-group">
			<label>
				{!! Form::checkbox('remember','remember') !!} Remember Me
			</label>
		</div>

		<div class="form-group">
			{!! Form::submit('Login', array('class'=>'btn-btn-primary')) !!}
		</div>

	{!! Form::close() !!}

</div>
<div class="col-lg-3 col-md-2 col-sm-0"></div>

@endsection