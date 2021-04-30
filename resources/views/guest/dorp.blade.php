@extends('layouts.app')

@php $key = ''; foreach ($evenementen as $e) { $key = $key . strtolower($e->naam) . ','; } $key = str_replace(' ', ',', $key); @endphp

@section( 'title', $dorp->naam )
@section( 'desc', 'Dit is de overzicht pagina van het dorp ' . $dorp->naam . '. Hier vind u alle evenementen die in het dorp plaats vinden.')
@section( 'key', 'feestweekwestland,westland,feestweken,feest,party,evenementen,evenement,' . strtolower($dorp->naam) . ',' . $key)
@section( 'image', url('/img/' . $ogImage->img))

@section('content')
<div class="row dorp-row">
    <div class="container">
        <div class="row">
            <h1>Evenementen van {{ $dorp->naam }}</h1>
            @foreach ($evenementen as $e)
                <div class="col-md-4">
                    @if($e->end_date < Date("Y-m-d"))
                        <div class="panel dorp-panel-default" style="border-color: #b93b3b;">
                    @else
                        <div class="panel panel-default">
                    @endif
                        @foreach ($image as $i)
                            @if ($i->evenement_id == $e->id)
                                <img src="{{ url('/img/' . $i->img) }}"  class="browse-image" alt="Cinque Terre" width="304" height="236">
                                @break
                            @endif
                        @endforeach
                        <div class="panel-body browse-font">
                            <p>{{ $e->naam }}</p>
                            <p>{{ $dorp->naam }}</p>
                            <div class="form-group">
                               <label class="col-md-4 control-label" for="singlebutton"></label>
                                  <a href="{{ url('dorp/' . strtolower($dorp->naam) . '/' . $e->naam) }}" class="btn btn-primary center-block">
                                      Meer informatie
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
