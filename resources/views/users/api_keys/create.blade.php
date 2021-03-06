@extends('layouts.app')

@section('content')


    <a href="/api" class="btn btn-primary">Go back</a><br><br>
    <h4>Add A New API Key</h4>

    {{--Add new domains--}}
    <div class="col-sm6">
        {!! Form::open(['method'=>'POST', 'action'=>'ApikeyController@store']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('label', 'Label:') !!}
            {!! Form::text('label', null, ['class'=>'form-control', 'autofocus']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('user_id', $user->id) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add API Key', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop