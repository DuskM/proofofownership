@extends('layouts.app')

@section('content')

    <h4>You can't use the same API Key label!</h4>
    <h5>Click <a href="/domain/{{$apikey->user_id}}/edit">here</a> to try again!</h5>

@stop