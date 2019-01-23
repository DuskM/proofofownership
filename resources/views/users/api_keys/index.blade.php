@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        jQuery(document).ready(function(){
            jQuery('.hideshow').on('click', function(event) {
                jQuery(this).prev('.content').toggle();
            });
        });
    </script>


    <div class="col-sm6">
        <a href="/domain" class="btn btn-info">Go back</a><br><br>
        <h3>API Keys</h3>
        <table class="table">
            @if(count($apikeys) > 0)
                <thead>
                <tr>
                    <th>Name Of API Key</th>
                </thead>
                <tbody>
                    @foreach($apikeys->where('user_id','=', Auth::user()->id) as $apikey)
                        <tr>
                            <td>
                                <a href="/api/{{$apikey->uuid}}">{{$apikey->label}}</a>
                                <div class="form-group" style="float:right">

                                {!! Form::open(['action' => ['ApikeyController@destroy', $apikey->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete API Key', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")'])}}
                                {!! Form::close() !!}
                            </div>
                        </td>
                        <td><div id="hide" style="display: none;" class='content'>{{$apikey->verification_key}}</div>
                            <input type='button' class='hideshow' value='Show Api key'></td>
                    </tr>
                @endforeach
                {{$apikeys->links()}}
            @else
                <p>No API Keys found</p>
            @endif
        </table>
    </div>
    <a href="/api/create" class="btn btn-info">Add a new API Key</a><br>

@stop