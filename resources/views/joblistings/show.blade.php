@extends ('app')
@section ('content')
<div class='container'>

	<div class="back-button">
		<a href="{{ route('joblistings.index') }}" class="btn btn-primary btn-lg btn-block">
			View all Job Listings
		</a>
	</div>

	<h2>{{ $joblisting->position }}</h2>

	<div>
		<p>Created on: {{ $joblisting->createdHuman() }} UTC</p> 
		<p>Last modified: {{ $joblisting->updatedHuman() }}</p> 
		<p>Recruiter Name: {{ $joblisting->recruiter->name }}</p>
		<p>Location: {{ $joblisting->location }}</p>
		<p>Salary Offered: {{ $joblisting->salary }}</p>
		<p># Vacancies: {{ $joblisting->no_of_vacancies }}</p>
	</div>
	<div class="row">
		<div class="col-lg-1 col-md-4 col-sm-8">
			{!! Html::linkRoute('joblistings.edit', 'Edit', $joblisting->id, array('class'=>'btn btn-warning')) !!} 
		</div>
		<div class="col-lg-1 col-md-4 col-sm-8">
			{!! Form::open(array('route'=>array('joblistings.destroy', $joblisting->id), 'method'=>'delete')) !!} 
			{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<br>
	<div class="">
		{!! Html::linkRoute('joblistings.applications.create', 'Apply Now!', $joblisting->id, array('class'=>'btn btn-success btn-lg btn-block')) !!}
	</div>
					
</div>
@endsection