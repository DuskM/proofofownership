@extends('layouts.app')
@section('content')
    <div class="col-sm6">

        {!! Form::open(['method'=>'POST', 'action'=>'UserDomainController@store']) !!}
            @csrf
            <div class="form-group">
                {!! Form::label('domain', 'Domain:') !!}
                {!! Form::text('domain', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Domain', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
    <div class="col-sm6">
    <h3>Domains</h3>
    @if(count($domains) > 0)
        @foreach($domains as $domain)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/domains/{{$domain->id}}">{{$domain->urlname}}</a></h3>
                        <small>Added on {{$domain->created_at}} by {{$domain->user_id->name}}</small>
                    </div>
                </div>
            </div>

        @endforeach
        {{$domains->links()}}
    @else
        <p>No domains found</p>
    @endif
    </div>
@stop