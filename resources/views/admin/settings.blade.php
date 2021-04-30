@extends('layouts.adminapp')

@section( 'title', 'Dashboard' )

@section('content')
@if(isset($message))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Website settings</h3>
    </div>
    <div class="panel-body">
      <div class="pull-left">
          <label>Remove all unused images</label>
          <a href="{{ url('admin/settings/clearimage') }}"><button class="btn btn-success" >Clear images</button></a>
      </div>
    </div>
</div>
@endsection
