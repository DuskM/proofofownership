@extends('layouts.app')

@section('content')

    <h4>This API Label is already in use!</h4>
    <h5>Click <a href="/domain/{{$apikey->user_id}}/edit">here</a> to try again!</h5>

@stop