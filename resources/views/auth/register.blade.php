@extends('layouts.app')
@section('head')
    <style>
        #register_main {
            margin-top: 50px;
        }

        .ui.card {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="sixteen wide column" id="register_main">
        <div class="ui card">
            <div class="content">
                <div class="header">Sign up</div>
            </div>
            <div class="content">
                <div class="ui grid">
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                        <form class="ui form" id="register" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="field {{ $errors->has('first_name')? 'error':'' }}">
                                <label>First Name</label>
                                <input autofocus type="text" value="{{ old('first_name') }}" name="first_name" placeholder="">
                                @if($errors->has('first_name'))
                                    <span class="help-block ui header orange">
                                        {{ $errors->first('first_name') }}
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('last_name')? 'error':'' }}">
                                <label>Last Name</label>
                                <input type="text" value="{{ old('last_name') }}" name="last_name" placeholder="">
                                @if($errors->has('last_name'))
                                    <span class="help-block ui header orange">
                                        {{ $errors->first('last_name') }}
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('email')? 'error':'' }}">
                                <label>Email <i class="envelope icon"></i></label>
                                <input v-model="email" type="text" value="{{ old('email') }}" name="email" placeholder="">
                                @if($errors->has('email'))
                                    <span class="help-block ui header orange">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('password')? 'error':'' }}">
                                <label>Password <i class="lock icon"></i></label>
                                <input v-model="password" type="password" name="password" placeholder="">
                                @if($errors->has('password'))
                                    <span class="help-block ui header orange">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('password_confirmation')? 'error':'' }}">
                                <label>Confirm Password <i class="lock icon"></i></label>
                                <input type="password" name="password_confirmation" placeholder="">
                                @if($errors->has('password_confirmation'))
                                    <span class="help-block ui header orange">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                @endif
                            </div>
                            <div class="field">
                                <div class="two fields">
                                    <div class="field {{ $errors->has('terms_agreed')? 'error':'' }}">
                                        <div class="ui checkbox">
                                            <input value="1" type="checkbox" {{ old('terms_agreed')==null ?: 'checked' }} tabindex="0"
                                                   name="terms_agreed" class="hidden">
                                            <label>I agree to the <a href="#">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                    <div class="inline field">
                                        <div class="ui toggle checkbox">
                                            <input value="1" name="login" type="checkbox"
                                                   {{ old('login')==null ?: 'checked' }} tabindex="0" class="hidden">
                                            <label>Log me in</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <button class="ui button primary fluid" onclick="$('#register').submit()" type="button">Register
                </button>
            </div>
        </div>
    </div>
@endsection
