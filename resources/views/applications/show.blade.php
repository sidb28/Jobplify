@extends ('app')
@section ('content')
<div class='container'>

	<div class="back-button">
		<a href="{{ route('joblistings.applications.index') }}" class="btn btn-primary btn-lg btn-block">
			View all Applications
		</a>
	</div>

	<!-- <h2>Application for {{ $joblisting->position }}</h2> -->

	<div>
		<p>Created on: {{ $application->created_at }}</p> 
		<p>Last modified: {{ $application->updated_at }}</p> 
		<p>Job Seeker Name: {{ $jobseeker->name }}</p>
		<p>Essay: {{ $application->essay }}</p>
		<p>Status: {{ $application->status }}</p>
		<p>Salary: {{ $application->salary_offered }}</p>
	</div>

</div>
@endsection