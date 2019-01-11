@extends('layouts.app')

@section('content')

    <h1>Edit Domain name</h1>
    <p>This will un-verify your domain name if it was already verified</p>
    <p><b>Current domain name {{$domain->name}}</b></p>

    <div class="col-sm6">
        {!! Form::model($domain, ['method'=>'PATCH', 'action'=>['UserDomainController@update', $domain->id]]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('name', 'New name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('verified', '0') !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Domain', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}






        <br>
            <p>Or you can just delete the domain</p>
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