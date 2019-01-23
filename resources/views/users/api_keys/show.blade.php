@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        jQuery(document).ready(function(){
            jQuery('.btn-info').on('click', function(event) {
                jQuery(this).next('.apikey').toggle();
            });
        });
    </script>

    <a href="/api" class="btn btn-info">Go back</a><br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $api->user_id)
            <h1>{{$api->label}}</h1>
            <br>
            <div>
                {!!  $api->label!!}
                <br><br>
                <input type='button' class='btn btn-info' style="position: relative; width: 320px" value='Show Api key'>
                <p id="hide" style="display: none; position: relative;" class='apikey'>{{$api->verification_key}}</p>
            </div>
            <hr>
            <small>Added on {{$api->created_at}}</small><br>
            <a href="/api/{{$api->uuid}}/edit" class="btn btn-primary">Edit</a><br><br>
            {!! Form::open(['action' => ['ApikeyController@destroy', $api->uuid], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")'])}}
            {!! !Form::close() !!}
            <hr>
        @endif
    @endif



@endsection