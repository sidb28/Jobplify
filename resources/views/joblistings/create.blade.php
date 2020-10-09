@extends ('app')

@section('content')

<div class='container'>
	{!! Form::open(array('route'=>'joblistings.store', 'class'=>'form'))!!}

	<div class='form-group'>
		{!! Form::label('What is the job position?') !!} 
		{!! Form::text('position',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Job Position'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('Recruiter Name') !!}
		{!! Form::select('recruiter_id', $recruiters, null,
		array('class'=>'form-control'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('What is the job location?') !!} 
		{!! Form::text('location',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Job Location'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('Salary Offered') !!} 
		{!! Form::number('salary',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Amount in HK$'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::label('No of Vacancies') !!} 
		{!! Form::number('no_of_vacancies',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Enter a number'))
		!!} 
	</div>

	<div class='form-group'>
		{!! Form::submit('Create Job Listing!',
		array('class'=>'btn btn-primary'))
		!!} 
	</div>

	{!! Form::close() !!} 
</div>

@endsection