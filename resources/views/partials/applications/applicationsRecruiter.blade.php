<table class="table">
	<thead>
		<th>Application Number</th>
		<th>Essay</th>
		<th>Status</th>
		<th>Salary Offered</th>
		<th colspan="3">Action</th>
	</thead>
	<tbody>
		@foreach($applications as $application)
		<tr>
			<td>{{ $application->application_id }}</td>
			<td>{{ $application->essay }}</td>
			<td>{{ $application->status }}</td>
			<td>{{ $application->salary_offered }}</td>
			@if(Auth::user()->is_recruiter == true)
			<td>
				{!! Form::open(array('route'=>array('view_cv', $application->application_id), 'method'=>'get', 'class'=>'Form')) !!} 
				@if($application->status != "Rejected")
					{!! Form::submit('View CV', array('class'=>'btn btn-primary')) !!}
				@endif	
					
				{!! Form::close() !!} 
			</td>
			<td>
				{!! Form::open(array('route'=>array('shortlist_applicant', $application->application_id), 'method'=>'put', 'class'=>'Form')) !!} 
					@if($application->status == "Applied")
						{!! Form::submit('Shortlist Applicant',array('class'=>'btn btn-warning', 'onclick' => 'return confirm("Shortlist Applicant and send notification email?")')) !!}
					@elseif($application->status == "Rejected")
								
					@else
						{!! Form::submit('Applicant Shortlisted', array('class'=>'btn btn-success', 'disabled'=>'true')) !!}	
					@endif	
				{!! Form::close() !!} 
			</td>
			<td>
				{!! Form::open(array('route'=>array('reject_applicant', $application->application_id), 'method'=>'put', 'class'=>'Form')) !!}
					@if($application->status == "Rejected")
						{!! Form::submit('Applicant Rejected', array('class'=>'btn btn-danger', 'disabled'=>'true')) !!}	
					@elseif($application->status == "Offer Sent" || $application->status == "Offer Accepted" || $application->status == "Offer Declined")
						{!! Form::submit('Reject Applicant', array('class'=>'btn btn-danger', 'disabled'=>'true')) !!}	
					@else
						{!! Form::submit('Reject Applicant', array('class'=>'btn btn-danger', 'onclick' => 'return confirm("Reject Applicant and send notification email?")')) !!}
					@endif	
				{!! Form::close() !!} 
			</td>
			<td>
				{!! Form::open(array('route'=>array('applications.interviews.create', $application->application_id), 'class'=>'Form')) !!} 
					@if($application->status == "Shortlisted")
						{!! Form::submit('Schedule Interview', array('class'=>'btn btn-warning', 'onclick' => 'return confirm("Schedule Interview and send notification email?")')) !!}	
					@elseif($application->status == "Interview Scheduled")
						{!! Form::submit('Interview Scheduled', array('class'=>'btn btn-success', 'disabled'=>'true')) !!}
					@endif	
				{!! Form::close() !!} 
			</td>
			<td>
				{!! Form::open(array('route'=>array('send_offer', $application->application_id), 'class'=>'Form')) !!} 
					@if($application->status == "Interview Scheduled")
						{!! Form::submit('Send Offer', array('class'=>'btn btn-warning', 'onclick' => 'return confirm("Send Offer and send notification email?")')) !!}	
					@elseif($application->status == "Offer Sent")
						{!! Form::submit('Offer Sent', array('class'=>'btn btn-success', 'disabled'=>'true')) !!}
					@elseif($application->status == "Offer Accepted")					
						{!! Form::submit('Offer Accepted', array('class'=>'btn btn-success', 'disabled'=>'true')) !!}		
					@elseif($application->status == "Offer Declined")					
						{!! Form::submit('Offer Declined', array('class'=>'btn btn-success', 'disabled'=>'true')) !!}		
					@endif	
				{!! Form::close() !!} 	
			</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $applications->render() !!}
</div>