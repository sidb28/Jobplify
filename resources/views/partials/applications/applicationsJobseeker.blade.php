<table class="table">
	<thead>
		<th>Application Number</th>
		<th>Essay</th>
		<th>Status</th>
		<th>Salary Offered</th>
	</thead>
	<tbody>
		@foreach($applications as $application)
		<tr>
			<td>{{ $application->application_id }}</td>
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