@extends('layouts.app')

@section('content')
    <a href="/api/{{$api->uuid}}" class="btn btn-primary">Go back</a><br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $api->user_id)
            <h1>Edit Label</h1>
            <p><b>Current Label Name {{$api->label}}</b></p>

            {{--Update function--}}
            <div class="col-sm6">
                {!! Form::model($api, ['method'=>'PATCH', 'action'=>['ApikeyController@update', $api->id]]) !!}
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
                    {!! Form::open(['action' => ['ApikeyController@destroy', $api->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete Label', ['class' => 'btn btn-danger col-sm-6', 'onclick' => 'return confirm("Are you sure?")'])}}
                    {!! !Form::close() !!}
                </div>
            </div>
            <div class="col-sm-6">
            </div>
        @endif
    @endif
@stop