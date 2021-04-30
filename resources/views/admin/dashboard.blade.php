@extends('layouts.adminapp')

@section( 'title', 'Dashboard' )

@section('content')
<!-- Website Overview -->
<div class="panel panel-default">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title">Website Overview</h3>
  </div>
  <div class="panel-body">
    <div class="col-md-3">
      <div class="well dash-box">
        <h2 class="dashboard-stats-h2"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>{{ $memory . ' MB' }}</h2>
        <h4>Memory used</h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="well dash-box">
        <h2 class="dashboard-stats-h2"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>{{ $browser[0]['browser'] }}</h2>
        <h4>MU browser</h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="well dash-box">
        <h2 class="dashboard-stats-h2"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $visitors }}</h2>
        <h4>Visitors</h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="well dash-box">
        <h2 class="dashboard-stats-h2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> {{ $views }}</h2>
        <h4>Page views</h4>
      </div>
    </div>
  </div>
 </div>

<!-- Total dorpen -->
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Current dorpen total {{ count($dorpen) }}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Naam</th>
            </tr>
            @foreach($dorpen as $dorp)
                <tr>
                    <td>{{ $dorp->id }}</td>
                    <td>{{ $dorp->naam }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- Total evenementen -->
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Current evenementen total {{ count($evenementen) }}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Dorp</th>
            </tr>
            @foreach($evenementen as $evenement)
                <tr>
                    <td>{{ $evenement->id }}</td>
                    <td>{{ $evenement->naam }}</td>
                    @foreach($dorpen as $dorp)
                        @if($dorp->id == $evenement->dorp_id)
                            <td>{{ $dorp->naam }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- Total linken -->
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Current dorpen total {{ count($linken) }}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Evenement</th>
                <th>Link</th>
                <th>Naam</th>
            </tr>
            @foreach($linken as $link)
                <tr>
                    <td>{{ $link->id }}</td>
                    @foreach($evenementen as $evenement)
                        @if($evenement->id == $link->evenement_id)
                            <td>{{ $evenement->naam }}</td>
                        @endif
                    @endforeach
                    <td>{{ $link->link }}</td>
                    <td>{{ $link->naam }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
