@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('countries.index')}}" class="btn btn-primary btn-icon-split">

                <span class="text">Back</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('countries.update',$country->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="username" value="{{ old('name',$country->name) }}" required>
                    {{--                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country_code" class="form-label">{{ __('Country Code') }}</label>
                    <input type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" id="country_code" value="{{ old('country_code',$country->country_code) }}" required>
                    {{--                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('country_code')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            </form>
            <div class="m-2" >
                <form method="POST" action="{{route('countries.destroy',$country->id)}}">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete {{$country->country_code}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
