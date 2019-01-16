@extends('layouts.app')

@section('content')
    <a href="/api" class="bn btn">Go back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $apikey->user_id)
            <h1>{{$apikey->lable}}</h1>
            <br>
            <div>
                {!!  $apikey->lable!!}
                <br><br>
            </div>
            <hr>
            <small>Added on {{$apikey->created_at}}</small><br>
            <a href="/domain/{{$apikey->id}}/edit" class="'tn btn-default">Edit</a>
            {!! Form::open(['action' => ['UserDomainController@destroy', $domain->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! !Form::close() !!}
            <hr>
        @endif
    @endif



@endsection