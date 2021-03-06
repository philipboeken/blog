@extends('layouts.center')
@section('title')
<div class="has-text-centered">
    Jan Luyken Blog
</div>
@endsection

@section('content-mid')
<section class="section">
    <div class="container-small">
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="field is-horizontal">
                <div class="field-label is-normal">E-Mail Address</div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}"
                                required autofocus> @if ($errors->has('email'))
                            <span class="icon is-small is-right">
                                        <i class="fas fa-warning"></i>
                                    </span> @endif
                        </div>
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
                        <div class="control">
                            <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>                            @if ($errors->has('password'))
                            <span class="icon is-small is-right">
                                        <i class="fas fa-warning"></i>
                                    </span> @endif
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
                    <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember me
                </label>
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
    </div>
</section>
@endsection