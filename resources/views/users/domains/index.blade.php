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
            <tbody>
            @if(count($domains) > 0)
                @foreach($domains->where('user_id','=', Auth::user()->id) as $domain)
                        <tr>
                            <td><a href="/domain/{{$domain->id}}">{{$domain->name}}</a></td>
                        </tr>
                @endforeach
                    {{$domains->links()}}
                @else
                    <p>No domains found</p>
                @endif
            </tbody>
        </table>
    </div>

    <a href="/domain/create" class="btn btn-default">Add a new domain</a>

@stop