@extends('layouts.app')

@section('content')
    <a href="/domain" class="bn btn">Go back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $domain->user_id)
            <h1>{{$domain->name}}</h1>
            <br>
            <div>
            {!!  $domain->name!!}
                <br><br>
            <h4>This is your verification key:</h4>
            {!!  $domain->verification_key!!}
            </div>
            <hr>
        <small>Added on {{$domain->created_at}}</small><br>
            @if($domain->verified == '1')
                <small>Domain verified</small><br>
                <small>Verified at {{$domain->updated_at}}</small>
                @endif
        <hr>
        @endif
    @endif



@endsection