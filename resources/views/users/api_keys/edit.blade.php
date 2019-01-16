@extends('layouts.app')

@section('content')
    <a href="/domain/{{$apikey->user_id}}" class="bn btn">Go back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $apikey->user_id)
            <h1>Edit Label</h1>
            <p><b>Current Label name {{$apikey->lable}}</b></p>

            {{--Update function--}}
            <div class="col-sm6">
                {!! Form::model($apikey, ['method'=>'PATCH', 'action'=>['ApiKeysController@update', $apikey->id]]) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('lable', 'New Label:') !!}
                    {!! Form::text('lable', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Update Label', ['class'=>'btn btn-primary col-sm-6']) !!}
                </div>

                {!! Form::close() !!}

                {{--Delete function--}}
                <br>
                <p>Or you can just delete the domain</p>
                <div class="form-group">
                    {!! Form::submit('Delete Label', ['class'=>'btn btn-danger col-sm-6']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            </div>
            <div class="col-sm-6">
            </div>
        @endif
    @endif
@stop