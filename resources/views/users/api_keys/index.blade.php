@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

        jQuery(document).ready(function(){
            jQuery('.btn-info').on('click', function(event) {
                jQuery(this).next('.apikey').toggle();
                if ($(this).text() == "Show Api key")
                    $(this).text("Hide Api key")
                else
                    $(this).text("Show Api key");
                $("hide").slideToggle();
            });
        });
        
    </script>
    <div class="col-sm6">
        <a href="/domain" class="btn btn-primary">Go back</a><br><br>
        <h3>API Keys</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Name Of API Key</th>
            </thead>
            @if(count($apikeys) > 0)
                    @foreach($apikeys->where('user_id','=', Auth::user()->id) as $apikey)
                    <tbody>
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
                            <button id="show" class='btn btn-info' style="position: relative; width: 320px" >Show Api key</button>
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
    <a href="/api/create" class="btn btn-primary" style="position: relative;" >Add a new API Key</a><br>

@stop