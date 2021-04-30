@extends('layouts.adminapp')

@section( 'title', 'edit dorp' )

@section('content')
@if(isset($message))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Edit a dorp</h3>
    </div>
    <div class="panel-body">
        {{ Form::open(['method' => 'post', 'files' => true]) }}
        {{ Form::label('naam', 'Naam:') }}
        {{ Form::text('naam', $dorp->naam, ['required' => "", 'placeholder' => 'naam']) }}
        <br />
        <br />
        {{ Form::label('avatar', 'Dorp image') }}
        {{ Form::file('avatar', null) }}
        <br />
        <br />
        {{ Form::submit('Edit dorp') }}
        {{ Form::close() }}
    </div>
</div>
@endsection
