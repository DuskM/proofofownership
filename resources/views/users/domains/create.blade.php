@extends('layouts.app')

@section('content')
    <a href="/domain" class="bn btn">Go back</a>

    {{--Add new domains--}}
    <div class="col-sm6">
        {!! Form::open(['method'=>'POST', 'action'=>'UserDomainController@store']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('name', 'Domain:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('user_id', $user->id) !!}
        </div>
        <div class="form-group">
            {{--{{$key = Keygen::numeric(10)->generate()}}--}}
            {!! Form::hidden('verification_key', $key) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Domain', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop