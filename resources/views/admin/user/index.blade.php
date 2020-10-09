@extends('app')
@section('content')

<div class="container"> 

	<h1>All Users</h1>
	<ul>
		@foreach ($users as $user)
			<li>{{ $user->name }} ( {{ $user->email }} )</li>
		 @endforeach
	</ul> 
	
</div>

@endsection