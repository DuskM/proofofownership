@extends('layouts.app')

@section('content')

    <h1>Domains</h1>

    <div class="col-sm6">
        {!! Form::model($domain, ['method'=>'PATCH', 'action'=>['UserDomainController@update', $domain->id]]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('domain', 'Domain:') !!}
            {!! Form::text('domain', null, ['class'=>'form-control']) !!}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::submit('Update Domain', ['class'=>'btn btn-primary col-sm-6']) !!}--}}
        {{--</div>--}}
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE', 'action'=>['UserDomainController@destroy', $domain->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete Domain', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    </div>
    <div class="col-sm-6">
    </div>
@stop