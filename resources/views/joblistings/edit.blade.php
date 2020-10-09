@extends ('app') 

@section ('content') 

<div class='container'>
	{!! Form::model($joblisting,
		array('route'=>array('joblistings.update',$joblisting->id), 'method'=>'PUT', 'class'=>'form' ))
	!!}
	<h2>Update Job Listing: {{ $joblisting->position }}</h2>

	<div class='form-group'>
		{!! Form::label('Position') !!} 
		{!! Form::text('position', null,
		array('required', 'class'=>'form-control', 'placeholder'=>'Job Position'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('Recruiter Name') !!}
		{!! Form::select('recruiter_id', $recruiters, $joblisting->recruiter_id,
		array('class'=>'form-control')) !!}
	</div>

	<div class='form-group'>
		{!! Form::label('Location') !!} 
		{!! Form::text('location', null,
		array('required', 'class'=>'form-control', 'placeholder'=>'Job Location'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('Salary') !!} 
		{!! Form::text('salary', null,
		array('required', 'class'=>'form-control', 'placeholder'=>'Amount in HK$'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('# Vacancies') !!} 
		{!! Form::text('no_of_vacancies', null,
		array('required', 'class'=>'form-control', 'placeholder'=>'Enter a number'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::submit('Update Job Listing', array('class'=>'btn btn-primary')) !!}
	</div>

	{!! Form::close() !!} 
</div>

@endsection