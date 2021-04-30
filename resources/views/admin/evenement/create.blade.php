@extends('layouts.adminapp')

@section( 'title', 'Create evenement' )

@section('content')
@if(isset($message))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create a evenement</h3>
    </div>
    <div class="panel-body">
        {{ Form::open(['url' => 'admin/evn/create', 'files' => true]) }}
        {{ Form::label('naam', 'Naam:') }}
        {{ Form::text('naam', "", ['required' => "", 'placeholder' => 'naam']) }}
        <br />
        <br />
        {{ Form::label('dorp_id', 'Dorp:') }}
        {{ Form::select('dorp_id', $dorpen) }}
        <br />
        <br />
        {{ Form::label('start_date', 'Start date:') }}
        {{ Form::date('start_date', \Carbon\Carbon::now()) }}
        <br />
        <br />
        {{ Form::label('end_date', 'End date:') }}
        {{ Form::date('end_date', \Carbon\Carbon::now()) }}
        <br />
        <br />
        {{ Form::label('opmerking', 'Opmerking:') }}
        {{ Form::text('opmerking') }}
        <br />
        <br />
        {{ Form::label('avatar', 'Event Image') }}
        {{ Form::file('avatar', null) }}
        <br />
        <br />
        {{ Form::submit('Add evenement') }}
        {{ Form::close() }}
    </div>
</div>
@endsection
