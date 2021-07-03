@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('states.index')}}" class="btn btn-primary btn-icon-split">

                <span class="text">Back</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('states.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <select name="country_id" class="form-control" aria-label="Default select example">
{{--                        <option selected>Open this select menu</option>--}}
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('State Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    {{--                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>

@endsection
