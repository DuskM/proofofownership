@extends('layouts.app')

@section('content')

    <div class="col-sm6">
        <a href="/domain" class="bn btn">Go back</a>
        <h3>API Keys</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Name Of API Key</th>
            </thead>
            <tbody>
            @if(count($apikeys) > 0)
                @foreach($apikeys->where('user_id','=', Auth::user()->id) as $apikey)
                    <tr>
                        <td><a href="/api/{{$apikey->user_id}}">{{$apikey->label}}</a></td>
                    </tr>
                @endforeach
                {{$apikeys->links()}}
            @else
                <p>No API Keys found</p>
            @endif
            </tbody>
        </table>
    </div>
    <a href="/api/create" class="btn btn-default">Add a new API Key</a><br>

@stop