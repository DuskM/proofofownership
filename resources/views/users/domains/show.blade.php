@extends('layouts.app')

@section('content')
    <a href="/domain" class="bn btn">Go back</a>
    <h1>{{$domain->urlname}}</h1>
    <br>
    <br>
    <div>
        {!!  $domain->urlname!!}
    </div>
    <hr>
    <h3>{!! $key !!}</h3>
    <small>Written on {{$domain->created_at}}</small>
    <hr>
    <a href="/domain/{{$domain->id}}/verify" class="bn btn">Verify domain</a>

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