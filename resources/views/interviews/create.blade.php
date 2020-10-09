@extends ('app')

@section('content')

<div class='container'>
	{!! Form::open(array('route'=>array('applications.interviews.store', $application->id), 'class'=>'form'	)) !!}

	<h2>Schedule an Interview with {{ $jobseeker->name }}</h2>

	<h3>Job Position: {{ $application->joblisting->position }}</h3>
	<h3>Company Name: {{ $recruiter->company_name }}</h3>

	<div class='form-group'>
		{!! Form::label('Application ID') !!} 
		{!! Form::number('application_id', $application->id, array (
			'class'=>'form-control',
			'readonly'=>true,
		)) !!} 
	</div>

	<div class="form-group">
		{!! Form::label('Date and Time of Interview') !!} 
		{!! Form::text('datetime',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Enter a date and time here'))
		!!} 
	</div>

	<div class="form-group">
		{!! Form::label('Location/Link of Interview') !!} 
		{!! Form::textarea('location_or_link',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Enter a location or link here'))
		!!} 
	</div>

	<div class='form-group'>	
		{!! Form::submit('Submit!',
		array('class'=>'btn btn-primary'))
		!!} 
	</div>

	{!! Form::close() !!} 
</div>

@endsection