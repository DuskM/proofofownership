@extends('layouts.app')
@section('content')
    {{--Load user domains--}}
    <div class="col-sm6">
        <h3>Domains</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Name Of Domain</th>
            </thead>
            @if(count($domains) > 0)
                <thead>
                <tr>
                    <th>Name Of Domain</th>
                </thead>
                <tbody>
                @foreach($domains->where('user_id','=', Auth::user()->id) as $domain)
                        <tr>
                            <td><a href="/domain/{{$domain->uuid}}">{{$domain->name}}</a></td>
                        </tr>
                @endforeach
                </tbody>
                    {{$domains->links()}}
                @else
                    <p>No domains found</p>
                @endif
        </table>
    </div>

    <a href="/domain/create" class="btn btn-primary">Add a new domain</a><br><br>
    <a href="/api" class="btn btn-primary">Your API Keys</a>

@stop