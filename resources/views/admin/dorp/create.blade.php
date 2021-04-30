@extends('layouts.adminapp')

@section( 'title', 'Create dorp' )

@section('content')
@if(isset($message))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create a dorp</h3>
    </div>
    <div class="panel-body">
        {{ Form::open(['url' => 'admin/dorp/create', 'files' => true]) }}
        <div class="form-group row">
            {{ Form::label('naam', 'Naam:') }}
            {{ Form::text('naam', "", ['required' => "", 'placeholder' => 'naam']) }}
        </div>
        <br />
        <br />
        {{ Form::label('avatar', 'Dorp image') }}
        {{ Form::file('avatar', null) }}
        <br />
        <br />
        {{ Form::submit('Add dorp') }}
        {{ Form::close() }}
    </div>
</div>
@endsection
