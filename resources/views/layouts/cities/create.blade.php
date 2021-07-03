@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('cities.index')}}" class="btn btn-primary btn-icon-split">

                <span class="text">Back</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('cities.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <select name="state_id" class="form-control" aria-label="Default select example">
                        {{--                        <option selected>Open this select menu</option>--}}
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    @error('state_id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('City Name') }}</label>
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
