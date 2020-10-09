@extends ('app')

@section ('content')

<div class="container">

	<table class="table">
		<thead>
			<th>Application Number</th>
			<th>Applicant Name</th>
			<th>Recruiter Name</th>
			<th>Job Position</th>
			<th>Location/Link</th>
			<th>Date & Time</th>
			<!-- <th colspan="2">Action</th> -->
		</thead>
		<tbody>
			@foreach($interviews as $interview)
			<tr>
				<td>{{ $interview->id }}</td>
				<td>{{ $interview->application->jobseeker->name }}</td>
				<td>{{ $interview->application->joblisting->recruiter->name }}</td>
				<td>{{ $interview->application->joblisting->position }}</td>
				<td>{{ $interview->location_or_link }}</td>
				<td>{{ $interview->datetime }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $interviews->render() !!}
	</div>

</div>

@endsection