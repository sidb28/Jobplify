<table class="table"> 
	<thread>
		<th>Recruiter Name</th>
		<th>Company Name</th>
		<!-- <th>Email</th> -->
		<th colspan="1">Action</th>
    </thread>

    <tbody>
    	@foreach ($recruiters as $recruiter)
    	<tr>
    		<td>{!! Html::linkRoute('recruiters.show', $recruiter->name, $recruiter->id) !!}</td>
			<td>{{ $recruiter->company_name }}</td>
			<!-- <td><a class="mailtoui" href="mailto:{{$recruiter->email}}">{{ $recruiter->email }}</a></td> -->
			<td>
				<a class="mailtoui btn btn-info" href="mailto:{{$recruiter->email}}">
					Contact via Email
				</a>
			</td>
		</tr>
    	@endforeach
    </tbody>
</table>