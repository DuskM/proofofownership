@extends('layouts.app')

@section('content')
    <a href="/domain" class="bn btn">Go back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $domain->user_id)
            <h1>{{$domain->name}}</h1>
            <br>
            <div>
            {!!  $domain->name!!}
                <br><br>
            <h4>This is your verification key:</h4>
            {!!  $domain->verification_key!!}
            </div>
            <hr>
        <small>Added on {{$domain->created_at}}</small><br>
            @if($domain->verified == '1')
                <small>Domain verified</small><br>
                <small>Verified at {{$domain->updated_at}}</small>
                @endif
            <a href="/domain/{{$domain->uuid}}/edit" class="'tn btn-default">Edit</a>
            {!! Form::open(['action' => ['UserDomainController@destroy', $domain->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! !Form::close() !!}
        <hr>
        @endif
    @endif



@endsection