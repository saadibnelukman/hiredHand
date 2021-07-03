@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('users.create')}}" class="btn btn-primary btn-icon-split">

                <span class="text">Create</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Manage</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $key => $row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->last_name}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->email}}</td>
                        <td class="text-center"><a href="{{route('users.edit',$row->id)}}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-info-circle"></i>
                            </a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
