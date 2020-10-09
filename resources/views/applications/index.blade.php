@extends ('app') 

@section ('content') 
<div class='container'>

	<table class="table"> 
		<thread>
			<!-- <th>Position</th>  -->
			<th>Job Seeker Name</th>
			<!-- <th>Company Name</th> -->
			<th>Essay</th>
			<th>Status</th>
			<th>Salary Offered</th>
			<!-- <th colspan="3">Action</th> -->
	    </thread>

	    <tbody>
	    	@foreach ($applications as $application)
	    	@if($application->jobseeker_id == $jobseeker->id)
		    	<tr>
					<!-- <td>{!! Html::linkRoute('joblistings.applications.show', $joblisting->position, $application->id) !!}</td> -->
					<td>{{ $jobseeker->name }}</td>
					<!-- <td>{{ $recruiter->company_name }}</td> -->
					<td>{{ $application->essay }}</td>
					<td>{{ $application->status }}</td>
					<td>{{ $application->salary_offered }}</td>
					<!-- <td>
						{!! Html::linkRoute('joblistings.edit', 'Edit', $joblisting->id, array('class'=>'btn btn-warning')) !!} 
					</td>
					<td>
						{!! Form::open(array(
						'route'=>array('joblistings.destroy', $joblisting->id), 'method'=>'delete')) !!} 
						{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}
						{!! Form::close() !!}
					</td>
					<td>
						{!! Html::linkRoute('joblistings.applications.create', 'Apply Now!', $joblisting->id, array('class'=>'btn btn-success')) !!}
					</td> -->
				</tr>
			@endif	
	    	@endforeach
	    </tbody>
	</table>
	
</div>
@endsection