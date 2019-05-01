<!doctype html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>@yield('title') | Laraberg Sample</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/css/uikit.min.css' />
    <link href='https://fonts.googleapis.com/css?family=Nunito:200,600' rel='stylesheet'>

    <style>
        html, body {
            min-height: 100vh;
        }
        body {
            padding-top: 3em;
            padding-bottom: 5em;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }
    </style>

    @yield('style')
</head>
<body>
<div class='uk-container'>
    <nav class='uk-navbar uk-navbar-container'>
        <div class='uk-navbar-left'>
            <ul class='uk-navbar-nav'>
                <li class="@yield('menu.home')">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="@yield('menu.posts')">
                    <a href="{{ route('posts') }}">Posts</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <div class='uk-card uk-card-default uk-card-body uk-text-center'>
        <p>Developer: Mehran Abghari</p>
        <p>Email: <a href='mailto:mehran.ab80@gmail.com'>mehran [dot] ab80 [at] gmail.com</a></p>
        <p>Github: <a href='https://github.com/mehranabi'>github.com/mehranabi</a></p>
        <hr>
        <p>It's using <a href='https://github.com/VanOns/laraberg'>Laraberg</a> for the editor in the home page!</p>
        <p>It's using <a href='https://getuikit.com'>UIKit</a> as the UI library!</p>
        <p>It's using <a href='https://laravel.com'>Laravel</a> as the web framework!</p>
    </div>
</div>

@yield('script')
</body>
</html>
