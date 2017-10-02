@extends('layouts.default')
@section('body')
<?php
    $page_title="Welcome";
?>


		
	<div class="loginform">
		<h1>Trades Centre</h1>
	    <p>Welcome to Trades Centre
        <br>
        Trades Centre can help you complete tasks around your home or business. <br>The individual can acquire one or several advertisements per service they require where they can then read more into the advertisement to see further information such as contact details, quotes and pricing.
      </p>
	    @if(Auth::check())

	    @else
	    <p>Please Login or Register.</p>
	    <p>
	        <a class = 'btn btn-primary btn-lg' href = '/auth/login' role = 'button'   >Login</a> 
	        <a class = 'btn btn-success btn-lg' href = '/auth/register' role = 'button'>Register</a>
	    </p> 
	    @endif
    </div>
        <div class="slideshow" >
            <img class="slideme" src="{{ URL::to('pictures/toolman.png') }}" alt="http://www.jimsbuildingmaintenance.com.au/images/stories/finding-the-right-tradie.jpg" >
        </div>

   	 		
   	 		@endsection
