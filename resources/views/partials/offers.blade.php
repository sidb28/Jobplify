<table class="table">
	<thead>
		<th>Application Number</th>
		<th>Applicant</th>
		<th>Job Position</th>
		<th>Recruiter Name</th>
		<th>Company</th>
		<th>Salary Offered</th>
		<th>Applicant Response</th>
		@if(Auth::user()->is_recruiter == false)
			<th colspan="2">Action</th>
		@endif
	</thead>
	<tbody>
		@foreach($offers as $offer)
		<tr>
			<td>{{ $offer->application_id }}</td>
			<td>{{ $offer->applicant_name }}</td>
			<td>{{ $offer->position }}</td>
			<td>{{ $offer->recruiter_name }}</td>
			<td>{{ $offer->company }}</td>
			<td>{{ $offer->salary_offered }}</td>
			<td>{{ $offer->status }}</td>
			@if(Auth::user()->is_recruiter == false)
				<td>
					{!! Form::open(array('route'=>array('accept_offer', $offer->application_id), 'method'=>'put', 'class'=>'Form')) !!} 

						@if($offer->status == "Offer Sent")
							{!! Form::submit('Accept', array('class'=>'btn btn-success', 'onclick' => 'return confirm("Are you sure to Accept Offer?")')) !!}
						@elseif($offer->status == "Offer Accepted")
							{!! Form::submit("Offer Accepted", array('class'=>'btn btn-success', 'disabled'=>'true')) !!}		
						@elseif($offer->status == "Offer Declined")
							{!! Form::submit("Offer Declined", array('class'=>'btn btn-danger', 'disabled'=>'true')) !!}		
						@endif

					{!! Form::close() !!} 	
				</td>
				<td>
					{!! Form::open(array('route'=>array('decline_offer', $offer->application_id), 'method'=>'put', 'class'=>'Form')) !!} 

						@if($offer->status == "Offer Sent")
							{!! Form::submit('Decline', array('class'=>'btn btn-danger', 'onclick' => 'return confirm("Are you sure to Decline Offer?")')) !!}
						@endif

					{!! Form::close() !!} 	
				</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $offers->render() !!}
</div>