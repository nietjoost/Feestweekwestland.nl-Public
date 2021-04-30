@extends('layouts.app')
@section( 'title', 'Homepage' )
@section( 'desc', 'De hoofdpagina van de website feestweekwestland.nl. Op deze site vind u alle informatie over feestweken in het westland.')
@section( 'key', 'feestweekwestland,westland,feestweken,feest,party,dorp,dorpen,')
@section( 'image', url('/img/static/westland_vlag.png'))

@section('content')
  <div class="d-flex justify-content-center align-items-center" id="main">
      <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
      <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">Sorry, an error has occured, Requested page not found!</h1>
      <div class="mr-3 text-center">
        <a href="{{ url('/') }}"> <button type="button" class="btn btn-success btn-lg">Go back </button></a>
      </div>
  </div>
@endsection
