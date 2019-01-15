@extends('layouts.app')

@section('content')

    <h4>You can't use the same domainname!</h4>
    <h5>Click <a href="/domain/{{$domain->uuid}}/edit">here</a> to try again!</h5>

@stop