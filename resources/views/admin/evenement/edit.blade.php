@extends('layouts.adminapp')

@section( 'title', 'Edit evenement' )

@section('content')
@if(isset($message))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Edit a evenement</h3>
    </div>
        {{ Form::open(['method' => 'post', 'files' => true]) }}
        {{ Form::label('naam', 'Naam:') }}
        {{ Form::text('naam', $evenement->naam , ['required' => "", 'placeholder' => 'naam']) }}
        <br />
        <br />
        {{ Form::label('dorp_id', 'Dorp:') }}
        {{ Form::select('dorp_id', $dorpen, $evenement->dorp_id) }}
        <br />
        <br />
        {{ Form::label('start_date', 'Start date:') }}
        {{ Form::date('start_date', \Carbon\Carbon::parse($evenement->start_date)) }}
        <br />
        <br />
        {{ Form::label('end_date', 'End date:') }}
        {{ Form::date('end_date', \Carbon\Carbon::parse($evenement->end_date)) }}
        <br />
        <br />
        {{ Form::label('opmerking', 'Opmerking:') }}
        {{ Form::text('opmerking', $evenement->opmerking) }}
        <br />
        <br />
        {{ Form::label('avatar', 'Event Image') }}
        {{ Form::file('avatar', null) }}
        <br />
        <br />
        {{ Form::submit('Edit evenement') }}
        {{ Form::close() }}
    </div>
</div>
@endsection
