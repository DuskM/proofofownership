@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        jQuery(document).ready(function(){
            jQuery('.btn-info').on('click', function(event) {
                jQuery(this).next('.apikey').toggle();
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
                <th>
                </th>
                </thead>
                <tbody>
                    @foreach($apikeys->where('user_id','=', Auth::user()->id) as $apikey)
                        <tr>
                            <td>
                                <a href="/api/{{$apikey->uuid}}">{{$apikey->label}}</a>
                            </td>
                            <td>
                                <div class="form-group" style="position: relative;">
                                {!! Form::open(['action' => ['ApikeyController@destroy', $apikey->uuid], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete API Key', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")'])}}
                                {!! Form::close() !!}
                            </div>
                        </td>
                        <td>
                            <input type='button' class='btn btn-info' style="position: relative; width: 320px" value='Show Api key'>
                            <p id="hide" style="display: none; position: relative;" class='apikey'>{{$apikey->verification_key}}</p>
                        </td>
                    </tr>
                @endforeach
                {{$apikeys->links()}}
            @else
                <p>No API Keys found</p>
            @endif
        </table>
    </div>
    <a href="/api/create" class="btn btn-info" style="position: relative;" >Add a new API Key</a><br>

@stop