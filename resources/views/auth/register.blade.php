@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-title">
            <p class="title">
                Register
            </p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="card-content">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">First Name</div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="first_name" type="text" class="input" name="first_name"
                                       value="{{ old('first_name') }}" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                @endif
                            </p>
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
                            <p class="control">
                                <input id="surname" type="text" class="input" name="surname"
                                       value="{{ old('surname') }}" required autofocus>
                                @if ($errors->has('surname'))
                                    <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                @endif
                            </p>
                            @if ($errors->has('surname'))
                                <p class="help is-danger">{{ $errors->first('surname') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">E-Mail Address</div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="email" type="email"
                                       class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                                       value="{{ old('email') }}" required>
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
                                <input id="password" type="password" class="input" name="password" required>
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
                    <div class="field-label is-normal">Confirm Password</div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <p class="control">
                            <button type="submit" class="button is-link">
                                Register
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
