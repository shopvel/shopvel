<!doctype html>
<html>
    <head>
        <title>{{ trans('admin/auth.login_head_title') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
        <link href="{{ Theme::url('css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body id="auth">
        <div id="container">
            <form id="form-auth" method="post">
                <div id="logo"><img src="{{ Theme::url('img/shopvel-logo.png') }}" alt="Shopvel Logo"></div>
                @if (count($errors) > 0)
                <div class="msg msg-danger">
                    <strong>Whoops!</strong> {{ trans('admin/auth.login_error') }}
                </div>
                @endif
                <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ trans('admin/auth.email') }}">
                <input type="password" name="password" id="password" value="" placeholder="{{ trans('admin/auth.password') }}">
                <div class="checkbox">
                    <input type="checkbox" name="remember"> {{ trans('admin/auth.remember') }}
                </div>
                <button class="button button-primary" type="submit">{{ trans('admin/auth.login') }}</button>

                <div class="links">
                    <a href="{{ URL::to('admin/forgot-password') }}" title="{{ trans('admin/auth.forgot_password') }}">{{ trans('admin/auth.forgot_password') }}</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </body>
</html>