@extends('layouts.app')

@section('content')

    <a href="/domain" class="btn btn-primary">Go back</a><br><br>
    <h4>Add A New Domain</h4>

    {{--Add new domains--}}
    <div class="col-sm6">
        {!! Form::open(['method'=>'POST', 'action'=>'UserDomainController@store']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('name', 'Domain:') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'autofocus']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('user_id', $user->id) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Domain', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop