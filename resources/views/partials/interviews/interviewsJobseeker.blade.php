<table class="table">
	<thead>
		<th>Application Number</th>
		<th>Applicant Name</th>
		<th>Job Position</th>
		<th>Location/Link</th>
		<th>Date & Time</th>
		<!-- <th colspan="2">Action</th> -->
	</thead>
	<tbody>
		@foreach($interviews as $interview)
		<tr>
			<td>{{ $interview->interview_id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $interview->position }}</td>
			<td>{{ $interview->location_or_link }}</td>
			<td>{{ $interview->datetime }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $interviews->render() !!}
</div>