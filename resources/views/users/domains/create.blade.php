@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>
    {!! Form::open(['method'=>'POST']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('domainName', 'Domain Name:') !!}
            {!! Form::text('domainName', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Domain', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@stop