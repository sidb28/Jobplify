@extends ('app') 

@section ('content') 
<div class='container'>

	<div class="back-button">
		<a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block">
			Go Back to Home Page
		</a>
	</div>

	<h1 style="text-align: center;">All Recruiters on Jobplify</h1>

	@include('partials.recruiters')
</div>
<small> JS Library used on this page: <a href="https://github.com/mariordev/mailtoui" target="_blank">MailtoUI</a></small><br>
@endsection

@section('js')

<script src="{{ asset('/mailtoui/dist/mailtoui-min.js') }}" data-options='{ "disableOnMobile": false }'></script>

@endsection