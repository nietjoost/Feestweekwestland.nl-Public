@extends('layouts.app')

@php $key = ''; foreach ($dorpen as $dorp) { $key = $key . strtolower($dorp->naam) . ','; } @endphp

@section( 'title', 'Homepage' )
@section( 'desc', 'De hoofdpagina van de website feestweekwestland.nl. Op deze site vind u alle informatie over feestweken in het westland.')
@section( 'key', 'feestweekwestland,westland,feestweken,feest,party,dorp,dorpen,' . $key)
@section( 'image', url('/img/static/westland_vlag.png'))

@section('content')
<div class="row">
    @foreach ($dorpen as $d)
        @foreach ($image as $i)
            @if($i->dorp_id == $d->id)
                <div class="col-md-2">
                    <img class="col-md-2-img" src="{{ url('img/' . $i->img) }}" alt="Foto van het dorp: {{ $d->naam }}">
                    <div class="home-img-overlay">
                        <a class="home-btn-dorp" href="{{ url('/dorp/' .  strtolower($d->naam)) }}">{{ $d->naam }}</a>
                   </div>
                </div>
            @endif
        @endforeach
    @endforeach

    <div class="col-md-2">
        <img class="col-md-2-img" src="img/Browse.PNG">
        <div class="home-img-overlay">
            <a class="home-btn-dorp" href="{{ url('/browse') }}">Browse</a>
       </div>
    </div>

</div>
@endsection
