@extends('layouts.adminapp')

@section( 'title', 'CRUD dorp ' )

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Crud for dorp</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach ($dorpen as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->naam }}</td>
                    <td>
                        <a href="{{ url('admin/dorp/edit/' . $d->id) }}"><button class="btn btn-warning">Update</button></a>
                    </td>
                    <td>
                        <a href="{{ url('admin/dorp/delete/' . $d->id) }}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    <div class="pull-left">
        <a href="{{ url('admin/dorp/create') }}"><button class="btn btn-success" >Add New Record</button></a>
    </div>
</div>
@endsection
