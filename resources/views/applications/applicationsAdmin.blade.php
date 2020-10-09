@extends ('app')

@section ('content')

<div class="container">

	<table class="table">
		<thead>
			<th>Application Number</th>
			<th>Applicant Name</th>
			<th>Recruiter Name</th>
			<th>Essay</th>
			<th>Status</th>
			<th>Salary Offered</th>
		</thead>
		<tbody>
			@foreach($applications as $application)
			<tr>
				<td>{{ $application->id }}</td>
				<td>{{ $application->jobseeker->name }}</td>
				<td>{{ $application->joblisting->recruiter->name }}</td>
				<td>{{ $application->essay }}</td>
				<td>{{ $application->status }}</td>
				<td>{{ $application->salary_offered }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{!! $applications->render() !!}
	</div>
</div>

@endsection	