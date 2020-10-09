@extends ('app')
@section ('content')
<div class='container'>

	<div class="back-button">
		<a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block">
			Go to Home Page
		</a>
	</div>

	<h1 style="text-align: center; margin-bottom: 5%">{{ $user->name }}</h1>
	<div class="row">
		<div class="col-lg-2 col-md-2"></div>
		<div class="col-lg-4 col-md-4 col-sm-6">
			<p>Created on: {{ $user->createdHuman() }} UTC</p> 
			<p>Last modified: {{ $user->updatedHuman() }}</p> 
			<p>Email: {{ $user->email }}</p> 
			@if($user->is_admin == 1)
				<p>Admin Priviledge: Yes</p> 
			@else
				<p>Admin Priviledge: No</p> 	
			@endif	
			@if($user->is_recruiter == 1)	
				<p>Account Type: Recruiter</p> 
			@elseif($user->is_recruiter == 0)
				<p>Account Type: JobSeeker</p> 	
			@else
				<p>Account Type: Admin</p> 	
			@endif	
			<div class="row">
				<div class="col-lg-1 col-md-1"></div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					{!! Html::linkRoute('users.edit', 'Edit', $user->id, array('class'=>'btn btn-warning')) !!} 
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					{!! Form::open(array('route'=>array('users.destroy', $user->id), 'method'=>'delete')) !!} 
					{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 profile-image">
			<img src = "{{ asset($user->image) }}" />
		</div>
		<div class="col-lg-2 col-md-2"></div>
	</div>
</div>
@endsection