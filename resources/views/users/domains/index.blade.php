@extends('layouts.app')




@section('content')


    <h3>Domains</h3>
    <table class="table">
        <thead>
        <tr>
            <th>Domain</th>
        </thead>
        <tbody>
    @if(count($domains) > 0)
        @foreach($domains as $domain)
            <tr>
            <td><a href="/domains/{{$domain->id}}">{{$domain->urlname}}</a></td>
            </tr>
        @endforeach
        {{$domains->links()}}
    @else
        <p>No domains found</p>
    @endif


@stop