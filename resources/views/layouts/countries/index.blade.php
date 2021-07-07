@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-9 offset-1">
    <div class="card shadow border-left-primary mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Countries</h1>
                <a href="{{route('countries.create')}}" class="btn btn-primary btn-icon-split">
                    <span class="text">Create</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Country Name</th>
                        <th>Country Code</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Country Name</th>
                        <th>Country Code</th>
                        <th>Manage</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($countries as $key=>$row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->country_code}}</td>
                            <td class="text-center">
                                <a href="{{route('countries.edit',$row->id)}}" class="btn btn-info btn-circle btn-sm">
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
        </div>
    </div>

@endsection
