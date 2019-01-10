@extends('layouts.app')
@section('content')
    {{--Load user domains--}}
    <div class="col-sm6">
        <h3>Domains</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Domain</th>
            </thead>
            <tbody>
            @if(count($domains) > 0)
                @foreach($domains->where('user_id','=', Auth::user()->id) as $domain)
                        <tr>
                            <td><a href="/domain/{{$domain->id}}">{{$domain->urlname}}</a></td>
                        </tr>
                @endforeach
                {{$domains->links()}}
            @else
                <p>No domains found</p>
        @endif
    </div>

    <a href="/domain/create" class="btn btn-default">Add new domain</a>

@stop