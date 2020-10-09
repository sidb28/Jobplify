@extends ('app')

@section ('content')

<div class="container">

	{!! Form::open(array('route'=>array('joblistings.applications.store', $joblisting->id), 'class'=>'form', 'files'=>true)) !!}

	<h2>
		Submit an Application for {{ $joblisting->position }} at {{ $joblisting->recruiter->company_name }}
	<h2>

	<div class='form-group'>
		{!! Form::label('Name') !!} 
		{!! Form::text('name', $user->name, array (
			'class'=>'form-control',
			'readonly'=>true,
		)) !!} 
	</div>

	<div class='form-group'>
		{!! Form::label('Why would you like to get this job?') !!} 
		{!! Form::textarea('essay',
				  null, array(
					'required', 
					'class'=>'form-control', 
					'placeholder'=>'Write a short answer of about 100 words here ...'))
		!!} 
	</div>

	<div class="form-group">
		{!!  Form::label('Upload CV', null, array('class'=>'control-label')) !!}
		{!! Form::file('cv', array('required', 'class'=>'form-control', 'accept'=>'image/*, .pdf')) !!}
	</div>

	<div class='form-group'>
		<!-- {!! Form::label('Application Status') !!}  -->
		{!! Form::hidden('status', 'Applied') !!} 
	</div>

	<div class='form-group'>
		<!-- {!! Form::label('Salary Offered') !!}  -->
		{!! Form::hidden('salary_offered', 0) !!} 
	</div>

	<div class='form-group'>
		{!! Form::submit('Submit Application!',
			array('class'=>'btn btn-success'))
		!!} 
	</div>

	{!! Form::close() !!} 
</div>
@endsection