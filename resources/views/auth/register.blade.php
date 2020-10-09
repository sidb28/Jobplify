@extends('app')

@section('content')

<div class="col-lg-3 col-md-2 col-sm-0"></div>
<div class="col-lg-6 col-md-8 col-sm-12">
	{!! Form::open(array('route' => 'postRegister', 'class' => 'form', 'files' => true)) !!}

		<h1>Create an Account</h1>
		<h5>Already registered? <a href="{{ route('getLogin') }}">Login</a>!</h5>

		@if (count($errors) > 0)

			<div class="alert alert-danger">
				There were some problems creating an account:
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		
		@endif

		<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}
		</div>

		<div class="form-group">
		{!! Form::label('E-mail') !!} 
		{!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) !!} 	
		</div>

		<div class="form-group">
		    {!! Form::label('Password') !!}
		    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!} 
		</div>

		<div class="form-group">
		    {!! Form::label('Confirm Password') !!}
		    {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) !!} 
		</div>

		<div class='form-group'>
			{!! Form::hidden('is_admin', 0) !!}
		</div>

		<div class='form-group'>
			{!! Form::hidden('is_recruiter', 0) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('Are you a Recruiter?') !!} 
			{!! Form::checkbox('is_recruiter',
					  1, array(
						'class'=>'form-control', 
						))
			!!} 
		</div>
		<h6 style="font-weight: bold;">Note to Recruiters: To associate yourself with a Company Name, register first and then contact the admin with proof that you have recruiting rights for the company.</h6>

		<div class="form-group">
			{!! Form::label('User Image (512 X 512 dimension) (optional)', null, array('class'=>'control-label')) !!}
			{!! Form::file('image', array('class'=>'form-control', 'accept'=>'image/*')) !!}
		</div>

		<div class="form-group">
		    {!! Form::submit('Create My Account!', array('class'=>'btn btn-primary')) !!} 
		</div>

	{!! Form::close() !!}

</div>
<div class="col-lg-3 col-md-2 col-sm-0"></div>

@endsection
