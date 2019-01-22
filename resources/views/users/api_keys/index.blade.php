@extends('layouts.app')
@section('content')
    <script>
        // $(document).on('click', 'button[data-id]', function (e) {
        //     var requested_to = $(this).attr('data-id');
        //
        // });
    </script>

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
                        <td>
                            <a href="/api/{{$apikey->id}}">{{$apikey->label}}</a>
                            <div class="form-group" style="float:right">

                                {!! Form::open(['action' => ['ApikeyController@destroy', $apikey->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete API Key', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </div>
                        </td>
                        {{--<td><button class="btn btn-primary" data-id="{{$apikey->id}}" >Show Apikey</button></td>--}}
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