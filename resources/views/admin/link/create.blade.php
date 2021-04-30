@extends('layouts.adminapp')

@section( 'title', 'Create link' )

@section('content')
@if(isset($error))
    <div class="alert alert-danger">
        <strong>Warning!</strong> {{ $error }}
    </div>
@endif
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
        {{ Form::open(['url' => 'admin/link/create']) }}
        {{ Form::label('naam', 'Naam:') }}
        {{ Form::text('naam', "", ['required' => "", 'placeholder' => 'Naam']) }}
        <br />
        <br />
        {{ Form::label('link', 'Link:') }}
        {{ Form::text('link', "", ['required' => "", 'placeholder' => 'URL']) }}
        <br />
        <br />
        {{ Form::label('evenement_id', 'Evenement naam:') }}
        {{ Form::select('evenement_id', $evenementen) }}
        <br />
        <br />
        {{ Form::submit('Add link to Evenement') }}
        {{ Form::close() }}
    </div>
</div>
@endsection
