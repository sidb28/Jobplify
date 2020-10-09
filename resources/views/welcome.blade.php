@extends('app')
@section('content')

<div class="container welcome-page">
    <div class="content">
        <img src="{{ asset('/images/welcome.png') }}">
        <h1>Welcome to Jobplify!</h1>
        <h3>Connecting Job Seekers with Recruiters for the best job application experience</h3>
        <h3>Helping you find that dream job or employee with a wide variety of features</h3>
        <ul>
            <li>Access Job Listings from all Recruiters</li>
            <li>Manage your own profile</li>
            <li>Upload your CV</li>
            <li>Schedule Interviews with Recruiters on the website</li>
            <li>Respond to Offers directly on the system</li>
            <li>... and much more!</li>
            <h4><a href="{{ route('getLogin') }}">Login</a> or <a href="{{ route('getRegister') }}">Register</a> and get started on your journey to find that perfect job!</h4>
        </ul>
    </div>
    <h6>Image Source: <a href="https://resources.workable.com/stories-and-insights/good-recruiter">Workable</a></h6>
</div>

@endsection