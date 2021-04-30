@extends('layouts.adminapp')

@section( 'title', 'Edit link' )

@section('content')
@if(isset($message))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create a link</h3>
    </div>
    <div class="panel-body">
        {{ Form::open(['method' => 'post']) }}
        {{ Form::label('naam', 'Naam:') }}
        {{ Form::text('naam', $link->naam, ['required' => "", 'placeholder' => 'Naam']) }}
        <br />
        <br />
        {{ Form::label('link', 'Link:') }}
        {{ Form::text('link', $link->link, ['required' => "", 'placeholder' => 'URL']) }}
        <br />
        <br />
        {{ Form::label('evenement_id', 'Evenement naam:') }}
        {{ Form::select('evenement_id', $evenementen, $link->evenement_id) }}
        <br />
        <br />
        {{ Form::submit('Edit link') }}
        {{ Form::close() }}
    </div>
</div>
@endsection
