@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="{{route('cities.index')}}" class="btn btn-dark btn-icon-split">

               <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                <span class="text">Back</span>
            </a>

        </div>

        <div class="card-body">
            <form action="{{route('cities.update',$city->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="state_id" class="form-label">{{ __('State Name') }}</label>
                    <select name="state_id" class="form-control">
                        {{--                        <option selected>Open this select menu</option>--}}
                        @foreach($states as $state)
                            <option value="{{$state->id}}"{{$state->id == $city->state->id ? 'selected' :''}}>{{$state->name}}</option>
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name',$city->name) }}" required autocomplete="name" autofocus>
                    {{--                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                    <span class="text">{{ __('Submit') }}</span></button>
            </form>
            <div class="mt-2">
                <form method="POST" action="{{route('cities.destroy',$city->id)}}">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger btn-icon-split"><span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                        <span class="text">Delete</span></button>
                </form>
            </div>
        </div>

    </div>

@endsection
