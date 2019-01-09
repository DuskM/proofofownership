@extends('layouts.app')

@section('content')

    {{--Add new domains--}}
    <div class="col-sm6">

        {!! Form::open(['method'=>'POST', 'action'=>['UserDomainController@store', $user->id]]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('urlname', 'Domain:') !!}
            {!! Form::text('urlname', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('user_id', $user->id) !!}
        </div>
        {!! Form::hidden($value = $userId) !!}
        <div class="form-group">
            {!! Form::submit('Add Domain', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>

@stop