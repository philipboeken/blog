@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-title">
            <p class="title">
                Login
            </p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="card-content">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">E-Mail Address</div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="email" type="email"
                                       class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                                       value="{{ old('email') }}"
                                       required autofocus>
                                @if ($errors->has('email'))
                                    <span class="icon is-small is-right">
                              <i class="fa fa-warning"></i>
                            </span>
                                @endif
                            </p>
                            @if ($errors->has('email'))
                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">Password</div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="password" type="password"
                                       class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="icon is-small is-right">
                              <i class="fa fa-warning"></i>
                            </span>
                                @endif
                            </p>
                            @if ($errors->has('password'))
                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <div class="control">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                        </div>
                    </div>
                </div>
                <div class="field is-grouped is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <p class="control">
                            <button type="submit" class="button is-link">
                                Login
                            </button>
                        </p>
                        <p class="control">
                            <a class="button is-text" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
