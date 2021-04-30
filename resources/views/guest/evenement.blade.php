@extends('layouts.app')

@php $key = ''; foreach ($evenementen as $e) { $key = $key . strtolower($e->naam) . ','; } $key = str_replace(' ', ',', $key); @endphp

@section( 'title', $evenement->naam )
@section( 'desc', 'Dit is de overzicht pagina van het evenement ' . $evenement->naam . '.')
@section( 'key', 'feestweekwestland,westland,feestweken,feest,party,evenementen,evenement,' . $key)
@section( 'image', url('/img/' . $image))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page-header"> {{ $evenement->naam }} </h1>
                <img src="/img/{{ $image }}" alt="">
                <hr>
                <div class="row">
                    @if($evenement->start_date === $evenement->end_date)
                        <div class="col-xs-6">
                            <time datetime="{{ date("d-m-Y", strtotime($evenement->start_date)) }}" class="icon">
                              <em>{{ date('l', strtotime($evenement->start_date)) }}</em>
                              <strong>{{ date('F', strtotime($evenement->start_date)) }}</strong>
                              <span>{{ date('d', strtotime($evenement->start_date)) }}</span>
                            </time>
                        </div>
                    @else
                        <div class="col-xs-6">
                            <time datetime="{{ date("d-m-Y", strtotime($evenement->start_date)) }}" class="icon">
                              <em>{{ date('l', strtotime($evenement->start_date)) }}</em>
                              <strong>{{ date('F', strtotime($evenement->start_date)) }}</strong>
                              <span>{{ date('d', strtotime($evenement->start_date)) }}</span>
                            </time>
                        </div>
                        <div class="col-xs-6">
                            <span class="succes">t/m</span>
                            <i class="fa fa-external-link" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-6 date-margin-bottom">
                            <time datetime="{{ date("d-m-Y", strtotime($evenement->end_date)) }}" class="icon">
                              <em>{{ date('l', strtotime($evenement->end_date)) }}</em>
                              <strong>{{ date('F', strtotime($evenement->end_date)) }}</strong>
                              <span>{{ date('d', strtotime($evenement->end_date)) }}</span>
                            </time>
                        </div>
                    @endif
                </div>
                <div class="row evenement-link-space">
                    @foreach ($linken as $l)
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ $l->naam }}
                            </div>
                            <div class="panel-body ">
                                <div class="form-group">
                                   <label class="col-md-4 control-label" for="singlebutton"></label>
                                      <a href="{{ $l->link }}" class="btn btn-primary center-block">
                                          Link naar website
                                      </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 evenement-sidebar-top">
                <div class="well">
                    <h5>Misschien ook geïnteresseerd in andere dorpen?</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                @foreach ($dorpen as $d)
                                    <li>
                                        <a href="{{ url('/dorp/' . strtolower($d->naam)) }}">{{ $d->naam }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--<div class="well">
                    <iframe class="evenement-google-maps"
                      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDS_qbEpCcXbFjbPYgAOYGBkM48KKq2NfM&q={{ $dorp->naam }}" allowfullscreen>
                    </iframe>
                </div>-->
            </div>
        </div>
    </div>
@endsection
