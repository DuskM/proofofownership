@extends('layouts.app')

@section('content')
    <a href="/domain/{{$domain->uuid}}" class="btn btn-primary">Go back</a><br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $domain->user_id)
    <h1>Edit Domain name</h1>
    <p>This will un-verify your domain name if it was already verified</p>
    <p><b>Current domain name {{$domain->name}}</b></p>

    {{--Update function--}}
    <div class="col-sm6">
        {!! Form::model($domain, ['method'=>'PATCH', 'action'=>['UserDomainController@update', $domain->id]]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('name', 'New name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        {{--<div class="form-group">--}}
            {{--{!! Form::hidden('verified', '0') !!}--}}
        {{--</div>--}}
        <div class="form-group">
            {!! Form::submit('Update Domain', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

    {{--Delete function--}}
        <br>
            <p>Or you can just delete the domain</p>
        <div class="form-group">
            {!! Form::submit('Delete Domain', ['class'=>'btn btn-danger col-sm-6', 'onclick' => 'return confirm("Are you sure?")']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    </div>
    <div class="col-sm-6">
    </div>
    @endif
    @endif
@stop