@extends('app')

@section('content')

<div class="container" style="text-align: center;">
    <h1 style="color: red;">Sorry, the function you are trying to access is restricted from your account type.</h1>
    <h2>Please <a href="{{ route('contactPage') }}">contact the developer</a> if you think you are incorrectly restricted or if you would like access to the page</h2>
    <h2>Any inconvenience is regretted.</h2>
    <br>
    <div class="back-button">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block">
            Go Back to Home Page
        </a>
    </div>

    <div class="back-button">
        <a href="{{ route('joblistings.index') }}" class="btn btn-primary btn-lg btn-block">
            View all Job Listings
        </a>
    </div>
</div>

@endsection