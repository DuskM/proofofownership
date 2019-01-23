@extends('layouts.app')

@section('content')
    <a href="/api" class="btn btn-primary">Go back</a><br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $api->user_id)
            <h1>{{$api->label}}</h1>
            <br>
            <div>
                {!!  $api->label!!}
                <br><br>
                {!! $api->verification_key !!}
            </div>
            <hr>
            <small>Added on {{$api->created_at}}</small><br>
            <a href="/api/{{$api->uuid}}/edit" class="btn btn-primary">Edit</a><br><br>
            {!! Form::open(['action' => ['ApikeyController@destroy', $api->uuid], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! !Form::close() !!}
            <hr>
        @endif
    @endif



@endsection