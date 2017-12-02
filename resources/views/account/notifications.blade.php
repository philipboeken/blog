@extends('layouts.left')

@section('title')
    Manage your Account
@endsection

@section('content-left')
    <account-menu active="notifications"></account-menu>
@endsection

@section('content-mid')
    <section class="section">
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="field is-horizontal">
                <div class="field-label is-normal">First name</div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input id="first_name" type="email"
                                   class="input {{ $errors->has('first_name') ? ' is-danger' : '' }}" name="first_name"
                                   value="{{ old('first_name') }}"
                                   required autofocus>
                            @if ($errors->has('first_name'))
                                <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                            @endif
                        </div>
                        @if ($errors->has('first_name'))
                            <p class="help is-danger">{{ $errors->first('first_name') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">Surname</div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input id="first_name" type="email"
                                   class="input {{ $errors->has('surname') ? ' is-danger' : '' }}" name="surname"
                                   value="{{ old('surname') }}"
                                   required autofocus>
                            @if ($errors->has('surname'))
                                <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                            @endif
                        </div>
                        @if ($errors->has('surname'))
                            <p class="help is-danger">{{ $errors->first('surname') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">Password</div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input id="password" type="password"
                                   class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password"
                                   required>
                            @if ($errors->has('password'))
                                <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                            @endif
                        </div>
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
            <div class="field is-horizontal">
                <div class="field-label"></div>
                <div class="field-body">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Login
                        </button>
                    </div>
                    <div class="control">
                        <a class="button is-text" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection