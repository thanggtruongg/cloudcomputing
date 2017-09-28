@extends('layouts.default')

@section('body')

<?php
    $page_title="{$ad->name}";
?>
<div class="loginform">
    <h1>{{$ad->name}}</h1>   
    
    <div>
        <label>Service type: {{$ad->service}}</label></br>
        
        @if($ad->quote == '0')
            <label>Quote cost: FREE</label></br> 
        @else
            <label>Quote cost: {{$ad->quote}}</label></br>
        @endif 
        <label>Description: {{$ad->body}}</label></br></br>
        
        <label>Contact Information:</label></br>
        <label>Person: {{ $user->name }}</label></br>
        <label>Mobile Number: {{$ad->phone}}</label></br>
        <label>Email: {{$ad->email}}</label></br>
        <label>Location: {{$ad->town}}, {{ $ad->postcode}}</label></br></br>

        <label>Rating: {{ number_format($rating, 1) }}/5</label>



    </div>
    <small>Created on {{$ad->created_at}}</small></br></br>

    <div>
        @if(Auth::user())
            @if(Auth::user()->hasRole("Personal"))
                <a href="/advertisements" class="btn btn-primary btn-lg">Back</a>
            @endif
        @endif
        <a href="/profile" class="btn btn-primary btn-lg">Home</a>
        @if(Auth::user())
            @if(Auth::user()->hasRole("Personal"))
                <a href='/reviews/{{$ad->id}}/create' class='btn btn-primary btn-lg'>Write Review</a>
            @endif
            @if(Auth::user()->hasRole("Admin"))
                {!!Form::open(['action' => ['AdvertisementsController@destroy', $ad->id], 'method' => 'POST', 'style' => 'display:inline-block'])!!}
                    <?php
                        echo Form::hidden('_method', 'DELETE');
                        echo Form::submit('Delete', ['class' => 'btn btn-danger']);
                    ?>
                {!!Form::close()!!}
            @endif
        @endif
    </div>
</div>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Reviews</h3> </div>
                    <div class="panel-body">
                        @if(count($review) > 0)
                            <table class='table table-striped'>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th><center>Rating</center></th>
                                    <th></th>
                                </tr>
                            @foreach($review as $view)
                                <tr>
                                    <td>{{ $view->name }}</td>
                                    <td>{{ $view->description }}</td>
                                    <td><center>{{ $view->rating }}/5</center></td>
                                    @if(Auth::user()->HasRole("Admin"))
                                        <td>
                                            {!!Form::open(['action' => ['ReviewsController@destroy', $view->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                <?php
                                                    echo Form::hidden('_method', 'DELETE');
                                                    echo Form::submit('Delete', ['class' => 'btn btn-danger']);
                                                ?>
                                            {!!Form::close()!!}
                                        </td>
                                    @endif
                                </tr>
                               
                            @endforeach
                            </table> 
                        @else
                            <p>There are not reviews</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection