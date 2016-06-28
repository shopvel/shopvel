<!doctype html>
<html>
<head>
    <title>{{ trans('admin/auth.get_new_password_head_title') }}</title>
    <meta name="robots" content="noindex">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ Theme::url('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="auth">
<div id="container">
    <form id="form-auth" method="post">
        <div id="logo"><img src="{{ Theme::url('img/shopvel-logo.png') }}" alt="Shopvel Logo"></div>

        @if (session('status'))
        <div class="alert alert-success">
            <div class="msg msg-success">
                {{ session('status') }}
            </div>

            <div class="links">
                <a href="{{ URL::to('admin/login') }}" title="{{ trans('admin/auth.login') }}">{{ trans('admin/auth.login') }}</a>
            </div>
        </div>
        @else
            @if (count($errors) > 0)
            <div class="msg msg-danger">
                <strong>Whoops!</strong>
                @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif
            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ trans('admin/auth.email') }}">
            <button class="button button-primary" type="submit">{{ trans('admin/auth.get_new_password') }}</button>

            <div class="links">
                <a href="{{ URL::to('admin/login') }}" title="{{ trans('admin/auth.login') }}">{{ trans('admin/auth.login') }}</a>
            </div>
            {{ csrf_field() }}
        @endif
    </form>
</div>
</body>
</html>