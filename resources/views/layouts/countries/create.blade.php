@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-9 offset-1">



    <div class="card shadow border-left-primary mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Countries</h1>
                <a href="{{route('countries.index')}}" class="btn btn-primary btn-icon-split float-right">
                    <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                    <span class="text">Back</span>
                </a>
            </div>

        </div>
        <div class="card-body">
            <form action="{{route('countries.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="username" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    {{--                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country_code" class="form-label">{{ __('Country Code') }}</label>
                    <input type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" id="country_code" value="{{ old('country_code') }}" required autocomplete="country_code" autofocus>
                    {{--                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('country_code')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="mt-2 btn btn-success btn-icon-split"><span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                    <span class="text">{{ __('Submit') }}</span></button>
            </form>
        </div>
    </div>
        </div>
    </div>

@endsection
