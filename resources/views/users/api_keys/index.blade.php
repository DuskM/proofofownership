@extends('layouts.app')
@section('content')
    <script>
        // $(document).on('click', 'button[data-id]', function (e) {
        //     var requested_to = $(this).attr('data-id');
        //
        // });
    </script>

    <div class="col-sm6">
        <a href="/domain" class="btn btn-info">Go back</a>
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
                                    {{Form::submit('Delete API Key', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            {{--<td><button class="btn btn-primary" data-id="{{$apikey->id}}" >Show Apikey</button></td>--}}
                        </tr>
                    @endforeach
                </tbody>
                {{$apikeys->links()}}
            @else
                <p>No API Keys found</p>
            @endif
        </table>
    </div>
    <a href="/api/create" class="btn btn-info">Add a new API Key</a><br>

@stop