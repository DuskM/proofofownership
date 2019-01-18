@extends('layouts.app')

@section('content')
    <a href="/api/{{$apikey->id}}" class="bn btn">Go back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $apikey->user_id)
            <h1>Edit Label</h1>
            <p><b>Current Label Name {{$apikey->label}}</b></p>

            {{--Update function--}}
            <div class="col-sm6">
                {!! Form::model($apikey, ['method'=>'PATCH', 'action'=>['ApikeyController@update', $apikey->id]]) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('label', 'New Label:') !!}
                    {!! Form::text('label', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Update Label', ['class'=>'btn btn-primary col-sm-6']) !!}
                </div>

                {!! Form::close() !!}

                {{--Delete function--}}
                <br>
                <p>Or you can just delete the label</p>
                <div class="form-group">
                    {!! Form::open(['action' => ['ApikeyController@destroy', $apikey->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete Label', ['class' => 'btn btn-danger col-sm-6'])}}
                    {!! !Form::close() !!}
                </div>
            </div>
            <div class="col-sm-6">
            </div>
        @endif
    @endif
@stop