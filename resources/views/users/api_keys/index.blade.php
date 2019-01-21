@extends('layouts.app')
@section('content')
    <script>
        $(document).ready(function(){
            // change the selector to use a class
            $(".showhideapi").click(function(){
                // this will query for the clicked toggle
                var $toggle = $(this);

                // build the target form id
                var id = "#replycomment-" + $toggle.data('verification_key');

                $( id ).toggle();
            });
        });
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
                        <td><a href="/api/{{$apikey->id}}">{{$apikey->label}}</a>
                            <div class="form-group" style="float:right">

                                {!! Form::open(['action' => ['ApikeyController@destroy', $apikey->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete API Key', ['class' => 'btn btn-danger'])}}
                                {!! !Form::close() !!}
                            </div>
                        {{--<td>{{$apikey->verification_key}}</td>--}}
                        <td><button class="btn btn btn-primary showhideapi" data-id="{{ $apikey->verification_key }}">
                                <span class="fa fa-reply"></span>Show verification key
                            </button></td>




                        {{--<td><button onclick="Api_show()">Try it</button></td>--}}
                        {{--<td id="Show_api">--}}
                        {{--{{$apikey->verification_key}}--}}
                        {{--</td>--}}

                        {{--<td class="details" style="display:none">{{}}</td>--}}
                        {{--<td><a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'See Less Details':'See More Details');});">See More Details</a></td>--}}


                        </td>
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
        <script>

            // function Api_show() {
            //     var x = document.getElementById("Show_api");
            //     if (x.style.display === "none") {
            //         x.style.display = "block";
            //     } else {
            //         x.style.display = "none";
            //     }
            // }
        </script>

@stop