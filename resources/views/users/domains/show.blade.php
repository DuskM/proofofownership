@extends('layouts.app')

@section('content')
    <a href="/domain" class="btn btn-primary">Go back</a><br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $domain->user_id)
            <h1>{{$domain->name}}</h1>
            <br>
            <div>
            {!!  $domain->name!!}
                <br><br>
            {{--<h4>This is your verification key:</h4>--}}
            {{--{!!  $domain->verification_key!!}--}}
            </div>
            <hr>
        <small>Added on {{$domain->created_at}}</small><br>
            {{--@if($domain->verified == '1')--}}
                {{--<small>Domain verified</small><br>--}}
                {{--<small>Verified at {{$domain->updated_at}}</small>--}}
                {{--@endif--}}
            <a href="/domain/{{$domain->uuid}}/edit" class="btn btn-primary">Edit</a><br><br>
            {!! Form::open(['action' => ['UserDomainController@destroy', $domain->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")'])}}
            {!! !Form::close() !!}
        <hr>
        @endif
    @endif



@endsection