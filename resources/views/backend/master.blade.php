<!doctype html>
<html>
    <head>
        <title>@yield('head_title')</title>
        <meta name="robots" content="noindex">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
        <link href="{{ Theme::url('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ Theme::url('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="s-container">
            <div id="s-aside">
                <div id="logo">
                    <img src="{{ Theme::url('img/shopvel-icon.png') }}" alt="Shopvel Icon">
                </div>
                <ul>
                    <li>
                       <a href="{{ URL::to('backend') }}" title="{{ trans('general.dashboard') }}">
                           <i class="fa fa-dashboard"></i>
                           {{ trans('backend/general.dashboard') }}
                       </a>
                    </li>
                    <li>
                        <a href="#" data-target="" title="{{ trans('general.customers') }}">
                            <i class="fa fa-male"></i>
                            {{ trans('backend/general.customers') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" data-target="s-nav-articles" title="{{ trans('article.articles') }}">
                            <i class="fa fa-cube"></i>
                            {{ trans('backend/article.articles') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" data-target="" title="{{ trans('general.settings') }}">
                            <i class="fa fa-cog"></i>
                            {{ trans('backend/general.settings') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div id="s-aside-toggle">
                <div id="s-aside-toggle-close"><a href="#"><i class="fa fa-close"></i></a></div>
                <div id="s-aside-toggle-inner">
                    <div id="s-nav-articles" data="s-nav">
                        <span>{{ trans('backend/general.navigation') }}</span>
                        <ul>
                            <li><a href="{{ URL::to('backend/c/article') }}" title="{{ trans('backend/general.show_all') }}">{{ trans('backend/general.show_all') }}</a></li>
                            <li><a href="{{ URL::to('backend/c/article/a/add') }}" title="{{ trans('backend/article.add') }}">{{ trans('backend/article.add') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="s-content">
                <div id="s-content-container">
                    <header>
                        <h1>@yield('title')</h1>
                        <div id="s-header-links">
                            <ul>
                                <li>
                                    {{ trans('backend/general.logged_as') }}
                                    <strong>{{ Admin::user()->email }}</strong>
                                </li>
                                <li>
                                    <a href="{{ URL::to('backend/logout') }}" title="{{ trans('backend/auth.logout') }}">
                                        <i class="fa fa-sign-out"></i>
                                        {{ trans('backend/auth.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </header>
                    @if(empty($disableBreadcrumb))
                        <div id="s-breadcrumb">
                            <ul>
                                <li><i class="fa fa-home"></i></li>
                                @if(isset($breadcrumb) && count($breadcrumb) > 0)
                                    @foreach($breadcrumb as $breadcrumbItem)
                                        @if(isset($breadcrumbItem['href']))
                                            <li>
                                                <a href="{{ $breadcrumbItem['href'] }}" title="{{ $breadcrumbItem['title'] }}">
                                                    {{ $breadcrumbItem['title'] }}
                                                </a>
                                            </li>
                                        @else
                                            <li>{{ $breadcrumbItem['title'] }}</li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endif
                    <div id="s-content-inner">
                        @yield('content')
                    </div>
                </div>
                <footer>
                    <div id="s-footer-language">
                        <strong>Language:</strong>
                        <ul>
                            @foreach(Language::all() as $code => $name)
                            <li><a href="{{ URL::to(Request::url() . '?lang=' . $code) }}" title="{{ $name }}">{{ $name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="s-footer-version">
                        <a href="http://www.shopvel.com">Shopvel eCommerce v{{ SHOPVEL_VERSION }}</a><br />
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ Theme::url('jquery/1.12.4/jquery.min.js') }}"></script>
        <script src="{{ Theme::url('js/script.js') }}"></script>
    </body>
</html>