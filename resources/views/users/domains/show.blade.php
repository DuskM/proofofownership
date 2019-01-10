@extends('layouts.app')

@section('content')
    <a href="/domain" class="bn btn">Go back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $domain->user_id)
            <h1>{{$domain->name}}</h1>
            <br>
            <br>
            <div>
            {!!  $domain->name!!}
                <br>
            {!!  $domain->verification!!}
            </div>
            <hr>
        <small>Written on {{$domain->created_at}}</small>
        <hr>
        @endif
    @endif




    {{--<script>--}}
        {{--jQuery(document).ready(function($){--}}

            {{--$("#random").click(function(){--}}
                {{--var number = 1 + Math.floor(Math.random() * 6);--}}
                {{--$("#number").text(number);--}}

            {{--});--}}

        {{--});--}}


    {{--</script>--}}


    {{--<button class="button" type="button" name="buttonpassvalue" id="random" >Get Random Number</button>--}}
    {{--<div id="number"></div>--}}
@endsection