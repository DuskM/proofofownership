@extends('layouts.app')

@section('content')

    <h4>This domainname is already in use!</h4>
    <h5>Click <a href="/domain/{{$domain->uuid}}/edit">here</a> to try again!</h5>

@stop