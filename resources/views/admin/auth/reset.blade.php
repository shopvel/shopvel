<!doctype html>
<html>
<head>
    <title>{{ trans('admin/auth.reset_head_title') }}</title>
    <meta name="robots" content="noindex">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ Theme::url('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="auth">
<div id="container">
    <form id="form-auth" method="post" action="{{ url('admin/reset-password') }}">
        <div id="logo"><img src="{{ Theme::url('img/shopvel-logo.png') }}" alt="Shopvel Logo"></div>
        @if (count($errors) > 0)
        <div class="msg msg-danger">
            <strong>Whoops!</strong> {{ $errors->first() }}
        </div>
        @endif
        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ trans('admin/auth.email') }}">
        <input type="password" name="password" id="password" value="" placeholder="{{ trans('admin/auth.password') }}">
        <input type="password" name="password_confirmation" id="password_confirmation" value="" placeholder="{{ trans('admin/auth.password_confirm') }}">
        <button class="button button-primary" type="submit">{{ trans('admin/auth.reset') }}</button>

        <div class="links">
            <a href="{{ URL::to('admin/login') }}" title="{{ trans('admin/auth.login') }}">{{ trans('admin/auth.login') }}</a>
        </div>
        <input type="hidden" name="token" value="{{ $token }}">
        {{ csrf_field() }}
    </form>
</div>
</body>
</html>