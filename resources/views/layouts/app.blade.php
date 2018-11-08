<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dev Hub') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/semantic.paper.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}" async=""></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Font Awesome 5 -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <style>
        .help-block {
            font-size: 8px !important;
        }
    </style>
    @yield('head')
</head>
<body>
<div class="ui large top fixed borderless menu">
    <div class="ui container">
        <a class="item">
            <img class="logo" src="{{ asset('assets/images/logo.jpeg') }}"> &nbsp;
            Hub
        </a>
        <a class="item">
            Messages
        </a>
        <a class="item">
            Friends
        </a>
        <div class="right menu">
            <div class="item">
                <div class="ui icon input">
                    <input type="text" placeholder="Search...">
                    <i class="search link icon"></i>
                </div>
            </div>
            @guest
                <div class="ui item">
                    <a href="{{ route('register') }}" class="ui primary button">Sign up</a>
                </div>
                <div class="item">
                    <a href="{{ route('login') }}" class="ui button">Log-in</a>
                </div>
            @else
                <div class="ui item">
                    <img class="ui mini circular image" src="/assets/images/user.jpg"> &nbsp;&nbsp;
                    <div class="ui dropdown">
                        {{ auth()->user()->first_name }} <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item">
                                <i class="user icon"></i>
                                Profile
                            </div>
                            <div class="item" onclick="$('form#logout').submit()">
                                <i class="trash icon"></i>
                                Sign out
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
            @endguest
        </div>
    </div>
</div>
<div class="ui main container" style="padding-top: 90px!important">
    <div class="ui grid">
        <div class="twelve wide column">
            @yield('content')
        </div>
        <div class="four wide column">
            <div class="ui list">
                <div class="item">
                    <i class="folder icon"></i>
                    <div class="content">
                        <div class="header">src</div>
                        <div class="description">Source files for project</div>
                        <div class="list">
                            <div class="item">
                                <i class="folder icon"></i>
                                <div class="content">
                                    <div class="header">site</div>
                                    <div class="description">Your site's theme</div>
                                </div>
                            </div>
                            <div class="item">
                                <i class="folder icon"></i>
                                <div class="content">
                                    <div class="header">themes</div>
                                    <div class="description">Packaged theme files</div>
                                    <div class="list">
                                        <div class="item">
                                            <i class="folder icon"></i>
                                            <div class="content">
                                                <div class="header">default</div>
                                                <div class="description">Default packaged theme</div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="folder icon"></i>
                                            <div class="content">
                                                <div class="header">my_theme</div>
                                                <div class="description">Packaged themes are also available in this
                                                    folder
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <i class="file icon"></i>
                                <div class="content">
                                    <div class="header">theme.config</div>
                                    <div class="description">Config file for setting packaged themes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <i class="folder icon"></i>
                    <div class="content">
                        <div class="header">dist</div>
                        <div class="description">Compiled CSS and JS files</div>
                        <div class="list">
                            <div class="item">
                                <i class="folder icon"></i>
                                <div class="content">
                                    <div class="header">components</div>
                                    <div class="description">Individual component CSS and JS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <i class="file icon"></i>
                    <div class="content">
                        <div class="header">semantic.json</div>
                        <div class="description">Contains build settings for gulp</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ asset('assets/js/semantic.js') }}" defer></script>
@yield('foot')
<script type="text/javascript">
    $(function () {
        $('.ui.checkbox').checkbox();
        $('.ui.dropdown').dropdown();
    })
</script>
</body>
</html>
