@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('states.create')}}" class="btn btn-primary btn-icon-split">

                <span class="text">Create</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Country Code</th>
                        <th>Country Name</th>
                        <th>State Name</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Country Code</th>
                        <th>Country Name</th>
                        <th>State Name</th>
                        <th>Manage</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($states as $key=>$row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->country_code}}</td>
                            <td>{{$row->country_name}}</td>
                            <td>{{$row->name}}</td>
                            <td class="text-center">
                                <a href="{{route('states.edit',$row->id)}}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
