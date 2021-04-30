@extends('layouts.adminapp')

@section( 'title', 'CRUD evenement ' )

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Crud for evenement</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Dorp</th>
                    <th>Start datum</th>
                    <th>Eind datum</th>
                    <th>Opmerking</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach ($evenementen as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->naam }}</td>
                    @foreach ($dorpen as $d)
                        @if($d->id == $e->dorp_id)
                            <td>{{ $d->naam }}</td>
                        @endif
                    @endforeach
                    <td>{{ $e->start_date }}</td>
                    <td>{{ $e->end_date }}</td>
                    <td>{{ $e->opmerking }}</td>
                    <td>
                        <a href="{{ url('admin/evn/edit/' . $e->id) }}"><button class="btn btn-warning">Update</button></a>
                    </td>
                    <td>
                        <a href="{{ url('admin/evn/delete/' . $e->id) }}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
  <div class="pull-left">
      <a href="{{ url('admin/evn/create') }}"><button class="btn btn-success" >Add New Record</button></a>
  </div>
</div>
@endsection
