<table class="table"> 
	<thread>
		<th>Position</th> 
		<th>Recruiter Name</th>
		<th>Company Name</th>
		<th>Location</th>
		<th colspan="3">Action</th>
    </thread>

    <tbody>
    	@foreach ($joblistings as $joblisting)
    	<tr>
			<td>{!! Html::linkRoute('joblistings.show', $joblisting->position, $joblisting->id) !!}</td>
			<td>{{ $joblisting->recruiter->name }}</td>
			<td>{{ $joblisting->recruiter->company_name }}</td>
			<td>{{ $joblisting->location }}</td>
			<td>
				{!! Html::linkRoute('joblistings.edit', 'Edit', $joblisting->id, array('class'=>'btn btn-warning')) !!} 
			</td>
			<td>
				{!! Form::open(array(
				'route'=>array('joblistings.destroy', $joblisting->id), 'method'=>'delete')) !!} 
				{!! Form::submit('Delete', array('class'=>'btn btn-danger', 'onclick' => 'return confirm("You are removing a Job Listing from Jobplify. OK?")')) !!}
				{!! Form::close() !!}
			</td>
			<td>
				{!! Html::linkRoute('joblistings.applications.create', 'Apply Now!', $joblisting->id, array('class'=>'btn btn-success')) !!}
			</td>
		</tr>
    	@endforeach
    </tbody>

</table>