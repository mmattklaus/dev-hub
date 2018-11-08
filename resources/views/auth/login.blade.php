@extends('layouts.app')
@section('head')
    <style>
        #login_main {
            margin-top: 50px;
        }

        .ui.card {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="sixteen wide column" id="login_main">
        <div class="ui card">
            <div class="content">
                <div class="header">Login</div>
            </div>
            <div class="content">
                <div class="ui grid">
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                        <form class="ui form" id="login" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="field {{ $errors->has('email')? 'error':'' }}">
                                <label>Username <i class="envelope icon"></i></label>
                                <input autofocus v-model="username" type="text" name="email" placeholder="">
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
                            <div class="inline field">
                                <div class="ui toggle checkbox">
                                    <input ref="remember" name="remember" v-model="remember" type="checkbox" tabindex="0"
                                           class="hidden">
                                    <label>Remember my login</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <button class="ui button violet fluid" onclick="$('#login').submit()" type="button">Login</button>
            </div>
        </div>
    </div>
@endsection
<script>
    $(function () {
    })
</script>
