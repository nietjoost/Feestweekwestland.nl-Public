@extends('layouts.app')

@section( 'title', 'Browse')
@section( 'desc', 'Dit is de overzicht van alle evenementen gesoorteerd op datum')
@section( 'key', 'feestweekwestland,westland,feestweken,feest,party,evenementen,evenement,browse,evenementen')
@section( 'image', url('/img/static/westland_vlag.png'))

@section('content')
<div class="row row-dorp">
    <div class="container">
        <div class="row">
            <h1 class="browse-font-margin">Timeline</h1>
            {{-- @foreach ($evenementen as $e)
            <div class="col-md-4">
                @if($e->end_date < date("Y-m-d"))
                    <div class="panel panel-default" style="border-color: #b93b3b;">
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
                        @foreach ($dorpen as $d)
                            @if ($d->id == $e->dorp_id)
                                <p> {{ $e->naam }}</p>
                                <p> {{ $d->naam }}</p>
                                <div class="form-group">
                                   <label class="col-md-4 control-label" for="singlebutton"></label>
                                      <a href="{{ url('dorp/' . strtolower($d->naam) . '/' . $e->naam) }}" class="btn btn-primary center-block">
                                          Meer informatie
                                      </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach --}}
            <section id=timeline>
            	<div class="demo-card-wrapper">
                    @foreach ($evenementen as $key => $e)
            		<div class="demo-card demo-card--step{{ $key+1 }}">
            			<div class="head">
            				<div class="number-box">
            					<span class="small browse-font">{{ date('F', strtotime($e->start_date)) }}</span>
            				</div>
            				<h2 class="browse-font">{{ $e->naam }}</h2>
            			</div>
            			<div class="body">
                            @foreach ($image as $i)
                                @if ($i->evenement_id == $e->id)
                                    <img src="{{ url('/img/' . $i->img) }}"  class="browse-image" alt="Cinque Terre" width="304" height="236">
                                    @break
                                @endif
                            @endforeach
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>
                                @foreach ($dorpen as $d)
                                    @if ($d->id == $e->dorp_id)
                                        <a href="{{ url('dorp/' . strtolower($d->naam) . '/' . $e->naam) }}" class="btn btn-primary center-block">
                                            Meer informatie
                                        </a>
                                    @endif
                                @endforeach
                            </div>
            			</div>
            		</div>
                    @endforeach
            	</div>
            </section>
        </div>
    </div>
</div>
@endsection
