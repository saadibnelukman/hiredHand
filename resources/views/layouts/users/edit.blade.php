@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('users.index')}}" class="btn btn-primary btn-icon-split">

                <span class="text">Back</span>
            </a>


        </div>

        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="username" class="form-label">{{ __('Username') }}</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username',$user->username) }}" required autocomplete="username" autofocus>
{{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">{{ __('First Name') }}</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name',$user->first_name) }}" required autocomplete="first_name" autofocus>
{{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name',$user->last_name) }}" required autocomplete="last_name" autofocus>
{{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email',$user->email) }}" required autocomplete="email" autofocus>
{{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label for="password" class="form-label">{{ __('Password') }}</label>--}}
{{--                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required autocomplete="password" autofocus>--}}
{{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
{{--                    @error('password')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
                <button type="submit" class="m-2 btn btn-primary">{{ __('Update User')}}</button>
            </form>

            <div class="m-2" >
                <form method="POST" action="{{route('users.destroy',$user->id)}}">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete {{$user->username}}</button>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">


                <span class="text">Change Password</span>



        </div>
        <div class="card-body">
            <form action="{{ route('users.change.password', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="new_password"  required autocomplete="password" autofocus>
                    {{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required autocomplete="new_password" autofocus>
                    {{--                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}

                </div>
                <button type="submit" class="m-2 btn btn-primary">{{ __('Update Password')}}</button>
            </form>
        </div>
        </div>
    </div>

@endsection


