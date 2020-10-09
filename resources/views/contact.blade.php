@extends('app')

@section('content')

<div class="container content">
	<h2>Please contact me for any queries or suggestions!</h2>
	<div class="row contact-icon">
		<div class="col-lg-6">
			<img src="{{ asset('/images/email.png') }}">
			<h4><a class="mailtoui" href="mailto:sidb@connect.hku.hk">sidb@connect.hku.hk</a></h4>
		</div>
		<div class="col-lg-6">
			<img src="{{ asset('/images/linkedin.png') }}">
			<h4><a href="https://www.linkedin.com/in/siddhant-bagri-588a90184/" target="_blank">Siddhant Bagri</a></h4>
		</div>
	</div>
	<small> JS Library used on this page: <a href="https://github.com/mariordev/mailtoui" target="_blank">MailtoUI</a></small><br>
	<small>Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></small>
</div>

@endsection

@section('js')

<script src="{{ asset('/mailtoui/dist/mailtoui-min.js') }}" data-options='{ "disableOnMobile": false }'></script>

@endsection